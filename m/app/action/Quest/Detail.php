<?php
/**
 *  Quest/Detail.php
 *
 *  @author	{$author}
 *  @package   M
 *  @version   $Id$
 */
class M_Form_QuestDetail extends M_ActionForm
{
	/**
	 *  @access   private
	 *  @var	  array   form definition.
	 */
	var $form = array(
		"opensocial_owner_id" => array(),
		"id" => array(),
		"ssid" => array(),
		'url' => array()
	);

}

class M_Action_QuestDetail extends M_ActionClass
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
	 *  Detail action implementation.
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
		$domain = $this->config->get("url");
		$www = $domain['www'];
		$API = $domain['api'];
		$appId = $domain['appId'];

		$member_id = $this->af->get('opensocial_owner_id');
		$quest_id = $this->af->get('id');
		$this->af->setApp("id", $quest_id);
		$ssid = $this->af->get('ssid');
		$this->af->setApp("ssid", $ssid);
		$isReload = $userManager->isReload($member_id ,$ssid);
		//プロフィール情報　// t_user stage cl_cycle cl_masho exp money genki_rcv_time
		$profile = $userManager->getProfile($member_id);
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
		if((!empty($mustBuy)) && ($mustBuy['1'] > 0 || $mustBuy['2'] > 0 || $mustBuy['3'] > 0)){
			//ステージ最初のクエスト実行：必要なアイテム未保持かつ小判がないと先に進めない
			$frst = $questManager->existCurrentQuest($member_id ,$quest_id);
			if($frst['num'] == 0){
				$ret_f = $questManager->setCurrentQuest($member_id ,$quest_id , $f_arc="0", $f_md ="0");
			}

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
		//げんきが必要分よりあるかのCHK
		//表示データの作成
		$disp['exp']   = $profile['exp']   + $disp['exp'];
		$disp['money'] = $profile['money'] + $disp['money'];
		$disp['genki'] = $profile['genki'] + $disp['req_genki'];
		if($disp['genki'] < 0){
			//げんき回復処理用(ssid発行)
			$ssid = $userManager->getSsId();
			$this->af->setApp("ssid", $ssid);
			$this->af->setApp("q", $quest_id);
			//きびだんご個数取得 116
			$rcv_id = $this->config->get('kibiItemid');
			$cnt = $itemManager->getKbn4Count($member_id,$rcv_id);
			$this->af->setApp("cnt", $cnt);
			return 'error_genki';
		}
		//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－ クエスト実行　前処理1
		//該当クエストが初回かどうかのCHK(t_quest)
		$done = $questManager->expQuest($member_id ,$quest_id);
		if($done['num'] == 0){
			$ret = $questManager->doneQuest($member_id ,$quest_id, 0 );	//0:INS 1:UPD(done=1)
			$this->af->setApp("ar", "1");
		}
		if($done['done'] == 1){
			$this->af->setApp("done", "1");
		}
		//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－ クエスト実行　表示処理
		//m_exp_level　levelid からexp(閾値)を取得
		$nextExp = $userManager->getNextExpContByLevel($profile['level']);
		$this->af->setApp("nextExp", $nextExp);
		$prevExp = $userManager->getPrevExpContByLevel($profile['level']);
		//lg_quest取得lg_quest memberid questid current(100%のときに1をセット) archieve 
		$quest = $questManager->existCurrentQuest($member_id ,$quest_id);
		if($quest['num'] == 0){
			$mode = 0;
		}else{
			$mode = 1;
		}
		//達成率計算(最大100)
		$disp['aRate'] = $quest['archieve'] + $disp['aRate'];
		if($disp['aRate'] >= 100 ){
			$disp['aRate'] = 100;
			$cl_flg = 1;
		}
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
		//経験値の差分計算
		$diffExp = $nextExp - $disp['exp'];
		if($diffExp <= 0 ){
			$diffExp = 0;
		}
		$this->af->setApp("diffExp", $diffExp);
		//率の画像表示
		$eImg = $questManager->getDispImg( floor( ($disp['exp'] - $prevExp) / ($nextExp - $prevExp) * 100) );
		$this->af->setApp("eImg", $eImg);
		//t_user更新準備
		$user = array();
		$user["memberid"] = $member_id;
		$user["exp"]  	  = $disp['exp'];
		$user["money"]	= $disp['money'];
		$user["genki_rcv_time"]  = $userManager->getGenkiRcvTime($member_id , abs($disp['req_genki']));	//消費するgenkiの値をセット

		$treasureManager = $this->backend->getManager("Treasure");
		$lgManager = $this->backend->getManager("Lg");
		//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－ LEVELUP の判断 START
		if($diffExp == 0){
			//表示モード変更(仮HTML)
			$levelup = $profile['level'] + 1;
			$this->af->setApp("levelup", $levelup);
			if($levelup == 3){
				$table ="t_user";
				$column = "tut_num";
				$where = "memberid = '" .$member_id."'";
				$ret = $userManager->incrementColumn($table ,$column ,$where);
				if( $ret == false){
					return 'error_sys';
				}
			}
			//t_user更新準備(上書き)
			$user["level"] = $levelup;
			$user["genki_rcv_time"] = date("Y-m-d H:i:s", mktime());
		}
		//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－ LEVELUP の判断 END
		//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－ チュートリアルかの判断 START
		if($profile['tut_num'] == 0){
			$table ="t_user";
			$column = "tut_num";
			$where = "memberid = '" .$member_id."'";
			$ret = $userManager->incrementColumn($table ,$column ,$where);
			if( $ret == false){
				return 'error_sys';
			}
			return 'quest_tut0';
		}elseif($profile['tut_num'] < 10){
			$table ="t_user";
			$column = "tut_num";
			$where = "memberid = '" .$member_id."'";
			$ret = $userManager->incrementColumn($table ,$column ,$where);
			if( $ret == false){
				return 'error_sys';
			}
			if($profile['tut_num'] == 5){
				$tutTr = $this->config->get('tutTr');
				$tr['treasureid'] = $tutTr['id'];
				$tr['tr_seriesid'] = $tutTr['seriesid'];
				$ret1 = $treasureManager->TrDtInfo($tr['treasureid']);
				$ret2 = $treasureManager->TrSeriInfo($tr['tr_seriesid']);
				$tr['name'] = $ret1['name'];
				$tr['seriesname'] = $ret2['name'];
				$this->af->setApp("getTr", $tr);
				//t_treasure に追加
				$retTr =$treasureManager->insertTrStatus($member_id,$tutTr['id']);
				if( $retTr == false){
					return 'error_sys';
				}
			}
		}
//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－ チュートリアルEND
//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－ クエストクリア判断 START
		if($disp['aRate'] == 100){
			$this->af->setApp("ar", "10");
			//クエストクリア状況　行が無ければ追加t_cycle
			$ret = $questManager->doneCycle($member_id ,$profile['stage'], $profile['cl_cycle'], substr($quest_id,2,1));
			if($ret === False){
				return 'error_sys';
			}
		}
//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－ クエストクリア判断 END
//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－  クエストイベント　START

		//deckの情報を取得
		$deck = $userManager->getDeckProfile($member_id);
		$orgOff = $deck['offense'];
		$orgDef = $deck['defense'];
		$orgFol = $deck['follower'];

		//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－  LVUP　START
		//if($disp['aRate'] == 100 || $diffExp == 0){
		//ミニクエストクリアだけだと強化ポイントはふらない(101228)
		if($diffExp == 0){
			//強化P：ratio÷ratio計の確率でデッキのカードに1Pずつ付与
			$rfp = "";
			for ($i=1; $i<=5; $i++) {
				$d = "deck".$i;
				$cardU1 = array();
				$cardU1["memberid"] = $member_id;
				$cardU1["cardseq"]  = $deck[$d];
				$ratio = $cardManager->getDispCardInfo($member_id , $deck[$d]);
				$rMax = $ratio['ratio_off'] + $ratio['ratio_def'] + $ratio['ratio_fol'];
				$ranNum = mt_rand( 1, $rMax );
				if($ranNum <= $ratio['ratio_off']){
					$cardU1['offense'] = 1;	//加算分のみ
					$rfp .= "o";
				}elseif($ranNum <= $ratio['ratio_off'] + $ratio['ratio_def']){
					$cardU1['defense'] = 1;	//加算分のみ
					$rfp .= "d";
				}else{
					$cardU1['follower'] = 1;	//加算分のみ
					$rfp .= "f";
				}

				//ポイント加算
				$ret = $cardManager->updateCardStatus($cardU1);


				if($ret === False ){
					return 'error_sys';
				}
			}

			//リアリティ処理
			$afterP = $cardManager->getMaxPower($member_id);
			//ユーザテーブルt_user更新
			$userF = array();
			$userF["buki_off"]  = $afterP["buki_off"];
			$userF["buki_def"]  = $afterP["buki_def"];
			$userF["bougu_off"] = $afterP["bougu_off"];
			$userF["bougu_def"] = $afterP["bougu_def"];
			$userF["memberid"] = $member_id;
			$retF = $userManager->updateUser($userF);
			if($retF === False){
				return 'error_sys';
			}
		//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－  LVUP　　END
		//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－  LVUP以外START
		}else{						//アイテムとお宝の抽選を行い、当たれば表示。
			$diNum = mt_rand( 1, 100 );	//0からではなく1から
			if($diNum <= $disp['drop_item_odd']){
				$getItem = $itemManager->getItemData($disp['drop_item']);
				$this->af->setApp("getItem", $getItem);
				//リアリティ処理
				$after = $itemManager->getMaxPower($member_id,$disp['drop_item']);
				//アイテム購入処理
				$retItem = $itemManager->buyItem($member_id ,$disp['drop_item'],$getItem['kbn'],$amount="1",$getItem['rest'],$price=0,$after['buki_off'],$after['buki_def'],$after['bougu_off'],$after['bougu_def'],$profile['lg_dest'],$ssid ,$payment_id="",$status="");
				if( $retItem == false){
					return 'error_sys';
				}
			}
			$dtNum = mt_rand( 1, 100 );	//0からではなく1から
			if($dtNum <= $disp['drop_tr_odd']){
				$trTmp = explode("|",$disp['drop_tr']);
				$trMax = count($trTmp) -1;
				$trKey = mt_rand( 0,$trMax );
				$trUni = $trTmp[$trKey];
				$getTr = $treasureManager->TrDtInfo($trUni);
				$getSr = $treasureManager->TrSeriInfo($getTr['tr_seriesid']);
				$getTr['seriesname'] = $getSr['name'];
				$this->af->setApp("getTr", $getTr);
				//お宝コンプリートかCHK
				$comp = $treasureManager->chkTrSeriesComp($member_id,$trUni);
				//t_treasure に追加
				$retTr =$treasureManager->insertTrStatus($member_id,$trUni);
				if( $retTr == false){
					return 'error_sys';
				}
				if($comp == 1){
					//ご褒美アイテム
					$getItem = $itemManager->getItemData($getSr['itemid']);
					//リアリティ処理
					$after = $itemManager->getMaxPower($member_id,$getSr['itemid']);
					//アイテム購入処理
					$retCpItem = $itemManager->buyItem($member_id ,$getSr['itemid'],$getItem['kbn'],$amount="1",$getItem['rest'],$price=0,$after['buki_off'],$after['buki_def'],$after['bougu_off'],$after['bougu_def'],$profile['lg_dest'],$ssid ,$payment_id="",$status="");
					$retCp = $lgManager->writeFriendLog($member_id ,$status="1",substr($quest_id,0,2),$getTr['tr_seriesid'],$trUni,$seq="",$rank="");
					if( $retCp == false || $retCpItem == false){
						return 'error_sys';
					}
					$this->af->setApp("comp", $getItem);
				}

			}
		}
		//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－  LVUP以外　END
		//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－  クエストイベント　END
		//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－ トランザクション START
		$db = $this->backend->getDb();
		$ret = $db->query('START TRANSACTION');
		if($ret == False){
			return 'error_sys';
		}
		//lg_quest更新 	-> 達成率が100%になれば t_questも更新
		$ret0 = $questManager->setCurrentQuest($member_id ,$quest_id , $disp['aRate'], $mode);
		//t_user更新
		$ret1 = $userManager->updateUser($user);
		//アイテムの回数を毎回減算
		if($disp['item1'] == 0 || $disp['num1'] == 0){
			$retItem1 === True;
		}else{
			$retItem1 = $itemManager->useMyItem($member_id,$disp['item1'],$disp['num1']);
		}
		if($disp['item2'] == 0 || $disp['num2'] == 0){
			$retItem2 === True;
		}else{
			$retItem2 = $itemManager->useMyItem($member_id,$disp['item2'],$disp['num2']);
		}
		if($disp['item3'] == 0 || $disp['num3'] == 0){
			$retItem3 === True;
		}else{
			$retItem3 = $itemManager->useMyItem($member_id,$disp['item3'],$disp['num3']);
		}
		if($diffExp == 0){				//ランク+LV+武将連番決定
			$cntF = $cardManager->getCardlistCount($member_id ,$st="1");//ファイルの状態を取得
			//11/2/7
			$cardFileMax = $this->config->get("cardFileMax");
			if($cntF >= $cardFileMax){
				$status = 3; //満杯時のステータス
			}else{
				$status = 1; //file
			}
			$card = $cardManager->getLvupCard();
			$busho = $cardManager->getGachaCardInfo($card['bushoseq'],$card['rank']);
			$retCard = $cardManager->cardInsert($member_id ,$status ,$busho['bushoid'], $card['level'],$init="");
		}else{
			$retCard = True;
		}
		//ssid登録
		$ret2 = $questManager->updSession($member_id ,$ssid);
		//レアカードなら同盟通信に記録
		if($card['rank'] ==  "A" || $card['rank'] ==  "B" || $card['rank'] ==  "C"){
			$ret3 = $lgManager->writeFriendLog($member_id ,$status="3",$cstage,$seriesid="",$trid="",$card['bushoseq'],$card['rank']);
		}else{
			$ret3 = True;
		}
		if($ret0 === False || $ret1 === False || $ret2 === False || $retItem1 === False || $retItem2 === False || $retItem3 === False || $retCard === False || $ret3 === False){
			$db->query('ROLLBACK');
			return 'error_sys';
		}
		//トランザクション終了
		$ret = $db->query('COMMIT');
		if($ret === False){
			return 'error_sys';
		}

		//魔性出現(周回クリア)の判断
		//該当周回のクエスト数とクリアしたクエスト数が一致なら魔性出現
		$questNum = $questManager->getQuestNumByCycle($profile['stage'], $profile['cl_cycle']);
		$expNum   = $questManager->expCycle($member_id ,$profile['stage'], $profile['cl_cycle']);

		if($questNum && $expNum == $questNum){		//8ステージ対策11/01/12 
			//cl_cycle の上限設定 $maxCyc=3 (11/01/04)
			$maxCyc = $this->config->get("maxCyc");
			$new_cl_cycle = $profile['cl_cycle'] + 1;
			if($new_cl_cycle > $maxCyc){
				$new_cl_cycle = $maxCyc;
			}
			//cl_cycle をカウントUP
			$user = array();
			$user["memberid"] = $member_id;
			$user["cl_cycle"] = $new_cl_cycle;
			$retc = $userManager->updateUser($user);
			if($retc === False){
				return 'error_sys';
			}

			for ($i=1; $i<=5; $i++) {
				$d = "deck".$i;
				$cardU2 = array();
				$cardU2["memberid"] = $member_id;
				$cardU2["cardseq"]  = $deck[$d];
				$ratio = $cardManager->getDispCardInfo($member_id , $deck[$d]);
				$rMax = $ratio['ratio_off'] + $ratio['ratio_def'] + $ratio['ratio_fol'];
				$ranNum = mt_rand( 1, $rMax );
				if($ranNum <= $ratio['ratio_off']){
					$cardU2['offense'] = 1;	//加算分のみ
					$rfp .= "o";
				}elseif($ranNum <= $ratio['ratio_off'] + $ratio['ratio_def']){
					$cardU2['defense'] = 1;	//加算分のみ
					$rfp .= "d";
				}else{
					$cardU2['follower'] = 1;	//加算分のみ
					$rfp .= "f";
				}
				//ポイント加算
				$retU2 = $cardManager->updateCardStatus($cardU2);
				if($retU2 === False ){
					return 'error_sys';
				}
			}

			//リアリティ処理
			$afterP = $cardManager->getMaxPower($member_id);
			//ユーザテーブルt_user更新
			$userF2 = array();
			$userF2["buki_off"]  = $afterP["buki_off"];
			$userF2["buki_def"]  = $afterP["buki_def"];
			$userF2["bougu_off"] = $afterP["bougu_off"];
			$userF2["bougu_def"] = $afterP["bougu_def"];
			$userF2["memberid"] = $member_id;
			$retF2 = $userManager->updateUser($userF2);
			if($retF2 === False){
				return 'error_sys';
			}
		}

		//アイテムが壊れた事の通知
		if(	$disp['item1'] != 0 && $disp['num1'] != 0 && $retItem1 >= 0){
			$broken['0'] = $itemManager->getItemDataForQuest($member_id,$disp['item1'],$disp['num1']);
		}
		if($disp['item2'] != 0 && $disp['num2'] != 0 && $retItem2 >= 0){
			$broken['1'] = $itemManager->getItemDataForQuest($member_id,$disp['item2'],$disp['num2']);
		}
		if($disp['item3'] != 0 && $disp['num3'] != 0 && $retItem3 >= 0){
			$broken['2'] = $itemManager->getItemDataForQuest($member_id,$disp['item3'],$disp['num3']);
		}
		$this->af->setApp("broken", $broken);
		//風景
		if(!isset($broken)  && !isset($getItem) && !isset($getTr)){
			$scnRan = mt_rand(1,9);
			if($scnRan == 9){
				$this->af->setApp("scn", substr($quest_id,0,1));
			}
		}
//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－ トランザクション  END
//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－　　　 表示処理  START
		if($diffExp == 0){															//LEVELUP
			$swfmillManager = $this->backend->getManager('Swfmill');
			$ssid = $userManager->getSsId();
			$replaceStrings["lnkUrl"] = "http://".$API."/".$appId."?url=http%3A%2F%2F".$www."%2Fquest%2Fcard.php%3Fid%3D".$quest_id."%26ssid%3D".$ssid;
			if($cl_flg == 1){
				$replaceStrings["lnkUrl"] .= "%26cl%3D".$cl_flg;
			}
			$replaceStrings["lnkUrl"] .= "%26orgFol%3D".$orgFol."%26orgOff%3D".$orgOff."%26orgDef%3D".$orgDef."%26ex_genki%3D".$profile['genki']."%26bid%3D".$busho['bushoid']."%26rfp%3D".$rfp;
			$replaceStrings["busho"] = $card['bushoseq'];
			$replaceStrings["rank_num"] = $card['rank_num'];
			$replaceStrings['rank'] = $swfmillManager->getXml(sprintf('rank/%d_1.xml',  $card['rank_num']));
			$replaceStrings['rankBg'] = $swfmillManager->getXml(sprintf('rank/%d_2.xml',  $card['rank_num']));
			$replaceStrings['rankBgbmp'] = $swfmillManager->getXml(sprintf('rank/%d_3.xml',  $card['rank_num']));
			$replaceStrings['rankBmp'] = $swfmillManager->getXml(sprintf('rank/%d_4.xml',  $card['rank_num']));
			$replaceStrings['bushoImg'] = $swfmillManager->getXml(sprintf('card/%d.xml',  $card['bushoseq']));
			$replaceStrings['nameImg'] = $swfmillManager->getXml(sprintf('name/%d.xml',  $card['bushoseq']));
			// XMLコンパイル
			$xmlString = $swfmillManager->compileXml('level.xml', $replaceStrings);
			// XML出力実行
			$swfmillManager->executeSwfmill($xmlString);

		}elseif($disp['aRate'] == 100){												//クエストクリア
			$swfmillManager = $this->backend->getManager('Swfmill');
			//リロード対策
			$ssid = $userManager->getSsId();
			$replaceStrings["lnkUrl"] = "http://".$API."/".$appId."?url=http%3A%2F%2F".$www."%2Fquest%2Fclear.php%3Fid%3D".$quest_id."%26ssid%3D".$ssid."%26ex_genki%3D".$profile['genki'];
			//周回クリア時のみ強化Pの処理(101228)
			if($expNum == $questNum){
				$replaceStrings["lnkUrl"] .= "%26orgFol%3D".$orgFol."%26orgOff%3D".$orgOff."%26orgDef%3D".$orgDef."%26rfp%3D".$rfp;
			}
			// XMLコンパイル
			$xmlString = $swfmillManager->compileXml('clear.xml', $replaceStrings);
			// XML出力実行
			$swfmillManager->executeSwfmill($xmlString);
		}else{																		//通常
			$this->af->setApp("q", $quest_id);
			$ssid = $userManager->getSsId();
			$this->af->setApp("ssid", $ssid);
			$ran = mt_rand(1,6);
			$this->af->setApp('st_ran', $ran);
			return 'quest_detail';
		}
//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－　　　 表示処理  END
	}

}

?>
