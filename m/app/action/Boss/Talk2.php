<?php
/**
 *  Boss/Talk2.php
 *
 *  @author	{$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  boss_fight form implementation
 *
 *  @author	{$author}
 *  @access	public
 *  @package   M
 */

class M_Form_BossTalk2 extends M_ActionForm
{
	/**
	 *  @access   private
	 *  @var	  array   form definition.
	 */
	var $form = array(

		"opensocial_owner_id" => array(),
		"rfp" => array(),
		"gR" => array(),
	);


}

/**
 *  boss_fight action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_BossTalk2 extends M_ActionClass
{
	/**
	 *  preprocess boss_fight action.
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
	 *  Talk2 action implementation.
	 *
	 *  @access	public
	 *  @return	string  Forward Name.
	 */
	function perform()
	{
		$userManager  = $this->backend->getManager("User");
		$questManager = $this->backend->getManager("Quest");
		$cardManager = $this->backend->getManager("Card");

		$member_id = $this->af->get('opensocial_owner_id');
		$rfp = $this->af->get('rfp');
		$profile = $userManager->getProfile($member_id);
		$this->af->setApp("profile", $profile);

		$gR = $this->af->get('gR');
		if($gR != ""){
			$maxRnum = $questManager->getMaxRcvNum();	//魔将戦最大rcv_num
			if( !is_numeric($gR) || $gR > $maxRnum ){
				return 'error_404';
			}
		}

		if(	$profile['cl_masho'] == 0){
			$stage = $profile['stage'] - 1;
			$cycle = 3;
			$pstageN = $userManager->getStageName($stage);
			$stageN = $userManager->getStageName($profile['stage']);
			$title = 'Toàn thắng';
			$ssid = $userManager->getSsId();
			$this->af->setApp("ssid", $ssid);
		}else{
			$stage = $profile['stage'];
			$cycle = $profile['cl_cycle'];
			$stageN = $userManager->getStageName($stage);
			$title = $questManager->getQuestTitle($stage, $cycle);
		}
		$masho = $questManager->getMasho($stage,$cycle);
		$this->af->setApp("stage", $stageN);
		$this->af->setApp("pstage", $pstageN);
		$this->af->setApp("title", $title);
		$this->af->setApp("masho", $masho);

		//デッキ情報取得
		$deck = $userManager->getDeckProfile($member_id);
		for ($i=1; $i<=5; $i++) {
			$j = $i - 1;
			$rfP[$i] = substr($rfp,$j,1);
			$d = "deck".$i;
			//カード情報取得(t_card)
			$tmp = $cardManager->getCardInfo($member_id , $deck[$d] , 0);
			$card[$i] = $tmp['bushoid'];
		}
		$this->af->setApp("card", $card);
		if(strlen($rfp) == 10){
			for ($i=6; $i<=10; $i++) {
				$j = $i - 1;
				$rfP[$i] = substr($rfp,$j,1);
			}
		}
		$this->af->setApp("rfP", $rfP);

		return 'boss_talk2';
	}
}

?>
