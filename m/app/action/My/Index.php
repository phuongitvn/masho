<?php
class M_Form_MyIndex extends M_ActionForm {
	var $form = array(
		"opensocial_owner_id" => array(),
		"ss" => array(),
	);
}

class M_Action_MyIndex extends M_ActionClass {
	function prepare() {
		return parent::prepare();
	}

	function perform() {
		$userManager = $this->backend->getManager('User');
		$cardManager = $this->backend->getManager('Card');
		$itemManager = $this->backend->getManager('Item');
		$questManager = $this->backend->getManager('Quest');
		$lgManager = $this->backend->getManager('Lg');
		$infoManager = $this->backend->getManager('Info');
		$member_id = $this->af->get('opensocial_owner_id');

		$domain = $this->config->get('url');
		$www = $domain['www'];
		$appId = $domain['appId'];
		$API = $domain['api'];
		$this->af->setApp("www", $www);
		$this->af->setApp("appId", $appId);
		$this->af->setApp("api", $API);
		$encId = $userManager->getCyptUserId($member_id);
		$this->af->setApp("encId", $encId);

		$ss_id = $this->af->get('ss');
		$isReload = $userManager->isReload($member_id ,$ss_id);

		//プロフィール情報
		//LVに応じたgenki回復時間の表示 (3分で1ポイント回復)
		$profile = $userManager->getProfile($member_id);
		$this->af->setApp("tut_num", $profile['tut_num']);
		$this->af->setApp("profile", $profile);

		$deck = $userManager->getDeckProfile($member_id);
		$this->af->setApp("deck", $deck);
		//武将名とランクを取得
		$card = $cardManager->getCardAtt($profile['prof']);
		$this->af->setApp("card", $card);

		//現在ステージ名＋色の取得
		$stage = $userManager->getStageName($profile['stage']);
		$this->af->setApp("stage", $stage);
		$color = $userManager->getStageColor($profile['stage']);
		$this->af->setApp("color", $color);
		$title = $questManager->getQuestTitle($profile['stage'], $profile['cl_masho']);
		$this->af->setApp("title", $title);

		//チュートリアル判断
//TUT
		if($profile['tut_num'] == 0){	//軍団長決定前
			$profcard = $userManager->getProfCard($member_id);
			$m_busho = $cardManager->getCardAtt($profcard['prof']);
			$ss = $userManager->getSsId();
			$this->af->setApp("ss", $ss);
			$this->af->setApp("m_busho", $m_busho);
			$this->af->setApp("profcard", $profcard);
			$ss = $userManager->getSsId();
			$this->af->setApp("ss", $ss);
			return 'my_tutprof';
		}elseif($profile['tut_num'] == 1){
			$swfmillManager = $this->backend->getManager('Swfmill');
			//ｸｴｽﾄFLA閲覧　1->2
			$db = $this->backend->getDb();
			$ret = $db->query('START TRANSACTION');
			if($ret == False){
				return 'error_sys';
			}
			$where = "memberid = '" .$member_id."'";
			$ret1 = $userManager->incrementColumn($table="t_user" ,$column = "tut_num" ,$where);
			$ret2 = $userManager->updSession($member_id ,$ss_id);
			if($ret1 === False || $ret2 === False ){
				$db->query('ROLLBACK');
				return 'error_sys';
			}
			$ret = $db->query('COMMIT');
			if($ret === False){
				return 'error_sys';
			}
			$newss = $userManager->getSsId();
			$replaceStrings["lnkUrl"] = "http://".$API."/".$appId."?url=http%3A%2F%2F".$www."%2Fmy%2Findex.php%3Fss%3D".$newss;
			$xmlString = $swfmillManager->compileXml('tutorial.xml', $replaceStrings);
			$swfmillManager->executeSwfmill($xmlString);
		}elseif($profile['tut_num'] == 2 || $profile['tut_num'] == 3 || $profile['tut_num'] == 6 || $profile['tut_num'] == 8){
			//#2 クエスト10%  2->3
			//#3 クエスト初回 3->4
			//#6 ファイト設定画面 6->7
			//#8 ファイト結果画面 8->9
			$db = $this->backend->getDb();
			$ret = $db->query('START TRANSACTION');
			if($ret == False){
				return 'error_sys';
			}
			$where = "memberid = '" .$member_id."'";
			$ret1 = $userManager->incrementColumn($table="t_user" ,$column = "tut_num" ,$where);
			$ret2 = $userManager->updSession($member_id ,$ss_id);
			if($ret1 === False || $ret2 === False ){
				$db->query('ROLLBACK');
				return 'error_sys';
			}
			$ret = $db->query('COMMIT');
			if($ret === False){
				return 'error_sys';
			}
			if($profile['tut_num'] == 3){
				$disp = $questManager->getQuest('111');
				$disp['exp']   = $profile['exp']   + $disp['exp'];
				$disp['money'] = $profile['money'] + $disp['money'];
				$disp['genki'] = $profile['genki'] + $disp['req_genki'];
				$this->af->setApp("disp", $disp);
			}elseif($profile['tut_num'] == 6){
				$deck = $userManager->getDeckProfile($member_id);
				for ($i=1; $i<=5; $i++) {
					$d = "deck".$i;
					$tmp = $cardManager->getCardInfo($member_id , $deck[$d] , 0);
					$dispcard[$i] = $tmp['bushoid'];
				}
				$this->af->setApp("deck", $deck);
				$this->af->setApp("off", $profile['buki_off']);
				$this->af->setApp("def", $profile['buki_def']);
				$this->af->setApp("card", $dispcard);
			}elseif($profile['tut_num'] == 8){

				$myOrder = "32154";
				$otcard = $this->config->get("ot_o");
				$type = "o";
				for ($r = 1; $r <= 5; $r++) {
					$n = $r - 1;
					$sq = substr($myOrder,$n,1);
					$myDispCard[$r] = $cardManager->getDispCardInfo($member_id , $sq );
					$otDispCard[$r] = $cardManager->getCardAtt($otcard[$r]['bushoid']);
					$otDispCard[$r]['damage'] = $otcard[$r]['damage'];
				}
				$this->af->setApp("myDispCard", $myDispCard);
				$this->af->setApp("otDispCard", $otDispCard);
				$this->af->setApp("type", $type);
			}
			$ss = $userManager->getSsId();
			$this->af->setApp("ss", $ss);
			$retTpl = "my_tut".$profile['tut_num'];
			return $retTpl;
		}elseif($profile['tut_num'] == 4 || $profile['tut_num'] == 9){
			$swfmillManager = $this->backend->getManager('Swfmill');
			$deck = $userManager->getDeckProfile($member_id);
			$orgOff = $deck['offense'];
			$orgDef = $deck['defense'];
			$orgFol = $deck['follower'];
			//levelUPFLA　4->5 9->10
			$db = $this->backend->getDb();
			$ret = $db->query('START TRANSACTION');
			if($ret == False){
				return 'error_sys';
			}
			//カード付与
			$lvcard = $cardManager->getLvupCard();
			$busho = $cardManager->getGachaCardInfo($lvcard['bushoseq'],$lvcard['rank']);
			$ret4 = $cardManager->cardInsert($member_id ,$sts="1" ,$busho['bushoid'], $lvcard['level'],$init="");
			$ret2 = $userManager->updSession($member_id ,$ss_id);
			//強化pt付与
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
				$ret3[$i] = $cardManager->updateCardStatus($cardU1);
			}
			//リアリティ処理
			$afterP = $cardManager->getMaxPower($member_id);
			//ユーザテーブルt_user更新
			$userF = array();
			$userF["buki_off"]  = $afterP["buki_off"];
			$userF["buki_def"]  = $afterP["buki_def"];
			$userF["bougu_off"] = $afterP["bougu_off"];
			$userF["bougu_def"] = $afterP["bougu_def"];
			$userF["tut_num"]  = $deck['tut_num'] + 1;
			$userF["memberid"] = $member_id;
			$ret1 = $userManager->updateUser($userF);
			if($ret1 === False || $ret2 === False || $ret3['1'] === False || $ret3['2'] === False || $ret3['3'] === False || $ret3['4'] === False || $ret3['5'] === False || $ret4 === False){
				$db->query('ROLLBACK');
				return 'error_sys';
			}
			$ret = $db->query('COMMIT');
			if($ret === False){
				return 'error_sys';
			}
			$newss = $userManager->getSsId();
			$replaceStrings["lnkUrl"] = "http://".$API."/".$appId."?url=http%3A%2F%2F".$www."%2Fmy%2Findex.php%3Fss%3D".$newss."%26orgFol%3D".$orgFol."%26orgOff%3D".$orgOff."%26orgDef%3D".$orgDef."%26rfp%3D".$rfp;
			$replaceStrings["busho"] = $lvcard['bushoseq'];
			$replaceStrings["rank_num"] = $lvcard['rank_num'];
			$replaceStrings['rank'] = $swfmillManager->getXml(sprintf('rank/%d_1.xml',  $lvcard['rank_num']));
			$replaceStrings['rankBg'] = $swfmillManager->getXml(sprintf('rank/%d_2.xml',  $lvcard['rank_num']));
			$replaceStrings['rankBgbmp'] = $swfmillManager->getXml(sprintf('rank/%d_3.xml',  $lvcard['rank_num']));
			$replaceStrings['rankBmp'] = $swfmillManager->getXml(sprintf('rank/%d_4.xml',  $lvcard['rank_num']));
			$replaceStrings['bushoImg'] = $swfmillManager->getXml(sprintf('card/%d.xml',  $lvcard['bushoseq']));
			$replaceStrings['nameImg'] = $swfmillManager->getXml(sprintf('name/%d.xml',  $lvcard['bushoseq']));
			$xmlString = $swfmillManager->compileXml('level.xml', $replaceStrings);
			$swfmillManager->executeSwfmill($xmlString);
		}elseif($profile['tut_num'] == 5 || $profile['tut_num'] == 10){
			//カード表示 5->6	10->11
			$rfp = $this->af->get('rfp');
			//最新の情報
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
			if(strlen($rfp) == 10){
				for ($i=6; $i<=10; $i++) {
					$j = $i - 1;
					$rfP[$i] = substr($rfp,$j,1);
				}
			}
			$this->af->setApp("rfP", $rfP);
			$stageNum = 1;
			//ステージ名取得
			$stage = $userManager->getStageName($stageNum);
			$color = $userManager->getStageColor($stageNum);
			$title = $questManager->getQuestTitle($profile['stage'], $profile['cl_masho']);
			$this->af->setApp("title", $title);
			$this->af->setApp("color", $color);
			$this->af->setApp("stage", $stage);
			//カードを特定
			$busho['0'] = $cardManager->getDispCardInfo($member_id , $profile['card_seq']);
			$this->af->setApp("busho", $busho);

			$db = $this->backend->getDb();
			$ret = $db->query('START TRANSACTION');
			if($ret == False){
				return 'error_sys';
			}
			$where = "memberid = '" .$member_id."'";
			$ret1 = $userManager->incrementColumn($table="t_user" ,$column = "tut_num" ,$where);
			$ret2 = $userManager->updSession($member_id ,$ss_id);
			if($ret1 === False || $ret2 === False ){
				$db->query('ROLLBACK');
				return 'error_sys';
			}
			$ret = $db->query('COMMIT');
			if($ret === False){
				return 'error_sys';
			}
			$ss = $userManager->getSsId();
			$this->af->setApp("ss", $ss);
			return 'my_tut5';
		}elseif($profile['tut_num'] == 7){
			$swfmillManager = $this->backend->getManager('Swfmill');
			//fightFLA　7->8
			$db = $this->backend->getDb();
			$ret = $db->query('START TRANSACTION');
			if($ret == False){
				return 'error_sys';
			}
			$where = "memberid = '" .$member_id."'";
			$ret1 = $userManager->incrementColumn($table="t_user" ,$column = "tut_num" ,$where);
			$ret2 = $userManager->updSession($member_id ,$ss_id);
			if($ret1 === False || $ret2 === False ){
				$db->query('ROLLBACK');
				return 'error_sys';
			}
			$ret = $db->query('COMMIT');
			if($ret === False){
				return 'error_sys';
			}
			//武将連番取得
			$mycard = $cardManager->getCardAtt($profile['prof']);
			$otcard = $cardManager->getCardAtt('9e225a197384d3f9');
			$newss = $userManager->getSsId();
			$replaceStrings["lnkUrl"] = "http://".$API."/".$appId."?url=http%3A%2F%2F".$www."%2Fmy%2Findex.php%3Fss%3D".$newss;
			$p = array();
			$p['img1'] = '/img/card/'.$mycard['bushoid'].'_p.jpg';
			$p['n1'] = $profile['handle'];
			$p['img2'] = '/img/card/9e225a197384d3f9_p.jpg';
			$p['n2'] = 'Tiểu Minh Nữ';
			$swfmillManager->boss_params = $p;

			$xmlString = $swfmillManager->compileXml('fight.xml', $replaceStrings);
			$swfmillManager->executeSwfmill($xmlString);
		}elseif($profile['tut_num'] == 11){
			//旅立ちページ 11->12
			$db = $this->backend->getDb();
			$ret = $db->query('START TRANSACTION');
			if($ret == False){
				return 'error_sys';
			}
			$where = "memberid = '" .$member_id."'";
			$ret1 = $userManager->incrementColumn($table="t_user" ,$column = "tut_num" ,$where);
			$ret2 = $userManager->updSession($member_id ,$ss_id);
			if($ret1 === False || $ret2 === False ){
				$db->query('ROLLBACK');
				return 'error_sys';
			}
			$ret = $db->query('COMMIT');
			if($ret === False){
				return 'error_sys';
			}
			//Welcomeﾌﾟﾚｾﾞﾝﾄ有無CHK(10/1/11)
			$gachaFreeId = $this->config->get('gachaFreeItemid');
			$gFcnt = $itemManager->getKbn4Count($member_id,$gachaFreeId);
			if($gFcnt > 0){
				$item = $itemManager->getItemData($gachaFreeId);
				$this->af->setApp("gFcnt", $gFcnt);
				$this->af->setApp("item", $item);
			}
			$ss = $userManager->getSsId();
			$this->af->setApp("ss", $ss);
			return 'my_tut11';
		}elseif($profile['tut_num'] == 12){
			//チュートリラスト 12->18
			$db = $this->backend->getDb();
			$ret = $db->query('START TRANSACTION');
			if($ret == False){
				return 'error_sys';
			}
			$where = "memberid = '" .$member_id."'";
			$ret1 = $userManager->updateColumn($table="t_user" ,$column = "tut_num",$status="18", $where);
			$ret2 = $userManager->updSession($member_id ,$ss_id);
			if($ret1 === False || $ret2 === False ){
				$db->query('ROLLBACK');
				return 'error_sys';
			}
			$ret = $db->query('COMMIT');
			if($ret === False){
				return 'error_sys';
			}
			$ssid = $userManager->getSsId();
			$this->af->setApp("ssid", $ssid);
			return 'my_tut12';
		}else{
			//ログインボーナス(5時切替)
			$hour = date("G");
			if($hour < 5){
				$judgeDate = date('ymd' ,mktime(0,0,0,date("m"),date("d")-1,date("Y")));	//24時間制で5時までは前日計算
			}else{
				$judgeDate = date('ymd');
			}
			if($judgeDate > $profile['bonus_get']){
				//トランザクション開始
				$db = $this->backend->getDb();
				$ret = $db->query('START TRANSACTION');
				if($ret == False){
					return 'error_sys';
				}
				//t_user.bonus_get をUPD
				$where = " memberid = '" . $member_id ."'";
				$ret1 = $userManager->updateColumn($table="t_user" ,$column="bonus_get" ,$judgeDate, $where);
				//ガチャ札FREE1枚付与
				$gachaFreeId = $this->config->get('gachaFreeItemid');	//ガチャ札FREE139
				$ret2 = $itemManager->buyItem($member_id,$gachaFreeId, $kbn="4",$amount="1",$rest=0,$price=0,0,0,0,0,$lg_dest="",$ss_id="" ,$pay_id="139",$status="IN");
				if($ret1 === False || $ret2 === False ){
					$db->query('ROLLBACK');
					return 'error_sys';
				}
				//トランザクション終了
				$ret = $db->query('COMMIT');
				if($ret === False){
					return 'error_sys';
				}
				$this->af->setApp("bouns", "GET");
			}

//EV
			$lgRegularEventManager = $this->backend->getManager("RegularEvent");
			$info = $lgRegularEventManager->getEventReport();
			$this->af->setApp('event_result', $info);
			/*
			$eventManager = $this->backend->getManager("Event");
			$evid = $this->config->get("evid");
			$this->af->setApp("evid", $evid);
			$gTL = $eventManager->getTimeLeft();
			$this->af->setApp("gTL", $gTL);
			*/
			//経験値の差分計算
			$nextExp = $userManager->getNextExpContByLevel($profile['level']);
			$diffExp = $nextExp - $profile['exp'];
			$this->af->setApp("diffExp", $diffExp);

			$friendManager = $this->backend->getManager("Friend");
			$profile['friend_num'] = $friendManager->getFriendlistCount($member_id ,$sta="2",$kb="");

			//伝令の取得
			$limit = 1;
			$list = array();
			$list = $lgManager->getEventLoglist($member_id ,$limit ,@$offset);
			$this->af->setApp("list", $list);

			$list2 = $infoManager->getWallByOther($member_id, $limit);
			$this->af->setApp("list2", $list2);

			//同盟通信の取得
			$limitF = 2;
			$listF = array();
			$listF = $lgManager->getFriendLoglist($member_id ,$limitF ,@$offset);
			$this->af->setApp("listF", $listF);

			//リロード対策(ガチャ)
			$ssid = $userManager->getSsId();
			$this->af->setApp("ssid", $ssid);

			$this->af->setApp("profile", $profile);
			return 'my_index';
		}
	}
}
?>