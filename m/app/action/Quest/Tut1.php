<?php
/**
 *  Quest/Get.php
 *
 *  @author	{$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  quest_get form implementation
 *
 *  @author	{$author}
 *  @access	public
 *  @package   M
 */

class M_Form_QuestTut1 extends M_ActionForm
{
	/**
	 *  @access   private
	 *  @var	  array   form definition.
	 */
	var $form = array(

		"opensocial_owner_id" => array(),
		"id" => array(),
		"ssid" => array(),
		"rfp" => array(),
		"orgFol" => array(),
		"orgOff" => array(),
		"orgDef" => array(),
	);

	/**
	 *  Form input value convert filter : sample
	 *
	 *  @access protected
	 *  @param  mixed   $value  Form Input Value
	 *  @return mixed		   Converted result.
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
 *  quest_get action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_QuestTut1 extends M_ActionClass
{
	/**
	 *  preprocess quest_get action.
	 *
	 *  @access	public
	 *  @return	string  Forward name (null if no errors.)
	 */
	function prepare()
	{
		/**
		if ($this->af->validate() > 0) {
			return 'error';
		}
		$sample = $this->af->get('sample');
		return null;
		*/

		return parent::prepare();
	}

	/**
	 *  Get action implementation.
	 *
	 *  @access	public
	 *  @return	string  Forward Name.
	 */
	function perform()
	{

		$userManager = $this->backend->getManager("User");
		$cardManager = $this->backend->getManager("Card");
		$member_id = $this->af->get('opensocial_owner_id');
		$ssid = $this->af->get('ssid');
		$rfp = $this->af->get('rfp');
		$quest_id = $this->af->get('id');
		$org['fol'] = $this->af->get('orgFol');
		$org['off'] = $this->af->get('orgOff');
		$org['def'] = $this->af->get('orgDef');
		$this->af->setApp("org", $org);

		$profile = $userManager->getProfile($member_id);
		$this->af->setApp("profile", $profile);
		//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－ CHK 0
		//該当周回クエストでないかCHK
		$st_cy = $profile['stage'] .($profile['cl_cycle'] + 1);
		if( substr($quest_id,0,2) > $st_cy || !is_numeric($quest_id)){
			return 'error_404';
		}elseif( !is_numeric($org['fol']) || !is_numeric($org['off']) || !is_numeric($org['def']) ){
			return 'error_404';
		}

		if($profile['tut_num'] == 4){
			//ssid登録
			$ret0 = $userManager->updSession($member_id ,$ssid);
			if($ret0 === False){
				return 'error_sys';
			}
			$ssid = $userManager->getSsId();
			$this->af->setApp("ssid", $ssid);

			$deck = $userManager->getDeckProfile($member_id);
			$this->af->setApp("deck", $deck);
			for ($i=1; $i<=5; $i++) {
				$j = $i - 1;
				$rfP[$i] = substr($rfp,$j,1);
				$d = "deck".$i;
				$tmp = $cardManager->getCardInfo($member_id , $deck[$d] , 0);
				$dispcard[$i] = $tmp['bushoid'];
			}
			$this->af->setApp("card", $dispcard);
			$this->af->setApp("rfP", $rfP);

			return 'quest_tut2';
		}elseif($profile['tut_num'] < 10){
			$ssid = $userManager->getSsId();
			$this->af->setApp("ssid", $ssid);
			$stage = $userManager->getStageName($profile['stage']);
			$this->af->setApp("stage", $stage);
			$card = $cardManager->getCardAtt($profile['prof']);
			$this->af->setApp("card", $card);
			return 'my_indextut';
		}elseif($profile['tut_num'] < 12){
	   		return 'quest_tut3';
		}elseif($profile['tut_num'] >= 12 && $profile['tut_num'] <= 17){

			$deck = $userManager->getDeckProfile($member_id);
			$this->af->setApp("deck", $deck);
			for ($i=1; $i<=5; $i++) {
				$j = $i - 1;
				$rfP[$i] = substr($rfp,$j,1);
				$d = "deck".$i;
				$tmp = $cardManager->getCardInfo($member_id , $deck[$d] , 0);
				$dispcard[$i] = $tmp['bushoid'];
			}
			$this->af->setApp("card", $dispcard);
			$this->af->setApp("rfP", $rfP);
			return 'quest_tut1';
		}else{
			return 'my_index';
		}


	}
}
