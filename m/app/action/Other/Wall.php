<?php
class M_Form_OtherWall extends M_ActionForm {
	var $form = array(
		'opensocial_owner_id' => array(),
		'id' => array(),
		'status' => array(
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
			'name' => 'status'
		),
	);
}

class M_Action_OtherWall extends M_ActionClass {
	function prepare() {
		return parent::prepare();
	}

	function perform() {
		$userManager = $this->backend->getManager('User');
		$itemManager = $this->backend->getManager('Item');
		$infoManager = $this->backend->getManager('Info');
		$cardManager = $this->backend->getManager("Card");
		$friendManager = $this->backend->getManager("Friend");
		$treasureManager = $this->backend->getManager("Treasure");

		$member_id = $this->af->get('opensocial_owner_id');
		$other_id = $this->af->get('id');
		$profile = $userManager->getProfile($member_id);
		$this->af->setApp("profile", $profile);
		if($member_id == $other_id){
			$domain = $this->config->get("url");
			$www = $domain['www'];
			$endUrl = "?url=http%3A%2F%2F".$www."%2Fmy%2Fwall.php".rawurlencode('?').session_name().rawurlencode('=').session_id();
			header("Location: $endUrl");
			exit;
		}

		$profile = $userManager->getProfile($other_id);
		if(count($profile) == 0){
			return 'error_404';
		}

		$status = trim($this->af->get('status'));
		if (! empty($status)) {
			if (mb_strlen($status) > 250) {
				$this->af->setApp('err', 'Nội dung chia sẻ không được lớn hơn 250 ký tự');
				$this->af->setApp('status', $status);
			} else {
				$ret = $infoManager->addInfos(
					$member_id,
					$other_id,
					$infoManager->content_type_ids['status'],
					array(
						'summary' => $status,
						'target_user_id' => $other_id
					)
				);

				if ($ret) {
					$domain = $this->config->get("url");
					$www = $domain['www'];
					$endUrl = "?url=http%3A%2F%2F".$www."%2Fother%2Fwall.php".rawurlencode('?').'id'.rawurlencode('=').$other_id.rawurlencode('&').session_name().rawurlencode('=').session_id();
					header("Location: $endUrl");
					exit;
				} else {
					$this->af->setApp('err', 'error');
				}
			}
		}

		$kbn = $friendManager->getFriendKbn($member_id ,$other_id);
		$this->af->setApp('kbn', $kbn);
		
		$card = $cardManager->getCardAtt($profile['prof']);
		$this->af->setApp('card', $card);
		
		$stageName = $userManager->getStageName($profile['stage']);
		$this->af->setApp("stageName", $stageName);
		$cyTitle = $this->config->get('cyTitle');
		$cycle = $profile['cl_cycle'] + 1;
		$this->af->setApp("cycle", $cyTitle[$cycle]);

		//max同盟数
		$maxFr = $userManager->getMaxFriendContByLevel($profile['level']);
		$this->af->setApp("maxFr", $maxFr);
		$profile['friend_num'] = $friendManager->getFriendlistCount($other_id,$sta="2",$kb="");
		$this->af->setApp("profile", $profile);
		//アイテム保有合計
		$sum1 = $itemManager->getMyItemCount($other_id ,$dispKbn="1",$unit="");	//保有武器アイテムの個数の合計
		$sum2 = $itemManager->getMyItemCount($other_id ,$dispKbn="2",$unit="");	//保有防具アイテムの個数の合計
		$this->af->setApp("sum1", $sum1);
		$this->af->setApp("sum2", $sum2);

		//お宝関連
		$maxTr = $treasureManager->TrSerindNum($series_id="");
		$numChk = $treasureManager->getTrcoNum($other_id);
		$numChk['archieve'] = floor($numChk['OwnNum']/$maxTr*100);
		$this->af->setApp("numChk", $numChk);
		//欲しいカード+デッキ/ファイル
		if($kbn == 2 || $kbn == 3){
			$wlist = $cardManager->getWishlist($other_id ,$status="0" ,$seq="" ,$rank="",$member_id);
			$wlist_num = count($wlist);
			$this->af->setApp("wlist", $wlist);
			$this->af->setApp("wlist_num", $wlist_num);
		}
		$cnt = $cardManager->getCardlistCount($other_id ,$status="0");
		$cnt += $cardManager->getCardlistCount($other_id ,$status="1");
		$this->af->setApp("cnt_card", $cnt);
		//11/2/4 	3→5件に
		$limit = 5;
		$p = $this->af->get("p");
		if(!$p || !is_numeric($p)){
			$p = 1;
			$this->af->set("p", $p);
		}

		$list = array();
		$navi = array();
		$offset = ($p - 1) * $limit;

		$limit = 10;
		$cnt = $infoManager->countWall($other_id);
		if ($cnt > 0) {
			$p = $this->af->get('p');
			if ((empty($p)) || (!is_numeric($p))) {
				$p = 1;
				$this->af->set('p', $p);
			}
			$offset = ($p-1) * $limit;
			$wall = $infoManager->getWall($other_id, $limit);
			$navi = $infoManager->getPagerSource($cnt, $limit, $p, $limit);
			$this->af->setApp('list', $wall);
			$this->af->setApp('cnt', $cnt);
			$this->af->setApp('navi', $navi);
			$this->af->setApp('limit', $limit);
		}

		$ssid = $userManager->getSsId();
		$this->af->setApp("ssid", $ssid);

		return 'other_wall';
	}
}
?>