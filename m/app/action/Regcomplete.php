<?php
class M_Form_Regcomplete extends M_ActionForm
{
	var $form = array(
		'opensocial_owner_id' => array(),
		'ss' => array(),
		'type' => array(),
	);
}

class M_Action_Regcomplete extends M_ActionClass {
	function prepare() {
		if(is_array($_GET) == True){
			foreach($_GET as $key=> $value){
				$this->af->set($key ,$value);
			}
		}
		if(is_array($_POST) == True){
			foreach($_POST as $key=> $value){
				$this->af->set($key ,$value);
			}
		}

		$domain = $this->config->get('url');
		$this->af->setApp('domain' ,$domain);
	}

	function perform() {
		$userManager = $this->backend->getManager('User');
		$cardManager = $this->backend->getManager('Card');
		$itemManager = $this->backend->getManager('Item');
		$friendManager = $this->backend->getManager('Friend');
		$lgManager = $this->backend->getManager('Lg');
		$lgMoneyManager = $this->backend->getManager('Lgmoney');
		$treasureManager = $this->backend->getManager('Treasure');

		$member_id = $this->af->get('opensocial_owner_id');
		if (empty($member_id)) {
			$member_id = $userManager->generateMemberId();
			$this->session->set('id', $member_id);
		}
		$type = $this->af->get('type');
		$ss_id = $this->af->get('ss');

		$isReload = $userManager->isReload($member_id ,$ss_id);
		$this->af->setApp('isReload', $isReload);

		//会員登録チェック
		$chk = $userManager->existsUser($member_id);

		if($chk == True){
			$profile = $userManager->getProfile($member_id);
				$ssid = $userManager->getSsId();
				$this->af->setApp('ssid', $ssid);
				$this->af->setApp('profile', $profile);
				$card = $cardManager->getCardAtt($profile['prof']);
				$this->af->setApp('card', $card);
				$stage = $userManager->getStageName($profile['stage']);
				$this->af->setApp('stage', $stage);
			if($profile['tut_num'] < 10){
				return 'my_indextut';
			}elseif($profile['tut_num'] == 10 || $profile['tut_num'] == 11){
				return 'quest_tut3';
			}elseif($profile['tut_num'] >= 12 && $profile['tut_num'] <= 17){
				return 'my_indextutf';
			}elseif($profile['tut_num'] == 18){
				return 'my_indextutl';
			}else{
				return 'my_index';
			}
		}

		//GREE からハンドル名取得
		$api = 'self';
		$gree = dispFriends($member_id,$api,'id,nickname,profileUrl,thumbnailUrl,birthday,gender,hasApp',1,10);
		$handle = $gree['entry']['nickname'];
		$url = $gree['entry']['profileUrl'];
		$birth = $gree['entry']['birthday'];
		$gender = $gree['entry']['gender'];
		$tmp_user = $this->session->get('tmp_user');
		//echo '<pre>';print_r($tmp_user);die('dcm');
		if (! empty($tmp_user['id']))
			$handle = $tmp_user['id'];
		$this->af->setApp('handle', $handle);

		if($isReload == True){
			$ssid = $userManager->getSsId();
			$this->af->setApp('ssid', $ssid);
			$profile = $userManager->getProfile($member_id);
			$this->af->setApp('profile', $profile);
			$card = $cardManager->getCardAtt($profile['prof']);
			$this->af->setApp('card', $card);
			$stage = $userManager->getStageName($profile['stage']);
			$this->af->setApp('stage', $stage);
			return 'my_indextut';
		}else{
			//lg_dest を計算してセット
			$max = $this->config->get('lg_divide');
			$tutTr = $this->config->get('tutTr');
			if($max == '2'){
				$lg_dest = sprintf('%02d', mt_rand(0,1));
			}else{
				$min = $max / 2 + 1;
				$lg_dest = sprintf('%02d', mt_rand($min,$max));
			}
			//prof
			$inicard = 'reg_'.$type;
			$bid = $this->config->get($inicard);
			$prof = $bid['1'];
			$money = $this->config->get('iniMoney');

			//トランザクション開始
			$db = $this->backend->getDb();
			$ret = $db->query('START TRANSACTION');
			if($ret == False){
				return 'error_sys';
			}
			//money に初期値 をセット
			$ret1 = $userManager->setUser($member_id,$handle,$money,$prof,$lg_dest,$url,$birth,$gender);
			//lg_money に行挿入
			$ret2 = $lgMoneyManager->writeLog($member_id ,1 ,$money,$lg_dest);	//1:会員登録
			//t_session に行を追加　(INSERT)
			$ret3 = $userManager->insSession($member_id ,$ss_id);

			//クエスト112で必要となるアイテムを付与
			$ret6 = $itemManager->buyItem($member_id,$itemid='1', $kbn='1',$amount='1',$rest='30',$price=0,0,0,0,0,$lg_dest='',$ss_id='' ,$pay_id='1',$status='IN');
			//きびだんご1個付与
			$ret7 = $itemManager->buyItem($member_id,$itemid='116', $kbn='4',$amount='1',$rest='0',$price=0,0,0,0,0,$lg_dest='',$ss_id='' ,$pay_id='1',$status='RC');
			//お宝を１つ付与
			$ret8 =$treasureManager->insertTrStatus($member_id,$tutTr['id']);

			//t_card 登録
			for ($i=1; $i<=5; $i++) {
				$ret4[$i] = $cardManager->cardInsert($member_id ,$status='0' ,$bid[$i], $level='1',$i);
			}

			// campaign
			//if (date('Ymd') <= '20110711') {
				$ret5 = $userManager->addCoin($member_id, 200, 'grand open', 'regcomplete');
			//} else {
			//	$ret5 = TRUE;
			//}

			if($ret1 === False || $ret2 === False || $ret3 === False || $ret4['1'] === False || $ret4['2'] === False || $ret4['3'] === False || $ret4['4'] === False || $ret4['5'] === False || $ret5 === FALSE){
				$db->query('ROLLBACK');
				var_dump(
					$ret1,
					$ret2,
					$ret3,
					serialize($ret4)
				);
				return 'error_sys';
			}
			//トランザクション終了
			$ret = $db->query('COMMIT');
			if($ret === False){
				return 'error_sys';
			}
		}

		return 'regcomplete';
	}
}

?>
