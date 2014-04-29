<?php
/**
 *  My/Rcv/Index.php
 *
 *  @author	 {$author}
 *  @package	M
 *  @version	$Id$
 */

/**
 *  my_rcv_index Form implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Form_MyRcvIndex extends M_ActionForm
{
	/**
	 *  @access private
	 *  @var	array   form definition.
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
 *  my_rcv_index action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_MyRcvIndex extends M_ActionClass
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
	 *  my_rcv_index action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		$userManager = $this->backend->getManager("User");
		$itemManager = $this->backend->getManager("Item");
		$member_id = $this->af->get('opensocial_owner_id');
		//プロフィール情報
		//LVに応じたgenki回復時間の表示 (3分で1ポイント回復)
		$profile = $userManager->getProfile($member_id);
		$this->af->setApp("profile", $profile);
		
		//lg_rcv から情報取得
		$rNum = $userManager->existsRcv($member_id ,$num="");
		$this->af->setApp("rcvNum", 3 - $rNum);

		//きびだんご個数取得 116
		$rcv_id = $this->config->get('kibiItemid');
		$cnt = $itemManager->getKbn4Count($member_id,$rcv_id);
		$this->af->setApp("cnt", $cnt);

		return 'my_rcv_index';
	}
}

?>
