<?php
/**
 *  My/Fight.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  my_power Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_MyFight extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(

        "opensocial_owner_id" => array(),
        "id" => array(),
        "oid" => array(),
    );


}

/**
 *  my_power action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_MyFight extends M_ActionClass
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
     *  my_power action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
        $userManager = $this->backend->getManager("User");
        $lgManager = $this->backend->getManager("Lg");
        $cardManager = $this->backend->getManager("Card");
		$treasureManager = $this->backend->getManager("Treasure");

        $member_id = $this->af->get('opensocial_owner_id');
		$other_id = $this->af->get('oid');
		$ddn = $this->af->get('id');

        $my_profile = $userManager->getProfile($member_id);
        $ot_profile = $userManager->getProfile($other_id);
		$fight = $lgManager->getFightLog($other_id,$member_id,$ddn);

		for ($r = 1; $r <= 5; $r++) {
			$my = "bushoid".$r;
			$ot = "ot_bushoid".$r;
			$myDispCard[$r] = $cardManager->getCardAtt($fight[$my]);
			$otDispCard[$r] = $cardManager->getCardAtt($fight[$ot]);
		}

		if( $fight['ot_formno'] > 0){
			$dispMyForm	= $cardManager->getFormAtt($fight['ot_formno']);
	        $this->af->setApp("dispMyForm", $dispMyForm);
		}
		if( $fight['formno'] > 0){
			$dispOtForm	= $cardManager->getFormAtt($fight['formno']);
	        $this->af->setApp("dispOtForm", $dispOtForm);
		}

		if($fight['trid'] != "" && $fight['winner'] == 1){
			$tr = $treasureManager->TrDtInfo($fight['trid']);
			$sr = $treasureManager->TrSeriInfo($tr['tr_seriesid']);
			$tr['srname'] = $sr['name'];
	        $this->af->setApp("tr", $tr);
		}

        $this->af->setApp("myDispCard", $myDispCard);
        $this->af->setApp("otDispCard", $otDispCard);
        $this->af->setApp("my_profile", $my_profile);
        $this->af->setApp("ot_profile", $ot_profile);
        $this->af->setApp("fight", $fight);

        return 'my_fight';
    }
}

?>
