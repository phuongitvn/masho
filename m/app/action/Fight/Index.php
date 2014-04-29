<?php
/**
 *  Fight/Index.php
 *
 *  @author	 {$author}
 *  @package	M
 *  @version	$Id$
 */

/**
 *  fight_index Form implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Form_FightIndex extends M_ActionForm
{
	/**
	 *  @access private
	 *  @var	array   form definition.
	 */
	var $form = array(

		"opensocial_owner_id" => array(),
		"id" => array(),
		"fid" => array(),
		"ts" => array(),
		"trid" => array(),
	);

	/**
	 *  Form input value convert filter : sample
	 *
	 *  @access protected
	 *  @param  mixed   $value  Form Input Value
	 *  @return mixed		   Converted result.
	 */
	/*
	function _filter_sample($value)
	{
		//  convert to upper case.
		return strtoupper($value);
	}
	*/
}

/**
 *  fight_index action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_FightIndex extends M_ActionClass
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
	 *  fight_index action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		$userManager = $this->backend->getManager("User");
		$fightManager = $this->backend->getManager("Fight");
		$itemManager = $this->backend->getManager("Item");
		$friendManager = $this->backend->getManager("Friend");
		$treasureManager = $this->backend->getManager("Treasure");
		$cardManager = $this->backend->getManager("Card");

		$member_id = $this->af->get('opensocial_owner_id');
		$other_id = $this->af->get('id');
		$friend_id = $this->af->get('fid');
		$ddn = $this->af->get('ts');
		$tr_id = $this->af->get('trid');
		$this->af->setApp("id", $other_id);

		//自分のプロフィール情報
		$my_profile = $userManager->getProfile($member_id);
		$this->af->setApp("my_profile", $my_profile);

		//最低必要げんき
		$regGenki = $this->config->get('fightReqGenki') + floor($my_profile['level'] * 0.05);
		//本人チェック
		if($member_id == $other_id){
			$this->af->setApp('error' ,"2");
			return 'error_my';
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
		//相手のプロフィール情報
		$profile = $userManager->getProfile($other_id);
		$this->af->setApp("other_profile", $profile);
		if(count($profile) == 0){
			return "error_404";
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
		//同盟チェック
		$ret1 = $friendManager->existsFriend($member_id ,$other_id);
		$ret2 = $friendManager->existsFriend($other_id,$member_id);
		//同盟または申請中
		if($ret1 == "0" || $ret1 == "1" || $ret1 == "2" || $ret2 == "0" || $ret2 == "1" || $ret2 == "2") {
			return "fight_friend";
		}

		//デッキ情報取得 攻撃・防御・家来
		$deck = $userManager->getDeckProfile($member_id);
		$ot_deck = $userManager->getDeckProfile($other_id);

		//陣形名＋最低UP効果取得
		if($deck['formno'] > 0){
			$form = $cardManager->getFormAtt($deck['formno']);
			for ($n=1; $n<=2; $n++) {
				$toW  =  "to".$n;
				$minW = "min".$n;
				if($form[$toW] == "o"){
					$diff['offense']  = floor($deck['offense'] * $form[$minW] / 100);
					$deck['offense'] += $diff['offense'];
				}elseif($form[$toW] == "d"){
					$diff['defense']  = floor($deck['defense'] * $form[$minW] / 100);
					$deck['defense'] += $diff['defense'];
				}elseif($form[$toW] == "f"){
					$diff['follower']  = floor($deck['follower'] * $form[$minW] / 100);
					$deck['follower'] += $diff['follower'];
				}
			}
		}else{
			$form['formno'] = 0;
		}

		$this->af->setApp("my_deck", $deck);
		$this->af->setApp("ot_deck", $ot_deck);
		$this->af->setApp("diff", $diff);
		$this->af->setApp("form", $form);

		for ($i=1; $i<=5; $i++) {
			$d = "deck".$i;
			//カード情報取得(t_card)
			$tmp = $cardManager->getCardInfo($member_id , $deck[$d] , 0);
			$card[$i] = $tmp['bushoid'];
		}
		$this->af->setApp("card", $card);

		if($ddn != ""){		//lg_help 取得
			$lgManager = $this->backend->getManager("Lg");
			$help = $lgManager->getHelpLog($friend_id ,$other_id,$ddn);
			$tr_id = $help['trid'];
		}

		//お宝選択状況
		if($tr_id == ""){
			//デフォお宝　未選択へ 11/2/7
/*
			//未選択→自分:未保持　相手：保持　お宝id DESC(コンプ除く)
			$getTrid = $treasureManager->getOtherNotOwn($member_id,$other_id);
			$tr = $treasureManager->TrDtInfo($getTrid);
			$sr = $treasureManager->TrSeriInfo($tr['tr_seriesid']);
			$this->af->setApp("trid", $getTrid);
			$this->af->setApp("tr", $tr);
			$this->af->setApp("sr", $sr);
*/
		}else{	//明示的選択
			$tr = $treasureManager->TrDtInfo($tr_id);
			$sr = $treasureManager->TrSeriInfo($tr['tr_seriesid']);
			$this->af->setApp("tr", $tr);
			$this->af->setApp("sr", $sr);
		}

		//リロード対策
		$ssid = $userManager->getSsId();
		$this->af->setApp("ssid", $ssid);

		return 'fight_index';
	}
}
?>