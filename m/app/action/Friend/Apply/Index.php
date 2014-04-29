<?php
/**
 *  Friend/Apply/Index.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  friend_apply_index Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_FriendApplyIndex extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(

        "opensocial_owner_id" => array(),
        "id" => array(),
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
 *  friend_apply_index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_FriendApplyIndex extends M_ActionClass
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
     *  friend_apply_index action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
        $userManager = $this->backend->getManager("User");
        $friendManager = $this->backend->getManager("Friend");

        $member_id = $this->af->get('opensocial_owner_id');
        $friend_id = $this->af->get('id');

        //本人チェック
        if($member_id == $friend_id){
            $this->af->setApp('error' ,"3");
            return 'error_my';
        }
        $profile = $userManager->getProfile($member_id);
        $this->af->setApp("profile", $profile);
        $friend = $userManager->getProfile($friend_id);
		$friend['friend_num'] = $friendManager->getFriendlistCount($friend_id ,$status="2",$kbn="");
        $this->af->setApp("friend", $friend);
		//相手の存在CHK
        if(count($friend) == 0){
            return 'error_404';
        }
		//BlackListCHK
		$black = chkBlackList($member_id,$friend_id);
		if($black['entry']['id'] == $friend_id && $black['entry']['ignorelistId'] == $member_id){
            return "error_black";
		}
        //申請済チェック
        $is_exists = $friendManager->existsFriend($member_id ,$friend_id);
        if($is_exists == 0 ){
            $this->af->setApp('isCompleted' ,True);
            return 'friend_apply_index';
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
        $this->af->setApp("isApply", $isApply);

        //リロード対策
		$ssid = $userManager->getSsId();
        $this->af->setApp("ssid", $ssid);

        return 'friend_apply_index';
    }
}

?>
