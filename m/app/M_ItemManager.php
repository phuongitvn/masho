<?php
/**
 *  M_ItemManager.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  M_ItemManager
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */

class M_ItemManager extends M_Manager
{

   /**
    * Kbn=4 保有件数取得(回復薬114：ガチャ札115：きびだんご116)
    *
    */
    function getKbn4Count($member_id,$item_id){
        $member_id = mysql_real_escape_string($member_id);
        $item_id = mysql_real_escape_string($item_id);

$sql = <<<EOD
SELECT
  num
FROM
 t_item
WHERE
 memberid = {$member_id}
AND
 itemid = {$item_id}
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getOne($sql);

        if(Ethna::isError($rs) || $rs === false){
            return False;
        }

		if( count($rs) == 0){
			$rs = 0;
		}

        return $rs;

    }

    /**
    * アイテム関連情報取得
    *
    */
    function getItemRelatedData($member_id){
        $escapedMemberId = mysql_real_escape_string($member_id);
$sql = <<<EOD
SELECT
  handle
 ,stage
 ,cl_cycle
 ,money
 ,coin
 ,buki_num
 ,bougu_num
 ,buki_off
 ,buki_def
 ,bougu_off
 ,bougu_def
FROM
 t_user
WHERE
 memberid = '{$escapedMemberId}'
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getRow($sql);

        if(Ethna::isError($rs) || $rs === false){
            return False;
        }

        return $rs;

    }

    /**
    * 所持アイテム情報取得
    *
    */
    function getMyItems($member_id ,$kbn , $unit, $diff,$limit="" ,$offset=""){
        $member_id = mysql_real_escape_string($member_id);
        $kbn = mysql_real_escape_string($kbn);
        $unit = mysql_real_escape_string($unit);
        $diff = mysql_real_escape_string($diff);
        $limit = mysql_real_escape_string($limit);
        $offset = mysql_real_escape_string($offset);

        $where = "";
        $whereArray = array();
        if($kbn != ""){
            $kbn = mysql_real_escape_string($kbn);
            array_push($whereArray, " m_item.kbn = '{$kbn}' ");
        }

		if( $unit == 3){
            $unit = mysql_real_escape_string($unit);
            array_push($whereArray, " ( m_item.money != 0 OR m_item.coin != 0) ");
		}elseif( $unit == 4){
            $unit = mysql_real_escape_string($unit);
            array_push($whereArray, " m_item.money = 0 AND m_item.coin = 0 ");
		}

        if(count($whereArray)){
            $where = implode(" AND ", $whereArray);
            $where = " AND " . $where;
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
  t_item.itemid
 ,num
 ,times
 ,name
 ,offense
 ,defense
FROM
 t_item 
INNER JOIN
 m_item
ON
 t_item.itemid = m_item.itemid
WHERE
 memberid = {$member_id}
AND
 num > 0
{$where}
{$union}
EOD;
        if( ($kbn == 1 && $diff == "") || ($kbn == 2 && $diff == 1)){
$sql .= <<<EOD
 ORDER BY offense DESC
EOD;
		}elseif( ($kbn == 2 && $diff == "") || ($kbn == 1 && $diff == 1)){
$sql .= <<<EOD
 ORDER BY defense DESC
EOD;
		}
$sql .= <<<EOD
{$sqlLimit}
{$sqlOffset}
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getAll($sql);

        if(Ethna::isError($rs) || $rs === false){
            return array();
        }

//護符+スーパー護符の個数を確認
if($kbn == 4 && $unit == 4){
$sql2 = <<<EOD
SELECT
  trap1num
FROM
 t_user
WHERE
 memberid = {$member_id}
EOD;
    $db = $this->backend->getDb();
    $rs2 = $db->getRow($sql2);
    if(Ethna::isError($rs2) || $rs2 === false){
        return 0;
    }
	$k = count($rs);
	if($rs2['trap1num'] > 0){
		$rs[$k]['itemid'] = "137";
		$rs[$k]['num'] = $rs2['trap1num'];
		$rs[$k]['name'] = "Lá bùa";
		$rs[$k]['offense'] = 0;
		$rs[$k]['defense'] = 0;
	}
}elseif($kbn == 4 && $unit == 3){
$sql2 = <<<EOD
SELECT
  trap2num
FROM
 t_user
WHERE
 memberid = {$member_id}
EOD;
    $db = $this->backend->getDb();
    $rs2 = $db->getRow($sql2);
    if(Ethna::isError($rs2) || $rs2 === false){
        return 0;
    }
	$k = count($rs);
	if($rs2['trap2num'] > 0){
		$rs[$k]['itemid'] = "138";
		$rs[$k]['num'] = $rs2['trap2num'];
		$rs[$k]['name'] = "Bùa hộ mệnh đặc biệt";
		$rs[$k]['offense'] = 0;
		$rs[$k]['defense'] = 0;
		$k = $k + 1;
	}
}

        return $rs;
    }

    /**
    * 所持アイテム数取得
    *
    */
    function getMyItemCount($member_id ,$kbn="",$unit){
        $member_id = mysql_real_escape_string($member_id);
        $kbn = mysql_real_escape_string($kbn);
        $unit = mysql_real_escape_string($unit);

        $where = "";
        $whereArray = array();
        if($kbn != ""){
            $kbn = mysql_real_escape_string($kbn);
            array_push($whereArray, " m_item.kbn = '{$kbn}' ");
        }

        if($unit == 3){
            $unit = mysql_real_escape_string($unit);
            array_push($whereArray, " ( m_item.money != 0 OR m_item.coin != 0 ) ");
        }elseif( $unit == 4){
            $unit = mysql_real_escape_string($unit);
            array_push($whereArray, " m_item.money = 0 AND m_item.coin = 0 ");
		}

        if(count($whereArray)){
            $where = implode(" AND ", $whereArray);
            $where = " AND " . $where;
        }

$sql = <<<EOD
SELECT
  count(t_item.itemid)
FROM
 t_item
INNER JOIN
 m_item
ON
 t_item.itemid = m_item.itemid
WHERE
 memberid = {$member_id}
AND
 num > 0
{$where}
EOD;
//var_dump($sql);
        $db = $this->backend->getDb();
        $rs = $db->getOne($sql);

        if(Ethna::isError($rs) || $rs === false){
            return 0;
        }

//護符+スーパー護符を加算
if($kbn == 4 && $unit == 4){
$sql2 = <<<EOD
SELECT
  trap1num
FROM
 t_user
WHERE
 memberid = {$member_id}
EOD;
    $db = $this->backend->getDb();
    $rs2 = $db->getRow($sql2);

    if(Ethna::isError($rs2) || $rs2 === false){
        return 0;
    }
	if($rs2['trap1num'] > 0){
		$rs++;
	}
}elseif($kbn == 4 && $unit == 3){
$sql2 = <<<EOD
SELECT
  trap2num
FROM
 t_user
WHERE
 memberid = {$member_id}
EOD;
    $db = $this->backend->getDb();
    $rs2 = $db->getRow($sql2);

    if(Ethna::isError($rs2) || $rs2 === false){
        return 0;
    }
	if($rs2['trap2num'] > 0){
		$rs++;
	}

}


        return $rs;
    }

    /**
    * 所持アイテム合計数取得
    *
    */
    function getMyItemSum($member_id ,$kbn="",$unit){
        $member_id = mysql_real_escape_string($member_id);
        $kbn = mysql_real_escape_string($kbn);
        $unit = mysql_real_escape_string($unit);
        $where = "";
        $whereArray = array();
        if($kbn != ""){
            $kbn = mysql_real_escape_string($kbn);
            array_push($whereArray, " m_item.kbn = '{$kbn}' ");
        }

        if($unit == 3){
            $unit = mysql_real_escape_string($unit);
            array_push($whereArray, " ( m_item.money != 0 OR m_item.coin != 0 ) ");
        }elseif( $unit == 4){
            $unit = mysql_real_escape_string($unit);
            array_push($whereArray, " m_item.money = 0 AND m_item.coin = 0 ");
		}

        if(count($whereArray)){
            $where = implode(" AND ", $whereArray);
            $where = " AND " . $where;
        }

$sql = <<<EOD
SELECT
  sum(t_item.num)
FROM
 t_item
INNER JOIN
 m_item
ON
 t_item.itemid = m_item.itemid
WHERE
 memberid = {$member_id}
AND
 num > 0
{$where}
EOD;
//var_dump($sql);
        $db = $this->backend->getDb();
        $rs = $db->getOne($sql);

        if(Ethna::isError($rs) || $rs === false){
            return 0;
        }
		//個数が無い時
		if($rs == NULL){
			$rs = 0;
		}
//護符+スーパー護符を加算
if($kbn == 4 && $unit == 4){
$sql2 = <<<EOD
SELECT
  trap1num
FROM
 t_user
WHERE
 memberid = {$member_id}
EOD;
    $db = $this->backend->getDb();
    $rs2 = $db->getRow($sql2);

    if(Ethna::isError($rs2) || $rs2 === false){
        return 0;
    }
	if($rs2['trap1num'] > 0){
		$rs += $rs2['trap1num'];
	}
}elseif($kbn == 4 && $unit == 3){
$sql2 = <<<EOD
SELECT
  trap2num
FROM
 t_user
WHERE
 memberid = {$member_id}
EOD;
    $db = $this->backend->getDb();
    $rs2 = $db->getRow($sql2);

    if(Ethna::isError($rs2) || $rs2 === false){
        return 0;
    }
	if($rs2['trap2num'] > 0){
		$rs += $rs2['trap2num'];
	}

}

        return $rs;
    }

    /**
    * アイテム購入処理
    *
    */
    function buyItem($member_id ,$item_id ,$kbn,$item_num ,$times,$price,$buki_off,$buki_def,$bougu_off,$bougu_def,$lg_dest,$ss_id,$payment_id,$status){
        $is_exists = $this->existsMyItem($member_id ,$item_id);

        $userManager = $this->backend->getManager("User");

        $member_id = mysql_real_escape_string($member_id);
        $item_id = mysql_real_escape_string($item_id);
        $kbn = mysql_real_escape_string($kbn);
        $item_num = mysql_real_escape_string($item_num);
        $times = mysql_real_escape_string($times);
        $price = mysql_real_escape_string($price);
        $buki_off = mysql_real_escape_string($buki_off);
        $buki_def = mysql_real_escape_string($buki_def);
        $bougu_off = mysql_real_escape_string($bougu_off);
        $bougu_def = mysql_real_escape_string($bougu_def);
        $lg_dest = mysql_real_escape_string($lg_dest);
        $ss_id = mysql_real_escape_string($ss_id);
        $payment_id = mysql_real_escape_string($payment_id);
        $status = mysql_real_escape_string($status);

		if($item_id  == 138){		//スーパー護符(ﾓﾊﾞｺｲﾝ)のみ別処理
	        $userF = array();
	        $userF["trap2num"] = " trap2num + ".$item_num;
	        $userF["memberid"] = $member_id;
	        $retF = $userManager->updateUser($userF);
	        if($retF === False ){
	            return False;
	        }
		}else{

		//残り回数
		$times = $item_num * $times;

        if($is_exists['num'] == 0){
$sql = <<<EOD
INSERT INTO
 t_item
(
  memberid
 ,itemid
 ,num
 ,times
 ,reg_time
 ,upd_time
)
VALUES
(
  '{$member_id}'
 ,'{$item_id}'
 ,'{$item_num}'
 ,'{$times}'
 ,now()
 ,now()
)
EOD;
        }else{
$sql = <<<EOD
UPDATE
 t_item
SET
  num = num + {$item_num}
 ,times = times + {$times}
 ,upd_time = now()
WHERE
  memberid = '{$member_id}'
AND
 itemid = '{$item_id}'
EOD;
        }
//var_dump($sql);
	        $db = $this->backend->getDb();
	        $rs = $db->query($sql);

	        if (Ethna::isError($rs) || $rs== False) {
	        //エラーの場合の処理
	            return False;
	        }
		}

        //小判減算
        $total = $item_num * $price;

$sql = <<<EOD
UPDATE
 t_user
SET
 upd_time = now()
EOD;
		if($payment_id){
			//ﾓﾊﾞｺｲﾝ
				$ownCoin = $userManager->chkCoin($member_id);
			if($total > $ownCoin){
	            return False;
			}
$sql .= <<<EOD
  ,coin = coin - {$total}
EOD;
		}else{				//小判
			//保有小判CHK
			$ownMoney = $userManager->chkMoney($member_id);
			if($total > $ownMoney){
	            return False;
			}
$sql .= <<<EOD
  ,money = money - {$total}
EOD;
			
		}

		if($kbn == 1 ){
$sql .= <<<EOD
 ,buki_off = {$buki_off}
 ,buki_def = {$buki_def}
EOD;
			if($is_exists['num'] == 0){
$sql .= <<<EOD
 ,buki_num = buki_num + {$item_num}
EOD;
			}
		}elseif($kbn == 2 ){
$sql .= <<<EOD
 ,bougu_off = {$bougu_off}
 ,bougu_def = {$bougu_def}
EOD;
			if($is_exists['num'] == 0){
$sql .= <<<EOD
 ,bougu_num = bougu_num + {$item_num}
EOD;
			}

		}

$sql .= <<<EOD
 WHERE
  memberid = '{$member_id}'
EOD;
//var_dump($sql);
        $db = $this->backend->getDb();
        $rs = $db->query($sql);

        if (Ethna::isError($rs) || $rs== False) {
            return False;
        }

        $lgMoneyManager = $this->backend->getManager("Lgmoney");
		if($payment_id){
			//モバコインログUpdate lg_coin
				$ret = $lgMoneyManager->updatePayment($member_id ,$status ,$payment_id,$total,$item_id,$item_num,$price);
		        if($ret == false){
		            return false;
		    }
		}else{
	        //小判ログ登録lg_money
	        $ret = $lgMoneyManager->writeLog($member_id ,2 ,($total*-1),$lg_dest);	//2：小判系
	        if($ret == false){
	            return false;
	        }
	        //ssid登録
	        $ret = $this->updSession($member_id ,$ss_id);
	        if ($ret== False) {
	            //エラーの場合の処理
	            return False;
	        }
		}

        return True;
    }

    /**
    * 回復薬 付与
    *
    */
    function getRcvItem($member_id ,$num){
        $member_id = mysql_real_escape_string($member_id);
        $num = mysql_real_escape_string($num);
		//回復薬
        $rcv_id = $this->config->get('rcvItemid');

$sql = <<<EOD
INSERT INTO
 t_item
(
  memberid
 ,itemid
 ,num
 ,reg_time
 ,upd_time
)
VALUES
(
  '{$member_id}'
 ,'{$rcv_id}'
 ,'{$num}'
 ,now()
 ,now()
)
EOD;

        $db = $this->backend->getDb();
        $rs = $db->query($sql);

        if (Ethna::isError($rs) || $rs== False) {
            return False;
        }

		return True;

    }

    /**
    * アイテム所持チェック
    *
    */
    function existsMyItem($member_id ,$item_id){
        $member_id = mysql_real_escape_string($member_id);
        $item_id = mysql_real_escape_string($item_id);
$sql = <<<EOD
SELECT
  num
 ,times
FROM
 t_item
WHERE
 memberid = '{$member_id}'
AND
 itemid = '{$item_id}'
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getRow($sql);

        if(Ethna::isError($rs) || $rs === false){
            $rs['num'] = 0;
            return $rs;
        }

//var_dump(count($rs));	レコードが無いときは　int(0)
        if(count($rs) == 0){
            $rs['num'] = 0;
            return $rs;
        }

		return $rs;

    }

    /**
    * アイテム情報取得
    *
    */
    function getItemData($item_id){
        $escapedItemId = mysql_real_escape_string($item_id);
$sql = <<<EOD
SELECT
  itemid
 ,kbn
 ,name
 ,expla
 ,offense
 ,defense
 ,rest
 ,money
 ,coin
 ,questid
 ,stage
 ,invite_flg 
FROM
 m_item
WHERE
 itemid = '{$escapedItemId}'
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getRow($sql);

        if(Ethna::isError($rs) || $rs === false){
            return False;
        }

		if($rs['kbn'] == 1){
			$rs['kbnname'] = "Vũ khí";
		}elseif($rs['kbn'] == 2){
			$rs['kbnname'] = "Đồ phòng thủ";
		}elseif($rs['kbn'] == 4 || $rs['kbn'] == "s"){
			$rs['kbnname'] = "Khác";
		}

        return $rs;

    }


    /**
    * 壊れたアイテム情報取得(クエスト時)
    *
    */
    function getItemDataForQuest($member_id,$item_id,$reqNum){
        $member_id = mysql_real_escape_string($member_id);
        $escapedItemId = mysql_real_escape_string($item_id);
        $reqNum = mysql_real_escape_string($reqNum);

$sql = <<<EOD
SELECT
  itemid
 ,kbn
 ,name
 ,expla
 ,offense
 ,defense
 ,rest
 ,money
 ,coin
 ,questid
 ,stage
 ,invite_flg 
FROM
 m_item 
WHERE
 itemid = '{$escapedItemId}'
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getRow($sql);
        if(Ethna::isError($rs) || $rs === false){
            return False;
        }

		if($rs['kbn'] == 1){
			$rs['kbnname'] = "Vũ khí";
		}elseif($rs['kbn'] == 2){
			$rs['kbnname'] = "Đồ phòng thủ";
		}elseif($rs['kbn'] == 4 || $rs['kbn'] == "s"){
			$rs['kbnname'] = "Khác";
		}

		//非売品処理
		if($rs['money'] == 0 && $rs['coin'] == 0){
			if($rs['questid'] == NULL){
				if($rs['invite_flg'] == 1){
					$rs['questname'] = "INV";
				}
			}else{
				//戦利品が手に入るクエストの特定
				$qIds = explode("|",$rs['questid']);
		        $questManager = $this->backend->getManager("Quest");
				$curId = $questManager->getNowQuestId($member_id);
				for($i=0;$i < count($qIds);$i++){
					if( $qIds[$i] <= $curId ){
						$questid = $qIds[$i];
					}
				}
				$disp= $questManager->getQuest($questid);
				$rs['questid'] = $questid;
				$rs['questname'] = $disp['name'];
			}
		}

		//保有個数
		$ret = $this->existsMyItem($member_id ,$escapedItemId);
		$rs['has'] = $ret['num'];
		//クエスト継続に必要な個数算出
		$needNum = $reqNum - $rs['has'];
		if($needNum > 0){
			$rs['num'] = $needNum;
			//自分の小判から購入可能数算出
	        $userManager = $this->backend->getManager("User");
			$own = $userManager->chkMoney($member_id);
			$rs['own'] = $own;

			if($own >= $needNum * $rs['money'] ){
				$rs['after'] = $own - $needNum * $rs['money'];
			}elseif($own >= $rs['money'] ){
				$rs['after'] = $own - $rs['money'];
				$needNum = 1;
			}
			if($needNum == 2 ){
				$rs['max'] = 2;
			}elseif($needNum == 1 ){
				$rs['max'] = 1;
			}

		}

        return $rs;

    }

    /**
    * アイテム使用処理
    *
    */
    function useMyItem($member_id,$item_id,$useTime){
        $member_id = mysql_real_escape_string($member_id);
        $item_id = mysql_real_escape_string($item_id);
        $useTime = mysql_real_escape_string($useTime);

$sql = <<<EOD
SELECT
  t_item.num
 ,t_item.times
 ,rest
 ,kbn
FROM
 t_item
LEFT JOIN
 m_item
ON
 m_item.itemid = t_item.itemid
WHERE
 memberid = '{$member_id}'
AND
 t_item.itemid = '{$item_id}'
EOD;
//var_dump($sql);
        $db = $this->backend->getDb();
        $rs = $db->getRow($sql);

        if(Ethna::isError($rs) || $rs === false){
            return False;
        }

		$kbn = $rs['kbn'];
		//所持使用回数と個数のCHK
		if($rs['times'] < $useTime){
			if($rs['num'] >= 2){
				$afTimes = $rs['rest'] + $rs['times'] - $useTime;
				$afNum   = $rs['num'] - 1;
				$broken = 1;	//壊れたフラグ
			}else{
				$afTimes = 0;
				$afNum   = 0;
				$broken = 1;	//壊れたフラグ
			}
		}else{
			if($rs['num'] >= 2){
				$mod = $rs['times'] % $rs['rest'];
				if($mod >0 && $mod <= $useTime ){
					$afTimes = $rs['times'] - $useTime;
					$afNum   = $rs['num'] - 1;
					$broken = 1;	//壊れたフラグ
				}else{
					$afTimes = $rs['times'] - $useTime;
					$afNum   = $rs['num'];
				}
			}else{
				$afTimes = $rs['times'] - $useTime;
				if($afTimes == 0){
					$afNum  = 0;
					$broken = 1;	//壊れたフラグ
				}else{
					$afNum   = $rs['num'];
				}
			}
		}

		if($afNum == 0){
		//t_item をDELETE
$sql = <<<EOD
DELETE FROM 
 t_item 
WHERE
  memberid = '{$member_id}'
AND
 itemid = '{$item_id}'
EOD;
		}else{
		//t_item をUPD
$sql = <<<EOD
UPDATE
 t_item
SET
  num   = {$afNum}
 ,times = {$afTimes}
 ,upd_time = now()
WHERE
  memberid = '{$member_id}'
AND
 itemid = '{$item_id}'
EOD;
		}
//var_dump($sql);

        $db = $this->backend->getDb();
        $rs = $db->query($sql);

        if (Ethna::isError($rs) || $rs== False) {//エラーの場合の処理
            return False;
        }

		if($broken == 1){
			//壊れた場合のリアリティ処理
			$ret = $this->getReducedPower($member_id ,$kbn);
	        if($ret === False) {
				return False;
			}
	        return $afNum;
		}else{
	        return -1;
		}

    }

    /**
    * 友達招待インセンティブ　アイテム取得
    *
    */
    function getInviteItemlist(){

$sql = <<<EOD
SELECT
  itemid
 ,kbn
 ,name
 ,expla
 ,offense
 ,defense
 ,money
 ,coin
 ,questid
 ,stage
FROM
 m_item
WHERE
 invite_flg = '1' 
ORDER BY itemid DESC
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getAll($sql);

        if(Ethna::isError($rs) || $rs === false){
            return False;
        }

        return $rs;

    }

    /**
    * アイテム情報取得
    *
    */
    function getItems($member_id ,$kbn ,$money, $stage,$unit, $order ,$limit="" ,$offset=""){
        $member_id = mysql_real_escape_string($member_id);
        $kbn = mysql_real_escape_string($kbn);
        $money = mysql_real_escape_string($money);
		$money = (int)$money;
        $stage = mysql_real_escape_string($stage);
        $unit = mysql_real_escape_string($unit);
        $order = mysql_real_escape_string($order);
        $limit = mysql_real_escape_string($limit);
        $offset = mysql_real_escape_string($offset);

        $where = "";
		$sqlOrder = "";

		$where = "  m_item.kbn = '{$kbn}' ";
        
		if( $unit == 1){
            $where .= " AND m_item.money != 0 AND m_item.coin = 0 ";
	        if($order == 1){
	            $sqlOrder=" ORDER BY m_item.money ASC" ;
	        }else{
	            $sqlOrder=" ORDER BY m_item.money DESC" ;
			}
        }elseif( $unit == 2){
            $where .= " AND m_item.money = 0 AND m_item.coin != 0 ";
	        if($order == 1){
	            $sqlOrder=" ORDER BY m_item.coin ASC" ;
	        }else{
	            $sqlOrder=" ORDER BY m_item.coin DESC" ;
			}
		}

        $sqlLimit = "";
        if($limit != ""){
            $sqlLimit=" LIMIT " .$limit;
        }

        $sqlOffset = "";
        if($offset != ""){
            $sqlOffset = " OFFSET " .$offset;
        }
$sql = <<<EOD
SELECT
  m_item.itemid
 ,m_item.kbn
 ,m_item.name
 ,m_item.expla
 ,m_item.offense
 ,m_item.defense
 ,num
 ,m_item.money
 ,m_item.coin
FROM
 m_item
LEFT JOIN
 t_item
ON
 t_item.itemid = m_item.itemid
AND
 t_item.memberid = '{$member_id}'
WHERE
{$where} 
AND
 ( m_item.stage > 0 AND m_item.stage <= {$stage} ) 
{$sqlOrder}
{$sqlLimit}
{$sqlOffset}
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getAll($sql);
        if(Ethna::isError($rs) || $rs === false){
            return array();
        }

		//購入可能個数の計算
        foreach($rs as $k => $v){

			//スーパー護符の対応
			if($rs[$k]['itemid'] == 138){
$sql2 = <<<EOD
SELECT
  trap2num
FROM
 t_user
WHERE
 memberid = {$member_id}
EOD;
    $db = $this->backend->getDb();
    $rs2 = $db->getOne($sql2);
    if(Ethna::isError($rs2) || $rs2 === false){
        return 0;
    }
	
	$rs[$k]['num'] = $rs2;

			}
			
			if( $unit == 1){
				$koban = (int)$rs[$k]['money'];
			}else if($unit==2){
				$koban = (int)$rs[$k]['coin'];
			}
			
			if($koban == 0){
				$shou = 0;
			}else{
				if($unit==1){
					$shou = floor($money / $koban);
				}else if($unit==2){
					$shou = floor($money / $koban);
				}
			}
			if($shou >= 50){
				$rs[$k]['max'] = 50;
			}elseif($shou >= 25){
				$rs[$k]['max'] = 25;
			}elseif($shou >= 10){
				$rs[$k]['max'] = 10;
			}elseif($shou >= 5){
				$rs[$k]['max'] = 5;
			}elseif($shou == 4 ){
				$rs[$k]['max'] = 4;
			}elseif($shou == 3 ){
				$rs[$k]['max'] = 3;
			}elseif($shou == 2 ){
				$rs[$k]['max'] = 2;
			}elseif($shou == 1 ){
				$rs[$k]['max'] = 1;
			}else{
				$rs[$k]['max'] = 0;
			}
        }

        return $rs;
    }

  	/**
    * アイテム数取得
    *
    */
    function getItemCount($kbn, $unit,$stage){
        $kbn = mysql_real_escape_string($kbn);
        $unit = mysql_real_escape_string($unit);
        $stage = mysql_real_escape_string($stage);

        $where = "";
		$where = " kbn = '{$kbn}' ";

        if($where != ""){
			$where .= " AND ";
		}

        if( $unit == 1){
            $where .= " money != 0 AND coin = 0 ";
        }elseif( $unit == 2){
            $where .= " money = 0 AND coin != 0 ";
		}

$sql = <<<EOD
SELECT
  count(itemid)
FROM
 m_item
WHERE
{$where} 
AND
 stage > 0 AND stage <= {$stage} 
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getOne($sql);

        if(Ethna::isError($rs) || $rs === false){
            return 0;
        }

        return $rs;
    }

  	/**
    * 決済ステータス取得
    *
    */
    function getPaymentStatus($member_id, $payment_id){
        $member_id  = mysql_real_escape_string($member_id);
        $payment_id = mysql_real_escape_string($payment_id);

$sql = <<<EOD
SELECT
  itemid
 ,status
FROM
 lg_coin
WHERE 
 memberid = '{$member_id}' 
AND
 paymentid = '{$payment_id}' 
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getRow($sql);

        if(Ethna::isError($rs) || $rs === false){
            return -1;
        }

        return $rs;
    }

  	/**
    * 決済情報取得
    *
    */
    function getPaymentInfo($member_id, $payment_id,$status){
        $member_id  = mysql_real_escape_string($member_id);
        $payment_id = mysql_real_escape_string($payment_id);
        $status = mysql_real_escape_string($status);

$sql = <<<EOD
SELECT
  itemid
 ,price
 ,amount
 ,kbn_num
 ,kbn_off
 ,kbn_def
FROM
 lg_coin
WHERE 
 status = '{$status}' 
AND
 memberid = '{$member_id}' 
AND
 paymentid = '{$payment_id}' 
EOD;

        $db = $this->backend->getDb();
        $rs = $db->getRow($sql);

        if(Ethna::isError($rs) || $rs === false){
            return 0;
        }

        return $rs;
    }

    /**
    * アイテム購入・付与時の最大攻撃力/防御力計算(リアリティ処理)
    *
    */
    function getMaxPower($member_id ,$item_id){
        $member_id = mysql_real_escape_string($member_id);
        $item_id = mysql_real_escape_string($item_id);

       	$cardManager = $this->backend->getManager("Card");
       	$fightManager = $this->backend->getManager("Fight");
		$item = $this->getItemData($item_id);

		//保有XXアイテムをYY力で降順(XXは武器か防具、Yはkbn=1:Off,kbn=2:Def)
		$nowItem = $this->getMyItems($member_id ,$item['kbn'] ,$unit="",$diff="",$limit="" ,$offset="");
		//付与アイテムの配列
		$getItem = array( count($nowItem) => 
			array(
                'itemid' => $item["itemid"],
                'num'    => 1,
                'times'  => 'NULL',
                'name'   => $item["name"],
                'offense'  => $item["offense"],
                'defense'  => $item["defense"],
			),
        );
		//攻撃力用アイテム配列
		$dataArray = $nowItem + $getItem;		//配列をマージ
		//攻撃力用アイテム配列
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
		foreach ($dataArray as $key => $row) {	// 列方向の配列を得る	11/1/21//foreach ($nowItem as $key => $row) 
		    $itemid[$key] = $row['itemid'];
		    $num[$key] = $row['num'];
		    $times[$key] = $row['times'];
		    $name[$key] = $row['name'];
		    $offense[$key] = $row['offense'];
		    $defense[$key] = $row['defense'];
		}
		array_multisort($defense, SORT_DESC, $dataArray);
		$defItem = $dataArray;

/*
$filename = dirname(dirname(dirname(__FILE__)))."/logs/calc_" .date("Ymd") .".log";
$log  = date("Y-m-d H:i:s");
$log .= "itemOff:\n" .print_r($offItem,true)."\n";
$log .= "itemDef:\n" .print_r($defItem,true)."\n";
*/
		//デッキのカードをOffense降順
		$offMaxCard = $cardManager->getCardlist($member_id,'0',$sort="off",$limit="" ,$offset="");
		//デッキのカードをDefense降順
		$defMaxCard = $cardManager->getCardlist($member_id,'0',$sort="def",$limit="" ,$offset="");
		//calcFightPower はカード配列の添え字が1～5のためスライド
		for($i=0;$i < 5;$i++){
			$n = 4 - $i;
			$offMaxCard [$n + 1] = $offMaxCard [$n];
			$defMaxCard [$n + 1] = $defMaxCard [$n];
		}
/*
$log .= "offMaxCard:\n" .print_r($offMaxCard,true)."\n";
$log .= "defmaxCard:\n" .print_r($defMaxCard,true)."\n";
*/
		//購入後の最大XX攻撃力(XXは武器か防具)
		$afterKbnOffPower = $fightManager->calcFightPower($offMaxCard,$offItem,"o");
		//購入後の最大XX防御力((XXは武器か防具)
		$afterKbnDefPower = $fightManager->calcFightPower($defMaxCard,$defItem,"d");
/*
$log .= "afterOff:\n" .print_r($afterKbnOffPower,true)."\n";
$log .= "afterDef:\n" .print_r($afterKbnDefPower,true)."\n";
file_put_contents($filename, $log, FILE_APPEND);
*/
		for($i=1 ;$i<=5;$i++){
			$kbnOffPower += $afterKbnOffPower[$i];
			$kbnDefPower += $afterKbnDefPower[$i];
		}
		if($item['kbn'] == 1){
			$after['buki_off']  = $kbnOffPower;
			$after['buki_def']  = $kbnDefPower;
		}elseif($item['kbn'] == 2){
			$after['bougu_off'] = $kbnOffPower;
			$after['bougu_def'] = $kbnDefPower;
		}


		return $after;

	}

    /**
    * アイテム壊れた時の最大攻撃力/防御力計算(リアリティ処理)
    *
    */
    function getReducedPower($member_id ,$kbn){

        $member_id = mysql_real_escape_string($member_id);
        $kbn = mysql_real_escape_string($kbn);

       	$userManager = $this->backend->getManager("User");
       	$cardManager = $this->backend->getManager("Card");
       	$fightManager = $this->backend->getManager("Fight");

		if($kbn == 1){
			//保有武器アイテムをそれぞれ攻撃力、防御力で降順
			$offItem = $this->getMyItems($member_id ,$kbn ,$unit="",$diff="",$limit="" ,$offset="");
			$defItem = $this->getMyItems($member_id ,$kbn ,$unit="",$diff="1",$limit="" ,$offset="");
		}elseif($kbn == 2){
			//保有防具アイテムをそれぞれ攻撃力、防御力で降順
			$offItem = $this->getMyItems($member_id ,$kbn ,$unit="",$diff="1",$limit="" ,$offset="");
			$defItem = $this->getMyItems($member_id ,$kbn ,$unit="",$diff="",$limit="" ,$offset="");
		}

/*
$filename = dirname(dirname(dirname(__FILE__)))."/logs/calc_" .date("Ymd") .".log";
$log  = date("Y-m-d H:i:s");
$log .= "itemOff:\n" .print_r($offItem,true)."\n";
$log .= "itemDef:\n" .print_r($defItem,true)."\n";
*/
		//デッキのカードをOffense降順
		$offMaxCard = $cardManager->getCardlist($member_id,'0',$sort="off",$limit="" ,$offset="");
		//デッキのカードをDefense降順
		$defMaxCard = $cardManager->getCardlist($member_id,'0',$sort="def",$limit="" ,$offset="");
		//calcFightPower はカード配列の添え字が1～5のためスライド
		for($i=0;$i < 5;$i++){
			$n = 4 - $i;
			$offMaxCard [$n + 1] = $offMaxCard [$n];
			$defMaxCard [$n + 1] = $defMaxCard [$n];
		}
/*
$log .= "offMaxCard:\n" .print_r($offMaxCard,true)."\n";
$log .= "defmaxCard:\n" .print_r($defMaxCard,true)."\n";
*/
		//現在の最大XX攻撃力(XXは武器か防具)
		$afterKbnOffPower = $fightManager->calcFightPower($offMaxCard,$offItem,"o");
		//現在の最大XX防御力((XXは武器か防具)
		$afterKbnDefPower = $fightManager->calcFightPower($defMaxCard,$defItem,"d");
/*
$log .= "afterOff:\n" .print_r($afterKbnOffPower,true)."\n";
$log .= "afterDef:\n" .print_r($afterKbnDefPower,true)."\n";
file_put_contents($filename, $log, FILE_APPEND);
*/
		for($i=1 ;$i<=5;$i++){
			$kbnOffPower += $afterKbnOffPower[$i];
			$kbnDefPower += $afterKbnDefPower[$i];
		}

        $after = array();
        $after["memberid"] = $member_id;
		if($kbn == 1){
			$after['buki_off']  = $kbnOffPower;
			$after['buki_def']  = $kbnDefPower;
		}elseif($kbn == 2){
			$after['bougu_off'] = $kbnOffPower;
			$after['bougu_def'] = $kbnDefPower;
		}

        $ret = $userManager->updateUser($after);
        if($ret === False) {
			return False;
		}

		return True;

	}

/* これより上はCHK　OK */
/* ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ */
/* 以下は　チェック未 */

}
?>
