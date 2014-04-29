<?php
/**
 *  Friend/Apply/Complete.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  friend_apply_complete Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_FriendApplyComplete extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(
        "opensocial_owner_id" => array(),
        "id" => array(),
        "ssid" => array(),
    );

    /**
     *  Form input value convert filter : sample
     *
     *  @access protected
     *  @param  mixed   $value  Form Input Value
     *  @return mixed           Converted result.
     */
    /*
    function _filter_sample($value)
    {
        //  convert to upper case.
        return strtoupper($value);
    }
    */
}

/**
 *  friend_apply_complete action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_FriendApplyComplete extends M_ActionClass
{
    /**
     *  preprocess of friend_p_day Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    function prepare()
    {
        return parent::prepare();
    }

    /**
     *  friend_apply_complete action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
        $friendManager = $this->backend->getManager("Friend");
        $userManager = $this->backend->getManager("User");
        $lgManager = $this->backend->getManager("Lg");

        $member_id = $this->af->get('opensocial_owner_id');
        $ss_id = $this->af->get('ssid');
        $friend_id = $this->af->get('id');

		$isApply = False;//11/1/26 追加

        //本人チェック
        if($member_id == $friend_id){
            $this->af->setApp('error' ,"3");
            return 'error_my';
        }
        $profile = $userManager->getProfile($member_id);
		$profile['friend_num'] = $friendManager->getFriendlistCount($friend_id ,$status="2",$kbn="");
        $this->af->setApp("profile", $profile);
        $friend = $userManager->getProfile($friend_id);
	    $this->af->setApp("friend", $friend);
		//相手の存在CHK
        if(count($friend) == 0){
            return 'error_404';
        }
        //申請済チェック
        $is_exists = $friendManager->existsFriend($member_id ,$friend_id);
        if($is_exists == 0 ){
            $this->af->setApp('isCompleted' ,True);
            return 'friend_apply_index';
        }
		//BlackListCHK
		$black = chkBlackList($member_id,$friend_id);
		if($black['entry']['id'] == $friend_id && $black['entry']['ignorelistId'] == $member_id){
            return "error_black";
		}
        //相手同盟数チェック
        $isFrApply = False;
        $numsFr['friend'] = $friendManager->getFriendlistCount($friend_id ,$status="2",$kbn="");
		$numsFr['send']   = $friendManager->getFriendlistCount($friend_id ,$status="0",$kbn="send");
		$numsFr['rcv']    = $friendManager->getFriendlistCount($friend_id ,$status="0",$kbn="");
		$numsFr['max'] = $userManager->getMaxFriendContByLevel($friend['level']);
		$numsFr['rest'] = $numsFr['max'] - ( $numsFr['friend'] + $numsFr['send'] + $numsFr['rcv'] );
        if($numsFr['rest'] >= 1){
            $isFrApply = True;
        }
        $this->af->setApp("isFrApply", $isFrApply);
        //同盟数チェック
        $isApply = False;
        $nums['friend'] = $friendManager->getFriendlistCount($member_id ,$status="2",$kbn="");
		$nums['send']   = $friendManager->getFriendlistCount($member_id ,$status="0",$kbn="send");
		$nums['rcv']    = $friendManager->getFriendlistCount($member_id ,$status="0",$kbn="");
		$nums['max'] = $userManager->getMaxFriendContByLevel($profile['level']);
		$nums['rest'] = $nums['max'] - ( $nums['friend'] + $nums['send'] + $nums['rcv'] );
        if($nums['rest'] >= 1){
            $isApply = True;
        }
        $this->af->setApp("nums", $nums);
        $this->af->setApp("isApply", $isApply);

        $isReload = $userManager->isReload($member_id ,$ss_id);
        $this->af->setApp("isReload", $isReload);
        if($isReload == True){
            //return 'error_reload';
        }else{

	        //申請済チェック
	        $status = $friendManager->existsFriend($member_id ,$friend_id);
	        if($status == 2 || $status == 3){
	            $this->af->setApp("status", $status);
	            return 'friend_apply_complete';
	        }

			if($isApply){	//11/1/26 追加
		        //トランザクション開始
		        $db = $this->backend->getDb();
		        $ret = $db->query('START TRANSACTION');
		        if($ret == False){
		            return 'error_sys';
		        }

		        //申請処理
		        $ret = $friendManager->applyFriend($member_id ,$friend_id);
				$ret2 = $lgManager->writeEventLog($friend_id,$member_id ,$stat="7",$id="",$other="",$win="",$lose="",$trid="");
		        $ret3 = $userManager->updSession($member_id ,$ss_id);
		        if($ret === False || $ret2 === False || $ret3 === False){
		            $db->query('ROLLBACK');
		            return 'error_sys';
		        }

		        //トランザクション終了
		        $ret = $db->query('COMMIT');
		        if($ret === False){
		            return 'error_sys';
		        }
			}
		}



        return 'friend_apply_complete';
    }
}

?>
