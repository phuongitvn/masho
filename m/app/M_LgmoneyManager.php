<?php
/**
 *  M_LgmoneyManager.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  M_LgmoneyManager
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_LgmoneyManager extends M_Manager
{
    /**
    * lg_money登録
    *
    */
    function writeLog($member_id ,$kbn ,$money, $lg_dist){
        $member_id = mysql_real_escape_string($member_id);
        $kbn = mysql_real_escape_string($kbn);
        $money = mysql_real_escape_string($money);
        $lg_dist = mysql_real_escape_string($lg_dist);
        $dd = sprintf("%02d", date('d'));
$sql = <<<EOD
INSERT INTO
 lg_money_{$lg_dist}
(
  memberid
 ,dd
 ,kbn
 ,money
 ,del_flg
 ,reg_time
 ,upd_time
)
VALUES
(
  {$member_id}
 ,'{$dd}'
 ,{$kbn}
 ,{$money}
 ,0
 ,now()
 ,now()
)
EOD;
        $db = $this->backend->getDb();
        $rs = $db->query($sql);

        if(Ethna::isError($rs) || $rs === false){
            return false;
        }

        return true;

    }

    /**
    * lg_coin登録
    *
    */
    function writeCoinLog($member_id ,$payment_id,$item_id,$price,$amount,$kbn_num,$kbn_off,$kbn_def){

        $member_id = mysql_real_escape_string($member_id);
        $payment_id = mysql_real_escape_string($payment_id);
        $item_id = mysql_real_escape_string($item_id);
        $price = mysql_real_escape_string($price);
        $amount = mysql_real_escape_string($amount);
        $kbn_num = mysql_real_escape_string($kbn_num);
        $kbn_off = mysql_real_escape_string($kbn_off);
        $kbn_def = mysql_real_escape_string($kbn_def);

        $dd = sprintf("%02d", date('d'));

$sql = <<<EOD
INSERT INTO
 lg_coin
(
  memberid
 ,dd
 ,paymentid
 ,status
 ,itemid
 ,price
 ,amount
 ,kbn_num
 ,kbn_off
 ,kbn_def
 ,reg_time
)
VALUES
(
  '{$member_id}'
 ,'{$dd}'
 ,'{$payment_id}'
 ,'0'
 ,'{$item_id}'
 ,'{$price}'
 ,'{$amount}'
 ,'{$kbn_num}'
 ,'{$kbn_off}'
 ,'{$kbn_def}'
 ,now()
)
EOD;


        $db = $this->backend->getDb();
        $rs = $db->query($sql);

        if(Ethna::isError($rs) || $rs === false){
            return false;
        }

        return true;

    }

    /**
    * 決済情報更新
    *
    */
    function updatePayment($member_id ,$status ,$payment_id,$total,$item_id,$item_num,$price){

        $member_id = mysql_real_escape_string($member_id);
        //$payment_id = mysql_real_escape_string($payment_id);
        //$status = mysql_real_escape_string($status);
        $total = mysql_real_escape_string($total);
        $item_id = mysql_real_escape_string($item_id);
        $item_num = mysql_real_escape_string($item_num);
        $price = mysql_real_escape_string($price);
        $user_agent = @$_SERVER["HTTP_USER_AGENT"];
        $remote_addr = @$_SERVER["REMOTE_ADDR"];
$sql = <<<EOD
INSERT INTO
 lg_point
(
  memberid
 ,add_point
 ,description
 ,operator
 ,user_agent
 ,remote_addr
 ,reg_time
)
VALUES
(
  '{$member_id}'
 ,'-{$total}'
 ,'mua item_id {$item_id} so luong {$item_num} gia item {$price} het tong so ngoc {$total}'
 ,'/item/Complete.php'
 ,'{$user_agent}'
 ,'{$remote_addr}'
 ,now()
)
EOD;
 
/*$sql = <<<EOD
UPDATE
 lg_point
SET
  status = '{$status}'
 ,upd_time = now()
WHERE
 memberid = '{$member_id}'
AND
 paymentid = '{$payment_id}'
EOD;
*/
        $db = $this->backend->getDb();
        $rs = $db->query($sql);

        if(Ethna::isError($rs) || $rs === false){
            return false;
        }

        return true;

    }

}
?>
