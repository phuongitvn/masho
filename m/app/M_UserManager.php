<?php
define('E_LOGIN_ID_ERROR', 1025);
define('E_LOGIN_PASSWORD_ERROR', 1026);

/**
 *  M_UserManager.php
 *
 *  @author	 {$author}
 *  @package	M
 *  @version	$Id$
 */
class M_UserManager extends M_Manager {
	// ret
	//  0: pwd khong dugn
	// -1: khong co user
	//  N: login duoc roi
	function login($id, $pwd) {
		$id = mysql_real_escape_string($id);
		$pwd = sha1('masho'.$pwd);
$sql = <<<EOD
SELECT
  memberid
FROM
 t_user
WHERE
 handle = '{$id}' 
 AND
 password = '{$pwd}'
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);
		if(Ethna::isError($rs) || $rs === false){
$sql = <<<EOD
SELECT
  memberid
FROM
 t_user
WHERE
 handle = '{$id}' 
EOD;
			$rs = $db->getOne($sql);
			if(Ethna::isError($rs) || $rs === false){
				return Ethna::raiseNotice('Tên đăng nhập không tồn tại. Xin vui lòng nhập lại', E_LOGIN_ID_ERROR);
			}
			return Ethna::raiseNotice('Mật khẩu không đúng. Xin vui lòng nhập lại', E_LOGIN_PASSWORD_ERROR);
		}

		$this->session->destroy();
		$this->session->start();
		$this->session->set('id', $rs);

		return $rs;
	}

	function generateMemberId() {
$sql = <<<EOD
INSERT INTO lg_memberid
(
	created
)
VALUES
(
	CURRENT_TIMESTAMP
)
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		return $db->insertId();
	}

	function logout() {
		$this->session->destroy();
		return TRUE;
	}

	function regist1st($id, $pwd, $tel, $email, $has_moba = FALSE, $code='') {
		if (! session_id()) {
			$this->session->start();
		}
		$this->session->set('tmp_user', array(
			'id' => $id,
			'pwd' => $pwd,
			'tel' => $tel,
			'email' => $email,
			'has_moba' => $has_moba,
			'code' => $code
		));
		header('Location: /reg.php?'.session_name().'='.session_id());
		exit;
	}

	function getTemporaryInfo() {
		if (! session_id()) {
			$this->session->restore();
		}
		$tmp = $this->session->get('tmp_user');
		return array(
			'handle' => $tmp['id']
		);
	}

	/**
	* 軍団長関連情報取得
	*
	*/
//TUT
	function getProfCard($member_id){

		$member_id = mysql_real_escape_string($member_id);

$sql = <<<EOD
SELECT
  memberid
 ,prof
 ,prof_gcnt
FROM
 t_user
WHERE
 memberid = '{$member_id}' 
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);

		if(Ethna::isError($rs) || $rs === false){
			return False;
		}

		return $rs;

	}

	/**
	* 軍団長関連情報設定
	*
	*/
//TUT
	function setProfCard($member_id,$bushoid){

		$member_id = mysql_real_escape_string($member_id);
		$bushoid = mysql_real_escape_string($bushoid);

		//prof_gcnt直前CHK 2->1 か 1->0
		$ret = $this->getProfCard($member_id);
		if($ret['prof_gcnt'] == 2){
			$afnum = 1;
		}elseif($ret['prof_gcnt'] == 1){
			$afnum = 0;
		}else{
			return True;
		}

$sql = <<<EOD
UPDATE
 t_user
SET
  prof_gcnt = {$afnum}
 ,prof = '{$bushoid}'
 ,upd_time = now() 
WHERE
  memberid = '{$member_id}'
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
	* COMEBAC情報CHK
	*
	*/
	function existsComeback($member_id){
		$escapedId = mysql_real_escape_string($member_id);
$sql = <<<EOD
SELECT
  date
 ,done
FROM
 t_comeback
WHERE
 memberid = '{$escapedId}'
AND
 done = 0 
ORDER BY date DESC
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

	/**
	* COMEBAC情報更新
	*
	*/
	function updComeback($member_id){
		$escapedId = mysql_real_escape_string($member_id);
$sql = <<<EOD
UPDATE 
 t_comeback 
SET 
  done = 1
 ,upd_time = now() 
WHERE
 memberid = '{$escapedId}'
AND
 done = 0 
EOD;

		$db = $this->backend->getDb();
		$rs = $db->query($sql);
		if (Ethna::isError($rs) || $rs== False) {
			return False;
		}

		return True;

	}

	/**
	* 所持小判CHK
	*
	*/
	function chkMoney($member_id){

		$member_id = mysql_real_escape_string($member_id);
$sql = <<<EOD
SELECT
 money
FROM
 t_user
WHERE
 memberid = {$member_id}
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return False;
		}

		return $rs;
	}

	/**
	* 所持Coin CHK
	*
	*/
	function chkCoin($member_id){

		$member_id = mysql_real_escape_string($member_id);
$sql = <<<EOD
SELECT
 coin
FROM
 t_user
WHERE
 memberid = {$member_id}
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return False;
		}

		return $rs;
	}

	/**
	* 新参者抽出
	*
	*/
	function getNewComer(){

		$today = date('Y-m-d');

$sql = <<<EOD
SELECT
  memberid
 ,handle
 ,level
 ,prof
FROM
 t_user
WHERE
 reg_time >= '{$today}' 
ORDER BY reg_time DESC
LIMIT 1
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);

		if(Ethna::isError($rs) || $rs === false){
			return False;
		}

		foreach($rs as $k => $v){
			$friendManager = $this->backend->getManager("Friend");
			$rs[$k]['friend_num'] = $friendManager->getFriendlistCount($rs[$k]['memberid'] ,$sta="2",$kb="");
			$member_id = $this->af->get('opensocial_owner_id');
			//$ret = getAvatar3D($member_id,$rs[$k]['memberid']);
			//$ret = getAvatar($member_id,$rs[$k]['memberid']);
			//$rs[$k]['avatarPath'] = $ret['avatar']['url'];
		}

		return $rs;

	}


	/**
	* ユーザ存在チェック
	*
	*/
	function existsUser($member_id){

		$member_id = mysql_real_escape_string($member_id);
$sql = <<<EOD
SELECT
 memberid
FROM
 t_user
WHERE
 del_flg = 0
AND
 memberid = {$member_id}
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);

		if(Ethna::isError($rs) || $rs === false){
			return False;
		}

		if(count($rs) == 0){
			return False;
		}

		return True;
	}


	function exitsRecordByHandle($handle) {
		$handle = mysql_real_escape_string($handle);
$sql = <<<EOD
SELECT
 memberid
FROM
 t_user
WHERE
 del_flg = 0
AND
 handle = '{$handle}'
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return False;
		}

		if(count($rs) == 0){
			return False;
		}

		return $rs['memberid'];
	}

	/**
	* プロフィール取得
	*
	*/
	function getProfile($id){

		$escapedId = mysql_real_escape_string($id);
		//SQL作成
$sql = <<<EOD
SELECT
 memberid
 ,handle
 ,handle_upd
 ,level
 ,stage
 ,email
 ,tel
 ,cl_cycle
 ,cl_masho
 ,get_masho
 ,exp
 ,money
 ,coin
 ,genki_rcv_time
 ,friend_pt
 ,bonus_get
 ,win_act
 ,lose_act
 ,win_pas
 ,lose_pas
 ,win_hlp
 ,lose_hlp
 ,ok_compose
 ,ng_compose
 ,ok_pcomp
 ,ng_pcomp
 ,gtxtid
 ,comm_upd
 ,trap1num
 ,trap2num
 ,prof
 ,deck1
 ,deck2
 ,deck3
 ,deck4
 ,deck5
 ,card_seq
 ,formno
 ,buki_num
 ,bougu_num
 ,buki_off
 ,buki_def
 ,bougu_off
 ,bougu_def
 ,tut_num
 ,inv_cnt
 ,lg_num
 ,lg_dest
 ,url
 ,reg_time
FROM
 t_user
WHERE
 del_flg = 0
AND
 memberid = '{$escapedId}'
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);

		if(Ethna::isError($rs) || $rs === false){
			return array();
		}
		//データ取得できない
		if(!$rs){
			return array();
		}

		//勝率の計算
		$rs['win']  = $rs['win_act']  + $rs['win_pas']  + $rs['win_hlp'];
		$rs['lose'] = $rs['lose_act'] + $rs['lose_pas'] + $rs['lose_hlp'];
		if($rs['win_act'] == 0 && $rs['lose_act'] == 0 ){
			$rs['rate_act'] = "-";
		}else{
			$rs['rate_act'] = floor($rs['win_act'] *100 / ($rs['win_act']+$rs['lose_act'] ));
		}
		if($rs['win_pas'] == 0 && $rs['lose_pas'] == 0 ){
			$rs['rate_pas'] = "-";
		}else{
			$rs['rate_pas'] = floor($rs['win_pas'] *100 / ($rs['win_pas']+$rs['lose_pas'] ));
		}
		if($rs['win_hlp'] == 0 && $rs['lose_hlp'] == 0 ){
			$rs['rate_hlp'] = "-";
		}else{
			$rs['rate_hlp'] = floor($rs['win_hlp'] *100 / ($rs['win_hlp']+$rs['lose_hlp'] ));
		}
		if($rs['win'] == 0 && $rs['lose'] == 0 ){
			$rs['rate'] = "-";
		}else{
			$rs['rate'] = floor($rs['win'] *100 / ($rs['win']+$rs['lose'] ));
		}
		//合成
		if($rs['ok_compose'] == 0 && $rs['ng_compose'] == 0 ){
			$rs['rate_lvcomp'] = "-";
		}else{
			$rs['rate_lvcomp'] = floor($rs['ok_compose'] *100 / ($rs['ok_compose']+$rs['ng_compose'] ));
		}
		if($rs['ok_pcomp'] == 0 && $rs['ng_pcomp'] == 0 ){
			$rs['rate_ptcomp'] = "-";
		}else{
			$rs['rate_ptcomp'] = floor($rs['ok_pcomp'] *100 / ($rs['ok_pcomp']+$rs['ng_pcomp'] ));
		}

		//げんき設定
		$ret = $this->getGenki($escapedId,$rs["genki_rcv_time"],$rs["level"]);

		//招待->入会者カウント加算(11/01/07) (11/1/14緊急修正)
		$rs['genki'] = $ret['genki'];
		$rs['max_genki'] = $ret['max_genki'] ;

		//TODO: nani kore ?
		$rs['rsv_time_min'] = @$ret['rsv_time_min'];
		$rs['rsv_time_sec'] = @$ret['rsv_time_sec'];

		//げんき回復時間分割
		if($rs["genki_rcv_time"]){
			$rsv = strtotime($rs["genki_rcv_time"]);
			$now = mktime();
			$diff = ($rsv - $now) * 3;
			if($diff > 0){
				$min = floor($diff / 60);
				$sec = $diff - ($min * 60);
				$rs["genki_rsv_time_min"] = $min ;
				$rs["genki_rsv_time_sec"] = $sec ;
			}
		}

		return $rs;
	}

	/**
	* deck情報取得
	*
	*/
	function getDeckProfile($id){

		$id = mysql_real_escape_string($id);
		//SQL作成
$sql = <<<EOD
SELECT
  memberid
 ,handle
 ,prof
 ,deck1
 ,deck2
 ,deck3
 ,deck4
 ,deck5
 ,card_seq
 ,buki_off
 ,buki_def
 ,bougu_off
 ,bougu_def
 ,formno
 ,tut_num
FROM
 t_user
WHERE
 del_flg = 0
AND
 memberid = {$id}
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);

		if(Ethna::isError($rs) || $rs === false){
			return array();
		}

		//データ取得できない
		if(!$rs){
			return array();
		}

		//follower合計取得
		$out = array();
		$cardManager = $this->backend->getManager("Card");
		if (empty($rs['deckOff']))
			$rs['deckOff'] = 0;
		if (empty($rs['deckDef']))
			$rs['deckDef'] = 0;
		if (empty($rs['follower']))
			$rs['follower'] = 0;
		for ($i=1; $i<=5; $i++) {
			$d = "deck".$i;
			//カード情報取得(t_card)
			$tmp = $cardManager->getCardInfo($id , $rs[$d] , 0);
			$rs['follower'] += $tmp['follower'];
			$rs['deckOff']  += $tmp['offense'] * 100;
			$rs['deckDef']  += $tmp['defense'] * 100;
			$out['card'.$i] = array(
				'follower' => $tmp['follower'],
				'offense' => $tmp['offense'] * 100,
				'defense' => $tmp['defense'] * 100
			);
		}

		//(最大)攻撃力・(最大)防御力取得
		$rs['offense'] = $rs['deckOff'] + $rs['buki_off'] + $rs['bougu_off'];
		$rs['defense'] = $rs['deckDef'] + $rs['buki_def'] + $rs['bougu_def'];
		/*
		$out['max-weapon'] = array(
			'offense' => $rs['buki_off'],
			'defense' => $rs['buki_def'],
			'follower' => 0
		);
		$out['max-armor'] = array(
			'offense' => $rs['bougu_off'],
			'defense' => $rs['bougu_def'],
			'follower' => 0
		);
		$off = 0;
		$def = 0;
		$fol = 0;
		foreach ($out as $k => $v) {
			$off += $v['offense'];
			$def += $v['defense'];
			$fol += $v['follower'];
			echo '<h2>'.$k.'</h2><div>offense:'.$v['offense'].'('.$off.')</div><div>defense:'.$v['defense'].'('.$def.')</div><div>follow:'.$v['follower'].'('.$fol.')</div>';
		}
		*/

		return $rs;

	}


	/**
	* 簡易プロフィール取得
	*
	*/
	function getSimpleProfile($id){
		$id = mysql_real_escape_string($id);
		//SQL作成
$sql = <<<EOD
SELECT
  memberid
 ,level
 ,money
 ,genki_rcv_time
 ,win_act
 ,lose_act
 ,win_pas
 ,lose_pas
 ,win_hlp
 ,lose_hlp
 ,handle
 ,inv_cnt
FROM
 t_user
WHERE
 del_flg = 0
AND
 memberid = {$id}
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);

		if(Ethna::isError($rs) || $rs === false){
			return array();
		}

		//データ取得できない
		if(!$rs){
			return array();
		}

		//勝率の計算
		$win  = $rs['win_act']  + $rs['win_pas']  + $rs['win_hlp'];
		$lose = $rs['lose_act'] + $rs['lose_pas'] + $rs['lose_hlp'];
		if($win == 0 && $lose == 0 ){
			$rs['rate'] = "";
		}else{
			$rs['rate'] = "(".floor($win *100 / ($win+$lose)) ."%)";
		}

		return $rs;

	}

	/**
	* お宝未コンプ他軍団一覧取得
	*
	*/
	function getNewTrOtherList($member_id ,$level  ,$tr_id,$limit=""){
		$member_id = mysql_real_escape_string($member_id);
		$level = mysql_real_escape_string($level);
		$tr_id = mysql_real_escape_string($tr_id);
		$limit = mysql_real_escape_string($limit);
		$friendManager = $this->backend->getManager("Friend");

		//シリーズID決定
		if( $tr_id % 5 == 0 ){
			$sr_id = intval($tr_id / 5);
		}else{
			$sr_id = intval($tr_id / 5) + 1;
		}

		//件数取得 //抽出LVは－10%～+20%
		$up_level  =  ceil($level * 3);
		$low_level = floor($level * 0.67);
		$where = " t_user.level >= {$low_level} AND t_user.level <= {$up_level} ";

		//該当お宝保有ユーザカウント
$sql = <<<EOD
SELECT
 count(t_user.memberid)
FROM
 t_user 
INNER JOIN  t_treasure ON t_treasure.memberid = t_user.memberid 
WHERE
 t_user.del_flg = 0 
AND
 t_user.memberid <> '{$member_id}' 
AND 
 {$where} 
 AND num > 0 AND trid = {$tr_id} 
ORDER BY t_user.memberid 
EOD;

		$db = $this->backend->getDb();
		$cnt = $db->getOne($sql);

		if(Ethna::isError($cnt) || $cnt === false){
			return False;
		}
		//該当お宝保有=0の場合
		if($cnt == 0){
			return $result;
		}

		//B:該当お宝保有ユーザ
$sqlB = <<<EOD
SELECT
 t_user.memberid
FROM
 t_user 
INNER JOIN  t_treasure ON t_treasure.memberid = t_user.memberid 
WHERE
 t_user.del_flg = 0 
AND
 t_user.memberid <> '{$member_id}' 
AND 
 {$where} 
 AND num > 0 AND trid = {$tr_id} 
ORDER BY t_user.memberid 
EOD;

		$db = $this->backend->getDb();
		$rsB = $db->getALL($sqlB);

		if(Ethna::isError($rsB) || $rsB === false){
			return False;
		}

		foreach($rsB as $k => $v){
			$rs1[$k]  = $rsB[$k]['memberid'];
		}

		//A:該当シリーズ コンプユーザ
$sqlA = <<<EOD
SELECT
 t_user.memberid
FROM
 t_user 
INNER JOIN  t_treasure ON t_treasure.memberid = t_user.memberid 
WHERE
 t_user.del_flg = 0 
AND
 t_user.memberid <> '{$member_id}' 
AND 
 {$where} 
 AND num > 0 AND seriesid = {$sr_id} 
GROUP BY t_user.memberid having count(trid) = 5 ORDER BY t_user.memberid 
EOD;

		$db = $this->backend->getDb();
		$rsA = $db->getAll($sqlA);
		if(Ethna::isError($rsA) || $rsA === false){
			return False;
		}
		$rs2 = array();
		foreach($rsA as $k => $v){
			$rs2[$k]  = $rsA[$k]['memberid'];
		}
		//該当お宝保有ユーザからコンプユーザを除外
		if(count($rs2) == 0 ){
			$tmp = $rs1;
		}else{
			$tmp = array_diff( $rs1, $rs2 );
		}
		$nwIdx = 0;
		foreach($tmp as $k => $v){
			$fight[$nwIdx]  = $tmp[$k];
			$nwIdx++;
		}

		if(count($fight) == 0 ){
			return $result;
		}

		//シャッフル
		if(shuffle($fight)){
		}

		$endP = count($fight);
		if($limit == "" || $limit >= $endP){
			$limit = $endP;
		}
		//決定数
		$done = 0;
		//for ループで配列要素数だけloopして規定数になればExit
		$decide = array();
		for ($i=0; $i < $endP; $i++) {
			//同盟 2
			//申請している 0 
			$ret1 = $friendManager->existsFriend($member_id ,$fight[$i]);
			//申請されている 0
			$ret2 = $friendManager->existsFriend($fight[$i],$member_id);
			$decide[$done] = $fight[$i];
			$done++;
			/*
			if($ret1 == "3" || ($ret1 == "-1" && $ret2 == "-1") ){
				//ユーザ確定
				$decide[$done] = $fight[$i];
				$done++;
			} else {
				var_dump($fight[$i], $ret1, $ret2);
			}
			*/
			//loopOutのCHK
			if($done == $limit){
				$i = $endP;
			}
		}
		//決定したユーザのみ詳細取得
		$result = array();
		for ($j=0; $j < count($decide); $j++) {
			$result[$j] = $this->getProfile($decide[$j]);
			$ret[$j]	= $this->getDeckProfile($decide[$j]);
			$result[$j]['follower'] = $ret[$j]['follower'];
		}

		return $result;
	}

	function countUser() {
$sql = <<<EOD
SELECT
  count(t_user.memberid) 
FROM
 t_user 
WHERE
 t_user.del_flg = 0 
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return FALSE;
		}
		return $rs;
	}

	/**
	* 他軍団一覧取得(　md="fr":同盟申請　md="":ファイト　)
	*
	*/
	function getNewOtherList($member_id ,$level, $th, $md, $limit="", $q='' ){

		$member_id = mysql_real_escape_string($member_id);
		$level = mysql_real_escape_string($level);
		$th = mysql_real_escape_string($th);
		$md = mysql_real_escape_string($md);
		$limit = mysql_real_escape_string($limit);
		$q = mysql_real_escape_string($q);
		$friendManager = $this->backend->getManager("Friend");

		if($th == "l"){
			$where = " AND t_user.level < {$level} ";
		}elseif($th == "h"){
			$where = " AND t_user.level > {$level} ";
		}else{
			//件数取得 //抽出LVは－10%～+20%
			if ($md != 'fr') {
				$up_level  =  ceil($level * 3);
				$low_level = floor($level * 0.67);
				$where = " AND t_user.level >= {$low_level} AND t_user.level <= {$up_level} ";
			} else {
				$where = '';
			}
		}
		if (! empty($q)) {
			$where .= ' AND t_user.handle like \'%'.$q.'%\'';
		}
/*
echo "<br>Lv:";
var_dump($low_level);
echo "-";
var_dump($up_level);
echo "<br>";
*/

$sql = <<<EOD
SELECT
  count(t_user.memberid) 
FROM
 t_user 
WHERE
 t_user.del_flg = 0 
AND
 t_user.memberid <> '{$member_id}' 
 {$where} 
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
		$decide = array();
		$useOffset = array();
		$exclude_member = array();

		//$limit分取得できるかoffsetを使い果たすまで
		while( count($useOffset) < $totalCount){

			//offset取得
			$offset = rand(0,$totalCount-1);
			if($useOffset[$offset] == True){
				//一度使ったoffsetなら再取得
				continue;
			}
			$useOffset[$offset] = True;

$sql = <<<EOD
SELECT
  t_user.memberid
 ,t_user.level
FROM
 t_user 
WHERE
 t_user.del_flg = 0 
AND
 t_user.memberid <> {$member_id} 
 {$where} 
LIMIT 1
OFFSET {$offset}
EOD;
//var_dump($sql);
			$rs = $db->getRow($sql);
			if(Ethna::isError($rs) || $rs === False){
				return array();
			}

			if($exclude_member[$rs['memberid']] == True){
				//一度使ったmemberidなら再取得
				continue;
			}
			$exclude_member[$rs['memberid']] = True;

			//同盟 2
			//申請している 0 
			$ret1 = $friendManager->existsFriend($member_id ,$rs['memberid']);
			//申請されている 0
			$ret2 = $friendManager->existsFriend($rs['memberid'],$member_id);
			if($ret1 == "3" || ($ret1 == "-1" && $ret2 == "-1") ){
				//同盟申請時のみ
				if($md == "fr"){
	   				$rs['friend_num'] = $friendManager->getFriendlistCount($rs['memberid'] ,$sta="2",$kb="");
					$nums['send'] = $friendManager->getFriendlistCount($rs['memberid'] ,$sta="0",$kb="send");
					$nums['rcv']  = $friendManager->getFriendlistCount($rs['memberid'] ,$sta="0",$kb="");
					$nums['max']  = $this->getMaxFriendContByLevel($rs['level']);
					$nums['rest'] = $nums['max'] - ( $rs['friend_num'] + $nums['send'] + $nums['rcv'] );
					if($nums['rest'] >= 1){
						//ユーザ確定
						$decide[] = $rs;
					}else{
						continue;
					}
				}else{
					//ユーザ確定
					$decide[] = $rs;
				}
			}else{
				continue;
			}

			if(count($decide) >= $limit){
				break;
			}

		}
/*
echo "<br>DONE:";
var_dump($decide);
*/
		//決定したユーザのみ詳細取得
		for ($j=0; $j < count($decide); $j++) {
			$result[$j] = $this->getProfile($decide[$j]['memberid']);
			$ret[$j]	= $this->getDeckProfile($decide[$j]['memberid']);
			$result[$j]['follower'] = $ret[$j]['follower'];
			//同盟申請時のみ
			if($md == "fr"){
				$result[$j]['friend_num'] = $friendManager->getFriendlistCount($decide[$j]['memberid'] ,$sta="2",$kb="");
			}
		}

		return $result;
	}


	/**
	* 他軍団一覧取得
	*
	*/
	function getOtherList($member_id ,$level ,$th ,$tr_id,$limit=""){

		$member_id = mysql_real_escape_string($member_id);
		$level = mysql_real_escape_string($level);
		$th = mysql_real_escape_string($th);
		$tr_id = mysql_real_escape_string($tr_id);
		$limit = mysql_real_escape_string($limit);
		$friendManager = $this->backend->getManager("Friend");

		if($th == "l"){
			$where = " t_user.level < {$level} ";
		}elseif($th == "h"){
			$where = " t_user.level > {$level} ";
		}else{
			//件数取得 //抽出LVは±20%
			$up_level  =  ceil($level * 3);
			$low_level = floor($level * 0.67);
			$where = " t_user.level >= {$low_level} AND t_user.level <= {$up_level} ";
		}
		
$sql = <<<EOD
SELECT
  count(t_user.memberid) as cnt
FROM
 t_user 
EOD;
		if($tr_id != ""){
$sql .= " INNER JOIN t_treasure ON t_treasure.memberid = t_user.memberid ";
		}
$sql .= <<<EOD
WHERE
 t_user.del_flg = 0 
AND
 t_user.memberid <> '{$member_id}' 
AND 
 {$where} 
EOD;
		if($tr_id != ""){
$sql .= " AND num > 0 AND trid = {$tr_id} ";
		}
//var_dump($sql);
		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return array();
		}
		$totalCount = $rs;

//var_dump($limit);
//var_dump($totalCount);
		if($limit == "" || $limit >= $totalCount){
			$limit = $totalCount;
		}

//var_dump($limit);
//var_dump($totalCount);

		srand();
		$result = array();
		$useOffset = array();
		$exclude_member = array();
		//$limit分取得できるかoffsetを使い果たすまで

		while( count($useOffset) < $totalCount){

			//offset取得
			$offset = rand(0,$totalCount-1);
			if($useOffset[$offset] == True){
				//一度使ったoffsetなら再取得
				continue;
			}
			$useOffset[$offset] = True;

$sql = <<<EOD
SELECT
  t_user.memberid
 ,t_user.level
 ,t_user.handle
 ,t_user.win_act
 ,t_user.lose_act
 ,t_user.win_pas
 ,t_user.lose_pas
 ,t_user.win_hlp
 ,t_user.lose_hlp
 ,t_user.prof
FROM
 t_user 
EOD;
		if($tr_id != ""){
$sql .= " INNER JOIN t_treasure ON t_treasure.memberid = t_user.memberid ";
		}
$sql .= <<<EOD
WHERE
 t_user.del_flg = 0 
AND
 t_user.memberid <> {$member_id} 
AND 
 {$where} 
EOD;
		if($tr_id != ""){
$sql .= " AND num > 0 AND trid = {$tr_id} ";
		}
$sql .= <<<EOD
LIMIT 1
OFFSET {$offset}
EOD;
//var_dump($sql);

			$rs = $db->getRow($sql);

//var_dump($rs['memberid']);

			if(Ethna::isError($rs) || $rs === False){
				return array();
			}

			if($exclude_member[$rs["memberid"]] == True){
				//一度使ったmemberidなら再取得
				continue;
			}
			$exclude_member[$rs["memberid"]] = True;

			//同盟 2
			//申請している 0 
			$ret1 = $friendManager->existsFriend($member_id ,$rs['memberid']);
			//申請されている 0
			$ret2 = $friendManager->existsFriend($rs['memberid'],$member_id);
			if($ret1 == "3" || ($ret1 == "-1" && $ret2 == "-1") ){
				//勝率の計算
				$rs['win']  = $rs['win_act']  + $rs['win_pas']  + $rs['win_hlp'];
				$rs['lose'] = $rs['lose_act'] + $rs['lose_pas'] + $rs['lose_hlp'];
				if($rs['win'] == 0 && $rs['lose'] == 0 ){
					$rs['rate'] = "-";
				}else{
					$rs['rate'] = floor($rs['win'] *100 / ($rs['win']+$rs['lose'] ));
				}
				$deck = $this->getDeckProfile($rs['memberid']);
				$rs['follower']  = $deck['follower'];

				//お宝狙った場合
				if($tr_id != ""){
					$treasureManager = $this->backend->getManager("Treasure");
					$has = $treasureManager->chkOtherAlreadyComp($rs['memberid'],$tr_id);
					if($has < 5){
						$rs['friend_num'] = $friendManager->getFriendlistCount($rs['memberid'] ,$sta="2",$kb="");
						$nums['send'] = $friendManager->getFriendlistCount($rs['memberid'] ,$sta="0",$kb="send");
						$nums['rcv']  = $friendManager->getFriendlistCount($rs['memberid'] ,$sta="0",$kb="");
						$nums['max']  = $this->getMaxFriendContByLevel($rs['level']);
						$nums['rest'] = $nums['max'] - ( $rs['friend_num'] + $nums['send'] + $nums['rcv'] );
						if($nums['rest'] >= 1){
							//ユーザ確定
							//$retAv = getAvatar($member_id,$rs['memberid']);
							//$rs['avatarPath'] = $retAv['avatar']['url'];
							$result[] = $rs;
						}else{
							continue;
						}
					}else{
						continue;
					}
				}else{
	   				$rs['friend_num'] = $friendManager->getFriendlistCount($rs['memberid'] ,$sta="2",$kb="");
					$nums['send'] = $friendManager->getFriendlistCount($rs['memberid'] ,$sta="0",$kb="send");
					$nums['rcv']  = $friendManager->getFriendlistCount($rs['memberid'] ,$sta="0",$kb="");
					$nums['max']  = $this->getMaxFriendContByLevel($rs['level']);
					$nums['rest'] = $nums['max'] - ( $rs['friend_num'] + $nums['send'] + $nums['rcv'] );
					if($nums['rest'] >= 1){
						//ユーザ確定
						//$retAv = getAvatar($member_id,$rs['memberid']);
						//$rs['avatarPath'] = $retAv['avatar']['url'];
						$result[] = $rs;
					}else{
						continue;
					}
				}
			}else{
				continue;
			}

			if(count($result) >= $limit){
				break;
			}

		}

		return $result;
	}

   /**
	* 敗戦相手リスト取得
	*
	*/
	function getRevengelist($member_id , $sort="",$limit="" ,$offset=""){

		$member_id = mysql_real_escape_string($member_id);
		$sort = mysql_real_escape_string($sort);
		$limit = mysql_real_escape_string($limit);
		$offset = mysql_real_escape_string($offset);

		$sqlOrder = "";
		switch($sort){
			case "old":
				$sqlOrder = " ORDER BY upd_time ";
				break;
			case "high":
				$sqlOrder = " ORDER BY level DESC ";
				break;
			case "low":
				$sqlOrder = " ORDER BY level ";
				break;
			default:
				$sqlOrder = " ORDER BY upd_time DESC ";
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

$sql = <<<EOD
SELECT
  t_fight.friendid as id
 ,t_fight.upd_time
 ,t_user.level
 ,t_user.handle
 ,t_user.win_act
 ,t_user.lose_act
 ,t_user.win_pas
 ,t_user.lose_pas
 ,t_user.win_hlp
 ,t_user.lose_hlp
 ,t_user.prof
FROM 
 t_fight
INNER JOIN
 t_user
ON
 t_fight.friendid = t_user.memberid 
WHERE
 t_fight.memberid = {$member_id} 
AND
 t_fight.lose > 0 
AND
 t_user.del_flg = 0 
UNION 
 SELECT
  t_fight.memberid as id
 ,t_fight.upd_time
 ,t_user.level
 ,t_user.handle
 ,t_user.win_act
 ,t_user.lose_act
 ,t_user.win_pas
 ,t_user.lose_pas
 ,t_user.win_hlp
 ,t_user.lose_hlp
 ,t_user.prof
FROM 
 t_fight
INNER JOIN
 t_user
ON
 t_fight.memberid = t_user.memberid 
WHERE
 t_fight.friendid = {$member_id} 
AND
 t_fight.win > 0 
AND
 t_user.del_flg = 0 
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

		foreach($rs as $k => $v){
			//勝率の計算
			$rs[$k]['win']  = $rs[$k]['win_act']  + $rs[$k]['win_pas']  + $rs[$k]['win_hlp'];
			$rs[$k]['lose'] = $rs[$k]['lose_act'] + $rs[$k]['lose_pas'] + $rs[$k]['lose_hlp'];
			if($rs[$k]['win'] == 0 && $rs[$k]['lose'] == 0 ){
				$rs[$k]['rate'] = "-";
			}else{
				$rs[$k]['rate'] = floor($rs[$k]['win'] *100 / ($rs[$k]['win']+$rs[$k]['lose'] ));
			}
			$deck = $this->getDeckProfile($rs[$k]['id']);
			$rs[$k]['follower']  = $deck['follower'];
		}

		return $rs;

	}

   /**
	* 敗戦相手リスト数取得
	*
	*/
	function getRevengelistCount($member_id){
		$member_id = mysql_real_escape_string($member_id);
	//攻撃側で負けた場合と防御側で負けた場合
$sql = <<<EOD
SELECT
  t_fight.friendid as id
FROM 
 t_fight
INNER JOIN
 t_user
ON
 t_fight.friendid = t_user.memberid 
WHERE
 t_fight.memberid = {$member_id} 
AND
 t_fight.lose > 0 
AND
 t_user.del_flg = 0 
UNION 
 SELECT
  t_fight.memberid as id
FROM 
 t_fight
INNER JOIN
 t_user
ON
 t_fight.memberid = t_user.memberid 
WHERE
 t_fight.friendid = {$member_id} 
AND
 t_fight.win > 0 
AND
 t_user.del_flg = 0 
EOD;
//var_dump($sql);
		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);

		if(Ethna::isError($rs) || $rs === false){
			return False;
		}

		$cnt = count($rs);
//var_dump($cnt);
		return $cnt;

	}

	/**
	* 総ユーザ数
	*
	*/
	function getMaxUser(){
		$sql = "SHOW TABLE STATUS WHERE Name = 't_user'";

		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);

		if(Ethna::isError($rs) || $rs === false){
			return array();
		}

		return ($rs['Auto_increment'] - 1);
	}

	/**
	* げんき回復登録
	*
	*/
	function setRcv($member_id ){	//$form_id
		$member_id = mysql_real_escape_string($member_id);
		//げんき回復1日3回まで
		$num = $this->existsRcv($member_id ,$num);

		//$ym = date('Ym');
		$d = date('d');

		if($num >= 3 ){
			return True;
		}

		if($num == 0){
$sql = <<<EOD
INSERT INTO
 lg_rcv
(
  memberid
 ,dd
 ,num
 ,reg_time
 ,upd_time
)
VALUES
(
 '{$member_id}'
 ,'{$d}'
 ,1
 ,now()
 ,now()
)
EOD;
		}elseif($num <= 2){
$sql = <<<EOD
UPDATE
 lg_rcv
SET
  num = num + 1
 ,upd_time = now()
WHERE
  memberid = '{$member_id}'
AND
 dd ='{$d}'
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
	* げんき回復チェック
	*
	*/
	function existsRcv($member_id ,$num){
		$member_id = mysql_real_escape_string($member_id);
		$num = mysql_real_escape_string($num);
		$d = date('d');
$sql = <<<EOD
SELECT
 num
FROM
 lg_rcv
WHERE
 memberid = '{$member_id}'
AND
 dd = '{$d}'
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);

		if(Ethna::isError($rs) || $rs === false){
			return array();
		}

		//レコード無
		if(count($rs) == 0){
			$num = 0;
			return (int)$num;
		}else{
			$num = $rs['0']['num'];
			return (int)$num;
		}

	}

	/**
	* あいさつ登録
	*
	*/
	function setGreeting($member_id ,$friend_id){

		$member_id = mysql_real_escape_string($member_id);
		$escapedFriendId = mysql_real_escape_string($friend_id);

		//ニコニコは1人1日3回まで
		$ret = $this->existsGreeting($member_id ,$friend_id);
		$num = (int)$ret;
		$d = date('d');

		if($num == 0){
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
 ,1
 ,now()
 ,now()
)
EOD;

			$db = $this->backend->getDb();
			$rs = $db->query($sql);
			if (Ethna::isError($rs) || $rs== False) {
				return False;
			}

		}elseif($num <= 2){
$sql = <<<EOD
UPDATE
 lg_greeting
SET
  num = num + 1
 ,upd_time = now()
WHERE
  memberid = '{$escapedFriendId}'
AND
  friendid = '{$member_id}'
AND
 dd ='{$d}'
EOD;

			$db = $this->backend->getDb();
			$rs = $db->query($sql);
			if (Ethna::isError($rs) || $rs== False) {
				return False;
			}

		}

		return $num;
	}

	/**
	* あいさつチェック
	*
	*/
	function existsGreeting($member_id ,$friend_id){

		$member_id = mysql_real_escape_string($member_id);
		$escapedFriendId = mysql_real_escape_string($friend_id);
		//$ym = date('Ym');
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

		if(Ethna::isError($rs) || $rs === false){
			return array();
		}

		//レコード無
		if(count($rs) == 0){
			$num = 0;
			return (int)$num;
		}else{
			$num = $rs;
			return (int)$num;
		}

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

	/**
	* ユーザ登録
	*
	*/
	function setUser($member_id,$handle,$money,$prof,$lg_dest,$url,$birth,$gender){
		if (! session_id()) {
			$this->session->start();
		}
		$tmp_user = $this->session->get('tmp_user');
		if (empty($tmp_user)) {
			$tmp_user = array(
				'id' => '', 'pwd' => '', 'tel' => 'bug', 'email' => ''
			);
		}/* else {
			if (empty($tmp_user['has_moba'])) {
				$mobaManager = $this->backend->getManager("Moba");
				$mobaManager->init('linhtrieu', 'tyeskuateaktnvt8yDkjtE');
				try {
					$moba_ret = $mobaManager->signup(
						$tmp_user['id'],
						$tmp_user['pwd'],
						$tmp_user['tel'],
						$tmp_user['email']
					);
					if (empty($moba_ret['ret']))
						return FALSE;
				} catch (Exception $ex) {
					return FALSE;
				}
			}
		}*/
		$handle = mysql_real_escape_string($tmp_user['id']);
		$pwd = sha1('masho'.$tmp_user['pwd']);
		$tel = mysql_real_escape_string($tmp_user['tel']);
		$email = mysql_real_escape_string($tmp_user['email']);
		$member_id = mysql_real_escape_string($member_id);

		$money = mysql_real_escape_string($money);
		$prof = mysql_real_escape_string($prof);
		$lg_dest = mysql_real_escape_string($lg_dest);
		$url = mysql_real_escape_string($url);
		$birth = mysql_real_escape_string($birth);
		$gender = mysql_real_escape_string($gender);

		$ret = $this->existsRecord($member_id);
		if($ret == True){
		//del_flg=0以外の状態でデータがあるとき
$sql = <<<EOD
DELETE FROM 
 t_user
WHERE
 memberid = {$member_id}
EOD;
			$db = $this->backend->getDb();
			$rs = $db->query($sql);

			if (Ethna::isError($rs) || $rs== False) {
			//エラーの場合の処理
				return False;
			}
$sql = <<<EOD
DELETE FROM 
 t_card
WHERE
 memberid = {$member_id}
EOD;
			$db = $this->backend->getDb();
			$rs = $db->query($sql);

			if (Ethna::isError($rs) || $rs== False) {
			//エラーの場合の処理
				return False;
			}
		}

$sql = <<<EOD
INSERT INTO
 t_user
(
  memberid
 ,handle
 ,password
 ,email
 ,tel
 ,money
 ,prof
 ,lg_dest
 ,url
 ,birthday
 ,gender
 ,handle_upd
 ,reg_time
 ,upd_time
)
VALUES
(
  '{$member_id}'
 ,'{$handle}'
 ,'{$pwd}'
 ,'{$email}'
 ,'{$tel}'
 ,'{$money}'
 ,'{$prof}'
 ,'{$lg_dest}'
 ,'{$url}'
 ,'{$birth}'
 ,'{$gender}'
 ,now()
 ,now()
 ,now()
)
EOD;

		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if (Ethna::isError($rs) || $rs== False) {
		//エラーの場合の処理
			return False;
		}

		if (! empty($tmp_user['code'])) {
			$friendManager = $this->backend->getManager('Friend');
			$friendManager->useCode(
				$tmp_user['code'],
				$tel,
				$member_id
			);
		}

		return True;
	}

	/**
	* t_user レコード存在チェック
	*
	*/
	function existsRecord($member_id){
		$member_id = mysql_real_escape_string($member_id);
$sql = <<<EOD
SELECT
 memberid
FROM
 t_user
WHERE
 memberid = {$member_id}
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);

		if(Ethna::isError($rs) || $rs === false){
			return False;
		}

		if(count($rs) == 0){
			return False;
		}

		return True;

	}

	/**
	 * データ更新
	 */
	function updateUser($params){
		if(!$params["memberid"] || !is_numeric($params["memberid"])){
			return false;
		}

		$sets = array();
		if(isset($params["level"])){
			$lgManager = $this->backend->getManager("Lg");
			$lgManager->writeLevelLog($params['memberid'], $params['level']);	// no check result
			$sets[] = "level='".mysql_real_escape_string($params['level'])."'";
		}
		if(isset($params["stage"])){
			$sets[] = "stage='".mysql_real_escape_string($params['stage'])."'";
		}
		if(isset($params["cl_cycle"])){
			$sets[] = "cl_cycle='".mysql_real_escape_string($params['cl_cycle'])."'";
		}
		if(isset($params["cl_masho"])){
			$sets[] = "cl_masho='".mysql_real_escape_string($params['cl_masho'])."'";
		}
		if(isset($params["get_masho"])){
			$sets[] = "get_masho='".mysql_real_escape_string($params['get_masho'])."'";
		}
		if(isset($params["exp"])){
			$sets[] = "exp='".mysql_real_escape_string($params['exp'])."'";
		}
		if(isset($params["money"])){
			$sets[] = "money='".mysql_real_escape_string($params['money'])."'";
		}
		if(isset($params["trap1num"])){
			$sets[] = "trap1num = ".mysql_real_escape_string($params['trap1num']);
		}
		if(isset($params["trap2num"])){
			$sets[] = "trap2num = ".mysql_real_escape_string($params['trap2num']);
		}
		if(isset($params["genki_rcv_time"])){
			$sets[] = "genki_rcv_time='".mysql_real_escape_string($params['genki_rcv_time'])."'";
		}
		if(isset($params["friend_pt"])){
			$sets[] = "friend_pt='".mysql_real_escape_string($params['friend_pt'])."'";
		}
		if(isset($params["win_act"])){
			$sets[] = "win_act='".mysql_real_escape_string($params['win_act'])."'";
		}
		if(isset($params["win_pas"])){
			$sets[] = "win_pas='".mysql_real_escape_string($params['win_pas'])."'";
		}
		if(isset($params["win_hlp"])){
			$sets[] = "win_hlp='".mysql_real_escape_string($params['win_hlp'])."'";
		}
		if(isset($params["lose_act"])){
			$sets[] = "lose_act='".mysql_real_escape_string($params['lose_act'])."'";
		}
		if(isset($params["lose_pas"])){
			$sets[] = "lose_pas='".mysql_real_escape_string($params['lose_pas'])."'";
		}
		if(isset($params["lose_hlp"])){
			$sets[] = "lose_hlp='".mysql_real_escape_string($params['lose_hlp'])."'";
		}
		//デッキ1～5とプロフ
		if(isset($params["prof"])){
			$sets[] = "prof='".mysql_real_escape_string($params['prof'])."'";
		}
		if(isset($params["deck1"])){
			$sets[] = "deck1='".mysql_real_escape_string($params['deck1'])."'";
		}
		if(isset($params["deck2"])){
			$sets[] = "deck2='".mysql_real_escape_string($params['deck2'])."'";
		}
		if(isset($params["deck3"])){
			$sets[] = "deck3='".mysql_real_escape_string($params['deck3'])."'";
		}
		if(isset($params["deck4"])){
			$sets[] = "deck4='".mysql_real_escape_string($params['deck4'])."'";
		}
		if(isset($params["deck5"])){
			$sets[] = "deck5='".mysql_real_escape_string($params['deck5'])."'";
		}
		if(isset($params["formno"])){
			$sets[] = "formno='".mysql_real_escape_string($params['formno'])."'";
		}

		//ファイト　アイテム関連 (加算パターン）
		if(isset($params["buki_num"])){
			$sets[] = "buki_num = buki_num + ".mysql_real_escape_string($params['buki_num']);
		}
		if(isset($params["bougu_num"])){
			$sets[] = "bougu_num = bougu_num + ".mysql_real_escape_string($params['bougu_num']);
		}
		//Powerは毎回セット
		if(isset($params["buki_off"])){
			$sets[] = "buki_off = ".mysql_real_escape_string($params['buki_off']);
		}
		if(isset($params["bougu_off"])){
			$sets[] = "bougu_off = ".mysql_real_escape_string($params['bougu_off']);
		}		
		if(isset($params["buki_def"])){
			$sets[] = "buki_def = " .mysql_real_escape_string($params['buki_def']);
		}
		if(isset($params["bougu_def"])){
			$sets[] = "bougu_def = " .mysql_real_escape_string($params['bougu_def']);
		}
		if(isset($params["tut_num"])){
			$sets[] = "tut_num = " .mysql_real_escape_string($params['tut_num']);
		}
		//招待処理
		if(isset($params["inviteid"])){
			$sets[] = "inviteid='".mysql_real_escape_string($params['inviteid'])."'";
		}
		//退会処理
		if(isset($params["del_flg"])){
			$sets[] = "del_flg='".mysql_real_escape_string($params['del_flg'])."'";
		}

		if(isset($params["lg_num"])){
			$sets[] = "lg_num='".mysql_real_escape_string($params['lg_num'])."'";
		}
		//ハンドル名
		//if(isset($params["handle"])){
		//	$sets[] = "handle='".mysql_real_escape_string($params['handle'])."'";
		//}
		//if(isset($params["handle_upd"])){
		//	$sets[] = "handle_upd =  now() ";
		//}
		//user_hash
		if(isset($params["user_hash"])){
			$sets[] = "user_hash='".mysql_real_escape_string($params['user_hash'])."'";
		}
		//キャリア+UA
		if(isset($params["carrier"])){
			$sets[] = "carrier='".mysql_real_escape_string($params['carrier'])."'";
		}
		if(isset($params["ua"])){
			$sets[] = "ua='".mysql_real_escape_string($params['ua'])."'";
		}
		//ひとことコメント
		if(isset($params["gtxtid"])){
			$sets[] = "gtxtid='".mysql_real_escape_string($params['gtxtid'])."'";
		}
		if(isset($params["comm_upd"])){
			$sets[] = "comm_upd =  now() ";
		}
		if(count($sets) == 0){
			//更新データなし
			return true;
		}

		$set = implode(",", $sets);

$sql = <<<EOD
UPDATE t_user SET 
 {$set}
 ,upd_time = now() 
WHERE memberid = {$params["memberid"]}
EOD;

		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if(Ethna::isError($rs) || $rs === false){
			return false;
		}

		return true;
	}

	/**
	* 同盟数チェック
	*
	*/
	function getMaxFriendContByLevel($level){

		$level = mysql_real_escape_string($level);
$sql = <<<EOD
SELECT
  max_friend
FROM
 m_exp_level
WHERE
 levelid = {$level}
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return False;
		}

		return $rs;
	}

	/**
	* MAXげんきチェック
	*
	*/
	function getMaxGenkiContByLevel($level){

		$level = mysql_real_escape_string($level);
$sql = <<<EOD
SELECT
  max_genki
FROM
 m_exp_level
WHERE
 levelid = {$level}
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return False;
		}

		return $rs;
	}

	/**
	* 次の経験値チェック
	*
	*/
	function getNextExpContByLevel($level){

		$level = mysql_real_escape_string($level);
$sql = <<<EOD
SELECT
  exp
FROM
 m_exp_level
WHERE
 levelid = {$level}
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return False;
		}

		return $rs;
	}

	/**
	* 前の経験値チェック　
	*
	*/
	function getPrevExpContByLevel($level){

		$level = mysql_real_escape_string($level);
		$prev = $level - 1;

$sql = <<<EOD
SELECT
  exp
FROM
 m_exp_level
WHERE
 levelid = {$prev}
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
	function getLevelContByExp($exp){

		$exp = mysql_real_escape_string($exp);
$sql = <<<EOD
SELECT
 min(levelid) 
FROM
 m_exp_level
WHERE
  exp >= {$exp}
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return False;
		}

		return $rs;
	}

	/**
	* ステージ総数
	*
	*/
	function getStageMaxNum(){
$sql = <<<EOD
SELECT
 count(*)
FROM
 m_stage
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		return $rs;
	}

	/**
	* ステージ名取得
	*
	*/
	function getStageName($id){

		$id = mysql_real_escape_string($id);
		$maxId = $this->getStageMaxNum();
		if($id > $maxId){
			$id = $maxId;
		}

$sql = <<<EOD
SELECT
  name
FROM
 m_stage
WHERE
 stageid = {$id}
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return "";
		}

		return $rs;

	}

	/**
	* ステージ色取得　6桁
	*
	*/
	function getStageColor($id){

		$id = mysql_real_escape_string($id);
		$maxId = $this->getStageMaxNum();
		if($id > $maxId){
			$id = $maxId;
		}

$sql = <<<EOD
SELECT
  color
FROM
 m_stage
WHERE
 stageid = {$id}
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		if(Ethna::isError($rs) || $rs === false){
			return "";
		}

		$tmp = explode("|",$rs);
		$result['main'] = $tmp['0'];
		$result['sub'] = $tmp['1'];
		$result['text'] = $tmp['2'];

		return $result;

	}

	/**
	* クリアステージ名取得
	*
	*/
	function getClearStageName($id){

		$id = mysql_real_escape_string($id);
		$maxId = $this->getStageMaxNum();
		if($id > $maxId){
			$id = $maxId;
		}

$sql = <<<EOD
SELECT
  name
FROM
 m_stage
WHERE
 stageid <= {$id}
EOD;

		$db = $this->backend->getDb();
		$rs1 = $db->getAll($sql);

		if(Ethna::isError($rs1) || $rs1 === false){
			return "";
		}

		foreach($rs1 as $k => $v){
			if($k == 0){
				$rs .= $rs1[$k]['name'];
			}else{
				$rs .= "/".$rs1[$k]['name'];
			}
		}

		return $rs;

	}

	//げんき回復時間計算
	function getGenkiRcvTime($member_id , $genki){

		$member_id = mysql_real_escape_string($member_id);
		$genki = mysql_real_escape_string($genki);
		//現状のgenki_rcv_time に消費げんき($genki)×3　の時刻を加算
		$ret = $this->getSimpleProfile($member_id);
		$org = $ret['genki_rcv_time'];

		$add_sec = $genki * 60 * 3;

		$nowTime = mktime();
		
		if($org !== NULL) {
			$rcvTime = strtotime($org) + $add_sec;
			//genki_rcv_timeが過去日付の場合の処理
			$rcvTime = $rcvTime < $nowTime ? $nowTime + $add_sec : $rcvTime;
		} else {
			$rcvTime = $nowTime + $add_sec;
		}

		$genki_rcv_time = date("Y-m-d H:i:s", $rcvTime);

		return $genki_rcv_time;
	}

	//げんき算出
	function getGenki($member_id,$genki_rcv_time , $level){

		$genki_rcv_time = mysql_real_escape_string($genki_rcv_time);
		$level = mysql_real_escape_string($level);

		//11/1/14追加
		$rt = $this->getSimpleProfile($member_id);
		$maxGenki = $this->getMaxGenkiContByLevel($level)+ $rt['inv_cnt'];

		if($genki_rcv_time == NULL){
			$ret = array('genki'	=> $maxGenki,
						'max_genki'=> $maxGenki,);
			return $ret;
		}

		$rcv = strtotime($genki_rcv_time);
		$now = mktime();

		$diff = $rcv - $now;

		if($diff > 0){
			$min = floor($diff / 60);
			$sec = $diff - ($min * 60);
			$rsv_time_min = $min;
			$rsv_time_sec = $sec;
		}
	
		//3分で1ポイント回復
//		$genki = $maxGenki - floor($diff/60/3);
		$genki = $maxGenki - ceil($diff/60/3);

		if($genki > $maxGenki){
			$genki = $maxGenki;
		}else if($genki < 0){
			$genki = 0;
		}

		$ret['genki'] = $genki;
		$ret['max_genki'] = $maxGenki;
		$ret['rsv_time_min'] = @$rsv_time_min;
		$ret['rsv_time_sec'] = @$rsv_time_sec;

		return $ret;
	}

	function addCoin($member_id, $coin, $description='', $operator='system') {
		$coin = mysql_real_escape_string($coin);
		$member_id= mysql_real_escape_string($member_id);
		$description = mysql_real_escape_string($description);
		$operator = mysql_real_escape_string($operator);
		$user_agent = $_SERVER["HTTP_USER_AGENT"];
		$remote_addr = $_SERVER["REMOTE_ADDR"];

		$db = $this->backend->getDb();

$sql = <<<EOD
INSERT INTO lg_point
(
	memberid,
	add_point,
	description,
	operator,
	user_agent,
	remote_addr,
	reg_time
)
VALUES
(
	'{$member_id}',
	'{$coin}',
	'{$description}',
	'{$operator}',
	'{$user_agent}',
	'{$remote_addr}',
	CURRENT_TIMESTAMP
)
EOD;

		$ret1 = $db->query($sql);
$sql = <<<EOD
UPDATE
 t_user
SET
coin = coin + {$coin}
WHERE
memberid = '{$member_id}'
EOD;

		$ret2 = $db->query($sql);
		if (Ethna::isError($ret1) || $ret1== False || Ethna::isError($ret2) || $ret2 == False) {
			return FALSE;
		}

		return TRUE;
	}

	function cointToMoney($member_id,$coin,$money,$subCoin,$addMoney){
		$coin = mysql_real_escape_string($coin);
		$money = mysql_real_escape_string($money);
		$subCoin = mysql_real_escape_string($subCoin);
		$addMoney = mysql_real_escape_string($addMoney);
		$m=$money+$addMoney;
		$c=$coin-$subCoin;
$sql = <<<EOD
UPDATE
 t_user
SET
  money={$m}
,coin ={$c}
WHERE
  memberid = '{$member_id}'
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);
		if (Ethna::isError($rs) || $rs== False) {
			return False;
		}
		return True;
	}
	
	function checkUserForgot($username){
		$username = mysql_real_escape_string($username);
$sql = <<<EOD
SELECT
 email,memberid
FROM
 t_user
WHERE
 handle = '{$username}'
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);
		if(Ethna::isError($rs) || $rs === false){
			return False;
		}
		return $rs;
	}
	function setForgotCode($memberid){
		$memberid = mysql_real_escape_string($memberid);
		$code=sha1($memberid. time());
$sql = <<<EOD
INSERT INTO
 lg_forgot_code
(
  memberid
 ,code
)
VALUES
(
  '{$memberid }'
 ,'{$code}'
)
EOD;

			$db = $this->backend->getDb();
			$rs = $db->query($sql);
			if (Ethna::isError($rs) || $rs== False) {
				return False;
			}
		return True;
	}
	function checkForgotCode($code){
		$code = mysql_real_escape_string($code);
$sql = <<<EOD
SELECT
 *
FROM
 lg_forgot_code
WHERE
 code = '{$code}'
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);
		if(Ethna::isError($rs) || $rs === false){
			return False;
		}
		return $rs;
	}
	
	/**
	* 退会時複数テーブル削除
	*
	*/
	function deleteTables($member_id){
		$member_id = mysql_real_escape_string($member_id);
/*
以下は保持
＜＜t_invite＞＞
*/

//1 t_card
$sql = <<<EOD
DELETE FROM 
 t_card
WHERE
 memberid = {$member_id}
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if (Ethna::isError($rs) || $rs== False) {
			return False;
		}
//2 t_item
$sql = <<<EOD
DELETE FROM 
 t_item
WHERE
 memberid = {$member_id}
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);
		
		if (Ethna::isError($rs) || $rs== False) {
			return False;
		}
//3 t_treasure
$sql = <<<EOD
DELETE FROM 
 t_treasure
WHERE
 memberid = {$member_id}
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if (Ethna::isError($rs) || $rs== False) {
			return False;
		}
//4 t_wish
$sql = <<<EOD
DELETE FROM 
 t_wish
WHERE
 memberid = {$member_id}
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if (Ethna::isError($rs) || $rs== False) {
			return False;
		}
//5 t_fight
$sql = <<<EOD
DELETE FROM 
 t_fight
WHERE
 memberid = {$member_id}
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if (Ethna::isError($rs) || $rs== False) {
			return False;
		}
//6 t_cycle
$sql = <<<EOD
DELETE FROM 
 t_cycle
WHERE
 memberid = {$member_id}
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if (Ethna::isError($rs) || $rs== False) {
			return False;
		}
//7 t_quest
$sql = <<<EOD
DELETE FROM 
 t_quest
WHERE
 memberid = {$member_id}
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if (Ethna::isError($rs) || $rs== False) {
			return False;
		}
//8 lg_quest
$sql = <<<EOD
DELETE FROM 
 lg_quest
WHERE
 memberid = {$member_id}
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if (Ethna::isError($rs) || $rs== False) {
			return False;
		}
//9 t_incentive
$sql = <<<EOD
DELETE FROM 
 t_incentive
WHERE
 memberid = {$member_id}
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if (Ethna::isError($rs) || $rs== False) {
			return False;
		}
//10 t_friend
$sql = <<<EOD
DELETE FROM 
 t_friend
WHERE
 memberid = {$member_id}
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if (Ethna::isError($rs) || $rs== False) {
			return False;
		}
//11 t_friend
$sql = <<<EOD
DELETE FROM 
 t_friend
WHERE
 friendid = {$member_id}
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if (Ethna::isError($rs) || $rs== False) {
			return False;
		}
//12 lg_event
$sql = <<<EOD
DELETE FROM 
 lg_event
WHERE
 memberid = {$member_id}
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if (Ethna::isError($rs) || $rs== False) {
			return False;
		}

//13 lg_friend
$sql = <<<EOD
DELETE FROM 
 lg_friend
WHERE
 memberid = {$member_id}
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if (Ethna::isError($rs) || $rs== False) {
			return False;
		}


		return True;

	}

}
?>
