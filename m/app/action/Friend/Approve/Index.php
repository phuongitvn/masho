<?php
/**
 *  Friend/Approve/Index.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  friend_approve_index Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_FriendApproveIndex extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(

        "opensocial_owner_id" => array(),
        //"formid" => array(),
        "p" => array(),
        "cl" => array(),
        "mode" => array(),
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
 *  friend_approve_index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_FriendApproveIndex extends M_ActionClass
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
     *  friend_approve_index action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
        $userManager = $this->backend->getManager("User");
        $friendManager = $this->backend->getManager("Friend");

        $member_id = $this->af->get('opensocial_owner_id');
        $profile = $userManager->getProfile($member_id);
        $mode = $this->af->get("mode");
        $this->af->setApp("mode", $mode);
		/* viola CHG 仕様次第では復活*/
		/*
        //アラートクリア
        if($this->af->get('cl') == "1"){
            $friendManager->clearAlert($member_id);
        }
		*/

        $limit = 5;
        $p = $this->af->get("p");
        if(!$p || !is_numeric($p)){
            $p = 1;
            $this->af->set("p", $p);
        }

        $list = array();
        $navi = array();
        $offset = ($p - 1) * $limit;

        //同盟リスト
        $nums['friend'] = $friendManager->getFriendlistCount($member_id ,$status="2",$kbn="");
		$nums['send']   = $friendManager->getFriendlistCount($member_id ,$status="0",$kbn="send");
		$nums['rcv']    = $friendManager->getFriendlistCount($member_id ,$status="0",$kbn="");
		$nums['max'] = $userManager->getMaxFriendContByLevel($profile['level']);
		$nums['rest'] = $nums['max'] - ( $nums['friend'] + $nums['send'] + $nums['rcv'] );

		if($mode == "send"){
			$kbn ="send";
			$cnt ="send";
		}else{
			$kbn ="";
			$cnt ="rcv";
		}

        if($nums[$cnt] > 0){
            $list = $friendManager->getFriendlist($member_id ,$status="0" ,$kbn,$md="", $pre="",$sort="",$limit ,$offset);
            //ページャーセット
            $navi = $friendManager->getPagerSource($nums[$cnt], $limit, $p, 5);
        }

        $this->af->setApp("list", $list);
        $this->af->setApp("navi", $navi);
        $this->af->setApp("limit", $limit);
        $this->af->setApp("nums", $nums);

        //リロード対策
		$ssid = $userManager->getSsId();
        $this->af->setApp("ssid", $ssid);

        return 'friend_approve_index';
    }
}

?>
