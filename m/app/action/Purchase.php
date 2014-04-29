<?php
/**
 *  Purchase.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  Purchase form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_Purchase extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

        "opensocial_owner_id" => array(),
        "id" => array(),
        "num" => array(),
        "price" => array(),
    );

    /**
     *  Form input value convert filter : sample
     *
     *  @access protected
     *  @param  mixed   $value  Form Input Value
     *  @return mixed           Converted result.
     */
    /*
    function _filter_sample($value)
    {
        //  convert to upper case.
        return strtoupper($value);
    }
    */
}

/**
 *  Purchase action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_Purchase extends M_ActionClass
{
    /**
     *  preprocess Purchase action.
     *
     *  @access    public
     *  @return    string  Forward name (null if no errors.)
     */
    function prepare()
    {
        /**
        if ($this->af->validate() > 0) {
            return 'error';
        }
        $sample = $this->af->get('sample');
        return null;
        */

        return parent::prepare();
    }

    /**
     *  Purchase action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {
        $member_id = $this->af->get('opensocial_owner_id');
        $item_id = $this->af->get('id');
        $amount = $this->af->get('num');
        $price = $this->af->get('price');

		//oAuth の妥当性検証
		//OKなら
    	$domain = $this->config->get("url");
		$appId = $domain['appId'];

        $itemManager = $this->backend->getManager("Item");
		$user = $itemManager->getItemRelatedData($member_id);
		$item = $itemManager->getItemData($item_id);

		$itemname = substr($item['name'], 0,32);
		$itemdesc = substr($item['expla'],0,127);

		//PaymentAPI呼出
		$ent = payDo($appId,$member_id,$item_id,$price,$amount,$itemname,$itemdesc);
		$entp = json_decode($ent, true); //連想配列に格納

		//決済ID
		//決済ページエンドポイントURL　受領
/*
			echo "payid =".$entp['entry']['0']['paymentId']."<br>";
			echo "endURL=".$entp['entry']['0']['transactionUrl']."<br>";
*/

		$paymentId = $entp['entry']['0']['paymentId'];
		$endUrl = $entp['entry']['0']['transactionUrl'];


		//決済テーブルに書込
        $lgMoneyManager = $this->backend->getManager("Lgmoney");

		if($item['kbn'] == 1){
			$kbn_num = $user['buki_num'];
			$kbn_off = $user['buki_off'];
			$kbn_def = $user['buki_def'];
		}elseif($item['kbn'] == 2){
			$kbn_num = $user['bougu_num'];
			$kbn_off = $user['bougu_off'];
			$kbn_def = $user['bougu_def'];
		}

		//モバコインログ登録 lg_coin
        $ret = $lgMoneyManager->writeCoinLog($member_id ,$paymentId,$item_id,$price,$amount,$kbn_num,$kbn_off,$kbn_def);
        if($ret == false){
            return false;
        }

		//決済ページエンドポイントURLへの遷移を含むレスポンスを投げる
		header("Location: $endUrl");
		exit;

    }
}

?>
