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

class M_Form_TreasureConfirm extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

	"opensocial_owner_id" => array(),
	"oid" => array(),
	"tid" => array(),
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
class M_Action_TreasureConfirm extends M_ActionClass
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

		$treasureManager = $this->backend->getManager("Treasure");
		$userManager = $this->backend->getManager("User");
        $friendManager = $this->backend->getManager("Friend");

        $member_id = $this->af->get('opensocial_owner_id');
        $other_id = $this->af->get('oid');
        $tr_id = $this->af->get('tid');
        $ssid = $this->af->get('ssid');
		$this->af->setApp("ssid", $ssid);

        $profile = $userManager->getSimpleProfile($other_id);
		$tr = $treasureManager->TrDtInfo($tr_id);
		$sr = $treasureManager->TrSeriInfo($tr['tr_seriesid']);
        $this->af->setApp("tr", $tr);
        $this->af->setApp("sr", $sr);
		$this->af->setApp("profile", $profile);

		//あげるとコンプかCHK
		$comp = $treasureManager->chkTrSeriesComp($other_id,$tr_id);
		if($comp == 1){
	        $this->af->setApp("comp", $comp);
	        return 'treasure_404';
		}
		//同盟CHK
		$fr_st = $friendManager->existsFriend($member_id ,$other_id);
		if($fr_st != 2){
	        $this->af->setApp("fr_st", $fr_st);
	        return 'treasure_404';
		}
		//所持チェック
		$ownChk = $treasureManager->getTrindOwn($member_id,$tr_id,0);
		if($ownChk == 0){
	        return 'treasure_404';
		}else{
	        return 'treasure_confirm';
		}
    }
}

?>
