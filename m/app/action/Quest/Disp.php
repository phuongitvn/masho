<?php
/**
 *  Quest/Disp.php
 *
 *  @author	{$author}
 *  @package   M
 *  @version   $Id$
 */
class M_Form_QuestDisp extends M_ActionForm
{
	/**
	 *  @access   private
	 *  @var	  array   form definition.
	 */
	var $form = array(

		"opensocial_owner_id" => array(),
		"id" => array(),
		"ssid" => array(),
	);

}

class M_Action_QuestDisp extends M_ActionClass
{
	/**
	 *  preprocess quest_detail action.
	 *
	 *  @access	public
	 *  @return	string  Forward name (null if no errors.)
	 */
	function prepare()
	{

		return parent::prepare();
	}

	/**
	 *  Disp action implementation.
	 *
	 *  @access	public
	 *  @return	string  Forward Name.
	 */
	function perform()
	{
		//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－基本情報	0
		$userManager = $this->backend->getManager("User");
		$questManager = $this->backend->getManager("Quest");
		$itemManager = $this->backend->getManager("Item");
		$cardManager = $this->backend->getManager("Card");
		$member_id = $this->af->get('opensocial_owner_id');
		$quest_id = $this->af->get('id');
		$this->af->setApp("id", $quest_id);

		//プロフィール情報　// t_user stage cl_cycle cl_masho exp money genki_rcv_time
		$profile = $userManager->getProfile($member_id);
		$level = $profile['level'];
		$this->af->setApp("tut_num", $profile['tut_num']);
		$this->af->setApp("profile", $profile);
		//クエストマスタ　exp money genki_rcv_time　のspeed margin
		$disp = $questManager->getQuest($quest_id);
		//ステージ名取得
		$cstage = substr($quest_id,0,1);
		$stage = $userManager->getStageName($cstage);
		$color = $userManager->getStageColor($cstage);
		$title = $questManager->getQuestTitle($profile['stage'], $profile['cl_masho']);
		$this->af->setApp("title", $title);
		$this->af->setApp("color", $color);
		$this->af->setApp("stage", $stage);
		$this->af->setApp("cstage", $cstage);
		//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－ CHK 0
		//該当周回クエストでないかCHK
		$st_cy = $profile['stage'] .($profile['cl_cycle'] + 1);
		if( substr($quest_id,0,2) > $st_cy || !is_numeric($quest_id)){
			return 'error_404';
		}
		//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－ CHK 1
		//ファイル満杯で受け取れない状態(status=3)のカードがあるかCHK
		$tbdCnt = $cardManager->getCardlistCount($member_id ,$status="3");
		if($tbdCnt > 0){
			$this->af->setApp("dotGo", "1");			//11/2/8
			$this->af->setApp("tbdCnt", $tbdCnt);
			$cntF = $cardManager->getCardlistCount($member_id ,$stF="1");
			$this->af->setApp("cntF", $cntF);
			//カードを特定
			$card = $cardManager->getCardInfo($member_id , $seq="" , $status="3");
			$this->af->setApp("card", $card);
			//m_bushoから必要事項取得
			$busho['0'] = $cardManager->getDispCardInfo($member_id , $card['cardseq']);
			$this->af->setApp("busho", $busho);
			$profile['card_seq'] = $card['cardseq'];
			$this->af->setApp("profile", $profile);
			$deck = $userManager->getDeckProfile($member_id);
			$this->af->setApp("deck", $deck);
			$this->af->setApp("orgFol", "0");
			$this->af->setApp("q", $quest_id);
			//カード破棄用(ssid発行)
			$ssid = $userManager->getSsId();
			$this->af->setApp("ssid", $ssid);
			$this->af->setApp("disp", $disp);
			return 'quest_card';
		}
		//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－ CHK 2
		//該当クエストを実行できるかのCHK
		for ($i=1; $i<=3; $i++) {
			$need = "item".$i;
			$req  =  "num".$i;
			$has[$i] = $itemManager->existsMyItem($member_id ,$disp[$need]);
			if($has[$i]['num'] < $disp[$req] ){
				$mustBuy[$i] = $disp[$req] - $has[$i]['num'];
			}
		}
		//購入ページ表示
		if($mustBuy['1'] > 0 || $mustBuy['2'] > 0 || $mustBuy['3'] > 0){
			for ($i=1; $i<=3; $i++) {
				$id ="item".$i;
				$rN  =  "num".$i;
				$item[$i] = $itemManager->getItemDataForQuest($member_id,$disp[$id],$disp[$rN]);
				if($profile['money'] >= $mustBuy[$i] * $item[$i]['money'] ){
					$after[$i] = $profile['money'] - $mustBuy[$i] * $item[$i]['money'];
				}elseif($profile['money'] >=  $item[$i]['money'] ){
					$after[$i] = $profile['money'] - $item[$i]['money'];
					$mustBuy[$i] = 1;
				}
			}
			$this->af->setApp("mustBuy", $mustBuy);
			$this->af->setApp("item1", $item['1']);
			$this->af->setApp("item2", $item['2']);
			$this->af->setApp("item3", $item['3']);
			$this->af->setApp("has", $has);
			$this->af->setApp("num1", $disp['num1']);
			$this->af->setApp("num2", $disp['num2']);
			$this->af->setApp("num3", $disp['num3']);
			$this->af->setApp("after", $after);
			$this->af->setApp("q", $quest_id);
			return 'item_select';
		}
		//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－ CHK 3
		//げんきがの必要分よりあるかのCHK
		$needGenki = $profile['genki'] + $disp['req_genki'];
		if($needGenki < 0){
			$ssid = $userManager->getSsId();
			$this->af->setApp("ssid", $ssid);
			$this->af->setApp("q", $quest_id);
			$this->af->setApp("profile", $profile);
			//きびだんご個数取得 116
			$rcv_id = $this->config->get('kibiItemid');
			$cnt = $itemManager->getKbn4Count($member_id,$rcv_id);
			$this->af->setApp("cnt", $cnt);
			return 'error_genki';
		}

		$q_exp   = $disp['exp'];
		$q_money = $disp['money'];
		$q_genki = $disp['req_genki'];
		//表示データの作成	(実施前のため現在値が右:disp)
		$disp['exp']   = $profile['exp'];
		$disp['money'] = $profile['money'];
		$disp['genki'] = $profile['genki'];
		//表示データの作成	(実施前のため過去値が左:profile)
		$profile['exp']   = $profile['exp']   - $q_exp;
		$profile['money'] = $profile['money'] - $q_money;
		//$profile['genki'] = $profile['genki'] - $q_genki;


		//該当クエストが初回かどうかのCHK(t_quest)
		$done = $questManager->expQuest($member_id ,$quest_id);

		//達成率表示(最大100)
		if($done['done'] == 0 ){
			//lg_quest取得lg_quest memberid questid current(100%のときに1をセット) archieve 
			$quest = $questManager->existCurrentQuest($member_id ,$quest_id);
			if($quest['num'] == 0){
				$disp['aRate'] = 0;
			}else{
				$disp['aRate'] = $quest['archieve'];
			}
		}elseif($done['done'] == 1){
			$disp['aRate'] = 100;
		}

		$this->af->setApp("profile", $profile);
		$this->af->setApp("disp", $disp);
		//非エスケープ
		$carrierNo = $this->backend->useragent->getAgentType();
		if($carrierNo == 1 || $carrierNo == 2){
			mb_language("Japanese");
			$word['expla_l']  = mb_convert_encoding($disp['expla_l'],"SJIS","UTF-8");
		}else{
			$word['expla_l'] = $disp['expla_l'];
		}
		$this->af->setAppNE("word", $word);

		//率の画像表示
		$aImg = $questManager->getOctDispImg($disp['aRate']);
		$this->af->setApp("aImg", $aImg);

		//m_exp_level　levelid からexp(閾値)を取得
		$nextExp = $userManager->getNextExpContByLevel($level);
		$this->af->setApp("nextExp", $nextExp);
		$prevExp = $userManager->getPrevExpContByLevel($profile['level']);

		//経験値の差分計算
		$diffExp = $nextExp - $disp['exp'];
		if($diffExp <= 0 ){
			$diffExp = 0;
		}
		$this->af->setApp("diffExp", $diffExp);

		//率の画像表示
		$eImg = $questManager->getDispImg( floor( ($disp['exp'] - $prevExp) / ($nextExp - $prevExp) * 100) );
		$this->af->setApp("eImg", $eImg);

		$ssid = $userManager->getSsId();
		$this->af->setApp("ssid", $ssid);
		//表示モード
		$this->af->setApp("mode", "disp");

		//風景
		$this->af->setApp("scn", substr($quest_id,0,1));

		return 'quest_detail';

	}
}
