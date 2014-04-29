<?php
class M_Cli_Form_BatcReset extends M_ActionForm
{
	var $form = array(
	);
}

class M_Cli_Action_BatchReset extends M_ActionClass
{
	function prepare() {
		return null;
	}

	function perform() {
		$userManager = $this->backend->getManager('User');
		$lgmoneyManager = $this->backend->getManager('Lgmoney');
		$itemManager = $this->backend->getManager('Item');
		$cardManager = $this->backend->getManager('Card');
		$treasureManager = $this->backend->getManager('Treasure');

		$db = $userManager->backend->getDb();
		/*
		// all reset (very danger)
		$sql = 'SELECT memberid FROM t_user';
		$db_ret = $db->getAll($sql);
		$member_ids = array();
		foreach ($db_ret as $db_row) {
			$member_ids[] = $db_row['memberid'];
		}
		*/

		$member_ids = array(
			//1128,
			//1149,
			//1139,
			1133	// meodaika
		);
		$_SERVER = array(
			'HTTP_USER_AGENT' => 'batch',
			'REMOTE_ADDR' => 'batch'
		);
		$total_count = count($member_ids);
		$index = 0;
		foreach ($member_ids as $member_id) {
			$user = $userManager->getProfile($member_id);
			$smsid = $this->id2smsid($member_id);
			$sql = 'SELECT
soap_service_id,
count(*) as c
FROM
lg_soap
WHERE
soap_service_id in (\'7549\',\'7649\',\'7749\')
AND
soap_message = \'NGOC '.$smsid.' \'
GROUP BY
soap_service_id';
			$sms_logs = $db->getAll($sql);
			$coin_total = 0;
			foreach ($sms_logs as $sms_log) {
				switch ($sms_log['soap_service_id']) {
					case '7549':
						$coin_total += ((int)$sms_log['c']) * 100;
						break;
					case '7649':
						$coin_total += ((int)$sms_log['c']) * 210;
						break;
					case '7749':
						$coin_total += ((int)$sms_log['c']) * 320;
						break;
				}
			}

			$ret = array(
				'coin' => array(),
				'user' => array(),
				'delete' => array(),
				'item' => array(),
				'card' => array(),
			);
			$cards = array();
			for ($i=1; $i<=5; $i++) {
				$gacha_result = $cardManager->getGachaCard();
				if ($i == 5) {
					$gacha_result['rank'] = 'E';
				}
				$cards[$i] = $cardManager->getGachaCardInfo(
					$gacha_result['bushoseq'],
					$gacha_result['rank']
				);
			}

			$ret['delete'][] = $db->query('delete from lg_event  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from lg_fight  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from lg_friend  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from lg_greeting  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from lg_help  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from lg_level  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from lg_lucky  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from lg_masho  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from lg_money_00  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from lg_money_01  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from lg_monthly_experience  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from lg_monthly_fight  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from lg_monthly_level  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from lg_monthly_nikoniko  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from lg_quest  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from lg_rcv  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from t_card  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from t_comeback  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from t_cycle  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from t_fight  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from t_friend  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from t_incentive  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from t_invite  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from t_item  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from t_quest  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from t_session  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from t_treasure  where memberid='.$member_id);
			$ret['delete'][] = $db->query('delete from t_wish  where memberid='.$member_id);

			if (! empty($user['coin'])) {
				$ret['coin'][] = $userManager->addCoin(
					$member_id,
					-((int)$user['coin']),
					'reset',
					'reset batch'
				);
			}
			$ret['coin'][] = $userManager->addCoin(
				$member_id,
				200,
				'grand open',
				'reset batch'
			);
			if ($coin_total > 0) {
				$ret['coin'][] = $userManager->addCoin(
					$member_id,
					$coin_total,
					'undo coin by reset',
					'reset batch'
				);
			}
			unset($user['coin']);

			$pho_count = 1;
			$int_level = (int)$user['level'];
			if ($int_level >= 50) {
				$pho_count += 3;
			} else if ($int_level >= 40) {
				$pho_count += 2;
			} else if ($int_level >= 30) {
				$pho_count += 1;
			}

			$user['level'] = 1;
			$user['stage'] = 1;
			$user['cl_cycle'] = 0;
			$user['cl_masho'] = 0;
			$user['get_masho']=0;
			$user['exp']=0;
			$user['genki_rcv_time'] = '';
			$user['money']=200;
			$user['coin']=0;
			$user['friend_pt']=0;
			$user['bonus_get']=NULL;
			$user['win_act']=0;
			$user['lose_act']=0;
			$user['win_pas']=0;
			$user['lose_pas']=0;
			$user['win_hlp']=0;
			$user['lose_hlp']=0;
			$user['ok_compose']=0;
			$user['ng_compose']=0;
			$user['ok_pcomp']=0;
			$user['ng_pcomp']=0;
			$user['comment']=0;
			$user['trap1num']=0;
			$user['trap2num']=0;
			$user['buki_num']='-'.$user['buki_num'];
			$user['bougu_num']='-'.$user['bougu_num'];
			$user['deck1']=1;
			$user['deck2']=2;
			$user['deck3']=3;
			$user['deck4']=4;
			$user['deck5']=5;
			$user['formno']=0;
			$user['buki_off']=0;
			$user['bougu_off']=0;
			$user['buki_def']=0;
			$user['bougu_def']=0;
			$user['card_seq']=5;
			$user['prof']=$cards[1]['bushoid'];
			$ret['user'][] = $userManager->updateUser($user);

			for ($i=1; $i<=5; $i++) {
				$ret['card'][] = $cardManager->cardInsert(
					$member_id,
					$status='0',
					$cards[$i]['bushoid'],
					$level='1',
					$i
				);
			}

			$ret['item'][] = $itemManager->buyItem($member_id,$itemid='1', $kbn='1',$amount='1',$rest='30',$price=0,0,0,0,0,$lg_dest='',$ss_id='' ,$pay_id='1',$status='IN');
			$ret['item'][] = $itemManager->buyItem($member_id,$itemid='116', $kbn='4',$amount=$pho_count,$rest='0',$price=0,0,0,0,0,$lg_dest='',$ss_id='' ,$pay_id='1',$status='RC');
			$tutTr = $this->config->get('tutTr');
			$ret['item'][] =$treasureManager->insertTrStatus($member_id,$tutTr['id']);

			echo (++$index).'/'.$total_count."\n";
			foreach ($ret as $k=>$v) {
				if ($k != 'delete') {
					foreach ($v as $v2) {
						if (Ethna::isError($v2)) {
							var_dump($ret);
							break;
						}
					}
				}
			}
		}

		return null;
	}
	function id2smsid($id) {
		$smsid = base_convert($id, 10, 36);
		while (strlen($smsid) < 4) {
			$smsid = '0'.$smsid;
		}
		return $smsid;
	}

	function smsid2id($smsid) {
		return base_convert($smsid, 36, 10);
	}
}

?>
