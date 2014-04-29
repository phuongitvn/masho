<?php
class M_RegularEventManager extends M_Manager {
	var $debug=FALSE;
	var $day;
	var $year;
	var $month;
	var $week_cycle;
	var $week;

	function doevent() {
		$this->_setBaseInfo();

		// 該当イベント抽出
		$event = 'lucky';
		if ($this->week == 0) { // special thunday
			/*
			switch ($this->week_cycle) {
				case 1:
					$event = 'fight';
					break;
				case 2:
					$event = 'level';
					break;
				case 3:
					$event = 'experience';
					break;
				case 4:
					$event = 'nikoniko';
					break;
				// default: luck
			}
			*/
			$event = '';
		}//  else { // lucky man!

		// 該当イベントログチェック

		// イベント実行
		if (! empty($event)) {
			$event_method = 'do'.ucfirst($event).'Event';
			$ret = $this->$event_method();
			var_dump($ret);
		}
	}

	// sunday: special event result
	// monday - saturday: lucky man result
	function getEventReport() {
		$this->_setBaseInfo();
		$year = $this->year;
		$month = $this->month;

		$result = FALSE;
		$sql = '';
		if ($this->week == 0 && $this->week_cycle < 5) {
			$table = '';
			$field = '';
			switch ($this->week_cycle) {
			case 1:
				$table = 'lg_monthly_fight';
				$field = 'win';
				break;
			case 2:
				$table = 'lg_monthly_level;';
				$field = '`level`';
				break;
			case 3:
				$table = 'lg_monthly_experience;';
				$field = 'experience';
				break;
			case 4:
				$table = 'lg_monthly_nikoniko';
				$field = 'nikoniko';
				break;
			}
			$sql = <<<EOD
SELECT
u.memberid,
u.handle,
u.prof,
lg.{$field},
lg.reg_time
FROM
lg_lucky lg
INNER JOIN
t_user u
ON
lg.memberid=u.memberid
WHERE
lg.year='{$year}'
AND
lg.month='{$month}'
ORDER BY
lg.{$field} desc
EOD;
		} else {
			$sql = <<<EOD
SELECT
u.memberid,
u.handle,
u.prof,
m_item.itemid,
m_item.`name`,
lg.amount,
lg.reg_time
FROM
lg_lucky lg
INNER JOIN
t_user u
ON
lg.memberid=u.memberid
LEFT JOIN
m_item
ON
lg.itemid=m_item.itemid
ORDER BY
lg.reg_time desc
EOD;
		}

		$db = $this->backend->getDb();
		$result = $db->getRow($sql);
		if(Ethna::isError($result) || $result === false){
			return FALSE;
		}
		$result['week_text'] = (($this->week == 0) ? 'chủ nhật
' : ('thứ '.($this->week+1)));

		return $result;
	}

	// sunday: nothing
	// monday - saturday: special event IR
	function getInterimReport() {
		$this->_setBaseInfo();
	}

	function doLuckyEvent() {
		$amount = 1;
		$itemid = NULL;
		$itemManager = $this->backend->getManager('Item');
		$userManager = $this->backend->getManager('User');
		switch ($this->week) {
		case 0:
			// 300 ngoc
			$amount = 300;
			break;
		case 1:
			// Ve so vang
			$itemid = $this->config->get('gachaGoldItemid');
			break;
		case 2:
			// 千手観音
			$itemid = $this->config->get('senjuId');
			break;
		case 3:
			// Weapon (id: 33)
			$itemid = 33;
			break;
		case 4:
			// 銀のブタ
			$itemid = $this->config->get('pigSilvId');
			break;
		case 5:
			// Pho
			$itemid = $this->config->get('kibiItemid');
			break;
		case 6:
			// Armor (id:98)
			$itemid = 98;
			break;
		}
$sql = <<<EOD
SELECT
memberid
FROM
`t_user`
WHERE
del_flg=0
ORDER BY
rand()
EOD;
		$db = $this->backend->getDb();
		$memberid= $db->getOne($sql);

		if(Ethna::isError($memberid) || $memberid === false){
			return FALSE;
		}

		if ($this->debug)
			$memberid = 1127;

		$ret = $db->query('START TRANSACTION');
$sql = <<<EOD
INSERT INTO
lg_lucky
(
 memberid
,itemid
,amount
,reg_time
)
VALUES
(
'{$memberid}',
'{$itemid}',
'{$amount}',
NOW()
)
EOD;
		$rs = $db->query($sql);
		if (Ethna::isError($rs) || $rs== FALSE) {
			$db->query('ROLLBACK');
			return FALSE;
		}

		$ret = FALSE;
		$description = 'regular-event: lucky-man('.$this->week.')';
		$item = $this->_presentItem($memberid, $itemid, $amount, $description);
		if (! $item) {
			$db->query('ROLLBACK');
		}

		$ret = $this->_sendMail('luckyman.tpl', $memberid, $item);
		if (Ethna::isError($ret)) {
			$db->query('ROLLBACK');
			return FALSE;
		}

		$ret = $db->query('COMMIT');
		if (Ethna::isError($ret) || $ret== FALSE) {
			return FALSE;
		}

		return TRUE;
	}

	function doFightEvent() {
		// so1: Ve so dac biet x 2, 鬼神胴丸(id:113) x 1、500 ngoc
		// so2: Ve so vang x 2, 200 ngoc
		// so3: Ve so x 2, 100 ngoc
		$userManager = $this->backend->getManager('User');
		$year = $this->year;
		$month = $this->month;

		$items = array(
			1 => array(
				array(
					'id' => $this->config->get('gachaPtItemid'),
					'amount' => 2
				),
				array(
					'id' => 113,
					'amount' => 1
				),
				array(
					'id' => NULL,
					'amount' => 500
				),
			),
			2 => array(
				array(
					'id' => $this->config->get('gachaGoldItemid'),
					'amount' => 2
				),
				array(
					'id' => NULL,
					'amount' => 200
				),
			),
			3 => array(
				array(
					'id' => $this->config->get('gachaItemid'),
					'amount' => 2
				),
				array(
					'id' => NULL,
					'amount' => 100
				),
			)
		);

		if ($this->debug) {
			$member_ids = array(
				1 => 1127,
				2 => 1127,
				3 => 1127,
			);
		}
		foreach ($member_ids as $k => $memberid) {
			foreach ($items[$k] as $item) {
				$item = $this->_presentItem($memberid, $itemid, $amount, $description);
				if (! $item) {
					$db->query('ROLLBACK');
					return FALSE;
				}
			}
			$ret = $this->_sendMail('fight'.$k.'.tpl', $memberid, $item);
			if (Ethna::isError($ret)) {
				$db->query('ROLLBACK');
				return FALSE;
			}
		}

		$ret = $db->query('COMMIT');
		if (Ethna::isError($ret) || $ret== FALSE) {
			return FALSE;
		}

		return TRUE;
	}

	function doLevelEvent() {
		// so 1: アロンダイト(id:67), 千手観音
		$userManager = $this->backend->getManager('User');
		$year = $this->year;
		$month = $this->month;

		$db = $this->backend->getDb();
		$ret = $db->query('START TRANSACTION');

		$items = array(
			array(
				'id' => $this->config->get('senjuId'),
				'amount' => 1
			),
			array(
				'id' => 67,
				'amount' => 1
			),
		);

$sql = <<<EOD
SELECT
`level`
FROM
lg_monthly_level
WHERE
year = '{$year}'
and
month = '{$month}'
EOD;

		$db = $this->backend->getDb();
		$is_already = $db->getOne($sql);

		if (! $is_already) {
$sql = <<<EOD
INSERT INTO
lg_monthly_level
(
 memberid
,year
,month
,`level`
,reg_time
)
SELECT
memberid,
'{$year}',
'{$month}',
`level`,
NOW()
FROM
t_user
where
del_flg=0
EOD;
			$rs = $db->query($sql);
			if (Ethna::isError($rs) || $rs== FALSE) {
				$db->query('ROLLBACK');
				return FALSE;
			}
		}

		if ($this->debug)
			$memberid = 1127;

		foreach ($items as $item) {
			$item = $this->_presentItem($memberid, $item['id'], $item['amount']);
			if (! $item) {
				$db->query('ROLLBACK');
				return FALSE;
			}
		}

		$ret = $this->_sendMail('level1.tpl', $memberid, $item);
		if (Ethna::isError($ret)) {
			$db->query('ROLLBACK');
			return FALSE;
		}

		$ret = $db->query('COMMIT');
		if (Ethna::isError($ret) || $ret== FALSE) {
			return FALSE;
		}

		return TRUE;
	}

	function doExperienceEvent() {
		// so 1: デュランダル(id:68), 千手観音
		$userManager = $this->backend->getManager('User');
		$year = $this->year;
		$month = $this->month;

		$item = array(
			array(
				'id' => $this->config->get('senjuId'),
				'amount' => 1
			),
			array(
				'id' => 68,
				'amount' => 1
			),
		);

$sql = <<<EOD
SELECT
experience
FROM
lg_monthly_experience
WHERE
year = '{$year}'
and
month = '{$month}'
EOD;

		$db = $this->backend->getDb();
		$is_already = $db->getOne($sql);

		if (! $is_already) {
$sql = <<<EOD
INSERT INTO
lg_monthly_experience
(
 memberid
,year
,month
,experience
,reg_time
)
SELECT
u.memberid,
'{$year}',
'{$month}',
IF(l2.experience is not null,u.exp-l2.experience,u.exp),
NOW()
FROM
t_user u left join lg_monthly_experience l2 on u.memberid=l2.memberid
WHERE
del_flg=0
EOD;
			$rs = $db->query($sql);
			if (Ethna::isError($rs) || $rs== FALSE) {
				$db->query('ROLLBACK');
				return FALSE;
			}
		}

		if ($this->debug)
			$memberid = 1127;

		foreach ($items as $item) {
			$item = $this->_presentItem($memberid, $item['id'], $item['amount']);
			if (! $item) {
				$db->query('ROLLBACK');
				return FALSE;
			}
		}

		$ret = $this->_sendMail('experience1.tpl', $memberid, $item);
		if (Ethna::isError($ret)) {
			$db->query('ROLLBACK');
			return FALSE;
		}

		$ret = $db->query('COMMIT');
		if (Ethna::isError($ret) || $ret== FALSE) {
			return FALSE;
		}

		return TRUE;
	}

	function doNikonikoEvent() {
		// so 1: ブリューナク(id:69), 銀のブタ、100 ngoc
		$itemManager = $this->backend->getManager('Item');
		$userManager = $this->backend->getManager('User');
		$year = $this->year;
		$month = $this->month;

		$description = 'regular-event: nikoniko('.$this->week.')';
		$item = array(
			array(
				'id' => $this->config->get('pigSilvId'),
				'amount' => 1
			),
			array(
				'id' => 69,
				'amount' => 1
			),
			array(
				'id' => NULL,
				'amount' => 100
			),
		);

$sql = <<<EOD
SELECT
`level`
FROM
lg_monthly_nikoniko
WHERE
year = '{$year}'
and
month = '{$month}'
EOD;

		$db = $this->backend->getDb();
		$is_already = $db->getOne($sql);

		if (! $is_already) {
		}

		if ($this->debug)
			$memberid = 1127;
		$description = 'regular-event: nikoniko';
		foreach ($items as $item) {
			$item = $this->_presentItem($memberid, $item['id'], $item['amount'], $description);
			if (! $item) {
				$db->query('ROLLBACK');
				return FALSE;
			}
		}

		$ret = $this->_sendMail('nikoniko1.tpl', $memberid, $item);
		if (Ethna::isError($ret)) {
			$db->query('ROLLBACK');
			return FALSE;
		}

		$ret = $db->query('COMMIT');
		if (Ethna::isError($ret) || $ret== FALSE) {
			return FALSE;
		}

		return TRUE;
	}

	function _setBaseInfo() {
		// 曜日チェック
		list($this->year, $this->month, $this->day, $this->week) = explode('-', date('Y-m-d-w'));

		// 週チェック
		$this->week_cycle = ceil($this->day / 7);
	}

	function _sendMail($tpl, $memberid, $item) {
		$userManager = $this->backend->getManager('User');
		$mailer =& new Ethna_MailSender($this->backend);
		$user = $userManager->getProfile($memberid);
		return $mailer->send(
			$user['email'],
			$tpl,
			array(
				'user' => $user,
				'item' => $item
			)
		);
	}

	function _presentItem($memberid, $itemid, $amount, $description='') {
		$itemManager = $this->backend->getManager('Item');
		$userManager = $this->backend->getManager('User');
		$item = NULL;
		if ($itemid) {
			$item = $itemManager->getItemData($itemid);
			$ret = $itemManager->buyItem(
				$memberid,          // memberid
				$itemid,            // itemid
				$item['kbn'],       // kbn
				$amount,            // amount
				$item['rest'],      // rest
				0,                  // price
				$item['offense'],   // buki_off
				$item['defense'],   // buki_def
				$item['offense'],   // bougu_off
				$item['defense'],   // bougu_def
				'',                 // lg_dest
				'',                 // ss_id
				$itemid,            // payid (1:coin, else:gold)
				''                  // status (use if payid:1)
			);
			$item['description'] = $item['name'];
		} else {
			$ret = $userManager->addCoin(
				$memberid,            // memberid
				$amount,              // amount
				$description,         // description
				'RegularEventManager' // operator
			);
			$item = array('description' => $amount.' ngọc');
		}
		return $item;
	}
}
?>