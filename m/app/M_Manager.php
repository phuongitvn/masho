<?php
/**
 *  アプリケーションマネージャのベースクラス
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class M_Manager extends Ethna_AppManager
{
    /**
     *  Ethna_AppManagerのコンストラクタ
     *
     *  @access public
     *  @param  object  Ethna_Backend   &$backend   backendオブジェクト
     */
    function Ethna_AppManager(&$backend)
    {
        // 基本オブジェクトの設定
        $this->backend =& $backend;
        $this->config =& $backend->getConfig();
        $this->i18n =& $backend->getI18N();
        $this->action_form =& $backend->getActionForm();
        $this->af =& $this->action_form;
        $this->session =& $backend->getSession();

/* DBアクセサの無駄を除く
        $db_list = $backend->getDBList();
        if (Ethna::isError($db_list) == false) {
            foreach ($db_list as $elt) {
                $varname = $elt['varname'];
                $this->$varname =& $elt['db'];
            }
        }
*/
    }


    /**
    * コミュニティタグ用UID暗号作成
    *
    */
    public function getCyptUserId($id){

		//idをゼロフィル
        $id8 = sprintf("%08d", $id);

		//暗号化
		$con = new UidCrypt();
		$result = $con->encrypt($id8);

        return $result;
    }

    /**
    * コミュニティタグ用UID復号化
    *
    */
    public function getDecyptUserId($id){

		//32桁CHK
		if( strlen($id) != 32 ){
        	return False;
		}
		//16進数のCHK
		$chk = preg_replace("/[a-f0-9]/s", "",$id);
		if($chk != ""){
        	return False;
		}
		//復号化
		$cd = new UidCrypt();
		$result = (int)$cd->decrypt($id);

        return $result;
    }


	/* viola ADD 0729 */

    /**
    * リロード対策用ID作成
    *
    */
    public function getSsId(){
/*
        list($usec, $sec) = explode(" ", microtime());
        $ret =  ((float)$usec + (float)$sec);
*/
        $ret = mktime();
		//暗号化
		$c = new Crypt();
		$result = $c->encrypt($ret);

        return $result;
    }

    /**
    * リロードデータ登録
    *
    */
    
    public function updSession($memberId ,$ssId){
        $memberId = mysql_real_escape_string($memberId);

		//32桁CHK
		if( strlen($ssId) != 32 ){
        	return True;
		}
		//16進数のCHK
		$chkSs = preg_replace("/[a-f0-9]/s", "",$ssId);
		if($chkSs != ""){
        	return True;	//UPDATE処理をSKIP
		}
		//復号化
		$cd = new Crypt();
		$pureSsId = $cd->decrypt($ssId);
		//10桁かつ数値である事のCHK
		if(strlen($pureSsId) != 10 || !is_numeric($pureSsId) ){
        	return True;	//UPDATE処理をSKIP
		}
		//ありえる数値かを計算
		$nowTS = mktime();
		if($pureSsId >= $nowTS || $pureSsId <= 0){
        	return True;
		}

$sql = <<<EOD
UPDATE
  t_session
SET
 upd_time = now(),
 ssid = {$pureSsId}
WHERE
 memberid = {$memberId}
EOD;

        $db = $this->backend->getDb();
        $rs = $db->query($sql);

        if (Ethna::isError($rs) || $rs== False) {
            return False;
        }

        return True;
    }

    /**
    * リロードチェック
    *
    */
    
    public function isReload($memberId ,$ssId){
        $memberId = mysql_real_escape_string($memberId);

		//32桁CHK
		if( strlen($ssId) != 32 ){
        	return True;
		}
		//16進数のCHK
		$chkSs = preg_replace("/[a-f0-9]/s", "",$ssId);
		if($chkSs != ""){
        	return True;	//reload状態と判定
		}
		//復号化
		$cd = new Crypt();
		$pureSsId = $cd->decrypt($ssId);
		//10桁かつ数値である事のCHK
		if(strlen($pureSsId) != 10 || !is_numeric($pureSsId) ){
        	return True;	//reload状態と判定
		}
		//ありえる数値かを計算
		$nowTS = mktime();
		if($pureSsId >= $nowTS || $pureSsId <= 0){
        	return True;
		}
$sql = <<<EOD
SELECT
  memberid
FROM
 t_session
WHERE
 memberid = '{$memberId}'
AND
 ssid <> 0
AND
 ssid >= '{$pureSsId}'
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getOne($sql);

        if(Ethna::isError($rs) || $rs === false){
            return False;
        }

        return $rs;

    }

    /**
    * リロードデータ登録
    *
    */
    
    public function insSession($memberId ,$ssId){
        $memberId = mysql_real_escape_string($memberId);

		//32桁CHK
		if( strlen($ssId) != 32 ){
        	return True;
		}
		//16進数のCHK
		$chkSs = preg_replace("/[a-f0-9]/s", "",$ssId);
		if($chkSs != ""){
        	return True;	//reload状態と判定
		}
		//復号化
		$cd = new Crypt();
		$pureSsId = $cd->decrypt($ssId);
		//10桁かつ数値である事のCHK
		if(strlen($pureSsId) != 10 || !is_numeric($pureSsId) ){
        	return True;	//reload状態と判定
		}
		//ありえる数値かを計算
		$nowTS = mktime();
		if($pureSsId >= $nowTS || $pureSsId <= 0){
        	return True;
		}

$sql = <<<EOD
INSERT INTO
 t_session
(
  memberid
 ,ssid
 ,upd_time
)
VALUES
(
  '{$memberId}'
 ,'{$pureSsId}'
 ,now()
) 
 ON DUPLICATE KEY UPDATE ssid = '{$pureSsId}',upd_time = now() 
EOD;

        $db = $this->backend->getDb();
        $rs = $db->query($sql);

        if (Ethna::isError($rs) || $rs== False) {
            return False;
        }

        return True;
    }


	/**
	 * ページャーのデータソースを返す
	 *
	 * @param	int		$totalLine	データ総数
	 * @param	int		$perPage	1ページ当たりのデータ件数
	 * @param	int		$curPaget	現在ページ番号
	 * @param	int		$dispPage	ページャ表示数（省略可）
	 * @return	array	array(
	 *						'current'	=> 現在ページNo.,
	 *						'prev'		=> 前のページNo.,
	 *						'next'		=> 次のページNo.,
	 *						'pages'		=> array(11, 12, 13...),
	 *						'lines'		=> array(
	 *										'total'		=> データ総数,
	 *										'from'		=> 開始データNo.,
	 * 										'to'		=> 終了データNo.,
	 *						),
	 *					);
	 */
	public function getPagerSource($totalLine, $perPage, $curPage = 1, $dispPage = 10) {

		// ページ総数
		$totalPage = ceil($totalLine / $perPage );
		$centerPos = floor($dispPage / 2) + 1;
		$begin = 1;

        //表示ページ番号
		if($dispPage < $totalPage && $centerPos < $curPage){
			if($curPage + ($dispPage - $centerPos) < $totalPage){
				$begin = $curPage - $centerPos + 1;
			}else{
				$begin = $totalPage - $dispPage + 1;
			}
		}

		$end = $begin + $dispPage - 1;

		// データライン
		$from = $perPage * ($curPage - 1) + 1;
		$to   = $perPage * $curPage;
		if ($totalLine < $to) {
			$to = $totalLine;
		}
		return array(
			'current'	=> $curPage,
			'prev'		=> ($curPage <= 1) ? null : ($curPage - 1),
//			'prev'		=> ($curPage <= $dispPage) ? null : ($curPage - 1),
//			'next'		=> ($totalPage < $end) ? null : ($curPage + 1),
			'next'		=> ($curPage < $totalPage) ? ($curPage + 1) :null,
			'totalPage' => $totalPage,                  //追加：表示が１ページの際には表示しない
			'pages'		=> range($begin, ($end < $totalPage ? $end : $totalPage)),
			'lines'		=> array(
				'total'		=> $totalLine,
				'from'		=> $from,
				'to'		=> $to,
			),
		);
	}

	/**
	 *  オフセット値取得
	 *
	 * @access public
	 * @param  int	$LimitPerPage:1ページあたりの表示件数
	 * @return int	$offset:開始位置
	 */
	function getOffset($LimitPerPage)
	{
		$page = $this->af->get('p');

		if(isset($page) || ($page > 1))
		{
			$offset = $LimitPerPage * ($page-1);
		}else{
			$offset = 0;
		}

		return $offset;
	}

	/**
	 *  表示件数取得
	 *
	 * @access public
	 * @param	int		$totalLine	データ総数
	 * @param	int		$perPage	1ページ当たりのデータ件数
	 * @param	int		$curPaget	現在ページ番号
	 * @return	array	array(
	 *						'total'	=> 総ページ数,
	 *						'from'		=> 現ページ開始件数,
	 *						'to'		=> 現ページ終了件数,
	 *					);
	 */
	function getDisplayNumbers($totalLine, $perPage, $curPaget = 1){

		$numbers['total'] = $totalLine;
		$numbers['from'] = (($curPaget - 1) * $perPage) + 1;

		$to = $curPaget * $perPage;

		if ($to < $totalLine) {
			$numbers['to'] = $to;
		} else {
			$numbers['to'] = $totalLine;
		}

		return $numbers;
	}


/* Navi:END */
	/**
	 *  インクリメント関数
	 *
	 */
    function incrementColumn($table ,$column ,$where){

        $table = mysql_real_escape_string($table);
        $column = mysql_real_escape_string($column);

$sql = <<<EOD
UPDATE
 {$table}
SET
 {$column} = IFNULL({$column},0) + 1
 ,upd_time = now()
WHERE
 {$where}
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
	 *  デクリメント関数
	 *
	 */
    function  decrementColumn($table ,$column ,$where){
        $table = mysql_real_escape_string($table);
        $column = mysql_real_escape_string($column);

$sql = <<<EOD
UPDATE
 {$table}
SET
 {$column} = IFNULL({$column},0) - 1
 ,upd_time = now()
WHERE
 {$where}
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
	 *  インクリメント ＋２ 関数
	 *
	 */
    function increment2Column($table ,$column ,$where){
        $table = mysql_real_escape_string($table);
        $column = mysql_real_escape_string($column);

$sql = <<<EOD
UPDATE
 {$table}
SET
 {$column} = IFNULL({$column},0) + 2
 ,upd_time = now()
WHERE
 {$where}
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
	 *  UPDATE関数
	 *
	 */
    function  updateColumn($table ,$column ,$status, $where){
        $table = mysql_real_escape_string($table);
        $column = mysql_real_escape_string($column);
        $status = mysql_real_escape_string($status);

$sql = <<<EOD
UPDATE
 {$table}
SET
 {$column} = '{$status}'
 ,upd_time = now()
WHERE
 {$where}
EOD;
//var_dump($sql);
        $db = $this->backend->getDb();
        $rs = $db->query($sql);

        if (Ethna::isError($rs) || $rs== False) {
        //エラーの場合の処理
            return False;
        }

        return True;
    }

	/**
	 *  DELETE関数
	 *
	 */
    function  deleteRecord($table , $where){
        $table = mysql_real_escape_string($table);

$sql = <<<EOD
DELETE FROM 
 {$table}
WHERE
 {$where}
EOD;
//var_dump($sql);
        $db = $this->backend->getDb();
        $rs = $db->query($sql);

        if (Ethna::isError($rs) || $rs== False) {
        //エラーの場合の処理
            return False;
        }

        return True;
    }

	/**
	 *  プルダウン個数取得
	 *
	 */
    function getSetNum($realNum){

		if($realNum >= 50){
			$dispNum = 50;
		}elseif($realNum >= 25){
			$dispNum = 25;
		}elseif($realNum >= 10){
			$dispNum = 10;
		}elseif($realNum >= 5){
			$dispNum = 5;
		}elseif($realNum == 4 ){
			$dispNum = 4;
		}elseif($realNum == 3 ){
			$dispNum = 3;
		}elseif($realNum == 2 ){
			$dispNum = 2;
		}elseif($realNum == 1 ){
			$dispNum = 1;
		}else{
			$dispNum = 0;
		}

        return $dispNum;
    }


}

?>
