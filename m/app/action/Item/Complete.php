<?php
/**
 *  Item/Complete.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  item_complete Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_ItemComplete extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(
        "opensocial_owner_id" => array(),
        "ssid" => array(),
        "id" => array(),
        "amount" => array(),
        "orgMoney" => array(),
        "Money" => array(),
        "orgNum" => array(),
        "Num" => array(),
        "orgOff" => array(),
        "Off" => array(),
        "orgDef" => array(),
        "Def" => array(),
        "kbnO" => array(),
        "kbnD" => array(),
		"q" => array(),

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
 *  item_complete action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_ItemComplete extends M_ActionClass
{
    /**
     *  preprocess of my_p_day Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    function prepare()
    {
        return parent::prepare();
    }

    /**
     *  item_complete action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {
        $userManager = $this->backend->getManager("User");
        $itemManager = $this->backend->getManager("Item");

        $member_id = $this->af->get('opensocial_owner_id');
        $ss_id = $this->af->get('ssid');
        $item_id = $this->af->get('id');
        $q = $this->af->get('q');
        $this->af->setApp('q',$q);
        $num = $this->af->get('amount');
		$order = $this->af->get('order');
		$this->af->setApp('order',$order);
        //数量チェック
        if(!$num || !is_numeric($num)){
            return 'error_sys';
        }

        //プロフィール情報取得
        $profile = $userManager->getProfile($member_id);

        //アイテム情報取得
        $item = $itemManager->getItemData($item_id);
        if($item['coin']>0){
			$unit = 2;
			$this->af->setApp('unit',$unit);
		}else if($item['money']>0){
			$unit = 1;
			$this->af->setApp('unit',$unit);
		}
        $this->af->setApp("item", $item);
		if($item['kbn'] == 1){
	        $buki_off  = $this->af->get('kbnO');
	        $buki_def  = $this->af->get('kbnD');
		}elseif($item['kbn'] == 2){
	        $bougu_off = $this->af->get('kbnO');
	        $bougu_def = $this->af->get('kbnD');
		}

        $isReload = $itemManager->isReload($member_id ,$ss_id);
        $this->af->setApp("isReload", $isReload);

        if($isReload == True){
            //return 'error_reload';
        }else{

	        //トランザクション開始
	        $db = $this->backend->getDb();
	        $ret = $db->query('START TRANSACTION');
	        if($ret == False){
	            return 'error_sys';
	        }

	        //アイテム購入処理
	        if($item['money']!=0){
	        $ret = $itemManager->buyItem($member_id ,$item_id ,$item['kbn'],$num ,$item['rest'],$item['money'],$buki_off,$buki_def,$bougu_off,$bougu_def,$profile['lg_dest'],$ss_id ,$payment_id="",$status="");
	        }else if($item['coin']!=0){
	        	$ret = $itemManager->buyItem($member_id ,$item_id ,$item['kbn'],$num ,$item['rest'],$item['coin'],$buki_off,$buki_def,$bougu_off,$bougu_def,$profile['lg_dest'],$ss_id ,$payment_id="coin",$status="");
	        }
	        if($ret === False){
	            $db->query('ROLLBACK');
	            return 'error_sys';
	        }

	        //トランザクション終了
	        $ret = $db->query('COMMIT');
	        if($ret === False){
	            return 'error_sys';
	        }

		}

		$ssid = $userManager->getSsId();
        $this->af->setApp("ssid", $ssid);

        return 'item_complete';
    }
}

?>
