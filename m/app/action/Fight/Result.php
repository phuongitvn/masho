<?php
/**
 *  Fight/Result.php
 *
 *  @author	 {$author}
 *  @package	M
 *  @version	$Id$
 */

class M_Form_FightResult extends M_ActionForm
{
	/**
	 *  @access private
	 *  @var	array   form definition.
	 */
	var $form = array(
		"opensocial_owner_id" => array(),
		"id" => array(),
		"fid" => array(),
		"trid" => array(),
		"ts" => array(),
		"ssid" => array(),
	);

}

class M_Action_FightResult extends M_ActionClass
{
	/**
	 *  preprocess of my_p_day Action.
	 *
	 *  @access public
	 *  @return string	forward name(null: success.
	 *								false: in case you want to exit.)
	 */
	function prepare()
	{
		return parent::prepare();
	}

	/**
	 *  fight_result action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		$userManager = $this->backend->getManager("User");
		$fightManager = $this->backend->getManager("Fight");
		$friendManager = $this->backend->getManager("Friend");
		$cardManager = $this->backend->getManager("Card");
		$itemManager = $this->backend->getManager("Item");
		$treasureManager = $this->backend->getManager("Treasure");
		$lgManager = $this->backend->getManager("Lg");

		$member_id = $this->af->get('opensocial_owner_id');
		$other_id  = $this->af->get('id');
		$ddn = $this->af->get('ts');
		$ss_id = $this->af->get('ssid');

		//自分のプロフィール情報
		$my_profile = $userManager->getProfile($member_id);
		$this->af->setApp("my_profile", $my_profile);

		//助太刀依頼主
		$help_id = $this->af->get('fid');
		//狙ったお宝
		$tr_id = $this->af->get('trid');
		//最低必要げんき
		$regGenki = $this->config->get('fightReqGenki') + floor($my_profile['level'] * 0.05);

		//本人チェック
		if($member_id == $other_id){
			$this->af->setApp('error' ,"2");
			return 'error_sys';
		}
		//げんきチェック
		if($my_profile['genki'] < $regGenki){
			//げんき回復処理用(ssid発行)
			$ssid = $userManager->getSsId();
			$this->af->setApp("ssid", $ssid);
			//$this->af->setApp("q", $quest_id);
			//きびだんご個数取得 116
			$rcv_id = $this->config->get('kibiItemid');
			$cnt = $itemManager->getKbn4Count($member_id,$rcv_id);
			$this->af->setApp("cnt", $cnt);
			$this->af->setApp("profile", $my_profile);
			return 'error_genki';
		}
		//重複チェック

		$times = $fightManager->isDuplicateFight($member_id ,$other_id);
		if($times >= 3){
			$this->af->setApp("times", $times);
			return 'fight_duplicate';
		}
		

		//Compチェック
		if($tr_id != ""){
			$has = $treasureManager->chkOtherAlreadyComp($other_id,$tr_id);
			if($has == 5){
			return 'fight_comp';
			}
		}

		//相手のプロフィール情報
		$ot_profile = $userManager->getProfile($other_id);
		$this->af->setApp("ot_profile", $ot_profile);
		if(count($ot_profile) == 0){
			return "error_404";
		}
		//LV乖離のチェック(当初2)
		$gap = $this->config->get('fightLvGap');
		if( ($my_profile['level'] - $ot_profile['level'] * $gap) > 0 ){
			return "fight_gap";
		}
		//同盟チェック
		$ret1 = $friendManager->existsFriend($member_id ,$other_id);
		$ret2 = $friendManager->existsFriend($other_id,$member_id);
		//同盟または申請中
		if($ret1 == "0" || $ret1 == "1" || $ret1 == "2" || $ret2 == "0" || $ret2 == "1" || $ret2 == "2") {
			return "fight_friend";
		}

		//ファイル満杯で受け取れない状態(status=3)のカードがあるかCHK
		$tbdCnt = $cardManager->getCardlistCount($member_id ,$status="3");
		if($tbdCnt > 0){
			$this->af->setApp("dotGo", "1");		//11/2/8
			$this->af->setApp("fg", "fg");			//11/2/8
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
			$this->af->setApp("q", "fg");
			//カード破棄用(ssid発行)
			$ssid = $userManager->getSsId();
			$this->af->setApp("ssid", $ssid);
			return 'quest_card';
		}

		//リロードCHK
		$isReload = $userManager->isReload($member_id ,$ss_id);
		$this->af->setApp("isReload", $isReload);

	if($isReload == True){
		return 'fight_reload';
	}else{
		$winner = 0;
		//LVUP判断　(110112)
		$nxtFlg = 1;

		if($ddn != ""){		//lg_help 取得
			$help = $lgManager->getHelpLog($help_id ,$other_id,$ddn);
			$tr_id = $help['trid'];
		}
		if($tr_id != ""){
			//護符の設定チェック 護符がある->1減らして勝負決定
			$trap = $treasureManager->getTrapNum($other_id,$tr_id);
			if($trap['trap1num'] > 0){
				$winner = 3;
				$retTr = $treasureManager->updateTrStatus($other_id,$tr_id,$numFlg="8",$trap="1",$amount="1");
				if($retTr == false){
					return false;
				}
			}else{
				if($trap['trap2num'] > 0){
					$winner = 3;
					$retTr = $treasureManager->updateTrStatus($other_id,$tr_id,$numFlg="8",$trap="2",$amount="1");
					if($retTr == false){
						return false;
					}
				}
			}
		}

//LOG書き出し
$filename = dirname(dirname(dirname(dirname(dirname(__FILE__)))))."/logs/fight_" .date("Ymd") .".log";
$log  = date("Y-m-d H:i:s");

	if($winner == 0){
		//デッキの順序をランダムに決定
		$my_tmp  = str_shuffle("12345");
		$ot_tmp  = str_shuffle("12345");

		//1Rから5Rのカードcardseqを取得
		for ($r = 1; $r <= 5; $r++) {
			$j = $r - 1;

			//t_cardのカード情報そのまま取得
			$myd = "deck".substr($my_tmp,$j,1);
			$myseq[$r] = $my_profile[$myd];
			$mycard[$r] = $fightManager->getFightCardInfo($member_id , $myseq[$r] );
			$myDispCard[$r] = $cardManager->getDispCardInfo($member_id , $myseq[$r] );

			$otd = "deck".substr($ot_tmp,$j,1);
			$otseq[$r] = $ot_profile[$otd];
			$otcard[$r] = $fightManager->getFightCardInfo($other_id , $otseq[$r] );
			$otDispCard[$r] = $cardManager->getDispCardInfo($other_id , $otseq[$r] );

$log .= "------".$r."R----------\n";
$log .= "my:".print_r($mycard[$r],true)."\n";
$log .= "ot:".print_r($otcard[$r],true)."\n";


			//陣形効果(my,ot共に補正）t_user.formnoに応じて補正した攻撃、防御、家来数を算出
			//奥義効果(my,ot共に補正）bushoid、LVに応じて
			//比較要素　攻撃、防御、家来数、ランク、性別、奥義タイプ、タイプ、補正した攻撃、防御、家来数を算出
			list($mycard[$r],$otcard[$r]) = $fightManager->getEffectedCardInfo($member_id , $other_id, $mycard[$r], $otcard[$r],$my_profile['formno'],$ot_profile['formno'],$ogi="1");

$log .= "Aftermy:O=".print_r($mycard[$r]['offense'],true)."D=".print_r($mycard[$r]['defense'],true)."F=".print_r($mycard[$r]['follower'],true)."fight=".print_r($mycard[$r]['fight'],true)."\n";
$log .= "Afterot:O=".print_r($otcard[$r]['offense'],true)."D=".print_r($otcard[$r]['defense'],true)."F=".print_r($otcard[$r]['follower'],true)."fight=".print_r($otcard[$r]['fight'],true)."\n";

		}

		//保有しているアイテムを取得 my　はoffense を計算
		$myOffItem = $itemManager->getMyItems($member_id ,1 ,$unit="",$diff="",$limit="" ,$offset="");
		$myDefItem = $itemManager->getMyItems($member_id ,2 ,$unit="",$diff="1",$limit="" ,$offset="");
		//保有しているアイテムを取得 ot　はdefense を計算
		$otOffItem = $itemManager->getMyItems($other_id ,1 ,$unit="",$diff="1",$limit="" ,$offset="");
		$otDefItem = $itemManager->getMyItems($other_id ,2 ,$unit="",$diff="",$limit="" ,$offset="");

/*
$log .= "myBUKI:".print_r($myOffItem,true)."\n";
$log .= "myBOGU:".print_r($myDefItem,true)."\n";
$log .= "otBUKI:".print_r($otOffItem,true)."\n";
$log .= "otBOGU:".print_r($otDefItem,true)."\n";
*/

		//使用アイテム決定		1ファイト(攻撃側、助太刀除く)につきランダムで保有アイテムを一つ選びtimesを－１
		$myItem = $myOffItem + $myDefItem;
		
		//武器防具が無い場合壊れる処理不要	//11/2/8
		if(count($myItem) == 0){
			$crashItemId = 0;
		}else{
			$myItemMax = count($myItem) - 1;
			$ranCrash = mt_rand( 0, $myItemMax);
			$crashItemId = $myItem[$ranCrash]['itemid'];
/*
$log .= "crash:".print_r($crashItemId,true)."\n";
*/
		}

		//入力:補正後攻撃力、補正後家来数、保有アイテム(myOff、myDef)
		//保有しているアイテムを　kbn=1　のリストを取得
		//1Rから5Rの家来数と照らして　攻撃力順ソートで武器攻撃力を計算
		//保有しているアイテムを　kbn=2　のリストを取得
		//1Rから5Rの家来数と照らして　攻撃力順ソートで防具攻撃力を計算

		//結果:1R-5Rまでの攻撃力
		$myOffPower1 = $fightManager->calcFightPower($mycard,$myOffItem,"o");
		$myOffPower2 = $fightManager->calcFightPower($mycard,$myDefItem,"o");

		//入力:補正後防御力、補正後家来数、保有アイテム(otOff、otDef)
		//保有しているアイテムを　kbn=1　のリストを取得
		//1Rから5Rの家来数と照らして　防御力順ソートで武器防御力を計算
		//保有しているアイテムを　kbn=2　のリストを取得
		//1Rから5Rの家来数と照らして　防御力順ソートで防具防御力を計算
		//結果:1R-5Rまでの防御力
		$otDefPower1 = $fightManager->calcFightPower($otcard,$otOffItem,"d");
		$otDefPower2 = $fightManager->calcFightPower($otcard,$otDefItem,"d");


$log .= "myBUKIkogeki:".print_r($myOffPower1,true)."\n";
$log .= "myBOGUkogeki:".print_r($myOffPower2,true)."\n";
$log .= "otBUKIbougyo:".print_r($otDefPower1,true)."\n";
$log .= "otBOGUbougyo:".print_r($otDefPower2,true)."\n";


		//値の補正
		for ($r = 1; $r <= 5; $r++) {
			$mb  = "mbid".$r;
			$ob  = "obid".$r;
			$mlv = "mlv".$r;
			$olv = "olv".$r;
			$fight[$mb]  = $myDispCard[$r]['bushoid'];
			$fight[$ob]  = $otDispCard[$r]['bushoid'];
			$fight[$mlv] = $myDispCard[$r]['level'];
			$fight[$olv] = $otDispCard[$r]['level'];
			$myOffP[$r] = $myOffPower1[$r] + $myOffPower2[$r] + $mycard[$r]['offense'] * 100;
			$otDefP[$r] = $otDefPower1[$r] + $otDefPower2[$r] + $otcard[$r]['defense'] * 100;
		}


$log .= "KOGEKI-RYOKU:".print_r($myOffP,true)."\n";
$log .= "BOUGYO-RYOKU:".print_r($otDefP,true)."\n";
file_put_contents($filename, $log, FILE_APPEND);

		//ファイト判定
		$winN  = 0;
		$loseN = 0;
		for ($r = 1; $r <= 5; $r++) {
			$di = "damage".$r;
			//服部半蔵 用
			//服部半蔵(bushoseq29)攻撃 (11/1/14)
			if( $mycard[$r]['fight'] == 1 ){
				$fight[$r] = 1;
				$fight[$di] = $myOffP[$r];
				$winN++;
				/*if($winN == 3){
					$ext = $r;
					$r   = 6;
				}*/
			//服部半蔵(bushoseq29)防御 (11/1/14)
			}elseif( $otcard[$r]['fight'] == 1 && $mycard[$r]['fight'] != 1){
					$fight[$r] = 2;
					$fight[$di] = $otDefP[$r];
					$loseN++;
			}else{
				if( $myOffP[$r]  >= $otDefP[$r] ){
					$fight[$r] = 1;
					$fight[$di] = $myOffP[$r];
					$winN++;
					/*if($winN == 3){
						$ext = $r;
						$r   = 6;
					}*/
				}else{
					$fight[$r] = 2;
					$fight[$di] = $otDefP[$r];
					$loseN++;
					/*if($loseN == 3){
						$ext = $r;
						$r   = 6;
					}*/
				}
			}
		}

		$fight['formno']	= $my_profile['formno'];
		$fight['ot_formno'] = $ot_profile['formno'];

		//げんき　5 固定を使う
		$spd['genki'] = $regGenki;
		//経験値＞勝:相手レベル数値の±10%の範囲　負:変動無し
		//$spd['exp'] = mt_rand( $ot_profile['level'] *0.9,$ot_profile['level'] *1.1);
		$spd['exp'] = $spd['exp'] = 2 + mt_rand(floor($ot_profile['level'] * 0.2), floor($ot_profile['level'] * 0.4));
		//小判＞　勝:相手所持金の5%～10%の範囲でプラス  負:自分所持金の5%～10%の範囲でマイナス
		$user = array();
		$otUser = array();
		$user["memberid"] = $member_id;
		$user["genki_rcv_time"]  = $userManager->getGenkiRcvTime($member_id , $spd['genki']);	//消費するgenkiの値をセット
		$otUser["memberid"] = $other_id;

		if($winN >= 3){
			$winner = 1;
			$user["exp"] = $my_profile['exp'] + $spd['exp'];
			//m_exp_level　levelid からexp(閾値)を取得
			$nextExp = $userManager->getNextExpContByLevel($my_profile['level']);
			//経験値の差分計算(LEVELUPの判断）
			$diffExp = $nextExp - $user['exp'];

			//LVupの判定　同じは省き、結果閾値を上回る際のみに変更 (110112)
			//if($diffExp <= 0 ){
			if($diffExp < 0 ){
				//げんき回復(101230)
				$user["genki_rcv_time"] = date("Y-m-d H:i:s", mktime());
				$nxtFlg = 0;
			}
			$user["level"] = $userManager->getLevelContByExp($user["exp"]);
			$spd['money'] = mt_rand( $ot_profile['money'] *0.05,$ot_profile['money'] *0.1);
			$user["money"] = $my_profile['money'] + $spd['money'];
			if($help_id != ""){
				$user["win_hlp"] = $my_profile['win_hlp'] + 1;
			}else{
				$user["win_act"] = $my_profile['win_act'] + 1;
			}
			$otUser["lose_pas"] = $ot_profile['lose_pas'] + 1;
		}else{
			$winner = 2;

			$spd['exp'] = 0;
			$spd['money'] = mt_rand( $my_profile['money'] *0.05,$my_profile['money'] *0.1);
			$user["money"] = $my_profile['money'] - $spd['money'];
			if($help_id != ""){
				$user["lose_hlp"] = $my_profile['lose_hlp'] + 1;
			}else{
				$user["lose_act"] = $my_profile['lose_act'] + 1;
			}
			$otUser["win_pas"] = $ot_profile['win_pas'] + 1;
		}

	}elseif($winner == 3){	//護符設定の場合
			//げんき　5 固定を使う
			$spd['genki'] = $regGenki;
			$user = array();
			$otUser = array();
			$user["memberid"] = $member_id;
			$user["genki_rcv_time"]  = $userManager->getGenkiRcvTime($member_id , $spd['genki']);	//消費するgenkiの値をセット
			$otUser["memberid"] = $other_id;
			$spd['money'] = mt_rand( $my_profile['money'] *0.05,$my_profile['money'] *0.1);
			$user["money"] = $my_profile['money'] - $spd['money'];
			if($help_id != ""){
				$user["lose_hlp"] = $my_profile['lose_hlp'] + 1;
			}else{
				$user["lose_act"] = $my_profile['lose_act'] + 1;
			}
			$otUser["win_pas"] = $ot_profile['win_pas'] + 1;
	}

		$ret0 = $fightManager->writeResults($member_id, $other_id, $tr_id, $help_id, $ddn, $times, $winner, $winN, $loseN, $spd, $user, $otUser, $fight, $crashItemId, $ss_id);
		if($ret0 === False){
			return 'error_sys';
		}
		//助太刀が既に完了している場合、お宝が既にない場合、コンプした場合 値を返却
		$this->af->setApp("ret0", $ret0);

		//助太刀が既に完了している場合
		if($ret0['friendid'] != ""){
			$already = $userManager->getSimpleProfile($ret0['friendid']);
			$this->af->setApp("already", $already);
		}
		//お宝+アイテム消費表示
		if($winner == 1){
			if($help_id == ""){
				if($ret0['restNum'] >= 0){
					$crash = $itemManager->getItemData($crashItemId);
					$this->af->setApp("crash", $crash);
				}
			}else{			//お宝プレゼント
				$fr_profile = $userManager->getSimpleProfile($help_id);
				$this->af->setApp("fr_profile", $fr_profile);
			}
			//お宝個別情報
			if($tr_id > 0){
				$tr = $treasureManager->TrDtInfo($tr_id);
				$sr = $treasureManager->TrSeriInfo($tr['tr_seriesid']);
				$this->af->setApp("tr", $tr);
				$this->af->setApp("sr", $sr);
			}
		}elseif($winner == 2){
			if($help_id == ""){
				if($ret0['restNum'] >= 0){
					$crash = $itemManager->getItemData($crashItemId);
					$this->af->setApp("crash", $crash);
				}
			}
			//助太刀依頼が出せるかCHK
			if($tr_id != ""){
				$comp = $treasureManager->chkTrSeriesComp($member_id,$tr_id);
				$this->af->setApp("comp", $comp);
			}
		}

		if( $my_profile['formno'] > 0){
			$dispMyForm	= $cardManager->getFormAtt($my_profile['formno']);
			$this->af->setApp("dispMyForm", $dispMyForm);
		}
		if( $ot_profile['formno'] > 0){
			$dispOtForm	= $cardManager->getFormAtt($ot_profile['formno']);
			$this->af->setApp("dispOtForm", $dispOtForm);
		}

		$this->af->setApp("myDispCard", $myDispCard);
		$this->af->setApp("otDispCard", $otDispCard);
		$this->af->setApp("fight", $fight);
		$this->af->setApp("winN", $winN);
		$this->af->setApp("loseN", $loseN);
		$this->af->setApp("ext", $ext);
		$this->af->setApp("spd", $spd);
		$this->af->setApp("oid", $other_id);
		$this->af->setApp("ts", $times + 1);
		$this->af->setApp("myOffP", $myOffP);
		$this->af->setApp("otDefP", $otDefP);
		$this->af->setApp("diffExp", $nxtFlg);

		if($winner == 3){
			return 'fight_trap';
		}else{			
			if($nxtFlg == 0){
				//現在のLVとEXPを暗号化
				$profNew = $userManager->getProfile($member_id);
				$c = new Crypt();
				$dat = sprintf("%03d", $profNew['level']).sprintf("%08d", $profNew['exp']).$member_id;
				$fg = $c->encrypt($dat);
				$this->af->setApp("fg", $fg);
				$ssid = $userManager->getSsId();
				$this->af->setApp("ssid", $ssid);
			}
			return 'fight_result';
		}

	}//reload NO

	}
}

?>
