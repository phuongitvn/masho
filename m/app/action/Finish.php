<?php
/**
 *  Finish.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  Finish form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_Finish extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

        "opensocial_owner_id" => array(),
        "paymentId" => array(),
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
 *  Finish action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_Finish extends M_ActionClass
{
    /**
     *  preprocess Finish action.
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
     *  Finish action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {
        $member_id = $this->af->get('opensocial_owner_id');
        $pay_id = $this->af->get('paymentId');

        $userManager = $this->backend->getManager("User");
        $itemManager = $this->backend->getManager("Item");

		//購入キャンセルのCHK
		$pay_st = $itemManager->getPaymentStatus($member_id, $pay_id);

		if($pay_st['status'] == 0){
			$item = $itemManager->getItemData($pay_st['itemid']);
			$this->af->setApp("item", $item);
			$this->af->setApp("kbn", $item['kbn']);
//EV
			if($item['kbn'] == 9 ){
		        $eventManager = $this->backend->getManager("Event");
				$qid = $eventManager->getEventQId($member_id,$pay_st['itemid']);
				$qid['cid'] = substr($qid['questid'],0,1);
				$this->af->setApp("qid", $qid);
			}
			return 'item_cancel';
		}

		//viewer とpaymentid に対してstatusを確認
		$pay_info = $itemManager->getPaymentInfo($member_id, $pay_id,2);//GREEの決済OKは2

		//保有数
		if($pay_info['itemid']  == 138){		//スーパー護符(ﾓﾊﾞｺｲﾝ)のみ別処理
			$profile = $userManager->getProfile($member_id);
			$org =  $profile['trap2num'] - $pay_info['amount'];
			$this->af->setApp("Num", $profile['trap2num']);
			$this->af->setApp("orgNum", $org);
		}else{
			$own = $itemManager->existsMyItem($member_id ,$pay_info['itemid']);
			$org = $own['num'] - $pay_info['amount'];
			$this->af->setApp("Num", $own['num']);
			$this->af->setApp("orgNum", $org);
		}

		$item = $itemManager->getItemData($pay_info['itemid']);
		if($pay_info['itemid'] == 115 || $pay_info['itemid'] == 116 || $pay_info['itemid'] == 140 || $pay_info['itemid'] == 141){
	        //リロード対策(ガチャ)
			$ssid = $userManager->getSsId();
	        $this->af->setApp("ssid", $ssid);
		}
//EV
		if($item['kbn'] == 9 ){
	        $eventManager = $this->backend->getManager("Event");
			$qid = $eventManager->getEventQId($member_id,$pay_info['itemid']);
			if($qid){
		        $this->af->setApp("qid", $qid);
			}
		}

		//現在の最大攻撃力、防御力
        $deck = $userManager->getDeckProfile($member_id);
		if($item['kbn'] == 1){
			$pay_info['kbn_off'] += $deck['deckOff'] + $deck['bougu_off'];
			$pay_info['kbn_def'] += $deck['deckDef'] + $deck['bougu_def'];
		}elseif($item['kbn'] == 2){
			$pay_info['kbn_off'] += $deck['deckOff'] + $deck['buki_off'];
			$pay_info['kbn_def'] += $deck['deckDef'] + $deck['buki_def'];
		}elseif($item['kbn'] == 5){
			$item['kbn'] = 4;
		}

        $this->af->setApp('deck',$deck);
		$this->af->setApp("org", $pay_info);
		$this->af->setApp("payid", $pay_id);
		$this->af->setApp("item", $item);
		$this->af->setApp("kbn", $item['kbn']);

		return 'item_complete';
    }
}

?>
