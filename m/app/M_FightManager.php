<?php
/**
 *  M_FightManager.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  M_FightManager
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */

class M_FightManager extends M_Manager
{


    /**
    * カードファイト情報取得(t_cardとm_bushoから必要情報取得)
    *
    */
    function getFightCardInfo($member_id , $seq ){
        $member_id = mysql_real_escape_string($member_id);
        $seq = mysql_real_escape_string($seq);

$sql = <<<EOD
SELECT
  t_card.cardseq
 ,t_card.bushoid
 ,t_card.level
 ,t_card.offense
 ,t_card.defense
 ,t_card.follower
 ,m_busho.seq
 ,m_busho.rank
 ,m_busho.rank_num
 ,m_busho.gender
 ,m_busho.sec_kbn
 ,m_busho.type
 ,m_busho.cond1
 ,m_busho.cond2
 ,m_busho.cond3
 ,m_busho.to1
 ,m_busho.pw1
 ,m_busho.sign1
 ,m_busho.perc1
 ,m_busho.lv1
 ,m_busho.to2
 ,m_busho.pw2
 ,m_busho.sign2
 ,m_busho.perc2
 ,m_busho.lv2
 ,m_busho.to3
 ,m_busho.pw3
 ,m_busho.sign3
 ,m_busho.perc3
 ,m_busho.lv3 
FROM
 t_card 
INNER JOIN
 m_busho 
ON
 t_card.bushoid = m_busho.bushoid 
WHERE
 t_card.memberid = {$member_id} 
AND
 t_card.cardseq  = {$seq}
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getRow($sql);

        if(Ethna::isError($rs) || $rs === false){
            return "";
        }

        return $rs;

    }

    /**
    * 陣形効果＋奥義効果補正　補正した攻撃、防御、家来数をレス
    *
    */
    function getEffectedCardInfo($member_id, $other_id, $mycard, $otcard, $my_formno, $ot_formno,$ogi="" ){

		//発動条件はあくまで補正前のO,F,D
		$orgMyCard = $mycard;
		$orgOtCard = $otcard;

        //陣形効果(my1ot2)
		for ($i = 1; $i <= 2; $i++) {
			if($i == 1){
				$formno = $my_formno;
				$FMcard = $mycard;
			}elseif($i == 2){
				$formno = $ot_formno;
				$FMcard = $otcard;
			}
			$form = $this->getFormEffect($formno);

			for ($n = 1; $n <= 2; $n++) {
				$to  = "to".$n;
				$min = "min".$n;
				$max = "max".$n;

				switch($form[$to]){
		                case "o":
		                    $pwr = "offense";
							$FMcard[$pwr] = $FMcard[$pwr] + $FMcard[$pwr] * mt_rand($form[$min] ,$form[$max])/100;
							$FMcard[$pwr] = (int)$FMcard[$pwr];
		                    break;
		                case "d":
		                    $pwr = "defense";
							$FMcard[$pwr] = $FMcard[$pwr] + $FMcard[$pwr] * mt_rand($form[$min] ,$form[$max])/100;
							$FMcard[$pwr] = (int)$FMcard[$pwr];
		                    break;
		                case "f":
		                    $pwr = "follower";
							$FMcard[$pwr] = $FMcard[$pwr] + $FMcard[$pwr] * mt_rand($form[$min] ,$form[$max])/100;
							$FMcard[$pwr] = (int)$FMcard[$pwr];
		                    break;
		                default:
		                    //それ以外
		                    $pwr = "";
		                    break;
		        }
			}

			if($i == 1){
				$mycard = $FMcard;
			}elseif($i == 2){
				$otcard = $FMcard;
			}
		}

		//奥義効果(my1ot2)
		for ($i = $ogi; $i <= 2; $i++) {
			if($i == 1){
				//比較用
				$CMP_card   = $orgMyCard;
				$CMP_OPcard = $orgOtCard;
				//補正用
				$card   = $mycard;
				$OPcard = $otcard;
			}elseif($i == 2){
				//比較用
				$CMP_card   = $orgOtCard;
				$CMP_OPcard = $orgMyCard;
				//補正用
				$card   = $otcard;
				$OPcard = $mycard;
			}

			//条件1～3を判定
			for ($c = 1; $c <= 3; $c++) {

				$cdtn  = "cond".$c;
				$to    = $card["to".$c];
				$pw    = $card["pw".$c];
				$sign  = $card["sign".$c];
				$perc  = $card["perc".$c];
				$lv    = $card["lv".$c];

				//エフェクト算出
				switch($card[$cdtn]){
	                case 1:
	                    //常に
							//$rvCard	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
							//$card,$OPcard を戻り値として扱う
							list($card,$OPcard) = $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
	                    break;
	                case 2:
	                    //自分の攻撃力＞相手の攻撃力
	                    if($CMP_card['offense'] > $CMP_OPcard['offense']){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 3:
	                    //自分の攻撃力＜相手の攻撃力
	                    if($CMP_card['offense'] < $CMP_OPcard['offense']){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 4:
	                    //自分の防御力＞相手の防御力
	                    if($CMP_card['defense'] > $CMP_OPcard['defense']){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 5:
	                    //自分の防御力＜相手の防御力
	                    if($CMP_card['defense'] < $CMP_OPcard['defense']){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 6:
	                    //自分の家来数＞相手の家来数
	                    if($CMP_card['follower'] > $CMP_OPcard['follower']){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 7:
	                    //自分の家来数＜相手の家来数
	                    if($CMP_card['follower'] < $CMP_OPcard['follower']){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 8:
	                    //自分のrank＞相手のrank
	                    if($CMP_card['rank_num'] > $CMP_OPcard['rank_num']){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 9:
	                    //自分のrank＜相手のrank
	                    if($CMP_card['rank_num'] < $CMP_OPcard['rank_num']){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 10:
	                    //相手が武将(m_bushoのtypeが1)
						if( $CMP_OPcard['type'] == 1){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 11:
	                    //相手が魔将(m_bushoのtypeが2)
						if( $CMP_OPcard['type'] == 2){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 12:
	                    //相手が男
	                    if( $CMP_OPcard['gender'] == 1){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 13:
	                    //相手が女
	                   	if( $CMP_OPcard['gender'] == 2){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 14:
	                    //相手の奥義タイプが「攻」
	                   if( $CMP_OPcard['sec_kbn'] == 1){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 15:
	                    //相手の奥義タイプが「守」
	                   if( $CMP_OPcard['sec_kbn'] == 2){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 16:
	                    //相手の奥義タイプが「特」
	                   if( $CMP_OPcard['sec_kbn'] == 3){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 17:
	                    //(80+sec_level*1)%の確率
						$ranNum = mt_rand(0,100);
						$maxNum = 80 + $card['level'] * 1;
	                   if( $ranNum <= $maxNum ){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 18:
	                    //(60+sec_level*0.5)%の確率
						$ranNum = mt_rand(0,100);
						$maxNum = 60 + $card['level'] * 0.5;
	                   if( $ranNum <= $maxNum ){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 19:
	                    //(40+sec_level*0.5)%の確率
						$ranNum = mt_rand(0,100);
						$maxNum = 40 + $card['level'] * 0.5;
	                   if( $ranNum <= $maxNum ){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 20:
	                    //(25+sec_level*0.5)%の確率
						$ranNum = mt_rand(0,100);
						$maxNum = 25 + $card['level'] * 0.5;
	                   if( $ranNum <= $maxNum ){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 21:
	                    //(10+sec_level*0.5)%の確率
						$ranNum = mt_rand(0,100);
						$maxNum = 10 + $card['level'] * 0.5;
	                   if( $ranNum <= $maxNum ){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 22:
	                    //(80+sec_level*1)%の確率
						$ranNum = mt_rand(0,100);
						$maxNum = 80 + $card['level'] * 1;
	                   if( $ranNum <= $maxNum ){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 23:
	                    //(60+sec_level*1)%の確率
						$ranNum = mt_rand(0,100);
						$maxNum = 60 + $card['level'] * 1;
	                   if( $ranNum <= $maxNum ){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 24:
	                    //(45+sec_level*0.5)%の確率
						$ranNum = mt_rand(0,100);
						$maxNum = 45 + $card['level'] * 0.5;
	                   if( $ranNum <= $maxNum ){
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	                case 25:
	                    //自分が攻撃側で相手が男
	                    if( $otcard['gender'] == 1){	//$otcardで正しい
							list($card,$OPcard)	= $this->getRevisedPower($to,$pw,$sign,$perc,$lv,$card,$OPcard);
						}
	                    break;
	               default:
	                    //それ以外(異常値)
	                    $ret = -1;
	                    break;
				}


			}
			//条件1～3のFOR文 END

			if($i == 1){
				$mycard = $card;
				$otcard = $OPcard;
			}elseif($i == 2){
				$mycard = $OPcard;
				$otcard = $card;
			}

		}

		$mycard['offense']  = (int)$mycard['offense'];
		$mycard['defense']  = (int)$mycard['defense'];
		$mycard['follower'] = (int)$mycard['follower'];
		$otcard['offense']  = (int)$otcard['offense'];
		$otcard['defense']  = (int)$otcard['defense'];
		$otcard['follower'] = (int)$otcard['follower'];

        return array( $mycard, $otcard);

    }

    /**
     * 補正値計算
     *
     */
    function getRevisedPower($to,$pw,$sign,$perc,$lv,$my,$ot){

		switch($pw){
                case "o":
                    $pwr = "offense";
                    break;
                case "d":
                    $pwr = "defense";
                    break;
                case "f":
                    $pwr = "follower";
                    break;
                default:
                    //それ以外
                    $pwr = "";
                    break;
        }

		switch($to){
                case "my":
					if($sign == "up"){
						$my[$pwr] = $my[$pwr] + $my[$pwr] * ($perc + $my['level'] * $lv)/100;
					}elseif($sign == "down"){
						$my[$pwr] = $my[$pwr] - $my[$pwr] * ($perc + $my['level'] * $lv)/100;
					}
					$my[$pwr] = (int)$my[$pwr];
                    break;
                case "ot":
					if($sign == "up"){
						$ot[$pwr] = $ot[$pwr] + $ot[$pwr] * ($perc + $my['level'] * $lv)/100;
					}elseif($sign == "down"){
						$ot[$pwr] = $ot[$pwr] - $ot[$pwr] * ($perc + $my['level'] * $lv)/100;
					}
					$ot[$pwr] = (int)$ot[$pwr];
                    break;
                case "ex":
                    //入替
					$tp[$pwr] = $my[$pwr];
					$my[$pwr] = $ot[$pwr];
					$ot[$pwr] = $tp[$pwr];
                    break;
                case "otLV1":
                    //相手のlvを1に換算
					$ot['level'] = 1;
                    break;
                case "win":
					//服部半蔵型 保有している側に勝利フラグ
					$my['fight'] = 1;
                    break;
                default:
                    //それ以外
                    break;
        }

		/*
		$rs['my']['offense']  = $my['offense'];
		$rs['my']['defense']  = $my['defense'];
		$rs['my']['follower'] = $my['follower'];

		$rs['ot']['offense']  = $ot['offense'];
		$rs['ot']['defense']  = $ot['defense'];
		$rs['ot']['follower'] = $ot['follower'];
		*/

        return array( $my, $ot);
    }

    /**
     * ファイトパワー計算
     *
     */
    function calcFightPower($card , $item ,$mode ){

		//modeは　攻撃か防御かどちらか
		if($mode == "o"){
			$pw = "offense";
		}elseif($mode == "d"){
			$pw = "defense";
		}
		
		//itemの配列数
		$itemRec = count($item);
		//比較対象アイテムの配列番号
		$cur = 0;

		for ($r = 1; $r <= 5; $r++) {
			$power[$r] = 0;
			//加算しない
			//$power[$r] = $card[$r][$pw] ;

			for ($i = $cur; $i < $itemRec; $i++) {

				if($card[$r]['follower']  <=  $item[$i]['num'] ){

					$power[$r] += $item[$i][$pw] * $card[$r]['follower'];
					$item[$i]['num'] = $item[$i]['num'] - $card[$r]['follower'];

					//アイテム使用
					$useitem[$cur] += $card[$r]['follower'];

					$cur = $i;
					$i = $itemRec;	//forループを抜ける

				}else{

					$power[$r] += $item[$i][$pw] * $item[$i]['num'];
					$card[$r]['follower'] =  $card[$r]['follower'] - $item[$i]['num'] ;

					//アイテム使用
					$useitem[$cur] += $item[$i]['num'];

					$cur = $i + 1;

				}

			}

		}

/*
		var_dump($useitem);
		echo "<br>---------------------<br>";

		//アイテム使用処理を呼出

*/

		

        return $power;

    }

   /**
    * 陣形効果取得
    *
    */
    function getFormEffect($no){
        $no = mysql_real_escape_string($no);

$sql = <<<EOD
SELECT
  formno
 ,to1
 ,min1
 ,max1
 ,to2
 ,min2
 ,max2
FROM
 m_form
WHERE
 formno = {$no}
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getRow($sql);

        if(Ethna::isError($rs) || $rs === false){
            return 0;
        }

        return $rs;

    }

	/**
     * ファイト重複チェック 仕掛け：勝⇒1回まで　仕掛け：負⇒3回まで
     *
     */

    function isDuplicateFight($member_id ,$other_id){
        $member_id = mysql_real_escape_string($member_id);
        $other_id = mysql_real_escape_string($other_id);

        $d = date('d');
		$ddf = sprintf("%02d", $d)."1";		//1回目ファイトを調査
		$dds = sprintf("%02d", $d)."2";		//2回目ファイトを調査
		$ddt = sprintf("%02d", $d)."3";		//3回目ファイトを調査

$sql = <<<EOD
SELECT
 winner
FROM
 lg_fight
WHERE
 memberid = '{$member_id}'
AND
 otherid = '{$other_id}'
AND
 ddn = '{$ddf}'
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getOne($sql);
        if(Ethna::isError($rs) ){
            return False;
        }
        if( $rs === False){
			$fin = 0;
        }elseif($rs == 1){	//winner=1   仕掛け：勝
			$fin = 4;
		}else{				//winner=2,3 仕掛け：負

$sql2 = <<<EOD
SELECT
 winner
FROM
 lg_fight
WHERE
 memberid = '{$member_id}'
AND
 otherid = '{$other_id}'
AND
 ddn = '{$dds}'
EOD;
	        $db = $this->backend->getDb();
	        $rs2 = $db->getOne($sql2);
	        if(Ethna::isError($rs2)){
	            return False;
	        }
        	if( $rs2 === False){
				$fin = 1;
    	    }elseif($rs2 == 1){	//winner=1   仕掛け：勝
				$fin = 4;
			}else{				//winner=2,3 仕掛け：負

$sql3 = <<<EOD
SELECT
 winner
FROM
 lg_fight
WHERE
 memberid = '{$member_id}'
AND
 otherid = '{$other_id}'
AND
 ddn = '{$ddt}'
EOD;
		        $db = $this->backend->getDb();
		        $rs3 = $db->getOne($sql3);
		        if(Ethna::isError($rs3) ){
		            return False;
		        }
        		if( $rs3 === False){
					$fin = 2;
	    	    }else{		//3回目は勝敗関係なし
					$fin = 3;
				}
			}

		}

        return $fin;

    }


	/**
     * ファイト結果記録
     *
     */
    function writeResults($member_id,$other_id,$tr_id,$help_id,$org,$times,$winner,$winN,$loseN,$spd,$user,$otUser,$fight,$item_id,$ss_id){

        $userManager = $this->backend->getManager("User");
        $friendManager = $this->backend->getManager("Friend");
		$itemManager = $this->backend->getManager("Item");
		$cardManager = $this->backend->getManager("Card");
        $lgManager = $this->backend->getManager("Lg");
		//勝敗に応じた結果を書き込み -> t_fight 攻撃側のみUPD lg_fight lg_eventまで全て help_id有->ニコニコP
		//お宝処理　通常->攻撃側　help_id有->依頼主に
		//item 使用	助太刀以外：ランダムで保有アイテムを1つ選らんでtimes を-1
        $member_id = mysql_real_escape_string($member_id);
        $other_id = mysql_real_escape_string($other_id);
        $tr_id = mysql_real_escape_string($tr_id);
        $help_id = mysql_real_escape_string($help_id);
        $org = mysql_real_escape_string($org);
        $times = mysql_real_escape_string($times);
        $winner = mysql_real_escape_string($winner);
        $winN = mysql_real_escape_string($winN);
        $loseN = mysql_real_escape_string($loseN);
        $item_id = mysql_real_escape_string($item_id);
        $ss_id = mysql_real_escape_string($ss_id);

		$times = $times + 1;
        //$ym = date('Ym');
        $ddn = sprintf("%02d", date('d')).$times;

        //トランザクション開始
        $db = $this->backend->getDb();
        $ret = $db->query('START TRANSACTION');
        if($ret == False){
            return False;
        }

		$mydeck = $userManager->getDeckProfile($member_id);
		$otdeck = $userManager->getDeckProfile($other_id);
		//t_fight 2レコード+lg_event書込
		if($winner == 1){
			for ($r = 1; $r <= 5; $r++) {
				$myd = "deck".$r;
				$myCard[$r]['memberid'] = $member_id;
				$myCard[$r]['cardseq']  = $mydeck[$myd];
				$myCard[$r]['win_f']    = 1;
				$retmyCupd[$r] = $cardManager->updateCardStatus($myCard[$r]);
				$otd = "deck".$r;
				$otCard[$r]['memberid'] = $other_id;
				$otCard[$r]['cardseq']  = $otdeck[$otd];
				$otCard[$r]['lose_f']    = 1;
				$retotCupd[$r] = $cardManager->updateCardStatus($otCard[$r]);
			}

			$ret2 = $lgManager->writeEventLog($other_id,$member_id ,$stat="1",$ddn,$other="",$loseN,$winN,$tr_id);//1:敗北
			//該当お宝がまだあるかCHK
			$treasureManager = $this->backend->getManager("Treasure");
			if($tr_id == ""){
				$exists = 1;
			}else{
				$exists	= $treasureManager->getTrindOwn($other_id,$tr_id,0);
			}
			//お宝が存在している場合、お宝移動
			if($tr_id != "" && $exists > 0){
				$ret1 = $this->writeFightStatus($member_id ,$other_id,$win="1",$lose="0",$tr_id);
				if($help_id == ""){
					//お宝コンプリートかCHK
					$comp = $treasureManager->chkTrSeriesComp($member_id,$tr_id);
					if($comp == 1){
						$getTr = $treasureManager->TrDtInfo($tr_id);
						$getSr = $treasureManager->TrSeriInfo($getTr['tr_seriesid']);
				        $profile = $userManager->getProfile($member_id);
						//ご褒美アイテム
						$getItem = $itemManager->getItemData($getSr['itemid']);
						//リアリティ処理
						$after = $itemManager->getMaxPower($member_id,$getSr['itemid']);
		        		//アイテム購入処理
				        $retCpItem = $itemManager->buyItem($member_id ,$getSr['itemid'],$getItem['kbn'],$amount="1",$getItem['rest'],$price=0,$after['buki_off'],$after['buki_def'],$after['bougu_off'],$after['bougu_def'],$profile['lg_dest'],$ss_id ,$payment_id="",$status="");
						$retCp = $lgManager->writeFriendLog($member_id ,$status="1",$stage="",$getTr['tr_seriesid'],$tr_id,$seq="",$rank="");
					}else{
						$retCpItem = $userManager->updSession($member_id ,$ss_id);
						$retCp = True;
					}
					$ret3 = $treasureManager->trPresent($other_id,$member_id,$tr_id,$nicoP="0");
					$retEv = True;
				}else{		//助太刀勝利
					//お宝コンプリートかCHK
					$comp = $treasureManager->chkTrSeriesComp($help_id,$tr_id);
					if($comp == 1){
						$getTr = $treasureManager->TrDtInfo($tr_id);
						$getSr = $treasureManager->TrSeriInfo($getTr['tr_seriesid']);
				        $profile = $userManager->getProfile($help_id);
						//ご褒美アイテム
						$getItem = $itemManager->getItemData($getSr['itemid']);
						//リアリティ処理
						$after = $itemManager->getMaxPower($help_id,$getSr['itemid']);
		        		//アイテム購入処理
				        $retCpItem = $itemManager->buyItem($help_id ,$getSr['itemid'],$getItem['kbn'],$amount="1",$getItem['rest'],$price=0,$after['buki_off'],$after['buki_def'],$after['bougu_off'],$after['bougu_def'],$profile['lg_dest'],$ss_id ,$payment_id="",$status="");
						$retCp = $lgManager->writeFriendLog($help_id ,$status="1",$stage="",$getTr['tr_seriesid'],$tr_id,$seq="",$rank="");
					}else{
						$retCpItem = $userManager->updSession($member_id ,$ss_id);
						$retCp = True;
					}
					$ret3 = $treasureManager->trPresent($other_id,$help_id,$tr_id,$nicoP="0");	//助太刀勝利
					//もらった方に伝令
					$retEv = $lgManager->writeEventLog($help_id,$member_id ,$stat="C",$id="",$other_id,$win="",$lose="",$tr_id);
				}
			}else{
				$ret1 = $this->writeFightStatus($member_id ,$other_id,$win="1",$lose="0",$tr_id="");
				$ret3 = True;
				$retEv = True;
				$retCpItem = $userManager->updSession($member_id ,$ss_id);
				$retCp = True;
			}
			//助太刀勝利　ニコニコP付与
			if($help_id != ""){
				$ret4 = $friendManager->setNicoPoint($member_id ,$help_id,$nicoP="4",$kbn="win");
				$ret5 = -1;
				$ret8 = $lgManager->updateHelpLog($help_id ,$other_id,$org,$member_id,$winner);
			}else{
				$ret4 = True;
				//アイテムが壊れる
				if($item_id > 0){
					$ret5 = $itemManager->useMyItem($member_id,$item_id,$useTime="1");
				}else{
					$ret5 = -1;
				}
				$ret8 = True;
			}
		}elseif($winner == 2 || $winner == 3){
			for ($r = 1; $r <= 5; $r++) {
				$myd = "deck".$r;
				$myCard[$r]['memberid'] = $member_id;
				$myCard[$r]['cardseq']  = $mydeck[$myd];
				$myCard[$r]['lose_f']    = 1;
				$retmyCupd[$r] = $cardManager->updateCardStatus($myCard[$r]);
				$otd = "deck".$r;
				$otCard[$r]['memberid'] = $other_id;
				$otCard[$r]['cardseq']  = $otdeck[$otd];
				$otCard[$r]['win_f']    = 1;
				$retotCupd[$r] = $cardManager->updateCardStatus($otCard[$r]);
			}
			$ret1 = $this->writeFightStatus($member_id ,$other_id,$win="0",$lose="1",$tr_id="");
			$ret2 = $lgManager->writeEventLog($other_id,$member_id ,$stat="0",$ddn,$other="",$loseN,$winN,$tr_id);//0:撃退
			//助太刀敗北　ニコニコP付与
			if($help_id != ""){
				$ret4 = $friendManager->setNicoPoint($member_id ,$help_id,$nicoP="1",$kbn="lose");
				$ret5 = -1;
				$ret8 = $lgManager->updateHelpLog($help_id ,$other_id,$org,$member_id,$winner);
			}else{
				$ret4 = True;
				if($winner == 2){		//アイテムが壊れる
					if($item_id > 0){
						$ret5 = $itemManager->useMyItem($member_id,$item_id,$useTime="1");
					}else{
						$ret5 = -1;
					}
				}elseif($winner == 3){
					$ret5 = -1;
				}
				$ret8 = True;
			}
			$ret3  = True;
			$retEv = True;
			$retCpItem = $userManager->updSession($member_id ,$ss_id);
			$retCp = True;
		}

        $ret6 = $userManager->updateUser($user);
        $ret7 = $userManager->updateUser($otUser);

//lg_fightへ書き込み
$sql = <<<EOD
INSERT INTO
 lg_fight
(
  ddn
 ,memberid
 ,otherid
 ,friendid
 ,trid
 ,winner
 ,win
 ,lose
 ,exp
 ,money
 ,genki
 ,formno
 ,ot_formno
 ,winner1
 ,winner2
 ,winner3
 ,winner4
 ,winner5
 ,bushoid1
 ,bushoid2
 ,bushoid3
 ,bushoid4
 ,bushoid5
 ,ot_bushoid1
 ,ot_bushoid2
 ,ot_bushoid3
 ,ot_bushoid4
 ,ot_bushoid5
 ,level1
 ,level2
 ,level3
 ,level4
 ,level5
 ,ot_level1
 ,ot_level2
 ,ot_level3
 ,ot_level4
 ,ot_level5
 ,damage1
 ,damage2
 ,damage3
 ,damage4
 ,damage5
 ,reg_time
)
VALUES
(
  '{$ddn}'
 ,'{$member_id}'
 ,'{$other_id}'
 ,'{$help_id}'
 ,'{$tr_id}'
 ,'{$winner}'
 ,'{$winN}'
 ,'{$loseN}'
 ,'{$spd["exp"]}'
 ,'{$spd["money"]}'
 ,'{$spd["genki"]}'
 ,'{$fight["formno"]}'
 ,'{$fight["ot_formno"]}'
 ,'{$fight["1"]}'
 ,'{$fight["2"]}'
 ,'{$fight["3"]}'
 ,'{$fight["4"]}'
 ,'{$fight["5"]}'
 ,'{$fight["mbid1"]}'
 ,'{$fight["mbid2"]}'
 ,'{$fight["mbid3"]}'
 ,'{$fight["mbid4"]}'
 ,'{$fight["mbid5"]}'
 ,'{$fight["obid1"]}'
 ,'{$fight["obid2"]}'
 ,'{$fight["obid3"]}'
 ,'{$fight["obid4"]}'
 ,'{$fight["obid5"]}'
 ,'{$fight["mlv1"]}'
 ,'{$fight["mlv2"]}'
 ,'{$fight["mlv3"]}'
 ,'{$fight["mlv4"]}'
 ,'{$fight["mlv5"]}'
 ,'{$fight["olv1"]}'
 ,'{$fight["olv2"]}'
 ,'{$fight["olv3"]}'
 ,'{$fight["olv4"]}'
 ,'{$fight["olv5"]}'
 ,'{$fight["damage1"]}'
 ,'{$fight["damage2"]}'
 ,'{$fight["damage3"]}'
 ,'{$fight["damage4"]}'
 ,'{$fight["damage5"]}'
 ,now()
)
EOD;

        $db = $this->backend->getDb();
        $ret9 = $db->query($sql);

        if($ret1 === False || $ret2 === False || $ret3 === False || $ret4 === False || $ret5 === False || $ret6 === False || $ret7 === False || $ret8 === False || $ret9 === False || $retCpItem === False || $retCp === False || $retEv === False || $retmyCupd === False || $retotCupd === False ){
            $db->query('ROLLBACK');

			if($ret1 === False){
				$err['1'] = $ret1;
			}
			if($ret2 === False){
				$err['2'] = $ret2;
			}
			if($ret3 === False){
				$err['3'] = $ret3;
			}
			if($ret4 === False){
				$err['4'] = $ret4;
			}
			if($ret5 === False){
				$err['5'] = $ret5;
			}
			if($ret6 === False){
				$err['6'] = $ret6;
			}
			if($ret7 === False){
				$err['7'] = $ret7;
			}
			if($ret8 === False){
				$err['8'] = $ret8;
			}
			if($ret9 === False){
				$err['9'] = $ret9;
			}
			if($retCpItem === False){
				$err['10'] = $retCpItem;
			}
			if($retCp === False){
				$err['11'] = $retCp;
			}
			if($retEv === False){
				$err['12'] = $retCpEv;
			}
			return $err;
			//False
        }
        //トランザクション終了
        $ret = $db->query('COMMIT');
        if($ret === False){
            return False;
        }

		//助太刀済みの場合
		if($ret8['friendid'] != ""){
			$result['friendid']  = $ret8['friendid'];
			$result['entry_flg'] = $ret8['entry_flg'];
		}
		//アイテムが壊れたかの判定
		$result['restNum'] = $ret5;
		//お宝が既に無かった場合
		if($exists == 0){
			$result['trNotExists']  = 1;
		}
		//お宝コンプの場合
		if($getItem['itemid'] != ""){
			$result['itemid']   = $getItem['itemid'];
			$result['name']     = $getItem['name'];
			$result['expla']   = $getItem['expla'];
			$result['kbn']   = $getItem['kbn'];
			$result['offense']  = $getItem['offense'];
			$result['defense']  = $getItem['defense'];

		}

        return $result;

	}


    /**
    * ファイトテーブル記録	t_fightは攻撃側(能動)のみ記録
    *
    */

    function writeFightStatus($member_id ,$other_id,$win,$lose,$tr_id){

        $member_id = mysql_real_escape_string($member_id);
        $other_id = mysql_real_escape_string($other_id);
        //$win = mysql_real_escape_string($win);
        //$lose = mysql_real_escape_string($lose);
        $tr_id = mysql_real_escape_string($tr_id);
		$trNum = 0;

		//奪ったお宝の数
		if( $tr_id != ""){
			$trNum = 1;
		}
/*
echo "win=";
var_dump($win);
echo "<br>lose=";
var_dump($lose);
echo "<br>";
*/
		if($win == "1"){

$sql = <<<EOD
INSERT INTO
 t_fight
(
  memberid
 ,friendid
 ,win
 ,treasure
 ,reg_time
 ,upd_time
)
VALUES
(
  '{$member_id}'
 ,'{$other_id}'
 ,{$win}
 ,{$trNum}
 ,now()
 ,now()
) 
 ON DUPLICATE KEY UPDATE 
 win = win + 1 , treasure = treasure + {$trNum}
EOD;
//var_dump($sql);
        $db = $this->backend->getDb();
        $rs = $db->query($sql);
        if(Ethna::isError($rs) || $rs === false){
            return false;
        }

	}elseif($lose == "1"){

$sql = <<<EOD
INSERT INTO
 t_fight
(
  memberid
 ,friendid
 ,lose
 ,reg_time
 ,upd_time
)
VALUES
(
  '{$member_id}'
 ,'{$other_id}'
 ,{$lose}
 ,now()
 ,now()
) 
 ON DUPLICATE KEY UPDATE 
 lose = lose + 1 
EOD;
//var_dump($sql);
        $db = $this->backend->getDb();
        $rs = $db->query($sql);
        if(Ethna::isError($rs) || $rs === false){
            return false;
        }
	}

        return true;

    }


    /**
    * ファイト歴史取得
    *
    */
    function getFightHistory($member_id ,$friend_id){
        $member_id = mysql_real_escape_string($member_id);
        $escapedFriendId = mysql_real_escape_string($friend_id);

$sql = <<<EOD
SELECT 
  win
 ,lose
 ,treasure
FROM 
 t_fight
WHERE
 memberid = {$member_id}
AND
 friendid = '{$escapedFriendId}'
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getRow($sql);

        if(Ethna::isError($rs) || $rs === false){
            return False;
        }
		//レコード無
        if(count($rs) == 0){
			return False;
        }

        return $rs;

	}


}
?>
