<?php
/**
 *  Boss/Fight.php
 *
 *  @author	{$author}
 *  @package   M
 *  @version   $Id$
 */

class M_Form_BossFight extends M_ActionForm {
	/**
	 *  @access   private
	 *  @var	  array   form definition.
	 */
	var $form = array(
		'opensocial_owner_id' => array(),
		'ssid' => array(),
	);

}

class M_Action_BossFight extends M_ActionClass {
	/**
	 *  preprocess boss_fight action.
	 *
	 *  @access	public
	 *  @return	string  Forward name (null if no errors.)
	 */
	function prepare() {
		return parent::prepare();
	}

	/**
	 *  Fight action implementation.
	 *
	 *  @access	public
	 *  @return	string  Forward Name.
	 */
	function perform() {
		$userManager  = $this->backend->getManager('User');
		$questManager = $this->backend->getManager('Quest');
		$fightManager = $this->backend->getManager('Fight');
		$friendManager = $this->backend->getManager('Friend');
		$cardManager = $this->backend->getManager('Card');
		$itemManager = $this->backend->getManager('Item');
		$cardManager = $this->backend->getManager('Card');
		$lgManager = $this->backend->getManager('Lg');
		$swfmillManager = $this->backend->getManager('Swfmill');
		$domain = $this->config->get('url');
		$www = $domain['www'];
		$API = $domain['api'];
		$appId = $domain['appId'];

		$member_id = $this->af->get('opensocial_owner_id');
		$ss_id = $this->af->get('ssid');
		$profile = $userManager->getProfile($member_id);

		//ファイル満杯で受け取れない状態(status=3)のカードがあるかCHK
		$tbdCnt = $cardManager->getCardlistCount($member_id ,$status='3');
		if($tbdCnt > 0){
			$this->af->setApp('dotGo', '1');		//11/2/8
			$this->af->setApp('fg', 'fg');			//11/2/8
			$this->af->setApp('tbdCnt', $tbdCnt);
			$cntF = $cardManager->getCardlistCount($member_id ,$stF='1');
			$this->af->setApp('cntF', $cntF);
			//カードを特定
			$card = $cardManager->getCardInfo($member_id , $seq='' , $status='3');
			$this->af->setApp('card', $card);
			//m_bushoから必要事項取得
			$busho['0'] = $cardManager->getDispCardInfo($member_id , $card['cardseq']);
			$this->af->setApp('busho', $busho);
			$profile['card_seq'] = $card['cardseq'];
			$this->af->setApp('profile', $profile);
			$deck = $userManager->getDeckProfile($member_id);
			$this->af->setApp('deck', $deck);
			$this->af->setApp('orgFol', '0');
			$this->af->setApp('q', 'ms');
			//カード破棄用(ssid発行)
			$ssid = $userManager->getSsId();
			$this->af->setApp('ssid', $ssid);
			return 'quest_card';
		}

		$isReload = $userManager->isReload($member_id ,$ss_id);
		$this->af->setApp('isReload', $isReload);

		if($isReload == TRUE){
			return 'quest_reload';
		}else{
			//ステージサイクル
			$stagecycle = $profile['stage'].$profile['cl_cycle'];
			//魔将クリア数
			$clmasho = $profile['cl_masho'];

			//同盟効果の取得
			$cnt = $friendManager->getLegionlistCount($member_id);
			if($cnt > 0){
				$friend = $friendManager->getLegionlist($member_id,$profile['level']);
			}
			$coeff = $friend['0']['coeff'] + $friend['1']['coeff'];

			//ユーザ攻撃力　陣形効果×同盟効果×（t_card.offence×100＋t_card.followerの武器・防具リアリティ）
			//ユーザ防御力　陣形効果×同盟効果×（t_card.defence×100＋t_card.followerの武器・防具リアリティ）
			//ユーザ体力　　t_cerd.follower×100	※リアリティ処理の際のカード処理順はデッキの並び順。
			//1Rから5Rのカードcardseqを取得
			for ($r = 1; $r <= 5; $r++) {
				$myd = 'deck'.$r;
				$mycard[$r] = $fightManager->getFightCardInfo($member_id , $profile[$myd] );
				//陣形効果のみ適用(ogi=3)
				list($mycard[$r],$otcard[$r]) = $fightManager->getEffectedCardInfo($member_id , $member_id, $mycard[$r], $mycard[$r],$profile['formno'],$profile['formno'],$ogi='3');
//echo '<br>Aftermy:O='.$mycard[$r]['offense']  .':D='.$mycard[$r]['defense']  .':F='.$mycard[$r]['follower'];
			}
			//保有しているアイテムを取得(攻撃力)
			$myOffItem1 = $itemManager->getMyItems($member_id ,1 ,$unit='',$diff='',$limit='' ,$offset='');
			$myOffItem2 = $itemManager->getMyItems($member_id ,2 ,$unit='',$diff='1',$limit='' ,$offset='');
			//攻撃力計算
			$myOffPower1 = $fightManager->calcFightPower($mycard,$myOffItem1,'o');
			$myOffPower2 = $fightManager->calcFightPower($mycard,$myOffItem2,'o');
			//保有しているアイテムを取得(防御力)
			$myDefItem1 = $itemManager->getMyItems($member_id ,1 ,$unit='',$diff='1',$limit='' ,$offset='');
			$myDefItem2 = $itemManager->getMyItems($member_id ,2 ,$unit='',$diff='',$limit='' ,$offset='');
			//防御力計算
			$myDefPower1 = $fightManager->calcFightPower($mycard,$myDefItem1,'d');
			$myDefPower2 = $fightManager->calcFightPower($mycard,$myDefItem2,'d');

			//値の補正(同盟効果)
			for ($r = 1; $r <= 5; $r++) {
				$myOffP += floor(($myOffPower1[$r] + $myOffPower2[$r] + $mycard[$r]['offense'] * 100 ) * (1 + $coeff));
				$myDefP += floor(($myDefPower1[$r] + $myDefPower2[$r] + $mycard[$r]['defense'] * 100 ) * (1 + $coeff));
				//$myFol  += $mycard[$r]['follower'] * 100; (11/01/04)
				$myFol += floor($mycard[$r]['follower']  * (1 + $coeff) * 100);
			}

			//値の補正(陣形効果)
			$deck = $userManager->getDeckProfile($member_id);
			if($deck['formno'] > 0){
				$form = $cardManager->getFormAtt($deck['formno']);
				$jin['off'] = 0;
				$jin['def'] = 0;
				$jin['fol'] = 0;
				for ($n=1; $n<=2; $n++) {
					$toW  =  'to'.$n;
					$minW = 'min'.$n;
					if($form[$toW] == 'o'){
						$myOffP += floor($myOffP * $form[$minW] / 100);
					}elseif($form[$toW] == 'd'){
						$myDefP += floor($myDefP * $form[$minW] / 100);
					}elseif($form[$toW] == 'f'){
						$myFol  += floor($myFol  * $form[$minW] / 100);
					}
				}
			}

			$myFol = floor($myFol / 100) * 100;
			//魔将Powerは100倍
			$masho = $questManager->getMashoPower(substr($stagecycle,0,1),substr($stagecycle,1,1));
			$masho['offense']  = $masho['offense'] * 100;
			$masho['defense']  = $masho['defense'] * 100;

			//FLASH側へ渡す
			//攻撃側体力 $myFol
			//防御側体力
			$masho['follower'] = $masho['follower'] * 100;

			//ダメージ係数
			$dmC = $this->config->get('damageCoeff');
			//自分攻撃ダメージ＝（[攻]攻撃力－[防]防御力×0.5）×0.2
			$offDamage = floor(($myOffP - $masho['defense'] * 0.5) * 0.2);
			//自分クリティカルダメージ＝（[攻]攻撃力－[防]防御力×0.5）×0.2
			$offDamage2 = floor(($myOffP - $masho['defense'] * 0.5) * 0.5);
			//相手攻撃ダメージ＝（[防]攻撃力－[攻]防御力×0.5）×0.2
			$defDamage = floor(( $masho['offense'] - $myDefP * 0.5) * 0.2);
			//相手クリティカルダメージ＝（[防]攻撃力－[攻]防御力×0.5）× 0.5
			$defDamage2 = floor(( $masho['offense'] - $myDefP * 0.5) * 0.5);

			$critical_line1 = floor(max(250, $offDamage2) * 0.8);
			$critical_line2 = floor(max(250, $defDamage2) * 0.8);

			$turns = array();
			$is_my = rand(0, 1);
			$result = 0;
			$current_hp = array($masho['follower'], $myFol);

			$swfmillManager->boss_params = array(
				'hp1' => $myFol,
				'atk1' => $myOffP,
				'def1' => $myDefP,
				'n1' => rawurlencode($profile['handle']),
				'img1' => '/img/card/'.$profile['prof'].'_p.jpg',
				'hp2' => $masho['follower'],
				'atk2' => $masho['offense'],
				'def2' => $masho['defense'],
				'n2' => rawurlencode($masho['name']),
				'img2' => '/img/card/'.$masho['mashoid'].'_p.jpg',
				'd1' => $critical_line1,
				'd2' => $critical_line2,
				'm' => $is_my
			);

			while (! $result) {
				$enemy = $is_my ? 0 : 1;
				$damage = 0;
				$normal_attack = rand(1, 5) != 1;
				if ($is_my) {
					$damage = $normal_attack ? $offDamage : $offDamage2;
				} else {
					$damage = $normal_attack ? $defDamage : $defDamage2;
				}
				if ($normal_attack && $damage < 100) {
					$damage = 100;
				} else if ($normal_attack === FALSE && $damage < 250) {
					$damage = 250;
				}

				$damage = rand(floor($damage * 0.8), floor($damage * 1.2));

				$turns[] = array(
					'my' => $is_my,
					'normal' => $normal_attack,
					'damage' => $damage
				);

				$current_hp[$enemy] -= $damage;
				if ($current_hp[$enemy] < 0) {
					$result = $is_my ? 1 : 2;
				}

				$is_my = $enemy;
			}
			$swfmillManager->boss_params['r'] = $result == 1 ? '1' : '2';
			$swfmillManager->boss_params['tc'] = min(30, count($turns));
			foreach ($turns as $k => $turn) {
				if ($k == 30)
					break;
				$swfmillManager->boss_params['t'.($k+1)] = $turn['damage'];
			}

			//魔将ファイトログ記録1
			$lgCnt = $lgManager->getMashoFightCnt($member_id ,$stagecycle);
			$times = $lgCnt + 1;

			if($isReload == True){
			}else{
				$ret = $lgManager->writeMashoFightLog($member_id ,$stagecycle,$times,$friend,$profile,$myOffP,$myDefP,$myFol,$win='',$rcv='');
				if($ret === False){
					return 'error_sys';
				}
			}

			// ◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆
			//ステージサイクル
			$stagecycle = $profile['stage'].$profile['cl_cycle'];
			$clmasho = $profile['cl_masho'];

			$this->af->setApp('win', (($result == 1) ? $member_id : 'mas'));
			$winNo = $result;
			$rcvNo = 0;
			$trapNum = 2;

			//勝敗判定
			if($result == 1){
				//異常値ユーザ補正(11/01/04)
				if($profile['cl_cycle'] > 3){
$filename = dirname(dirname(dirname(dirname(dirname(__FILE__)))))."/logs/boss_" .date("ymd") .".log";
$log  = date("y-m-d H:i:s");
$log .= "\nid:".print_r($member_id,true)."\n";
$log .= "stage:".print_r($profile['stage'],true)."\n";
$log .= "cyc:".print_r($profile['cl_cycle'],true)."\n";
file_put_contents($filename, $log, FILE_APPEND);
					$profile['cl_cycle'] = 3;
					$stagecycle = $profile['stage'].$profile['cl_cycle'];
				}

				//魔将クエスト情報取得
				$masho = $questManager->getMasho($profile['stage'],$profile['cl_cycle']);
				//get_exp　get_money をプラス　cl_masho を+1
				$user = array();
				$user["memberid"] = $member_id;
				$user["exp"]   = $profile['exp'] + $masho['get_exp'];
				$user["money"] = $profile['money'] + $masho['get_money'];
				$user["trap1num"] = $profile['trap1num'] + $trapNum;		//戦利品 護符登録
				$user["cl_masho"] = $clmasho + 1;

				//m_exp_level　levelid からexp(閾値)を取得
				$nextExp = $userManager->getNextExpContByLevel($profile['level']);
				//経験値の差分計算(LEVELUP判断)
				$diffExp = $nextExp - $user['exp'];

				//トランザクション開始
				$db = $this->backend->getDb();
				$ret = $db->query('START TRANSACTION');
				if($ret == False){
					return 'error_sys';
				}

				if($diffExp <= 0 ){
					$diffExp = 0;
					$user["level"] = $profile['level'] + 1;
					//げんき回復(101230)
					$user["genki_rcv_time"] = date("Y-m-d H:i:s");
					//ランク+LV+武将連番決定
					$cntF = $cardManager->getCardlistCount($member_id ,$st="1");//ファイルの状態を取得
					if($cntF >= $cardFileMax){
						$stC = 3; //満杯時のステータス
					}else{
						$stC = 1; //file
					}
					$card = $cardManager->getLvupCard();
					$busho = $cardManager->getGachaCardInfo($card['bushoseq'],$card['rank']);
					$retC = $cardManager->cardInsert($member_id ,$stC ,$busho['bushoid'], $card['level'],$init="");
				}else{
					$retC = True;
				}

				//魔将クリア3回目
				if($user["cl_masho"] == 3){
					//ステージクリア
					$stagecycle = $profile['stage'] ."3";
					$ret0 = $lgManager->writeFriendLog($member_id ,$status="0",$stagecycle,$seriesid="",$trid="",$seq="",$rank="");
					//カード登録(ランクはA固定)
					$cntF = $cardManager->getCardlistCount($member_id ,$stF="1");
					//魔将カードGET
					if($cntF >= $cardFileMax){
						$ret3 = $cardManager->cardInsert($member_id ,$status="3" ,$masho['mashoid'], $level="1",$init="");
					}else{
						$ret3 = $cardManager->cardInsert($member_id ,$status="1" ,$masho['mashoid'], $level="1",$init="");
					}

					$user["stage"] = $profile['stage'] + 1;
					$user["cl_masho"] = 0;
					$user["cl_cycle"] = 0;
				}else{
					$ret0 = True;
					$ret3 = True;
				}
				//t_user 更新
				$ret1 = $userManager->updateUser($user);
				//ssid登録
				$ret2 = $userManager->updSession($member_id ,$ss_id);
				//強化P：ratio÷ratio計の確率でデッキのカードに1Pずつ付与
				$deck = $userManager->getDeckProfile($member_id);
				$rfp = "";
				for ($i=1; $i<=5; $i++) {
					$d = "deck".$i;
					$cardU = array();
					$cardU["memberid"] = $member_id;
					$cardU["cardseq"]  = $deck[$d];
					$cardU["win_m"] = 1;
					$ratio = $cardManager->getDispCardInfo($member_id , $deck[$d]);
					$rMax = $ratio['ratio_off'] + $ratio['ratio_def'] + $ratio['ratio_fol'];
					$ranNum = mt_rand( 1, $rMax );
					if($ranNum <= $ratio['ratio_off']){
						$cardU['offense'] = 1;	//加算分のみ
						$rfp .= "o";
					}elseif($ranNum <= $ratio['ratio_off'] + $ratio['ratio_def']){
						$cardU['defense'] = 1;	//加算分のみ
						$rfp .= "d";
					}else{
						$cardU['follower'] = 1;	//加算分のみ
						$rfp .= "f";
					}
					$ret4 = $cardManager->updateCardStatus($cardU);
				}
				//LVUPならさらに強化Pをプラス
				if($diffExp == 0){	
					for ($i=1; $i<=5; $i++) {
						$d = "deck".$i;
						$cardU2 = array();
						$cardU2["memberid"] = $member_id;
						$cardU2["cardseq"]  = $deck[$d];
						$cardU2["win_m"] = 1;
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
						$ret5 = $cardManager->updateCardStatus($cardU2);
					}
				}else{
					$ret5 = True;
				}
				$retLg = $lgManager->writeMashoFightLog($member_id ,$stagecycle,$times,$friend,$profile,$myOffP,$myDefP,$myFol,$winNo,$rcvNo);

				if($ret0 === False || $ret1 === False || $ret2 === False || $ret3 === False || $ret4 === False || $ret5 === False || $retRcv === False || $retLg === False || $retC === False){
					$db->query('ROLLBACK');
					return 'error_sys';
				}
				//トランザクション終了
				$ret = $db->query('COMMIT');
				if($ret === False){
					return 'error_sys';
				}
			}else{
				//トランザクション開始
				$db = $this->backend->getDb();
				$ret = $db->query('START TRANSACTION');
				if($ret == False){
					return 'error_sys';
				}
				$deck = $userManager->getDeckProfile($member_id);
				for ($i=1; $i<=5; $i++) {
					$d = "deck".$i;
					$cardU = array();
					$cardU["memberid"] = $member_id;
					$cardU["cardseq"]  = $deck[$d];
					$cardU["lose_m"] = 1;
					$ret4 = $cardManager->updateCardStatus($cardU);
				}
				$retLg = $lgManager->writeMashoFightLog($member_id ,$stagecycle,$times,$friend,$profile,$myOffP,$myDefP,$myFol,$winNo,$rcvNo);
				if($ret4 === False || $retRcv === False || $retLg === False){
					$db->query('ROLLBACK');
					return 'error_sys';
				}
				//トランザクション終了
				$ret = $db->query('COMMIT');
				if($ret === False){
					return 'error_sys';
				}
			}

			$next_url = "http://".$www."/"."?url=http%3A%2F%2F".$www."%2Fboss%2Flose.php%3F".session_name().'='.session_id().'&'.session_name().'='.session_id();
			if ($result == 1) {
				$next_url = "http://".$www."/"."?url=http%3A%2F%2F".$www."%2Fboss%2Ftalk1.php%3FgR%3D".$gR."%26rfp%3D".$rfp.urlencode('&').session_name().'='.session_id().'&'.session_name().'='.session_id();
			}
			$replaceStrings['lnkUrl'] = $next_url;
			$xmlString = $swfmillManager->compileXml('boss.xml', $replaceStrings);
			$masho = $swfmillManager->executeSwfmill($xmlString);
			$this->af->setApp('masho', $masho);
			$this->af->setApp('next', $next_url);

			return 'boss_result';
		}
	}
}
