<?php
/**
 *  M_TreasureManager.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  M_TreasureManager
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_TreasureManager extends M_Manager
{

	/* シリーズ毎保有数CHK */
	function chkOtherAlreadyComp($member_id,$tr_id){

		$member_id = mysql_real_escape_string($member_id);
		$tr_id = mysql_real_escape_string($tr_id);

$sql = <<<EOD
SELECT 
 count(trid) 
FROM
 t_treasure 
WHERE
 memberid = '{$member_id}' 
AND
 seriesid = (
SELECT 
 tr_seriesid 
FROM 
 m_treasure 
WHERE
 treasureid = {$tr_id} )
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		return $rs;
	}

	/* 未保有お宝CHK */
	function getOtherNotOwn($member_id,$other_id){

		$member_id = mysql_real_escape_string($member_id);
		$other_id = mysql_real_escape_string($other_id);
		$otTr = array();
		$myTr = array();

$sql = <<<EOD
SELECT 
 trid
FROM
 t_treasure 
WHERE
 memberid = '{$other_id}' 
ORDER By trid DESC
EOD;
		$db = $this->backend->getDb();
		$rs1 = $db->getAll($sql);
		$otAllNum = count($rs1);
		for($i=0;$i < $otAllNum; $i++){
			array_push($otTr, $rs1[$i]['trid'] );
		}

$sql2 = <<<EOD
SELECT 
 trid
FROM
 t_treasure 
WHERE
 memberid = '{$member_id}' 
ORDER By trid DESC
EOD;
		$db = $this->backend->getDb();
		$rs2 = $db->getAll($sql2);
		for($i=0;$i < count($rs2);$i++){
			array_push($myTr, $rs2[$i]['trid'] );
		}

		//最大お宝シリーズ
		$maxSr = $this->TrSeriNum();
		//相手のお宝からコンプを除く
		for($i = $maxSr; $i > 0  ;$i--){
			$suit = "mTR".$i;
        	$ar_mTR = $this->config->get($suit);

			//配列の共通項をシリーズ毎に調べる
			$comAr = array_intersect($otTr,$ar_mTR);
/*
echo $i.":<br>";
echo "<br>common<br>";
var_dump(array_sum($comAr));
echo "<br>master<br>";
var_dump(array_sum($ar_mTR));
*/
			//配列が一致する条件を変更　(11/01/07)
			//以前のものはキーと値が厳密一致の時しか拾えなかった
			//if($comAr == $ar_mTR){

			//配列の共通項の値の和で比較　=　相手のお宝からコンプを除く
			if( array_sum($comAr) == array_sum($ar_mTR) ){
				$otTr = array_diff($otTr,$ar_mTR);
/*
	echo "<br>otTr=";
	var_dump($otTr);
*/
			}

		}
		//相手の保有お宝から自分保有のお宝を除く
		$diff = array_diff($otTr,$myTr);
//var_dump($diff);
		$rs =array_shift($diff);
//var_dump($rs);
		return $rs;
	}


	/* お宝GETの際、コンプリートかCHK */
	function chkTrSeriesComp($member_id,$tr_id){
		$member_id = mysql_real_escape_string($member_id);
		$tr_id = mysql_real_escape_string($tr_id);
//シリーズ全数取得
$sql = <<<EOD
SELECT 
 treasureid 
FROM 
 m_treasure 
WHERE 
 tr_seriesid = (
SELECT 
 tr_seriesid 
FROM 
 m_treasure 
WHERE
 treasureid = {$tr_id} )
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);

//所有お宝
$sql2 = <<<EOD
SELECT DISTINCT 
 trid 
FROM 
 t_treasure 
WHERE 
 memberid = {$member_id} 
AND
 seriesid = (
SELECT 
 tr_seriesid 
FROM 
 m_treasure 
WHERE
 treasureid = {$tr_id} )
EOD;
		$db = $this->backend->getDb();
		$rs2 = $db->getAll($sql2);
		//比較用配列作成
		$mTr = array();
		$hasTr = array();
		for($i=0;$i < count($rs);$i++){
			array_push($mTr, $rs[$i]['treasureid'] );
		}
		for($i=0;$i < count($rs2);$i++){
			array_push($hasTr, $rs2[$i]['trid'] );
		}
		//既にコンプしているかCHK
		$diff0 =array_diff($mTr,$hasTr);
		if(count($diff0) == 0){
			$comp = 0;
		}else{
			//GETした(プレゼントする)お宝IDを追加
			array_push($hasTr,$tr_id);
			//配列差分を取得
			$diff =array_diff($mTr,$hasTr);
			if(count($diff) == 0){
				$comp = 1;
			}else{
				$comp = 0;
			}
		}
/*
var_dump($mTr);
echo "<br>:";
var_dump($hasTr);
echo "<br>:";
var_dump($diff);
*/
		return $comp;
	}

	/* 設定護符数取得 */
	function getTrapNum($member_id,$tr_id){
		$member_id = mysql_real_escape_string($member_id);
		$tr_id = mysql_real_escape_string($tr_id);

$sql = <<<EOD
SELECT 
  trid 
 ,trap1num
 ,trap2num
FROM 
 t_treasure 
WHERE 
 memberid = {$member_id} 
AND
 trid = {$tr_id} 
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);

		return $rs;
	}

	/* シリーズリスト */
	function trSeriList(){
$sql = <<<EOD
SELECT
 tr_seriesid
 ,name
 ,expla
 ,charactor
FROM
 m_tr_series
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getAll($sql);

		return $rs;
	}


	/* シリーズコンプチェック */
	function getTrComp($member_id){

		$compResult = array();
		$seriNum = $this->TrSeriNum();
		$seriList = $this->trSeriList();
		$escapedMemberId = mysql_real_escape_string($member_id);
		for($i = 1; $i <= $seriNum; $i++){
			//持ってるお宝の数
$sql = <<<EOD
SELECT
 count(*)
FROM
 t_treasure
WHERE
 memberid = '{$escapedMemberId}'
AND
 seriesid = '{$i}'
EOD;
			$db = $this->backend->getDb();
			$User_Num = $db->getOne($sql);
			//シリーズ毎総数
			$Serind_Num = $this->TrSerindNum($i);
			//コンプリート&所持シリーズ
			if($Serind_Num == $User_Num){
				$compResult[$i]['CompFlg'] = 1;
				$compResult[$i]['OwnFlg'] = 1;
				$regDate = $this->TrRegDate($member_id,$i);
			} else if($User_Num == 0) {
				$compResult[$i]['CompFlg'] = 0;
				$compResult[$i]['OwnFlg'] = 0;
				$regDate = '0';
			} else {
				$compResult[$i]['CompFlg'] = 0;
				$compResult[$i]['OwnFlg'] = 1;
				$regDate = '0';
			}
			$compResult[$i]['Remainder'] = $Serind_Num - $User_Num;
			$compResult[$i]['UserNum'] = $User_Num;
			$compResult[$i]['SerindNum'] = $Serind_Num;
			$compResult[$i]['RegDate'] = date("Y/m/d",strtotime($regDate));
			$s = $i - 1;
			$compResult[$i]['name'] = $seriList[$s]['name'];
			$compResult[$i]['seriesid'] = $seriList[$s]['tr_seriesid'];
		}
		return $compResult;
	}


	/* コンプリート数&所持シリーズ数 */
	function getTrcoNum($member_id){
		$compChk = $this->getTrComp($member_id);
		$seriNum = $this->TrSeriNum();
		$rs = array('CompNum' => 0,'OwnNum' => 0,);
		for($i = 1; $i <= $seriNum; $i++){
			if($compChk[$i]['CompFlg'] == 1){
				$rs['CompNum'] += 1;
			}
			if($compChk[$i]['OwnFlg'] == 1){
				$rs['OwnNum'] += 1;
			}
		}
		return $rs;
	}


	/* コンプリート日時 */
	function TrRegDate($member_id,$series_id){
		$escapedMemberId = mysql_real_escape_string($member_id);
		$series_id = mysql_real_escape_string($series_id);
$sql = <<<EOD
SELECT
 reg_time
FROM
 t_treasure
WHERE
 memberid = '{$escapedMemberId}'
AND
 seriesid = '{$series_id}'
ORDER BY reg_time DESC
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);
		return $rs;
	}


	/* シリーズ総数 */
	function TrSeriNum(){
$sql = <<<EOD
SELECT
 count(*)
FROM
 m_tr_series
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		return $rs;
	}


	/* シリーズ毎総数 */
	function TrSerindNum($series_id){
		$series_id = mysql_real_escape_string($series_id);
$sql = <<<EOD
SELECT
 count(*)
FROM
 m_treasure 
EOD;

if($series_id !=""){
	$sql .= " WHERE tr_seriesid = '{$series_id}'";
}
		$db = $this->backend->getDb();
		$rs = $db->getOne($sql);

		return $rs;
	}


	/* シリーズ情報 */
	function TrSeriInfo($series_id){
		$series_id = mysql_real_escape_string($series_id);
$sql = <<<EOD
SELECT
 name
 ,expla
 ,charactor 
 ,itemid
FROM
 m_tr_series
WHERE
 tr_seriesid = '{$series_id}'
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);

		return $rs;
	}


	/* シリーズ一括情報 */
	function TrSerindInfo($series_id){
		$series_id = mysql_real_escape_string($series_id);
$sql = <<<EOD
SELECT
 treasureid
 ,name
 ,expla
FROM
 m_treasure
WHERE
 tr_seriesid = '{$series_id}'
EOD;
		$db = $this->backend->getDb();
		$rs = $db->getALL($sql);

		return $rs;
	}


	/* シリーズ内個別情報 */
	function TrDtInfo($treasure_id){
		$treasure_id = mysql_real_escape_string($treasure_id);
$sql = <<<EOD
SELECT
  treasureid
 ,tr_seriesid
 ,name
 ,expla
FROM
 m_treasure
WHERE
 treasureid = '{$treasure_id}'
EOD;

		$db = $this->backend->getDb();
		$rs = $db->getRow($sql);

		return $rs;
	}


	/* 所持チェック */
	function getTrindOwn($member_id,$m_id,$seriFlg){
		$escapedMemberId = mysql_real_escape_string($member_id);
        $m_id = mysql_real_escape_string($m_id);
        $seriFlg = mysql_real_escape_string($seriFlg);

		if($seriFlg == 0){
$sql = <<<EOD
SELECT
 num
FROM
 t_treasure
WHERE
 memberid = '{$escapedMemberId}' 
AND
 trid = '{$m_id}'
EOD;

			$db = $this->backend->getDb();
			$rs = $db->getOne($sql);

			if($rs == NULL){
				$rs = 0;
			}
		} else {
			//シリーズ毎総数
			$Serind_Num = $this->TrSerindNum($m_id);
			//シリーズ毎のIDを取得
			$SerindId = $this->TrSerindInfo($m_id);

			for($i = 0; $i < $Serind_Num; $i++){
				$id = $SerindId[$i]['treasureid'];
$sql = <<<EOD
SELECT
 num
FROM
 t_treasure
WHERE
 memberid = '{$escapedMemberId}' 
AND
 trid = '{$id}'
EOD;

				$db = $this->backend->getDb();
				$trItemNum = $db->getOne($sql);
				//11/1/14 修正
				if($seriFlg == 1) {
					if($trItemNum){
						$rs[$i]['Num'] = $trItemNum;
						$rs[$i]['ownFlg'] = 1;
					} else {
						$rs[$i]['Num'] = 0;
						$rs[$i]['ownFlg'] = 0;
					}
				} else if($seriFlg == 2) {
					if($trItemNum){
						$rs[$id]['Num'] = $trItemNum;
						$rs[$id]['ownFlg'] = 1;
					} else {
						$rs[$id]['Num'] = 0;
						$rs[$id]['ownFlg'] = 0;
					}
				}
/*
				if($seriFlg == 1) {
					if($trItemNum == NULL){
						$rs[$i]['Num'] = 0;
						$rs[$i]['ownFlg'] = 0;
					} else {
						$rs[$i]['Num'] = $trItemNum['Num'];
						$rs[$i]['ownFlg'] = 1;
					}
				} else if($seriFlg == 2) {
					if($trItemNum['Num'] == NULL){
						$rs[$id]['Num'] = 0;
						$rs[$id]['ownFlg'] = 0;
					} else {
						$rs[$id]['Num'] = $trItemNum['Num'];
						$rs[$id]['ownFlg'] = 1;
					}
				}
*/
			}
		}
		return $rs;
	}


	/* お宝プレゼント処理 */
	function trPresent($member_id,$other_id,$treasure_id,$nicoP){

		//あげる処理
		//まず所持チェック
		$trOwnChk0 = $this->getTrindOwn($member_id,$treasure_id,0);
		if($trOwnChk0 == 1){//あげた後に所持数が0になったらレコード削除
			$ret0 = $this->delTrStatus($member_id,$treasure_id);
		} else {//あげた後に所持数が1個以上あれば所持数のアップデート
			$ret0 = $this->updateTrStatus($member_id,$treasure_id,0,$trap="",$amount="");
		}
		//もらう処理
		//まず所持チェック
		$trOwnChk1 = $this->getTrindOwn($other_id,$treasure_id,0);
		if($trOwnChk1 == 0){//持っていなかったらインサート
			$ret1 = $this->insertTrStatus($other_id,$treasure_id);
		} else {//持ってたらアップデート
			$ret1 = $this->updateTrStatus($other_id,$treasure_id,1,$trap="",$amount="");
		}
		//ニコニコP+回数付与
		if($nicoP == "5"){	//お宝プレゼント(能動的)
			$friendManager = $this->backend->getManager("Friend");
			$ret2 = $friendManager->setNicoPoint($member_id ,$other_id,$nicoP,$kbn="treasure");
			//もらった方に伝令
			$lgManager = $this->backend->getManager("Lg");
			$ret3 = $lgManager->writeEventLog($other_id,$member_id ,$stat="B",$id="",$other="",$win="",$lose="",$treasure_id);
		}else{
			$ret2 = True;
			$ret3 = True;
		}

		if($ret0 == false || $ret1 == false || $ret2 == false || $ret3 == false){
			return False;
		} 

		return true;
	}


	/* お宝ステータス変更 */
	function updateTrStatus($member_id,$treasure_id,$numFlg,$trap,$amount){

        $member_id = mysql_real_escape_string($member_id);
        $treasure_id = mysql_real_escape_string($treasure_id);
        $numFlg = mysql_real_escape_string($numFlg);
        $trap = mysql_real_escape_string($trap);
        $amount = mysql_real_escape_string($amount);

		if(!$member_id || !is_numeric($member_id)){
			return false;
		}
		if(!$treasure_id || !is_numeric($treasure_id)){
			return false;
		}

		if($numFlg == 0){
			$newNum = " num = num -1 ";
		}elseif($numFlg == 1){
			$newNum = " num = num +1 ";
		}elseif($numFlg == 8){		//護符使用
			if($trap == 1){
				$newNum = " trap1num = trap1num - 1 ";
			}elseif($trap == 2){
				$newNum = " trap2num = trap2num - 1 ";
			}
		}elseif($numFlg == 9){		//護符設定
			if($trap == 1){
				$plus = $amount;
				$newNum = " trap1num = trap1num + ". $plus;
			}elseif($trap == 2){
				$plus = $amount * 2;
				$newNum = " trap2num = trap2num + ". $plus;
			}
		}

$sql = <<<EOD
UPDATE
 t_treasure
SET
{$newNum}
 ,upd_time = now()
WHERE
 memberid = {$member_id}
AND
 trid = {$treasure_id}
EOD;
//var_dump($sql);
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if(Ethna::isError($rs) || $rs == false) {
			return false;
		}

		return true;
	}


	/* お宝ステータス挿入 */
	function insertTrStatus($member_id,$treasure_id){
        $member_id = mysql_real_escape_string($member_id);
        $treasure_id = mysql_real_escape_string($treasure_id);

		$seriesId = $this->TrDtInfo($treasure_id);
		$series_id = $seriesId['tr_seriesid'];

$sql = <<<EOD
INSERT INTO
 t_treasure
(
  memberid
 ,seriesid
 ,trid
 ,num
 ,reg_time
 ,upd_time
)
VALUES
(
  {$member_id}
 ,{$series_id}
 ,{$treasure_id}
 ,1
 ,now()
 ,now()
)
 ON DUPLICATE KEY UPDATE num = num + 1 , upd_time = now() 
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if(Ethna::isError($rs) || $rs === false) {
			return false;
		}

		return true;

	}


	/* お宝ステータス削除 */
	function delTrStatus($member_id,$treasure_id){
        $member_id = mysql_real_escape_string($member_id);
        $treasure_id = mysql_real_escape_string($treasure_id);
$sql = <<<EOD
DELETE FROM
 t_treasure
WHERE
 memberid = {$member_id}
AND
 trid = {$treasure_id}
EOD;
		$db = $this->backend->getDb();
		$rs = $db->query($sql);

		if(Ethna::isError($rs) || $rs === false) {
			return false;
		}

		return true;
	}
}
?>
