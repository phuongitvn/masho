<?php
/**
 *  Boss/Card.php
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

class M_Form_BossCard extends M_ActionForm
{
	/**
	 *  @access   private
	 *  @var	  array   form definition.
	 */
	var $form = array(

		"opensocial_owner_id" => array(),
		"ssid" => array(),
	);


}

/**
 *  boss_fight action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_BossCard extends M_ActionClass
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
	 *  Card action implementation.
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
		$ss_id = $this->af->get('ssid');
		//get_masho取得
		$profile = $userManager->getProfile($member_id);

		$this->af->setApp("profile", $profile);
		$this->af->setApp("tut_num", $profile['tut_num']);

		if(	$profile['stage'] > 1 && $profile['cl_masho'] == 0 && abs($profile['stage'] - $profile['get_masho'] ) == 2){
			$stage = $profile['stage'] - 1;
			$cycle = 3;
			$stageMax = $userManager->getStageMaxNum();
			if($stageMax == $stage){
				$this->af->setApp("stgEnd", "1");
			}
			$pstageN = $userManager->getStageName($stage);
			$color = $userManager->getStageColor($stage);
			$stageN = $userManager->getStageName($profile['stage']);
		}else{
			return 'quest_reload';
		}

		//リロードCHK
		$isReload = $userManager->isReload($member_id ,$ss_id);
		$this->af->setApp("isReload", $isReload);

		if($isReload == True){
			return 'quest_reload';
		}else{

			//トランザクション開始
			$db = $this->backend->getDb();
			$ret = $db->query('START TRANSACTION');
			if($ret == False){
				return 'error_sys';
			}
			//ユーザテーブルt_user更新
			$userF = array();
			$userF["get_masho"]  = $profile['get_masho'] + 1;
			$userF["memberid"] = $member_id;
			$retF = $userManager->updateUser($userF);
			//ssid登録
			$ret0 = $cardManager->updSession($member_id ,$ss_id);
			if($ret0 === False || $retF === False ){
				$db->query('ROLLBACK');
				return 'error_sys';
			}
			//トランザクション終了
			$ret = $db->query('COMMIT');
			if($ret === False){
				return 'error_sys';
			}
		}

		$this->af->setApp("stage", $pstageN);
		$this->af->setApp("stageN", $stageN);
		$masho = $questManager->getMasho($stage,$cycle);
		$title = $questManager->getQuestTitle($profile['stage'] - 1,2);
		$this->af->setApp("title", $title);
		$this->af->setApp("scn", $profile['stage']);
		$this->af->setApp("masho", $masho);
		$this->af->setApp("color", $color);

		$disp['aRate'] = 0;
		$org['Fol'] = 0;
		$this->af->setApp("disp", $disp);
		$this->af->setApp("org", $org);
		
		//最新の情報
		$deck = $userManager->getDeckProfile($member_id);
		$this->af->setApp("deck", $deck);
		for ($i=1; $i<=5; $i++) {
			$d = "deck".$i;
			//カード情報取得(t_card)
			$tmp = $cardManager->getCardInfo($member_id , $deck[$d] , 0);
			$dispcard[$i] = $tmp['bushoid'];
		}
		$this->af->setApp("card", $dispcard);

		//ファイル満杯で受け取れない状態(status=3)のカードがあるかCHK
		$tbdCnt = $cardManager->getCardlistCount($member_id ,$status="3");
		$this->af->setApp("tbdCnt", $tbdCnt);
		if($tbdCnt > 0){
			$seqRow	= $cardManager->getTbdCardSeqRow($member_id);
			for ($i=0; $i<$tbdCnt; $i++) {
				//カードを特定
				$busho[$i] = $cardManager->getDispCardInfo($member_id , $seqRow[$i]['cardseq']);
			}
			$cntF = $cardManager->getCardlistCount($member_id ,$stF="1");
			$this->af->setApp("cntF", $cntF);
			$this->af->setApp("q", $quest_id);
			//カード破棄用(ssid発行)
			$ssid = $userManager->getSsId();
			$this->af->setApp("ssid", $ssid);
		}else{
			//カードを特定
			$busho['0'] = $cardManager->getDispCardInfo($member_id , $profile['card_seq']);
		}

		$this->af->setApp("busho", $busho);
		return 'quest_card';



	}
}

?>
