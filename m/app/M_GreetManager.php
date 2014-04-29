<?php
/**
 *  M_GreetManager.php
 *
 *  @author	 {$author}
 *  @package	M
 *  @version	$Id$
 */

/**
 *  M_GreetManager
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_GreetManager extends M_Manager
{

//NICO

	/**
	* ニコニコ登録
	*
	*/
	function setGreeting($member_id ,$friend_id){

		$member_id = mysql_real_escape_string($member_id);
		$escapedFriendId = mysql_real_escape_string($friend_id);

		//ニコニコは1日3回⇒2時間に1回
		$yet = $this->existsGreeting($member_id ,$friend_id);	//以前$ret
		$d = date('d');

		if($yet == 0){	//以前$num
$sql = <<<EOD
INSERT INTO
 lg_greeting
(
  memberid
 ,friendid
 ,dd
 ,num
 ,reg_time
 ,upd_time
)
VALUES
(
  '{$escapedFriendId}'
 ,'{$member_id}'
 ,'{$d}'
 ,0
 ,now()
 ,now()
)
 ON DUPLICATE KEY UPDATE 
  reg_time = now() 
 ,upd_time = now() 
EOD;
//var_dump($sql);
			$db = $this->backend->getDb();
			$rs = $db->query($sql);
			if (Ethna::isError($rs) || $rs== False) {
				return False;
			}
		}

		return $yet;
	}

//NICO
	/**
	* ニコニコチェック	1日3回⇒2時間に1回
	*
	*/
	function existsGreeting($member_id ,$friend_id){

		$member_id = mysql_real_escape_string($member_id);
		$escapedFriendId = mysql_real_escape_string($friend_id);

		$d = date('d');

//110218 num->reg_time
$sql = <<<EOD
SELECT
 reg_time 
FROM
 lg_greeting
WHERE
 memberid = '{$escapedFriendId}'
AND
 friendid = '{$member_id}'
AND
 dd = '{$d}'
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) ){
			return False;
		}
		//レコード無
		if(empty($rs)){
			$yet = 0;
		}else{
			//upd_timeが2時間以上前ならOK(11/2/18)
			$thTime = date('Y-m-d H:i:s', strtotime('-2 hour'));
			if($rs < $thTime){
				$yet = 0;
			}else{
				//残り時間
				$th= strtotime($thTime);
				$lastT = strtotime(date($rs));
				$diff = $lastT - $th;

				if($diff > 0){
					$hour = floor($diff / 3600);
					$tmin = $diff - ($hour * 3600);
					$min  = floor($tmin / 60);
				}
				$mm = sprintf("%02d", $min);
				$yet = $hour.$mm;
			}
		}
		return $yet;

	}

//NICO
	/**
	* あいさつチェック	1日1回 nikoPt付与
	*
	*/
	function existsHello($member_id ,$friend_id){

		$member_id = mysql_real_escape_string($member_id);
		$escapedFriendId = mysql_real_escape_string($friend_id);

		$d = date('d');

$sql = <<<EOD
SELECT
 num
FROM
 lg_greeting
WHERE
 memberid = '{$escapedFriendId}'
AND
 friendid = '{$member_id}'
AND
 dd = '{$d}'
EOD;
//var_dump($sql);
		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) ){
			return False;
		}
		if(count($rs) == 0){
			$rs = 0;
		}

		return $rs;
	}


	/**
	* あいさつtxtid取得
	*
	*/
	function getGreetTxtid($member_id ,$friend_id){

		$member_id = mysql_real_escape_string($member_id);
		$friend_id = mysql_real_escape_string($friend_id);

		$d = date('d');

$sql = <<<EOD
SELECT
 gtxtid
FROM
 lg_greeting
WHERE
 memberid = '{$friend_id}'
AND
 friendid = '{$member_id}'
AND
 dd = '{$d}'
EOD;
//var_dump($sql);
		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return array();
		}

		//レコード無
		if(count($rs) == 0){
			return False;
		}

		return $rs;
	}


	//textDataAPI のID、statusを記録
	function setTxtData($member_id ,$friend_id,$txtId,$txtStatus){

		//$ym = date('Ym');
		$d = date('d');
		$member_id = mysql_real_escape_string($member_id);
		$escapedFriendId = mysql_real_escape_string($friend_id);
		$txtId = mysql_real_escape_string($txtId);
		$txtStatus = mysql_real_escape_string($txtStatus);

$sql = <<<EOD
UPDATE
 lg_greeting
SET
  gtxtid = '{$txtId}'
 ,txtstatus = '{$txtStatus}'
 ,num = 1
 ,upd_time = now()
WHERE
 memberid = '{$escapedFriendId}'
AND
 friendid = '{$member_id}'
AND
 dd = '{$d}'
EOD;
		$db = $this->backend->getDb();
		$ret = $db->query($sql);

		if(Ethna::isError($ret) || $ret === false){
			return false;
		}

		return True;
	}

	/**
	 * ニコニコされたリスト件数取得
	 *
	 */
	function getGreetListCount($member_id ,$status){
		$member_id = mysql_real_escape_string($member_id);
		$status = mysql_real_escape_string($status);
		$d = date('d');

		$sqlStatus = "";
		if($status != ""){
			$sqlStatus .= " AND lg_greeting.status in (" .$status .")";
		}

$sql = <<<EOD
SELECT
  count(lg_greeting.memberid) as cnt
FROM
 lg_greeting
INNER JOIN
 t_user
ON
 lg_greeting.memberid = t_user.memberid
WHERE
 lg_greeting.memberid = {$member_id}
AND
 t_user.del_flg = 0
{$sqlStatus}
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return 0;
		}

		return $rs;

	}

	/**
	 * ニコニコされたリスト取得
	 *
	 */
	function getGreetList($member_id ,$status="" ,$limit="" ,$offset=""){
		$member_id = mysql_real_escape_string($member_id);
		$status = mysql_real_escape_string($status);
		$limit = mysql_real_escape_string($limit);
		$offset = mysql_real_escape_string($offset);

		$d = date('d');

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
			$sqlStatus = " AND lg_greeting.status in (" .$status .")";
		}

$sql = <<<EOD
SELECT
  lg_greeting.friendid
 ,lg_greeting.gtxtid
 ,lg_greeting.upd_time
 ,t_user.level
 ,t_user.handle
 ,t_user.prof
FROM
 lg_greeting
INNER JOIN
 t_user
ON
 lg_greeting.friendid = t_user.memberid
WHERE
 lg_greeting.memberid = {$member_id}
AND
 t_user.del_flg = 0
{$sqlStatus}
ORDER BY
 lg_greeting.upd_time DESC
{$sqlLimit}
{$sqlOffset}
EOD;
//var_dump($sql);
		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);

		if(Ethna::isError($rs) || $rs === false){
			return array();
		}


		//txtDataAPIで取得
		$viewer_id = $this->af->get('opensocial_owner_id');
		$seq = 0;
		foreach($rs as $k => $v){

			if($rs[$k]['gtxtid'] != NULL){
				$rsp[$seq]	= $k;
				$txtids[$seq] = $rs[$k]['gtxtid'];
				$seq++;
			}

		}
		if(count($txtids) > 1){
			$reqTxts = implode(",", $txtids);
		}else{
			$reqTxts = $txtids['0'];
		}
		$ret = getTxt($viewer_id,$txtGroup="hello",$reqTxts);

//LOG書き出し
$filename = dirname(dirname(dirname(__FILE__)))."/logs/apis_" .date("Ymd") .".log";
//ログ作成
$log  = date("Y-m-d H:i:s");
$log .= "\nrsp:" .print_r($rsp,true)."\n";
$log .= "\ntxtids:" .print_r($txtids,true)."\n";
$log .= "\nreqTxts:" .print_r($reqTxts,true)."\n";
$log .= "\ngetTxt:" .print_r($ret,true)."\n";
file_put_contents($filename, $log, FILE_APPEND);


		for ($n=0; $n < count($rsp); $n++) {
			if($ret['entry'][$n]['status'] == 2 || $ret['entry'][$n]['status'] == 3 ){
				$rs[$rsp[$n]]['insp'] = 2;
			}else{
				$rs[$rsp[$n]]['comnt'] = $ret['entry'][$n]['data'];
			}
		}

		return $rs;

	}

	/**
	 * ニコニコ削除
	 */
	function delGreet($member_id, $select, $del_greet , $limit, $offset){
		$member_id = mysql_real_escape_string($member_id);
		$select = mysql_real_escape_string($select);
		$del_greet = mysql_real_escape_string($del_greet);
		$limit = mysql_real_escape_string($limit);
		$offset = mysql_real_escape_string($offset);

		$d = date('d');

		if($select == 2){
			$list = $this->getGreetList($member_id, "0", $limit, $offset);
			if(!is_array($list)){
				return true;
			}
			$del_greet = array();
			foreach($list as $v){
				$del_greet[] = $v["friendid"];
			}
		}

		//削除対象なし
		if(!is_array($del_greet) || count($del_greet) == 0){
			return true;
		}

		$del_in = implode(",", $del_greet);

$sql = <<<EOD
DELETE
 FROM
 lg_greeting
WHERE
 memberid = {$member_id}
AND
 friendid IN ({$del_in})
EOD;

		$db = $this->backend->getDb();
		$ret = $db->query($sql);

		if(Ethna::isError($ret) || $ret === false){
			return false;
		}
		return true;
	}
}
?>