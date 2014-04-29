<?php
/**
 *  My/Get/Complete.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  my_rcv_complete Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_MyGetComplete extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(
        "opensocial_owner_id" => array(),
        "ssid" => array(),
        "oid" => array(),
        "id" => array(),
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
 *  my_rcv_complete action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_MyGetComplete extends M_ActionClass
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
     *  my_rcv_complete action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {

        $userManager = $this->backend->getManager("User");
       	$itemManager = $this->backend->getManager("Item");
       	$cardManager = $this->backend->getManager("Card");
       	$fightManager = $this->backend->getManager("Fight");
       	$friendManager = $this->backend->getManager("Friend");

        $member_id = $this->af->get('opensocial_owner_id');
        $ss_id = $this->af->get('ssid');
        $friend_id = $this->af->get('oid');
        $item_id = $this->af->get('id');
		$amount = 1;

        $profile = $userManager->getProfile($member_id);
		$user = $itemManager->getItemRelatedData($member_id);
        $this->af->setApp('user',$user);
		$item = $itemManager->getItemData($item_id);
        $this->af->setApp('item',$item);

		//現在の最大攻撃力、防御力
		$buki_off  = $user['buki_off'];
		$buki_def  = $user['buki_def'];
		$bougu_off = $user['bougu_off'];
		$bougu_def = $user['bougu_def'];
		$nowOffPower = $buki_off + $bougu_off;
		$nowDefPower = $buki_def + $bougu_def;
        $this->af->setApp("nowOffPower", $nowOffPower);
        $this->af->setApp("nowDefPower", $nowDefPower);

        $isReload = $userManager->isReload($member_id ,$ss_id);
        $this->af->setApp("isReload", $isReload);

		//該当IDのインセンティブが存在しているかのCHK
		$exists = $friendManager->existsIncentive($member_id,$friend_id);

        if($isReload == True || $exists == 0){
			if($item['kbn'] == 1){
				$after['num']   =  $user['buki_num'];
			}elseif($item['kbn'] == 2){
				$after['num']   = $user['bougu_num'] ;
			}
			$this->af->setApp('after',$after);
        }else{
			//リアリティ処理
			if($item['kbn'] == 1 || $item['kbn'] == 2 ){
				//前処理
				if($item['kbn'] == 1){
					$rest_off = $bougu_off;
					$rest_def = $bougu_def;
				}elseif($item['kbn'] == 2){
					$rest_off = $buki_off;
					$rest_def = $buki_def;
				}
				//リアリティ計算
				$after = $itemManager->getMaxPower($member_id,$item_id);
				//後処理
				if($item['kbn'] == 1){
					$after['num']   =  $user['buki_num'] + $amount;
					$buki_off = $after['buki_off'];
					$buki_def = $after['buki_def'];
				}elseif($item['kbn'] == 2){
					$after['num']   = $user['bougu_num'] + $amount;
					$bougu_off = $after['bougu_off'];
					$bougu_def = $after['bougu_def'];
				}
				$this->af->setApp('after',$after);
			}

	        //トランザクション開始
	        $db = $this->backend->getDb();
	        $ret = $db->query('START TRANSACTION');
	        if($ret == False){
	            return 'error_sys';
	        }
	        //アイテム購入処理
	        $ret1 = $itemManager->buyItem($member_id ,$item_id ,$item['kbn'],$amount,$item['rest'],$price=0,$buki_off,$buki_def,$bougu_off,$bougu_def,$profile['lg_dest'],$ss_id ,$payment_id="",$status="");
			//t_incentiveをUPDATE
			$where = " memberid = '" .$member_id ."' AND friendid = '" .$friend_id ."' ";
			$ret2 = $itemManager->updateColumn($table="t_incentive" ,$column="del_flg" ,$status="1", $where);
	        if($ret1 === False || $ret2 === False){
	            $db->query('ROLLBACK');
	            return 'error_sys';
	        }
	        //トランザクション終了
	        $ret = $db->query('COMMIT');
	        if($ret === False){
	            return 'error_sys';
	        }
		}

		//処理後の最大攻撃力、防御力
		$user2 = $itemManager->getItemRelatedData($member_id);
		$buki_off  = $user2['buki_off'];
		$buki_def  = $user2['buki_def'];
		$bougu_off = $user2['bougu_off'];
		$bougu_def = $user2['bougu_def'];
		$afterOffPower = $buki_off + $bougu_off;
		$afterDefPower = $buki_def + $bougu_def;
        $this->af->setApp("afterOffPower", $afterOffPower);
        $this->af->setApp("afterDefPower", $afterDefPower);

        return 'my_inviteget';
    }
}

?>
