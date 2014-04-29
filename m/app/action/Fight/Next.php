<?php
/**
 *  Fight/Next.php
 *
 *  @author	 {$author}
 *  @package	M
 *  @version	$Id$
 */

/**
 *  fight_do Form implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Form_FightNext extends M_ActionForm
{
	/**
	 *  @access private
	 *  @var	array   form definition.
	 */
	var $form = array(
		"opensocial_owner_id" => array(),
		"fg" => array(),
		"ssid" => array(),
	);

}

/**
 *  fight_do action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_FightNext extends M_ActionClass
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
	 *  fight_do action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		$userManager = $this->backend->getManager("User");
		$cardManager = $this->backend->getManager("Card");
		$domain = $this->config->get("url");
		$www = $domain['www'];
		$API = $domain['api'];
		$appId = $domain['appId'];

		$member_id = $this->af->get('opensocial_owner_id');
		$ss_id = $this->af->get('ssid');
		$fg = $this->af->get('fg');

		//11/2/7
		$cardFileMax = $this->config->get("cardFileMax");

		$profile = $userManager->getProfile($member_id);
		//勝敗復号
		$c = new Crypt();
		$deFg = $c->decrypt($fg);
		$lv  = intval(substr($deFg,0,3));
		$exp = intval(substr($deFg,3,8));

		//不正データCHK
		if($profile['level'] != $lv || $profile['exp'] != $exp){
			return 'fight_reload';
		}

		//リロードCHK
		$isReload = $userManager->isReload($member_id ,$ss_id);
		$this->af->setApp("isReload", $isReload);

		if($isReload == True){
			
		}else{
			//トランザクション開始
			$db = $this->backend->getDb();
			$ret = $db->query('START TRANSACTION');
			if($ret == False){
				return 'error_sys';
			}

			//強化P：ratio÷ratio計の確率でデッキのカードに1Pずつ付与
			$deck = $userManager->getDeckProfile($member_id);
			$orgOff = $deck['offense'];
			$orgDef = $deck['defense'];
			$orgFol = $deck['follower'];
			$rfp = "";
			for ($i=1; $i<=5; $i++) {
				$d = "deck".$i;
				$cardU = array();
				$cardU["memberid"] = $member_id;
				$cardU["cardseq"]  = $deck[$d];
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
				//ポイント加算
				$retC[$i] = $cardManager->updateCardStatus($cardU);
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

			//ファイルの状態を取得
			$cntF = $cardManager->getCardlistCount($member_id ,$st="1");
			if($cntF >= $cardFileMax){
				$status = 3; //満杯時のステータス
			}else{
				$status = 1; //file
			}
			$card = $cardManager->getLvupCard();
			$busho = $cardManager->getGachaCardInfo($card['bushoseq'],$card['rank']);
			$retCard = $cardManager->cardInsert($member_id ,$status ,$busho['bushoid'], $card['level'],$init="");
			//ssid登録
			$ret0 = $cardManager->updSession($member_id ,$ss_id);

			if($ret0 === False || $retC['1'] === False || $retC['2'] === False  || $retC['3'] === False || $retC['4'] === False || $retC['5'] === False|| $retF === False || $retCard === False){
				$db->query('ROLLBACK');
				return 'error_sys';
			}
			//トランザクション終了
			$ret = $db->query('COMMIT');
			if($ret === False){
				return 'error_sys';
			}
		}

		//カード内容を表示する別のTPL呼出
		$swfmillManager = $this->backend->getManager('Swfmill');
		$newss = $userManager->getSsId();
		$replaceStrings["lnkUrl"] = "http://".$API."/".$appId."?url=http%3A%2F%2F".$www."%2Fquest%2Fcard.php%3Fid%3Dfg%26ssid%3D".$newss."%26orgFol%3D".$orgFol."%26orgOff%3D".$orgOff."%26orgDef%3D".$orgDef."%26ex_genki%3D".$profile['genki']."%26bid%3D".$busho['bushoid']."%26seq%3D".$retCard."%26fg%3D1%26rfp%3D".$rfp;

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
	}
}
?>