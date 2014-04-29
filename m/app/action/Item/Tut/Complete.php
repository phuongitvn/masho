<?php
/**
 *  Item/Tut/Complete.php
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
class M_Form_ItemTutComplete extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(
        "opensocial_owner_id" => array(),
        "ssid" => array(),

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
class M_Action_ItemTutComplete extends M_ActionClass
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
        $cardManager = $this->backend->getManager("Card");

        $member_id = $this->af->get('opensocial_owner_id');
        $ss_id = $this->af->get('ssid');
        $item_id = "1";
		$num = 1;

        //プロフィール情報取得
        $profile = $userManager->getProfile($member_id);

        //アイテム情報取得
        $item = $itemManager->getItemData($item_id);
        $this->af->setApp("item", $item);
        $buki_off  = $item['offense'];
        $buki_def  = $item['defense'];
        $bougu_off = "";
        $bougu_def = "";
    	$this->af->setApp("off", $buki_off);
    	$this->af->setApp("def", $buki_def);

        $isReload = $itemManager->isReload($member_id ,$ss_id);
        $this->af->setApp("isReload", $isReload);
		//保有しているか？
        $is_exists = $itemManager->existsMyItem($member_id ,$item_id);

/*
		if($is_exists['num'] == 0){
			$ssid = $itemManager->getSsId();
	        $this->af->setApp("ssid", $ssid);
		    return 'quest_tut3';
		}
*/
        if($is_exists['num'] > 0 ){
			$profile = $userManager->getProfile($member_id);
        	$this->af->setApp("tut_num", $profile['tut_num']);

			if($profile['tut_num'] < 12){ 
		        //次のクエストのためのリロード対策
				$ssid = $itemManager->getSsId();
		        $this->af->setApp("ssid", $ssid);

		        return 'item_tut_complete';
			}elseif($profile['tut_num'] >= 12 && $profile['tut_num'] <= 17){
		    	return 'my_indextutf';
			}else{
				$ssid = $userManager->getSsId();
		        $this->af->setApp("ssid", $ssid);
		        $this->af->setApp("profile", $profile);
				$card = $cardManager->getCardAtt($profile['prof']);
				$this->af->setApp("card", $card);
				$stage = $userManager->getStageName($profile['stage']);
				$this->af->setApp("stage", $stage);
		    	return 'my_index';
			}


        }else{

	        //トランザクション開始
	        $db = $this->backend->getDb();
	        $ret = $db->query('START TRANSACTION');
	        if($ret == False){
	            return 'error_sys';
	        }

	        //アイテム購入処理
	        $ret = $itemManager->buyItem($member_id ,$item_id ,$item['kbn'],$num ,$item['rest'],$item['money'],$buki_off,$buki_def,$bougu_off,$bougu_def,$profile['lg_dest'],$ss_id ,$payment_id="",$status="");
			//10→11
			$table ="t_user";
			$column = "tut_num";
			$where = "memberid = '" .$member_id."'";
			$ret2 = $userManager->incrementColumn($table ,$column ,$where);
	        if($ret === False || $ret2 === False){
	            $db->query('ROLLBACK');
	            return 'error_sys';
	        }

	        //トランザクション終了
	        $ret = $db->query('COMMIT');
	        if($ret === False){
	            return 'error_sys';
	        }
	        //次のクエストのためのリロード対策
			$ssid = $itemManager->getSsId();
	        $this->af->setApp("ssid", $ssid);

	        return 'item_tut_complete';
		}


    }
}

?>
