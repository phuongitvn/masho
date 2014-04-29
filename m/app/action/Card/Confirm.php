<?php
/**
 *  Card/Confirm.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  card_form form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_CardConfirm extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
        "oid" => array(),
        "seq" => array(),
        "bid" => array(),
        "name" => array(),
        "rank" => array(),
        "level" => array(),
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
 *  card_form action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_CardConfirm extends M_ActionClass
{
    /**
     *  preprocess card_form action.
     *
     *  @access    public
     *  @return    string  Forward name (null if no errors.)
     */
    function prepare()
    {

        return parent::prepare();
    }

    /**
     *  Index action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {

     	$userManager = $this->backend->getManager("User");
     	$cardManager = $this->backend->getManager("Card");
        $friendManager = $this->backend->getManager("Friend");

        $member_id = $this->af->get('opensocial_owner_id');
        $other_id = $this->af->get('oid');
        $seq = $this->af->get('seq');
        $ssid = $this->af->get('ssid');
		$this->af->setApp("ssid", $ssid);

	    $card = $cardManager->getDispCardInfo($member_id , $seq);
		$this->af->setApp("card", $card);

		//statusのCHK 0:デッキ、1:ファイル、2:プレ、3:満杯tmp
		if($card['status'] >= 4){
	        return 'card_404';
		}elseif($card['status'] != 1){
	        $profile = $userManager->getProfile($member_id);
	    	$this->af->setApp("profile", $profile);
	        return 'error_404';
		}
		//同盟CHK
		$fr_st = $friendManager->existsFriend($member_id ,$other_id);
		if($fr_st != 2){
	        $this->af->setApp("fr_st", $fr_st);
	        return 'card_404';
		}

        //もらう方のプレゼント箱のカード満杯
        $otherP = $cardManager->getCardlistCount($other_id ,$other_st="2");
		if($otherP >= 9){
	        $other= $userManager->getDeckProfile($other_id);
	        $this->af->setApp("other", $other);
			return 'card_pful';
		}

        return 'card_confirm';
    }
}

?>
