<?php
/**
 *  My/Rcv/Complete.php
 *
 *  @author	 {$author}
 *  @package	M
 *  @version	$Id$
 */

/**
 *  my_rcv_complete Form implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Form_MyRcvComplete extends M_ActionForm
{
	/**
	 *  @access private
	 *  @var	array   form definition.
	 */
	var $form = array(
		"opensocial_owner_id" => array(),
		"ssid" => array(),
		"kb" => array(),
	);

	/**
	 *  Form input value convert filter : sample
	 *
	 *  @access protected
	 *  @param  mixed   $value  Form Input Value
	 *  @return mixed		   Converted result.
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
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_MyRcvComplete extends M_ActionClass
{
	/**
	 *  preprocess of my_p_day Action.
	 *
	 *  @access public
	 *  @return string	forward name(null: success.
	 *								false: in case you want to exit.)
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
		$member_id = $this->af->get('opensocial_owner_id');
		$ss_id = $this->af->get('ssid');
		$kb = $this->af->get('kb');

		//きびだんご116
		$rcvId = $this->config->get('kibiItemid');

		//プロフィール情報
		//LVに応じたgenki回復時間の表示 (3分で1ポイント回復)
		$org = $userManager->getProfile($member_id);
		$this->af->setApp("org", $org);

		$isReload = $userManager->isReload($member_id ,$ss_id);
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
			//きびだんご使用
			if($kb >= 1){
				//数CHK
				$cntR = $itemManager->getKbn4Count($member_id,$rcvId);
				if($cntR == 0){
					return 'my_rcv_index';
				}elseif($cntR == 1){				//回復薬　-1 ただし0の時はレコード削除
					$table = "t_item";
					$where = "memberid = '".$member_id."' AND itemid = '" .$rcvId ."'";
					$ret = $itemManager->deleteRecord($table ,$where);
				}else{
					$table = "t_item";
					$column = "num";
					$where = "memberid = '".$member_id."' AND itemid = '" .$rcvId ."'";
					$ret = $itemManager->decrementColumn($table ,$column ,$where);
				}
				//t_userを更新
				$user = array();
				$user["memberid"] = $member_id;
				$user["genki_rcv_time"] = date('Y-m-d H:i:s');
				$ret1 = $userManager->updateUser($user);
			}else{
				//lg_rcv から情報取得
				$ret = $userManager->setRcv($member_id);
				//t_userを更新
				$user = array();
				$user["memberid"] = $member_id;
				$user["genki_rcv_time"] = date('Y-m-d H:i:s');
				$user["friend_pt"] = $org['friend_pt'] - 100;
				$ret1 = $userManager->updateUser($user);
			}
			//ssid登録
			$ret2 = $userManager->updSession($member_id ,$ss_id);
			if($ret === False || $ret1 === False || $ret2 === False){
				$db->query('ROLLBACK');
				return 'error_sys';
			}
			//トランザクション終了
			$ret = $db->query('COMMIT');
			if($ret === False){
				return 'error_sys';
			}
		}

		$cntR = $itemManager->getKbn4Count($member_id,$rcvId);
		$this->af->setApp("cntR", $cntR);
		$rNum = $userManager->existsRcv($member_id ,$num="");
		$this->af->setApp("rcvNum", 3 - $rNum);
		$profile = $userManager->getProfile($member_id);
		$this->af->setApp("profile", $profile);

//EV
		$eventManager = $this->backend->getManager("Event");
		$evid = $this->config->get("evid");
		$this->af->setApp("evid", $evid);
		$gTL = $eventManager->getTimeLeft();
		$this->af->setApp("gTL", $gTL);

		$ssid = $userManager->getSsId();
		$this->af->setApp("ssid", $ssid);

		return 'my_rcv_complete';
	}
}

?>
