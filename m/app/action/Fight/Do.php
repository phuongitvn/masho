<?php
/**
 *  Fight/Do.php
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
class M_Form_FightDo extends M_ActionForm
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

/**
 *  fight_do action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_FightDo extends M_ActionClass
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
		$fightManager = $this->backend->getManager("Fight");
		$itemManager = $this->backend->getManager("Item");
		$friendManager = $this->backend->getManager("Friend");
		$domain = $this->config->get("url");
		$www = $domain['www'];
		$API = $domain['api'];
		$appId = $domain['appId'];

		$member_id = $this->af->get('opensocial_owner_id');
		$id = $this->af->get('id');
		$fid = $this->af->get('fid');
		$ts = $this->af->get('ts');
		$trid = $this->af->get('trid');
		$ssid = $this->af->get('ssid');

		//自分のプロフィール情報
		$my_profile = $userManager->getProfile($member_id);

		//最低必要げんき
		$regGenki = $this->config->get('fightReqGenki') + floor($my_profile['level'] * 0.05);
		//本人チェック
		if($member_id == $id){
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
			$this->af->setApp("fr","fight");
			$this->af->setApp("profile", $my_profile);
			return 'error_genki';
		}
		//相手のプロフィール情報
		$ot_profile = $userManager->getProfile($id);
		if(count($ot_profile) == 0){
			return "error_404";
		}
		//重複チェック
		$times = $fightManager->isDuplicateFight($member_id ,$id);
		if($times >= 3){
			$this->af->setApp("times", $times);
			return 'fight_duplicate';
		}
		//LV乖離のチェック(当初2)
		$gap = $this->config->get('fightLvGap');
		if( ($my_profile['level'] - $ot_profile['level'] * $gap) > 0 ){
			return "fight_gap";
		}
		//Compチェック
		if($trid != ""){
			$treasureManager = $this->backend->getManager("Treasure");
			$has = $treasureManager->chkOtherAlreadyComp($id,$trid);
			if($has == 5){
			return 'fight_comp';
			}
		}
		//同盟チェック
		$ret1 = $friendManager->existsFriend($member_id ,$id);
		$ret2 = $friendManager->existsFriend($id,$member_id);
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
		$isReload = $userManager->isReload($member_id ,$ssid);
		$this->af->setApp("isReload", $isReload);

		if($isReload == True){
			return 'fight_reload';
		}else{

			//武将連番取得
			$mycard = $cardManager->getCardAtt($my_profile['prof']);
			$otcard = $cardManager->getCardAtt($ot_profile['prof']);

			$swfmillManager = $this->backend->getManager('Swfmill');
			$param = "id%3D".$id."%26fid%3D".$fid."%26ts%3D".$ts."%26trid%3D".$trid."%26ssid%3D".$ssid;
			$replaceStrings["lnkUrl"] = "http://".$API."/".$appId."?url=http%3A%2F%2F".$www."%2Ffight%2Fresult.php%3F".$param;
			$p = array();
			$p['img1'] = '/img/card/'.$mycard['bushoid'].'_p.jpg';
			$p['n1'] = $my_profile['handle'];
			$p['img2'] = '/img/card/'.$otcard['bushoid'].'_p.jpg';
			$p['n2'] = $ot_profile['handle'];
			$swfmillManager->boss_params = $p;

			// XMLコンパイル
			$xmlString = $swfmillManager->compileXml('fight.xml', $replaceStrings);
			// XML出力実行
			$swfmillManager->executeSwfmill($xmlString);
		}
	}
}
?>