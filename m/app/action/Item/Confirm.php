<?php
/**
 *  Item/Confirm.php
 *
 *  @author	 {$author}
 *  @package	M
 *  @version	$Id$
 */

/**
 *  item_confirm Form implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Form_ItemConfirm extends M_ActionForm
{
	/**
	 *  @access private
	 *  @var	array   form definition.
	 */
	var $form = array(
		"opensocial_owner_id" => array(),
		"id" => array(),
		"num" => array(),
		"q" => array(),
		"ssid" => array(),
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
 *  item_confirm action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_ItemConfirm extends M_ActionClass
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
	 *  item_confirm action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform() {
		$userManager = $this->backend->getManager("User");
		$itemManager = $this->backend->getManager("Item");
		$cardManager = $this->backend->getManager("Card");
		$fightManager = $this->backend->getManager("Fight");
		$member_id = $this->af->get('opensocial_owner_id');
		$item_id = $this->af->get('id');
		$q = $this->af->get('q');
		$this->af->setApp('q',$q);
		$item_num = $this->af->get('num');
		$this->af->setApp('item_num',$item_num);
		$user = $itemManager->getItemRelatedData($member_id);
		$this->af->setApp('user',$user);
		$order = $this->af->get('order');
		$this->af->setApp('order',$order);
		$item = $itemManager->getItemDataForQuest($member_id,$item_id,$reqNum=0);
        if($item['coin']>0){
			$unit = 2;
			$this->af->setApp('unit',$unit);
		}else if($item['money']>0){
			$unit = 1;
			$this->af->setApp('unit',$unit);
		}
		$this->af->setApp('item',$item);
		//アイテム保有個数
		$own = $itemManager->existsMyItem($member_id ,$item_id);
		$this->af->setApp("own", $own);
		if($unit==2){
			$after['coin'] = $user['coin'] - $item['coin'] * $item_num;
		} else {
			$after['money'] = $user['money'] - $item['money'] * $item_num;
		}
		$after['own'] = $own['num'] + $item_num;

		$this->af->setApp('after',$after);

		//個別アイテム効能
		//ガチャ札115
		$gachaId = $this->config->get('gachaItemid');
		//ガチャ札Free139
		$gachaFreeId = $this->config->get('gachaFreeItemid');
		//きびだんご個数取得 116
		$rcv_id = $this->config->get('kibiItemid');
		if($item_id == $gachaId || $item_id == $rcv_id || $item_id == $gachaFreeId ){
			//次のリロード対策
			$newss = $itemManager->getSsId();
			$this->af->setApp("newss", $newss);
		}

		//戦利品(非売品)かの確認
		if($item['money'] == 0 && $item['coin'] == 0 ){
			$cycleId = $user['cl_cycle'] + 1;
			$stageId = $user['stage'];
			$questManager = $this->backend->getManager("Quest");
			$stagecycle = $user['stage'].($user['cl_cycle'] + 1);
			//該当クエストが実施できるか判断
			if(substr($item['questid'],0,2) > $stagecycle){
				$dontGo = 1;
				$this->af->setApp('dontGo',$dontGo);
			}
			//次のリロード対策
			$newss = $itemManager->getSsId();
			$this->af->setApp("newss", $newss);
			$this->af->setApp('qid',$item['questid']);
			$this->af->setApp('qname',$item['questname']);
		}

		//リロード対策
		$ssid = $itemManager->getSsId();
		$this->af->setApp("ssid", $ssid);

		//現在の最大攻撃力、防御力
		$deck = $userManager->getDeckProfile($member_id);
		$this->af->setApp("nowOffPower", $deck['offense']);
		$this->af->setApp("nowDefPower", $deck['defense']);

		//リアリティ処理
		if($item['kbn'] == 1 || $item['kbn'] == 2 ){

			//前処理
			if($item['kbn'] == 1){
				$rest_off = $user['bougu_off'];
				$rest_def = $user['bougu_def'];
			}elseif($item['kbn'] == 2){
				$rest_off = $user['buki_off'];
				$rest_def = $user['buki_def'];
			}

			//保有XXアイテムをYY力で降順(XXは武器か防具、Yはkbn=1:Off,kbn=2:Def)
			$nowItem = $itemManager->getMyItems($member_id ,$item['kbn'] ,$unit="",$diff="",$limit="" ,$offset="");
			//購入予定アイテムの配列(複数個でも可)
			$candiItem = array( count($nowItem) => 
				array(
					'itemid' => $item_id,
					'num'	=> $item_num,
					'times'  => 'NULL',
					'name'  => $item["name"],
					'offense'  => $item["offense"],
					'defense'  => $item["defense"],
				),
			);
			//攻撃力用アイテム配列
			$dataArray = $nowItem + $candiItem;		//配列をマージ
			foreach ($dataArray as $key => $row) {	// 列方向の配列を得る
				$itemid[$key] = $row['itemid'];
				$num[$key] = $row['num'];
				$times[$key] = $row['times'];
				$name[$key] = $row['name'];
				$offense[$key] = $row['offense'];
				$defense[$key] = $row['defense'];
			}
			array_multisort($offense, SORT_DESC, $dataArray);
			$offItem = $dataArray;

			//防御力用アイテム配列
			$dataArray = $nowItem + $candiItem;		//配列をマージ
			foreach ($dataArray as $key => $row) {	// 列方向の配列を得る
				$itemid[$key] = $row['itemid'];
				$num[$key] = $row['num'];
				$times[$key] = $row['times'];
				$name[$key] = $row['name'];
				$offense[$key] = $row['offense'];
				$defense[$key] = $row['defense'];
			}
			array_multisort($defense, SORT_DESC, $dataArray);
			$defItem = $dataArray;

			//デッキのカードをOffense降順
			$offMaxCard = $cardManager->getCardlist($member_id,0,$sort="off",$limit="" ,$offset="");
			//デッキのカードをDefense降順
			$defMaxCard = $cardManager->getCardlist($member_id,0,$sort="def",$limit="" ,$offset="");
			//calcFightPower はカード配列の添え字が1～5のためスライド
			for($i=0;$i < 5;$i++){
				$n = 4 - $i;
				$offMaxCard [$n + 1] = $offMaxCard [$n];
				$defMaxCard [$n + 1] = $defMaxCard [$n];
			}

			//購入後の最大XX攻撃力(XXは武器か防具)
			$afterKbnOffPower = $fightManager->calcFightPower($offMaxCard,$offItem,"o");
			//購入後の最大XX防御力((XXは武器か防具)
			$afterKbnDefPower = $fightManager->calcFightPower($defMaxCard,$defItem,"d");

			for($i=1 ;$i<=5;$i++){
				$kbnOffPower += $afterKbnOffPower[$i];
				$kbnDefPower += $afterKbnDefPower[$i];
			}

			$afterOffPower = $kbnOffPower + $rest_off;
			$afterDefPower = $kbnDefPower + $rest_def;
			$this->af->setApp("kbnO", $kbnOffPower);
			$this->af->setApp("kbnD", $kbnDefPower);
		} else{	//kbn=4
			$afterOffPower = $nowOffPower;
			$afterDefPower = $nowDefPower;
		}

		$this->af->setApp("afterOffPower", $afterOffPower + $deck['deckOff']);
		$this->af->setApp("afterDefPower", $afterDefPower + $deck['deckDef']);

		return 'item_confirm';
	}
}

?>
