<?php
/**
 *  Other/History.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  other_history Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_OtherHistory extends M_ActionForm
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
 *  other_history action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_OtherHistory extends M_ActionClass
{
    /**
     *  preprocess of other_p_day Action.
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
     *  other_history action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
        $userManager = $this->backend->getManager("User");
        $friendManager = $this->backend->getManager("Friend");
        $fightManager = $this->backend->getManager("Fight");

        $member_id = $this->af->get('opensocial_owner_id');
        $other_id = $this->af->get('id');

        $ot_profile = $userManager->getProfile($other_id);
		//ID存在CHK
        if(count($ot_profile) == 0){
            return "error_404";
        }
        $this->af->setApp("ot_profile", $ot_profile);

		$to = $friendManager->getFriendHistory($member_id ,$other_id);
		$from = $friendManager->getFriendHistory($other_id,$member_id);
		$to['help'] = $to['help_win'] + $to['help_lose'];
		$from['help'] = $from['help_win'] + $from['help_lose'];

        $this->af->setApp("to", $to);
        $this->af->setApp("from", $from);

		$toF = $fightManager->getFightHistory($member_id ,$other_id);
		$fromF = $fightManager->getFightHistory($other_id,$member_id);

		$toF['off'] = $toF['win'] + $toF['lose'];
		$fromF['def'] = $fromF['win'] + $fromF['lose'];
		$allF['total'] = $toF['off'] + $fromF['def'];
		$allF['win'] = $toF['win'] + $fromF['lose'];
		$allF['lose'] = $toF['lose'] + $fromF['win'];

        $this->af->setApp("allF", $allF);
        $this->af->setApp("toF", $toF);
        $this->af->setApp("fromF", $fromF);

        //リロード対策
		$ssid = $userManager->getSsId();
        $this->af->setApp("ssid", $ssid);

        return 'other_history';
    }
}

?>
