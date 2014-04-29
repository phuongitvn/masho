<?php
/**
 *  Friend/Approve/Complete.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  friend_approve_complete Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_FriendApproveComplete extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(

        "opensocial_owner_id" => array(),
        "ssid" => array(),
        "id" => array(),
        "res" => array(),
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
 *  friend_approve_complete action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_FriendApproveComplete extends M_ActionClass
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
        $res = $this->af->get('res');
        if($res != "2" AND $res != "3" AND $res != "4" AND $res != "5"){
            return 'error_sys';
        }
        return parent::prepare();
    }

    /**
     *  friend_approve_complete action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
        $userManager = $this->backend->getManager("User");
        $friendManager = $this->backend->getManager("Friend");
        $lgManager = $this->backend->getManager("Lg");

        $member_id = $this->af->get('opensocial_owner_id');
        $ss_id = $this->af->get('ssid');
        $friend_id = $this->af->get('id');
        $res = $this->af->get('res');

        $isReload = $userManager->isReload($member_id ,$ss_id);
        $this->af->setApp("isReload", $isReload);

        if($res == "2"){
            //申請最大チェック
            $profile = $userManager->getProfile($member_id);
            $maxFriend = $userManager->getMaxFriendContByLevel($profile['level']);
            if($maxFriend <= $profile['friend_num']){
                $this->af->setApp('maxFriend' ,1);
                return 'friend_approve_complete';
            }
        }

        if($isReload == True){
            //return 'error_reload';
        }else{

	        //トランザクション開始
	        $db = $this->backend->getDb();
	        $ret = $db->query('START TRANSACTION');
	        if($ret == False){
	            return 'error_sys';
	        }

			if($res == 4){
		        $ret = $friendManager->deleteFriendReq($member_id ,$friend_id);
		        if($ret === False){
		            $db->query('ROLLBACK');
		            return 'error_sys';
		        }
			}else{
				if($res == 5){
					$res = 3;
					$stat = 8;
				}elseif($res == 3){
					$stat = 9;
				}elseif($res == 2){
					$stat = 6;
				}
		        $ret = $friendManager->approveFriend($member_id ,$friend_id ,$res,$kbn="0");
				$ret2 = $lgManager->writeEventLog($friend_id,$member_id ,$stat,$id="",$other="",$win="",$lose="",$trid="");
		        $ret3 = $userManager->updSession($member_id ,$ss_id);
		        if($ret === False || $ret2 === False || $ret3 === False){
		            $db->query('ROLLBACK');
		            return 'error_sys';
		        }
			}

	        //トランザクション終了
	        $ret = $db->query('COMMIT');
	        if($ret === False){
	            return 'error_sys';
	        }

		}

        //プロフィール情報
        $profile = $userManager->getProfile($friend_id);
        $this->af->setApp("profile", $profile);

        return 'friend_approve_complete';
    }
}

?>
