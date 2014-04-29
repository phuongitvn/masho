<?php
/**
 *  Index.php
 *
 *  @author	{$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  Index form implementation
 *
 *  @author	{$author}
 *  @access	public
 *  @package   M
 */

class M_Form_Index extends M_ActionForm
{
	/**
	 *  @access   private
	 *  @var	  array   form definition.
	 */
	var $form = array(

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
 *  Index action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_Index extends M_ActionClass
{
	/**
	 *  preprocess Index action.
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
	 *  Index action implementation.
	 *
	 *  @access	public
	 *  @return	string  Forward Name.
	 */
	function perform()
	{
		$userManager = $this->backend->getManager("User");
		$lgRegularEventManager = $this->backend->getManager("RegularEvent");

		$batchManager = $this->backend->getManager("Batch");
		$mt_flg = 0;
		if($mt_flg == 1){
			return 'maintain';
		}

		$user_id = $this->af->get('opensocial_owner_id');
		$api = "self";
		$gree = dispFriends($user_id,$api,"id,nickname,profileUrl,thumbnailUrl,birthday,gender,hasApp",1,10);
		$hasApp = $gree['entry']['hasApp'];
		$this->af->setApp("hasApp", $hasApp);
		$handle = $gree['entry']['nickname'];
		$this->af->setApp("handle", $handle);

		$domain = $this->config->get("url");
		$www = $domain['www'];
		$appId = $domain['appId'];
		$api = $domain['api'];
		$this->af->setApp("www", $www);
		$this->af->setApp("appId", $appId);
		$this->af->setApp("api", $api);
//11/1/27 タグ追加
		$encId = $userManager->getCyptUserId($user_id);
		$this->af->setApp("encId", $encId);
//11/1/27 タグ追加

		$info = $lgRegularEventManager->getEventReport();
		$this->af->setApp('event_result', $info);

		//画像表示用乱数
		$ran = mt_rand(1,4);
		$this->af->setApp("ran", $ran);

		$this->af->setApp("id", $user_id);
		if($hasApp){//TRUE
			//会員登録チェック
			$ret = $userManager->existsUser($user_id);
			if($ret == False){
//TUT
				$ss = $userManager->getSsId();
				$this->af->setApp("ss", $ss);
				$st = "reg";
			}else{
				$profile = $userManager->getProfile($user_id);

//TUT
				if($profile['tut_num'] < 18){
					$ss = $userManager->getSsId();
					$this->af->setApp("ss", $ss);
					$st = "tut";
				}else{
					$this->af->setApp("tut_num", $profile['tut_num']);
					//新参者
					$newC = $userManager->getNewComer();
					$this->af->setApp("newC", $newC);
					//VRとHGの発生情報
					$cardManager = $this->backend->getManager("Card");
					//何日前までとるか
					$term = $this->config->get('rareTerm');
					$rareStat = $cardManager->getRareCardStat($term);
					$ssid = $userManager->getSsId();
					$this->af->setApp("ssid", $ssid);
					$this->af->setApp("term", $term);
					$this->af->setApp("rareStat", $rareStat);
					$st = "my";
				}
			}
		}else{
			$st = "reg";
//TUT
			$ss = $userManager->getSsId();
			$this->af->setApp("ss", $ss);
		}

		$this->af->setApp("st", $st);
		return 'index';
	}
}
?>