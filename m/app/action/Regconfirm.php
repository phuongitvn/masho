<?php
/**
 *  Reg.php
 *
 *  @author	{$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  Reg form implementation
 *
 *  @author	{$author}
 *  @access	public
 *  @package   M
 */

class M_Form_Regconfirm extends M_ActionForm
{
	/**
	 *  @access   private
	 *  @var	  array   form definition.
	 */
	var $form = array(

		"opensocial_owner_id" => array(),
		"type" => array(),
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
 *  Reg action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_Regconfirm extends M_ActionClass
{
	/**
	 *  preprocess Reg action.
	 *
	 *  @access	public
	 *  @return	string  Forward name (null if no errors.)
	 */
	function prepare()
	{
		if(is_array($_GET) == True){
			foreach($_GET as $key=> $value){
				$this->af->set($key ,$value);
			}
		}
		if(is_array($_POST) == True){
			foreach($_POST as $key=> $value){
				$this->af->set($key ,$value);
			}
		}

		$domain = $this->config->get("url");
		$this->af->setApp('domain' ,$domain);

		//return parent::prepare();
	}

	/**
	 *  Reg action implementation.
	 *
	 *  @access	public
	 *  @return	string  Forward Name.
	 */
	function perform()
	{

		//mbga　GWチェック
		$ret = Util::fromMbga();

		//メンテナンス状態取得
		$batchManager = $this->backend->getManager("Batch");
		$mt_flg = $batchManager->getMaintainanceStatus();
		if($mt_flg == 1){
			return 'maintain';
		}

//debug
//echo "mbgaCHK";
//var_dump($ret);
		$ret=true;
		if($ret == False){
			return 'error_sys';
		}

		//会員登録チェック
		$user_id = $this->af->get('opensocial_owner_id');
		$userManager = $this->backend->getManager("User");
		$cardManager = $this->backend->getManager("Card");

		$chk = $userManager->existsUser($user_id);
		if($chk == True){
				$profile = $userManager->getProfile($user_id);
				$ssid = $userManager->getSsId();
				$this->af->setApp("ssid", $ssid);
				$this->af->setApp("profile", $profile);
				$card = $cardManager->getCardAtt($profile['prof']);
				$this->af->setApp("card", $card);
				$stage = $userManager->getStageName($profile['stage']);
				$this->af->setApp("stage", $stage);
		  	if($profile['tut_num'] < 10){
				return 'my_indextut';
			}elseif($profile['tut_num'] == 10 || $profile['tut_num'] == 11){
				return 'quest_tut3';
			}elseif($profile['tut_num'] >= 12 && $profile['tut_num'] <= 17){
				return 'my_indextutf';
			}elseif($profile['tut_num'] == 18){
				return 'my_indextutl';
			}else{
				return 'my_index';
			}
		}

		$cardManager = $this->backend->getManager("Card");
		$type = $this->af->get('type');
		$tmp_profile = $userManager->getTemporaryInfo();
		$this->af->setApp('profile', $tmp_profile);

		//TYPEのチェック
		if($type == "o" || $type == "d" || $type == "b"){
			$inicard = "reg_".$type;
			$bid = $this->config->get($inicard);

			for ($i=1; $i<=5; $i++) {
				$card[$i] = $cardManager->getCardAtt($bid[$i]);
				$card[$i]['bid'] = $bid[$i];
			}

			$this->af->setApp("card", $card);
			//リロード対策
			$ssid = $cardManager->getSsId();
			$this->af->setApp("ssid", $ssid);
			return 'regconfirm';
	
		}else{
			return 'index';
		}

	}
}

?>
