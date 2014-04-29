<?php
/**
 *  My/Get/Index.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  my_rcv_index Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_MyGetIndex extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(
        "opensocial_owner_id" => array(),
        "ssid" => array(),
        "oid" => array(),
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
 *  my_rcv_index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_MyGetIndex extends M_ActionClass
{
    /**
     *  preprocess of my_p_day Action.
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
     *  my_rcv_index action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
        $lgManager = $this->backend->getManager("Lg");
        $itemManager = $this->backend->getManager("Item");
        $friendManager = $this->backend->getManager("Friend");

        $member_id = $this->af->get('opensocial_owner_id');
        $ss_id = $this->af->get('ssid');
        $friend_id = $this->af->get('oid');
        $this->af->setApp("oid", $friend_id);
        $this->af->setApp("ssid", $ss_id);

		//該当の友達の報酬CHK
		$get = $friendManager->existsIncentive($member_id,$friend_id);

		if($get == "0"){
			//報酬対象取得
		}else{
	    	$this->af->setApp("get", $get);
	    	$list = array();
	    	$list = $itemManager->getInviteItemlist();
	    	$this->af->setApp("list", $list);
		}
        return 'my_invite';
    }
}

?>
