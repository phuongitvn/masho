<?php
class M_FriendManager extends M_Manager {
	function inviteLTBC($member_id, $receive_tel) {
		$member_id = mysql_real_escape_string($member_id);
		$receive_tel = mysql_real_escape_string($receive_tel);

		if (! $this->_isValidTel($receive_tel))
			return -1;	// invalid format

$sql = <<<EOD
SELECT
	handle,
	tel
FROM
	t_user
WHERE
	tel='{$receive_tel}'
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);
		if(Ethna::isError($rs))
			return 0;

		if (! empty($rs))
			return -2;	// user already exists

$sql = <<<EOD
SELECT
  send_count
 ,registered
 ,code
 ,created
 ,modified
FROM
 lg_invite
WHERE
 memberid = '{$member_id}'
AND
 receive_tel = '{$receive_tel}'
EOD;
		$invited = $db->getRow($sql);
		if(Ethna::isError($invited))
			return 0;

		if (! empty($invited)) {
			if (date('Ymd', strtotime('-6 day')) < date('Ymd', strtotime($invited['modified']))) {
				return -3;	// invited
			}
		}

$sql = <<<EOD
SELECT
 count(*)
FROM
 lg_invite
WHERE
 receive_tel = '{$receive_tel}'
AND
 modified >= CURRENT_DATE
EOD;
		$rs = $db->getOne($sql);
		if(Ethna::isError($rs) || $rs === FALSE)
			return 0;

		if (((int)$rs) >= 5)	// max: one day
			return -4;

$sql = <<<EOD
SELECT
 handle,
 tel
FROM
 t_user
WHERE
 memberid = '{$member_id}'
EOD;
		$inviter = $db->getRow($sql);
		if(Ethna::isError($inviter) || $inviter === FALSE)
			return 0;

		// update db
		$code = NULL;
		if (! empty($invited)) {
			$code = $invited['code'];
$sql = <<<EOD
UPDATE
 lg_invite
SET
 modified = CURRENT_TIMESTAMP,
 send_count = send_count + 1
WHERE
 memberid = '{$member_id}'
AND
 receive_tel >= '{$receive_tel}'
EOD;
			$rs = $db->query($sql);
			if(Ethna::isError($rs))
				return 0;
		} else {
			$code = $this->_generateInviteCode($member_id, $receive_tel);
$sql = <<<EOD
INSERT INTO
 lg_invite
(
memberid,
receive_tel,
send_count,
code,
created,
modified
)
VALUES
(
'{$member_id}',
'{$receive_tel}',
1,
'{$code}',
CURRENT_TIMESTAMP,
CURRENT_TIMESTAMP
)
EOD;
			$rs = $db->query($sql);
			if(Ethna::isError($rs))
				return 0;
		}

		// send sms


		$domain = $this->config->get('url');
		$message = 'Ban vua nhan duoc loi moi tham gia LTBC tu '.$inviter['handle'].' (dt '.$inviter['tel'].'). Click vao link duoi day de chap nhan va nhan qua tang 2000 Vang cho quan doan minh.';
		$wap = 'http://'. $domain['www'] . '/?url='.rawurlencode('http://'. $domain['www'] . '/login/signup.php?code='.$code);
		$objSoapClient = new SoapClient('http://118.70.131.83:8080/runcall/SendSMS.asmx?wsdl');
		return $objSoapClient->SendSMS(array(
			'p_CallingNumber' => $receive_tel,
			'p_Message' => $message,
			'p_Wap' => $wap
		));
	}

	function getTelByCode($code) {
		$code = mysql_real_escape_string($code);
$sql = <<<EOD
SELECT
  receive_tel
FROM
 lg_invite
WHERE
 code = '{$code}'
AND
 registered is null
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);
		if(Ethna::isError($rs) || $rs === FALSE)
			return FALSE;

		return $rs;
	}

	function useCode($code, $receive_tel, $receiver_id) {
		$userManager = $this->backend->getManager('User');
		$code = mysql_real_escape_string($code);
		$receive_tel = mysql_real_escape_string($receive_tel);
		$receiver_id = mysql_real_escape_string($receiver_id);

		$db = $this->backend->getDb();

$sql = <<<EOD
SELECT
 memberid
 ,send_count
 ,registered
 ,code
 ,created
 ,modified
FROM
 lg_invite
WHERE
 code = '{$code}'
AND
 receive_tel = '{$receive_tel}'
EOD;
		$invited = $db->getRow($sql);
		if(Ethna::isError($invited))
			return FALSE;

		$inviter_id = $invited['memberid'];

$sql = <<<EOD
SELECT
 memberid,
 money
FROM
 t_user
WHERE
 memberid = '{$inviter_id}'
EOD;
		$inviter = $db->getRow($sql);
		if(Ethna::isError($invited))
			return FALSE;

$sql = <<<EOD
SELECT
 memberid,
 money
FROM
 t_user
WHERE
 memberid = '{$receiver_id}'
EOD;
		$receiver = $db->getRow($sql);
		if(Ethna::isError($receiver))
			return FALSE;

$sql = <<<EOD
UPDATE
lg_invite
SET
 registered = CURRENT_TIMESTAMP,
 modified = CURRENT_TIMESTAMP
WHERE
 memberid = '{$inviter_id}'
AND
 receive_tel = '{$receive_tel}'
EOD;

		$rs = $db->query($sql);
		if(Ethna::isError($rs))
			return FALSE;

		$inviter['money']  = $inviter['money']  + 4000;
		$receiver['money'] = $receiver['money'] + 2000;

		$ret1 = $userManager->updateUser($inviter);
		$ret2 = $userManager->updateUser($receiver);

		return $ret1 !== FALSE && $ret2 !== FALSE;
	}

	function _generateInviteCode($member_id, $tel) {
		return sha1('MASHO'.$member_id.$tel.'LTBC');
	}

	/**
	* 友達招待登録
	*
	*/
	function inviteFriend($member_id ,$invite_id){
		$member_id = mysql_real_escape_string($member_id);
		$escapedInviteId = mysql_real_escape_string($invite_id);
		$ids = $this->existsInvite($invite_id);

		if($ids == True){
			//既に入会済みかCHK
			if($ids['entry_flg'] == 1){
				return True;
			}else{
				//5人埋まっているかのCHK
				if($ids['invite5'] == 0){
					//既に登録されていないかCHK
					if($ids['invite1'] == $member_id || $ids['invite2'] == $member_id || $ids['invite3'] == $member_id || $ids['invite4'] == $member_id){
						return True;
					}else{
						$set = " invite5 = " .$member_id;
					}
					if($ids['invite4'] == 0){
						//既に登録されていないかCHK
						if($ids['invite1'] == $member_id || $ids['invite2'] == $member_id || $ids['invite3'] == $member_id){
							return True;
						}else{
							$set = " invite4 = " .$member_id;
						}
						if($ids['invite3'] == 0){
							//既に登録されていないかCHK
							if($ids['invite1'] == $member_id || $ids['invite2'] == $member_id ){
								return True;
							}else{
								$set = " invite3 = " .$member_id;
							}
							if($ids['invite2'] == 0){
								//既に登録されていないかCHK
								if($ids['invite1'] == $member_id){
									return True;
								}else{
									$set = " invite2 = " .$member_id;
								}
							}
						}
					}

$sql = <<<EOD
UPDATE
 t_invite
SET
{$set}
WHERE
 memberid = '{$escapedInviteId}'
EOD;
				}else{
					return True;
				}
			}
		}else{

$sql = <<<EOD
INSERT INTO
 t_invite
(
  memberid
 ,invite1
 ,reg_time
 ,upd_time
)
VALUES
(
  '{$escapedInviteId}'
 ,{$member_id}
 ,now()
 ,now()
)
EOD;
		}
			$db = $this->backend->getDb();
			$rs = $db->query($sql);

			if (Ethna::isError($rs) || $rs== False) {
			//エラーの場合の処理
				return False;
			}

		return True;
	}

	/**
	* 友達招待チェック
	*
	*/
	function existsInvite($member_id){

		//11/2/16  entry_flg = 0 を追加
		$escapedId = mysql_real_escape_string($member_id);
$sql = <<<EOD
SELECT
  invite1
 ,invite2
 ,invite3
 ,invite4
 ,invite5
 ,entry_flg 
FROM
 t_invite
WHERE
 memberid = '{$escapedId}'
AND
 entry_flg = 0
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);

		if(Ethna::isError($rs) || $rs === false){
			return -1;
		}

		if(count($rs) == 0){
			return False;
		}

		return $rs;

	}

	/**
	* 紹介報酬テーブル登録
	*
	*/
	function writeIncentive($member_id ,$other_id){
		$member_id = mysql_real_escape_string($member_id);
		$other_id = mysql_real_escape_string($other_id);

$sql = <<<EOD
INSERT INTO
 t_incentive
(
  memberid
 ,friendid
 ,reg_time
 ,upd_time
)
VALUES
(
  '{$member_id}'
 ,'{$other_id}'
 ,now()
 ,now()
)
 ON DUPLICATE KEY UPDATE upd_time = now() 
EOD;

		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if(Ethna::isError($rs) || $rs === false){
			return false;
		}

		return true;

	}

	/**
	* 招待報酬チェック
	*
	*/
	function existsIncentive($member_id,$friend_id){
		$escapedId = mysql_real_escape_string($member_id);
		$escapedFriendId = mysql_real_escape_string($friend_id);

$sql = <<<EOD
SELECT
 count(memberid)
FROM
 t_incentive
WHERE
 memberid = '{$escapedId}'
AND
 friendid = '{$escapedFriendId}'
AND
 del_flg = '0'
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return False;
		}

		return $rs;

	}

	/**
	* 招待報酬リスト取得
	*
	*/
	function getInviteIncentivelist($member_id){
		$member_id = mysql_real_escape_string($member_id);
$sql = <<<EOD
SELECT
  friendid
FROM
 t_incentive
WHERE
 memberid = '{$member_id}'
AND
 del_flg = '0'
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);

		if(Ethna::isError($rs) || $rs === false){
			return False;
		}

		return $rs;

	}

	/**
	* 同盟申請
	*
	*/
	function applyFriend($member_id ,$friend_id){ //$form_id
		$member_id = mysql_real_escape_string($member_id);
		$is_exists = $this->existsFriend($member_id ,$friend_id);

		if($is_exists >= 0){
			return True;
		}

		$escapedFriendId = mysql_real_escape_string($friend_id);
$sql = <<<EOD
INSERT INTO
 t_friend
(
  memberid
 ,friendid
 ,status
 ,reg_time
 ,upd_time
)
VALUES
(
  '{$escapedFriendId}'
 ,{$member_id}
 ,0
 ,now()
 ,now()
)
 ON DUPLICATE KEY UPDATE 
 status = 0 
 ,upd_time = now() 
EOD;
//var_dump($sql);
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if (Ethna::isError($rs) || $rs== False) {
			return False;
		}

		return True;
	}

	/**
	* 同盟申請チェック
	*
	*/
	function existsFriend($member_id ,$friend_id){
		$member_id = mysql_real_escape_string($member_id);
		$escapedFriendId = mysql_real_escape_string($friend_id);
$sql = <<<EOD
SELECT
 status
FROM
 t_friend
WHERE
 memberid = '{$escapedFriendId}'
AND
 friendid = {$member_id}
EOD;
//var_dump($sql);
		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);

		if(Ethna::isError($rs) || $rs === false){
			return -1;
		}
		if(count($rs) == 0){
			return -1;
		}
		//ニコニコ、あいさつだけしている非同盟
		if($rs['status'] == 4){
		   return -1;
		}

		return $rs['status'];

	}

	/**
	* 同盟リストカウント
	*
	*/
	function getFriendlistCount($member_id ,$status="",$kbn=""){
		$member_id = mysql_real_escape_string($member_id);
		$status = mysql_real_escape_string($status);
		$kbn = mysql_real_escape_string($kbn);
		//$status = "0" $kbn = "send" で申請している一覧を取得
		$sqlStatus = "";
		if($status != ""){
			$sqlStatus .= " AND t_friend.status = '".$status."'" ;
		}

$sql = <<<EOD
SELECT
  count(t_friend.memberid) as cnt
FROM
 t_friend
INNER JOIN
 t_user
ON
 t_friend.friendid = t_user.memberid
WHERE
EOD;

	if($kbn == "send"){
$sql .= " t_friend.friendid = {$member_id} ";
	}else{
$sql .= " t_friend.memberid = {$member_id} ";
	}

$sql .= <<<EOD
AND
 t_user.del_flg = 0
{$sqlStatus}
EOD;
//var_dump($sql);

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return 0;
		}

		return $rs;

	}

	/**
	* 同盟リスト取得
	*
	*/
	function getFriendlist($member_id ,$status="" ,$kbn="" ,$md="" , $pre="", $sort="",$limit ,$offset){
		$member_id = mysql_real_escape_string($member_id);
		$status = mysql_real_escape_string($status);
		$kbn = mysql_real_escape_string($kbn);
		$md = mysql_real_escape_string($md);
		$pre = mysql_real_escape_string($pre);
		$sort = mysql_real_escape_string($sort);
		//$limit = mysql_real_escape_string($limit);
		//$offset = mysql_real_escape_string($offset);
		//$status = "0" $kbn = "send" で申請している一覧を取得
		//pre ：お宝->お宝ID、カード->武将IDをセット
		$sqlOrder = "";
		switch($sort){
			case "pt":
				$sqlOrder = " ORDER BY t_friend.pt DESC ";
				break;
			case "lv":
				$sqlOrder = " ORDER BY t_user.level DESC ";
				break;
			default:
				$sqlOrder = " ORDER BY t_friend.reg_time DESC ";
				break;
		}

		$sqlLimit = "";
		if($limit != ""){
			$sqlLimit = " LIMIT " .$limit;
		}
		$sqlOffset = "";
		if($offset != ""){
			$sqlOffset = " OFFSET " .$offset;
		}

		$sqlStatus = "";
		if($status != ""){
			$sqlStatus = " AND t_friend.status = '" .$status ."'";
		}


$sql = <<<EOD
SELECT
  t_friend.memberid
 ,t_friend.friendid
 ,t_friend.pt
 ,t_friend.entry_flg
 ,t_user.level
 ,t_user.handle
 ,t_user.prof
 ,t_user.money
 ,t_user.deck1
 ,t_user.deck2
 ,t_user.deck3
 ,t_user.deck4
 ,t_user.deck5
 ,t_user.buki_off
 ,t_user.buki_def
 ,t_user.bougu_off
 ,t_user.bougu_def
FROM 
EOD;

	if($md == "wp"){
		$cardManager = $this->backend->getManager("Card");
		$att = $cardManager->getCardAtt($pre);

$sql .= <<<EOD
( 
 t_friend 
INNER JOIN
 t_user 
ON 
 t_friend.friendid = t_user.memberid 
) 
INNER JOIN
 t_wish 
ON 
 t_friend.friendid = t_wish.memberid 
WHERE
 t_friend.memberid = {$member_id} 
AND
 t_wish.seq = '{$att["seq"]}' 
AND 
 t_wish.rank ='{$att["rank"]}' 
EOD;
	}else{
$sql .= <<<EOD
 t_friend
INNER JOIN
 t_user
ON
EOD;
		if($kbn == "send"){
$sql .= <<<EOD
 t_friend.memberid = t_user.memberid 
WHERE
 t_friend.friendid = {$member_id} 
EOD;
		}else{
$sql .= <<<EOD
 t_friend.friendid = t_user.memberid 
WHERE
 t_friend.memberid = {$member_id} 
EOD;
		}
	}

$sql .= <<<EOD
AND
 t_user.del_flg = 0
{$sqlStatus}
{$sqlOrder}
{$sqlLimit}
{$sqlOffset}
EOD;
//var_dump($sql);
		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);

		if(Ethna::isError($rs) || $rs === false){
			return array();
		}

		//友達名称とお宝、カード保有状況
		foreach($rs as $k => $v){
			$rs[$k]['friend_num'] = $this->getFriendlistCount($rs[$k]['friendid'] ,$sta="2",$kb="");
			$ret = $this->getFriendlevel($rs[$k]['pt']);
			$rs[$k]['lvno'] = $ret['lvno'];
			$rs[$k]['lvname'] = $ret['lvname'];
			//$retAv = getAvatar($member_id,$rs[$k]['friendid']);
			$rs[$k]['avatarPath'] = @$retAv['avatar']['url'];
			if($md == "tp"){
				$treasureManager = $this->backend->getManager("Treasure");
				$rs[$k]['has'] = $treasureManager->getTrindOwn($rs[$k]['friendid'],$pre,$seriFlg="0");
				//あげるとコンプかCHK
				$rs[$k]['comp'] = $treasureManager->chkTrSeriesComp($rs[$k]['friendid'],$pre);
			}elseif($md == "cp" || $md == "wp"){
				$cardManager = $this->backend->getManager("Card");
				$rs[$k]['has'] = $cardManager->getMybushoCardCount($rs[$k]['friendid'] , $pre);
				$rs[$k]['pre'] = $cardManager->getCardlistCount($rs[$k]['friendid'] ,$stPre="2");
			}elseif($md == "bs"){
				$cardManager = $this->backend->getManager("Card");
				for ($i=1; $i<=5; $i++) {
					$d = "deck".$i;
					$tmp = $cardManager->getCardInfo($rs[$k]['friendid'] , $rs[$k][$d] , 0);
					$rs[$k]['follower'] += $tmp['follower'];
				}
				$rs[$k]['offense'] = $rs[$k]['buki_off'] + $rs[$k]['bougu_off'];
				$rs[$k]['defense'] = $rs[$k]['buki_def'] + $rs[$k]['bougu_def'];
			}
		}
//var_dump($rs);
		return $rs;

	}

	/**
	* 同盟参戦追加
	*
	*/
	function addBossFight($member_id,$id){
		$member_id = mysql_real_escape_string($member_id);
		$id = mysql_real_escape_string($id);

		$already = $this->chkBossFight($member_id,$id);

		if($already == "1"){
			return True;
		}else{
$sql = <<<EOD
UPDATE
 t_friend
SET
 entry_flg = '1'
WHERE
 memberid = {$member_id}
AND
 friendid = {$id}
EOD;

			$db = $this->backend->getDb();
			$rs = $db->query($sql);
			if (Ethna::isError($rs) || $rs== False) {
				return False;
			}
		}

		return True;
	}

	/**
	* 同盟参戦除外
	*
	*/
	function delBossFight($member_id,$id){
		$member_id = mysql_real_escape_string($member_id);
		$id = mysql_real_escape_string($id);

		$already = $this->chkBossFight($member_id,$id);

		if($already == "1"){
$sql = <<<EOD
UPDATE
 t_friend
SET
 entry_flg = '0'
WHERE
 memberid = {$member_id}
AND
 friendid = {$id}
EOD;

			$db = $this->backend->getDb();
			$rs = $db->query($sql);
			if (Ethna::isError($rs) || $rs== False) {
				return False;
			}

			return True;

		}else{
			return True;
		}

	}

	/**
	* 同盟参戦CHK
	*
	*/
	function chkBossFight($member_id,$id){

$sql = <<<EOD
SELECT
 entry_flg
FROM 
 t_friend
WHERE
 memberid = {$member_id}
AND
 friendid = {$id}
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);
		if(Ethna::isError($rs) || $rs === false){
			return False;
		}

		return $rs;
	}


	/**
	* LVチェック
	*
	*/
	function getFriendlevel($pt){
		$pt = mysql_real_escape_string($pt);

		if($pt <= 30){
			$rs['lvno'] = 0;
			$rs['lvname'] = "Hàng xóm";
		}elseif($pt <= 100){
			$rs['lvno'] = 1;
			$rs['lvname'] = "Bạn bè";
		}else{
			$rs['lvno'] = 2;
			$rs['lvname'] = "Anh em";
		}

		return $rs;
	}

	/**
	* 助太刀依頼送信
	*
	*/
	function reqHelpFight($member_id, $other_id,$times,$tr_id, $limit){
		$member_id = mysql_real_escape_string($member_id);
		$other_id = mysql_real_escape_string($other_id);
		$times = mysql_real_escape_string($times);
		$tr_id = mysql_real_escape_string($tr_id);
		$limit = mysql_real_escape_string($limit);

		$lgManager = $this->backend->getManager("Lg");
		$ddn = sprintf("%02d", date('d')).$times;

$sql = <<<EOD
SELECT
  count(t_friend.friendid) as cnt
FROM
 t_friend
INNER JOIN
 t_user
ON
 t_friend.friendid = t_user.memberid
WHERE
 t_user.del_flg = 0
AND
 t_friend.status = '2' 
AND
 t_friend.memberid = '{$member_id}'
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);
		if(Ethna::isError($rs) || $rs === false){
			return array();
		}
		$totalCount = $rs;

		if($limit == "" || $limit >= $totalCount){
			$limit = $totalCount;
		}

		srand();
		$result = array();
		$useOffset = array();
		$exclude_member = array();
		//$limit分取得できるかoffsetを使い果たすまで

		while( count($useOffset) < $limit){
			//offset取得
			$offset = rand(0,$limit-1);

			if($useOffset[$offset] == True){
				//一度使ったoffsetなら再取得
				continue;
			}
			$useOffset[$offset] = True;


$sql = <<<EOD
SELECT
  t_friend.friendid
 ,t_friend.pt
 ,t_user.level
 ,t_user.handle
 ,t_user.prof
FROM
 t_friend
LEFT JOIN
 t_user
ON
 t_friend.friendid = t_user.memberid 
WHERE
 t_user.del_flg = 0
AND
 t_friend.status = '2' 
AND
 t_friend.memberid = '{$member_id}' 
LIMIT 1
OFFSET {$offset}
EOD;

			$rs = $db->getRow($sql);

			if(Ethna::isError($rs) || $rs === False){
				return array();
			}

			if($exclude_member[$rs["friendid"]] == True){
				//一度使ったmemberidなら再取得
				continue;
			}
			$exclude_member[$rs["friendid"]] = True;


			//ユーザ確定
			$result[] = $rs;


			if(count($result) >= $limit){
				break;
			}

		}


		//友達名称
		foreach($result as $k => $v){
			$ret = $this->getFriendlevel($result[$k]['pt']);
			$result[$k]['lvno'] = $ret['lvno'];
			$result[$k]['lvname'] = $ret['lvname'];
			$ret2 = $lgManager->writeEventLog($result[$k]['friendid'],$member_id ,$stat="2",$ddn,$other_id,$win="",$lose="",$tr_id);//2:助太刀依頼
			if($ret2 === False){
				return False;
			}
		}
		//助太刀状況登録
		$ret3 = $lgManager->writeHelpLog($member_id ,$other_id,$times,$tr_id);
		if($ret3 === False){
			return False;
		}

		return $result;
	}

	/**
	* 連携同盟リスト カウント(魔将ファイト時　軍団)
	*
	*/
	function getLegionlistCount($member_id ){
		$member_id = mysql_real_escape_string($member_id);
$sql = <<<EOD
SELECT
  count(t_friend.memberid) as cnt
FROM
 t_friend
INNER JOIN
 t_user
ON
 t_friend.friendid = t_user.memberid
WHERE
 t_friend.memberid = {$member_id}
AND
 t_user.del_flg = 0
AND
 t_friend.entry_flg = 1
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return 0;
		}

		return $rs;

	}

	/**
	* 連携同盟リスト取得(魔将ファイト時　軍団)
	*
	*/
	function getLegionlist($member_id,$lv){
		$member_id = mysql_real_escape_string($member_id);
		$lv = mysql_real_escape_string($lv);
$sql = <<<EOD
SELECT
  t_friend.friendid
 ,t_friend.pt
 ,t_user.level
 ,t_user.handle
 ,t_user.prof
FROM
 t_friend
INNER JOIN
 t_user
ON
 t_friend.friendid = t_user.memberid
WHERE
 t_friend.memberid = {$member_id}
AND
 t_user.del_flg = 0
AND
 t_friend.entry_flg = 1
ORDER BY
 t_friend.pt DESC
{$sqlLimit}
{$sqlOffset}
EOD;

//var_dump($sql);
		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);

		if(Ethna::isError($rs) || $rs === false){
			return array();
		}

		//同盟効果
		foreach($rs as $k => $v){
			if($rs[$k]['pt'] <= 30){
				$rs[$k]['coeff'] = $this->config->get('legionPtCoeff0');
			}elseif($rs[$k]['pt'] <= 100){
				$rs[$k]['coeff'] = $this->config->get('legionPtCoeff1');
			}else{
				$rs[$k]['coeff'] = $this->config->get('legionPtCoeff2');
			}
			$diff[$k] = $lv - $rs[$k]['level'];
			if($diff[$k] < -10){
				$rs[$k]['coeff'] += $this->config->get('legionLvCoeff0');
			}elseif($diff[$k] < 10){
				$rs[$k]['coeff'] += $this->config->get('legionLvCoeff1');
			}else{
				$rs[$k]['coeff'] += $this->config->get('legionLvCoeff2');
			}
		}

		return $rs;

	}


	/**
	* 同盟承認
	*
	*/
	function approveFriend($member_id ,$friend_id ,$res,$kbn){
		$member_id = mysql_real_escape_string($member_id);
		$res = mysql_real_escape_string($res);
		$kbn = mysql_real_escape_string($kbn);

		$is_exists = $this->existsApproveFriend($member_id ,$friend_id,$res);

		if($is_exists == True){
			return True;
		}
		$escapedFriendId = mysql_real_escape_string($friend_id);

		if($kbn == "1"){	//モバ友
$sql = <<<EOD
INSERT INTO
 t_friend
(
  memberid
 ,friendid
 ,status
 ,kbn
 ,reg_time
 ,upd_time
)
VALUES
(
  '{$member_id}'
 ,'{$escapedFriendId}'
 ,'{$res}'
 ,'{$kbn}'
 ,now()
 ,now()
) 
EOD;
		}else{	//その他

$sql = <<<EOD
UPDATE
 t_friend
SET
  status = {$res}
 ,upd_time = now()
WHERE
 memberid = {$member_id}
AND
 friendid = '{$escapedFriendId}'
EOD;
		}

		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if (Ethna::isError($rs) || $rs== False) {
		//エラーの場合の処理
			return False;
		}

		//双方にステータス更新
$sql = <<<EOD
REPLACE
 t_friend
(
  memberid
 ,friendid
 ,status
 ,kbn
 ,reg_time
 ,upd_time
)VALUES(
  {$escapedFriendId}
 ,{$member_id}
 ,{$res}
 ,{$kbn}
 ,NOW()
 ,NOW()
)
EOD;
			$rs = $db->query($sql);
			if (Ethna::isError($rs) || $rs== False) {
			//エラーの場合の処理
				return False;
			}

		return True;
	}

	/**
	* 同盟承認チェック
	*
	*/
	function existsApproveFriend($member_id ,$friend_id,$res){
		$member_id = mysql_real_escape_string($member_id);
		$res = mysql_real_escape_string($res);
		$escapedFriendId = mysql_real_escape_string($friend_id);
$sql = <<<EOD
SELECT
 member_id
FROM
 t_friend
WHERE
 memberid = {$member_id}
AND
 friendid = '{$escapedFriendId}'
AND
 status = '{res}'
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);

		if(Ethna::isError($rs) || $rs === false){
			return array();
		}

		if(count($rs) == 0){
			return False;
		}

		return True;

	}

	/**
	* 同盟申請取消
	*
	*/
	function deleteFriendReq($member_id ,$friend_id){
		$member_id = mysql_real_escape_string($member_id);
		$escapedFriendId = mysql_real_escape_string($friend_id);

$sql = <<<EOD
DELETE FROM 
 t_friend
WHERE
 friendid = {$member_id}
AND
 memberid = '{$escapedFriendId}'
AND
 status = '0'
EOD;

		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if (Ethna::isError($rs) || $rs== False) {
		//エラーの場合の処理
			return False;
		}

		return True;

	}

	/**
	* 同盟の歴史取得
	*
	*/
	function getFriendHistory($member_id ,$friend_id){
		$member_id = mysql_real_escape_string($member_id);
		$escapedFriendId = mysql_real_escape_string($friend_id);

$sql = <<<EOD
SELECT 
  status
 ,kbn
 ,niko
 ,hello
 ,help_win
 ,help_lose
 ,card
 ,treasure
FROM 
 t_friend
WHERE
 memberid = '{$member_id}'
AND
 friendid = '{$escapedFriendId}'
EOD;
//var_dump($sql);
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

	/**
	* 同盟状態取得
	*
	*/
	function getFriendKbn($member_id ,$friend_id){
		$member_id = mysql_real_escape_string($member_id);
		$escapedFriendId = mysql_real_escape_string($friend_id);

$sql = <<<EOD
SELECT 
  status
 ,kbn
FROM 
 t_friend
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
			$nicoP = 1;
		}else{
			if($rs['status'] == "2"){
				if($rs['kbn'] == 1){
					$nicoP = 3;
				}else{
					$nicoP = 2;
				}
			}else{
				$nicoP = 1;
			}
		}

		return $nicoP;

	}


	/**
	* ニコニコポイント付与
	*
	*/
	function setNicoPoint($member_id ,$friend_id,$nicoP,$kbn){
		$member_id = mysql_real_escape_string($member_id);
		$escapedFriendId = mysql_real_escape_string($friend_id);
		$nicoP = mysql_real_escape_string($nicoP);
		$kbn = mysql_real_escape_string($kbn);

	//ニコニコとあいさつは非同盟でもできる
	if($kbn == "niko" || $kbn == "hello"){
		if($kbn == "niko"){
			$niko  = 1;
			$hello = 0;
		}elseif($kbn == "hello"){
			$niko  = 0;
			$hello = 1;
		}
		$sql = <<<EOD
INSERT INTO
 t_friend
(
  memberid
 ,friendid
 ,status
 ,kbn
 ,pt
 ,niko
 ,hello
 ,reg_time
 ,upd_time
)
VALUES
(
  '{$member_id}'
 ,'{$friend_id}'
 ,'4'
 ,'0'
 ,{$nicoP}
 ,{$niko}
 ,{$hello}
 ,now()
 ,now()
)
 ON DUPLICATE KEY UPDATE 
  upd_time = now() 
 ,pt = pt + {$nicoP} 
EOD;
if($kbn == "niko"){
$sql .= " ,niko = niko + 1 ";
		}elseif($kbn == "hello"){
$sql .= " ,hello = hello + 1 ";
		}

	//同盟のみの処理
	}else{

$sql = <<<EOD
UPDATE
 t_friend 
SET
  pt = pt + {$nicoP} 
EOD;
		if($kbn == "card"){
$sql .= " ,card = card + 1 ";
		}elseif($kbn == "treasure"){
$sql .= " ,treasure = treasure + 1 ";
		}elseif($kbn == "win"){
$sql .= " ,help_win = help_win + 1 ";
		}elseif($kbn == "lose"){
$sql .= " ,help_lose = help_lose + 1 ";
		}

$sql .= <<<EOD
 ,upd_time = now()
WHERE
 memberid = {$member_id}
AND
 friendid = '{$escapedFriendId}'
EOD;
//var_dump($sql);

	}

		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if (Ethna::isError($rs) || $rs== False) {
		//エラーの場合の処理
			return False;
		}


//現在のfriend_pt を取得
$sql = <<<EOD
SELECT 
  friend_pt
FROM 
 t_user
WHERE
 memberid = {$member_id}
EOD;

		$db = $this->backend->getDb();
		$orgPt = $db->getOne($sql);

		if(Ethna::isError($orgPt) || $orgPt === false){
			return False;
		}

	//ポイントの上限は1000
	if( ($orgPt + $nicoP) > 1000 ){
		$pt = 1000;
	}else{
		$pt = $orgPt + $nicoP;
	}
//t_user
$sql = <<<EOD
UPDATE
 t_user
SET
  friend_pt = {$pt}
 ,upd_time = now()
WHERE
 memberid = {$member_id}
EOD;
		$rs = $db->query($sql);
		if (Ethna::isError($rs) || $rs== False) {
		//エラーの場合の処理
			return False;
		}

		return True;
	}

	/**
	* ニコニココメント取得
	*
	*/
	function getNicoCmt($id){

		$id = mysql_real_escape_string($id);

$sql = <<<EOD
SELECT 
  nico_cmt_f
 ,nico_cmt_nt
 ,nico_cmt_ov
FROM 
 m_busho
WHERE
 bushoid = '{$id}'
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);

		if(Ethna::isError($rs) || $rs === false){
			return False;
		}

		if(count($rs) == 0){
			return False;
		}

		return $rs;

	}

	function _isValidTel($tel) {
		$p1 = '/^01[2689][0-9]{8}$/';
		$p2 = '/^09[0-9]{8}$/';
		return (preg_match($p1, $tel) || preg_match($p2, $tel));
	}
}

?>