<?php
/**
 *  Quest/Index.php
 *
 *  @author	{$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  quest_index form implementation
 *
 *  @author	{$author}
 *  @access	public
 *  @package   M
 */

class M_Form_QuestIndex extends M_ActionForm
{
	/**
	 *  @access   private
	 *  @var	  array   form definition.
	 */
	var $form = array(

		"opensocial_owner_id" => array(),
		"id" => array(),
	);

}

/**
 *  quest_index action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_QuestIndex extends M_ActionClass
{
	/**
	 *  preprocess quest_index action.
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
	 *  Index action implementation.
	 *
	 *  @access	public
	 *  @return	string  Forward Name.
	 */
	function perform()
	{

		$userManager = $this->backend->getManager("User");
		$questManager = $this->backend->getManager("Quest");
		$itemManager = $this->backend->getManager("Item");

		$member_id = $this->af->get('opensocial_owner_id');
		$id = $this->af->get('id');
		$stageMax = $userManager->getStageMaxNum();
		$profile = $userManager->getProfile($member_id);
		//idのCHK
		if($id != "" && ($id > $profile['stage'] || !is_numeric($id)) ){
			$this->af->setApp("profile", $profile);
			return 'error_404';
		}
		//リロード対策
		$ssid = $itemManager->getSsId();
		$this->af->setApp("ssid", $ssid);

		//前ステージの魔将カードGETを見ていない場合のCHK
		if(	$profile['stage'] > 1 && $profile['cl_masho'] == 0 && abs($profile['stage'] - $profile['get_masho'] ) == 2){
			$stage = $profile['stage'] - 1;
			$cycle = 3;
			$pstageN = $userManager->getStageName($stage);
			$color = $userManager->getStageColor($stage);
			$this->af->setApp("stage", $pstageN);
			$this->af->setApp("color", $color);
			$this->af->setApp("profile", $profile);
			$this->af->setApp("md", "nosight");
			return 'quest_first';
		}

		//ステージ名+タイトル取得
		if($id == ""){
			if($stageMax < $profile['stage']){
				$stage_id = $stageMax;
				$cycle = 3;
				$stagecycle = $stageMax.$cycle;
				$cyTitle = $this->config->get('cyTitle');
				$title = $cyTitle['4'];
			}else{
				$stage_id = $profile['stage'];
				//該当ステージ+周回のクエスト数を取得(魔将クリアで判断)
				$cycle = $profile['cl_masho']+1;
				$stagecycle = $profile['stage'].$cycle;
				$title = $questManager->getQuestTitle($stage_id, $profile['cl_masho']);
			}
			$stage = $userManager->getStageName($stage_id);
			$color = $userManager->getStageColor($stage_id);

		}else{
			$stage_id = $id;
			$stage = $userManager->getStageName($stage_id);
			$color = $userManager->getStageColor($stage_id);
			$cyTitle = $this->config->get('cyTitle');

			if($profile['stage'] > $stage_id ){
				$title = $cyTitle['4'];
			}else{
				$title = $questManager->getQuestTitle($profile['stage'], $profile['cl_masho']);
			}
			//該当ステージ+周回のクエスト数を取得(魔将クリアで判断)
			if($id == $profile['stage']){
				$cycle = $profile['cl_masho']+1;
				$stagecycle = $profile['stage'].$cycle;
			}else{
				$stagecycle = $stage_id."3";
			}
		}

		//最終ステージまで体験していればスルー
		if($stageMax >= $profile['stage']){
			//該当ステージの最初のクエストを体験しているか
			$fstid = $profile['stage']."11";
			//$qCnt = $questManager->expQuest($member_id ,$fstid );
			$qCnt = $questManager->existLgQuest($member_id ,$fstid);
			if($qCnt['num'] == 0){
				$wd = $questManager->getStage1stCmnt($profile['stage']);
				$stage = $userManager->getStageName($profile['stage']);
				$color = $userManager->getStageColor($profile['stage']);
				//非エスケープ
				$carrierNo = $this->backend->useragent->getAgentType();
				if($carrierNo == 1 || $carrierNo == 2){
					mb_language("Japanese");
					$word['first_cmnt']  = mb_convert_encoding($wd,"SJIS","UTF-8");
				}else{
					$word['first_cmnt']  = $wd;
				}
				$this->af->setAppNE("word", $word);
				$this->af->setApp("stage", $stage);
				$this->af->setApp("color", $color);
				$this->af->setApp("title", $title);
				$this->af->setApp("scn", $profile['stage']);
				$this->af->setApp("questid", $fstid);
				$this->af->setApp("profile", $profile);
				return 'quest_first';
			}
		}
		//ナビゲーション生成
		if($stage_id  == 1 && $id == ""){
			$pid = "";
			$nid = "";
		}elseif($stage_id  == 1 && $id != ""){
			$pid = "";
			$nid = $stage_id + 1;
		}elseif($stage_id  == $stageMax){
			$pid = $stage_id - 1;
			$nid = "";
		}else{
			$pid = $stage_id - 1;
			$nid = $stage_id + 1;
		}

		//経験値の差分計算
		$nextExp = $userManager->getNextExpContByLevel($profile['level']);
		$diffExp = $nextExp - $profile['exp'];
		$this->af->setApp("diffExp", $diffExp);

		$this->af->setApp("id", $stage_id);
		$this->af->setApp("pid", $pid);
		$this->af->setApp("nid", $nid);
		$this->af->setApp("cs", $profile['stage']);
		$this->af->setApp("stage", $stage);
		$this->af->setApp("color", $color);
		$this->af->setApp("title", $title);
		$this->af->setApp("profile", $profile);

		//魔将出現条件	stage9の人は出現しないように(11/01/12)
		if($stageMax >= $profile['stage']){
			if( $profile['cl_cycle'] > $profile['cl_masho']){
				$masho = $questManager->getMasho($profile['stage'],$profile['cl_cycle']);
				$this->af->setApp("masho", $masho);
			}
		}

		$list = array();
		$list = $questManager->getQuestlist($member_id ,$stagecycle,$except="");

		$this->af->setApp("list", $list);

		//風景
		$this->af->setApp("scn",$stage_id);

		return 'quest_index';
	}
}
