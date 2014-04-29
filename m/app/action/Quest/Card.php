<?php
/**
 *  Quest/Get.php
 *
 *  @author	{$author}
 *  @package   M
 *  @version   $Id$
 */

class M_Form_QuestCard extends M_ActionForm
{
	/**
	 *  @access   private
	 *  @var	  array   form definition.
	 */
	var $form = array(

		"opensocial_owner_id" => array(),
		"id" => array(),
		"ssid" => array(),
		"orgFol" => array(),
		"orgOff" => array(),
		"orgDef" => array(),
		"ex_genki" => array(),
		"cl" => array(),
		"fg" => array(),
		"bid" => array(),
		"rfp" => array(),
		"gR" => array(),
		"seq" => array(),
	);


}

/**
 *  quest_get action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_QuestCard extends M_ActionClass
{
	/**
	 *  preprocess quest_get action.
	 *
	 *  @access	public
	 *  @return	string  Forward name (null if no errors.)
	 */
	function prepare()
	{


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
		$questManager = $this->backend->getManager("Quest");
		$cardManager = $this->backend->getManager("Card");

		$member_id = $this->af->get('opensocial_owner_id');
		$profile = $userManager->getProfile($member_id);
		$quest_id = $this->af->get('id');
		$this->af->setApp("id", $quest_id);
		$ssid = $this->af->get('ssid');
		$cl = $this->af->get('cl');
		$fg = $this->af->get('fg');
		$rfp = $this->af->get('rfp');

		$org['fol'] = $this->af->get('orgFol');
		$org['off'] = $this->af->get('orgOff');
		$org['def'] = $this->af->get('orgDef');

		$busho_id = $this->af->get('bid');
		$seq = $this->af->get('seq');
		$gR = $this->af->get('gR');
		$this->af->setApp("org", $org);

		//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－ CHK 0
		if($gR != ""){
			$maxRnum = $questManager->getMaxRcvNum();	//魔将戦最大rcv_num
			if( !is_numeric($gR) || $gR > $maxRnum ){
				return 'error_404';
			}
		}
		if($seq != ""){
			if( !is_numeric($seq) || $seq > $profile['card_seq'] ){
				return 'error_404';
			}
			if($busho_id != ""){
				$chkValid =	$cardManager->getDispCardInfo($member_id,$seq);
				if( $chkValid['bushoid'] != $busho_id ){
					return 'error_404';
				}
			}
		}
		//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－ CHK 0
		//該当周回クエストでないかCHK
		$st_cy = $profile['stage'] .($profile['cl_cycle'] + 1);
		if($quest_id == "ms"){
			if( $cl != 1 ){
				return 'error_404';
			}
		}elseif($quest_id == "fg"){
			if( $fg != 1 ){
				return 'error_404';
			}
		}else{
			if( substr($quest_id,0,2) > $st_cy || !is_numeric($quest_id)){
				return 'error_404';
			}elseif( ($cl != "" && $cl != 1) || !is_numeric($org['fol']) || !is_numeric($org['off']) || !is_numeric($org['def']) ){
				return 'error_404';
			}
		}

		//bid存在CHK
		$exId = $cardManager->getCardAtt($busho_id);
		if($exId == "" || is_numeric($busho_id) ){
			return 'error_404';
		}

		//最新の情報
		$deck = $userManager->getDeckProfile($member_id);
		$this->af->setApp("deck", $deck);
		for ($i=1; $i<=5; $i++) {
			$j = $i - 1;
			$rfP[$i] = substr($rfp,$j,1);
			$d = "deck".$i;
			//カード情報取得(t_card)
			$tmp = $cardManager->getCardInfo($member_id , $deck[$d] , 0);
			$dispcard[$i] = $tmp['bushoid'];
		}
		$this->af->setApp("card", $dispcard);
		if(strlen($rfp) == 10){
			for ($i=6; $i<=10; $i++) {
				$j = $i - 1;
				$rfP[$i] = substr($rfp,$j,1);
			}
		}
		$this->af->setApp("rfP", $rfP);

		//ファイル満杯で受け取れない状態(status=3)のカードがあるかCHK
		$tbdCnt = $cardManager->getCardlistCount($member_id ,$status="3");
		if($tbdCnt > 0){
			$this->af->setApp("tbdCnt", $tbdCnt);
			$cntF = $cardManager->getCardlistCount($member_id ,$stF="1");
			$this->af->setApp("cntF", $cntF);
			$this->af->setApp("q", $quest_id);
			//カード破棄用(ssid発行)
			$ssid = $userManager->getSsId();
			$this->af->setApp("ssid", $ssid);
		}

		if($quest_id == "ms"){
			if(	$profile['cl_masho'] == 0){
				$stage = $profile['stage'] - 1;
				$cycle = 3;
				$pstageN = $userManager->getStageName($stage);
				$color = $userManager->getStageColor($stage);
				$title = $questManager->getQuestTitle($stage, $cycle - 1);
				$this->af->setApp("title", $title);
				$this->af->setApp("color", $color);
				$this->af->setApp("stage", $pstageN);
			}elseif($profile['cl_masho'] == $profile['cl_cycle']){
				$stage = $profile['stage'];
				$color = $userManager->getStageColor($stage);
				$pstageN = $userManager->getStageName($stage);
				$title = $questManager->getQuestTitle($stage, $profile['cl_masho']);
				$this->af->setApp("title", $title);
				$this->af->setApp("color", $color);
				$this->af->setApp("stage", $pstageN);
			}else{
				return 'quest_reload';
			}
		}elseif($quest_id == "fg"){
		}else{
			//ステージ名取得
			$stage = $userManager->getStageName( substr($quest_id,0,1) );
			$color = $userManager->getStageColor(substr($quest_id,0,1) );
			$title = $questManager->getQuestTitle($profile['stage'], $profile['cl_masho']);
			$this->af->setApp("title", $title);
			$this->af->setApp("color", $color);
			$this->af->setApp("stage", $stage);
		}

		if($quest_id == "ms" || $quest_id == "fg"){
			//カードを特定
			$busho['0'] = $cardManager->getDispCardInfo($member_id , $seq);
		}else{
			$disp = $questManager->getQuest($quest_id);
			$done = $questManager->expQuest($member_id ,$quest_id);
			if($done['done'] == 1){
				$this->af->setApp("done", "1");
			}
			//t_quest取得
			$quest = $questManager->existCurrentQuest($member_id ,$quest_id);
			//達成率表示
			$disp['aRate'] = $quest['archieve'];
			$this->af->setApp("disp", $disp);
			//率の画像表示
			$aImg = $questManager->getOctDispImg($disp['aRate']);
			$this->af->setApp("aImg", $aImg);
			//カードを特定
			$busho['0'] = $cardManager->getDispCardInfo($member_id , $profile['card_seq']);
			if($busho_id != $busho['0']['bushoid']){
				return 'error_sys';
			}
		}

		if($cl == 1){
			$ssid = $userManager->getSsId();
			$this->af->setApp("ssid", $ssid);
		}

		$this->af->setApp("busho", $busho);
		$this->af->setApp("tut_num", $profile['tut_num']);
		$this->af->setApp("profile", $profile);

		return 'quest_card';

	}
}
