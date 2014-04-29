<?php
/**
 *  Friend/Approve/Confirm.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  friend_approve_confirm Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_FriendApproveConfirm extends M_ActionForm
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
class M_Action_FriendApproveConfirm extends M_ActionClass
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
        if( $res != "5"){
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

        $member_id = $this->af->get('opensocial_owner_id');
        $ss_id = $this->af->get('ssid');
        $friend_id = $this->af->get('id');
        $res = $this->af->get('res');

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

        return 'friend_approve_confirm';
    }
}

?>
