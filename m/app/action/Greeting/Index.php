<?php
/**
 *  Greeting/Index.php
 *
 *  @author	 {$author}
 *  @package	M
 *  @version	$Id$
 */

/**
 *  greeting_index Form implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Form_GreetingIndex extends M_ActionForm
{
	/**
	 *  @access private
	 *  @var	array   form definition.
	 */
	var $form = array(

		"opensocial_owner_id" => array(),
		"id" => array(),
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
 *  greeting_index action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_GreetingIndex extends M_ActionClass
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
	 *  greeting_index action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		$userManager = $this->backend->getManager("User");
		$friendManager = $this->backend->getManager("Friend");
		$greetManager = $this->backend->getManager("Greet");

		$member_id = $this->af->get('opensocial_owner_id');
		$ss_id = $this->af->get('ssid');
		$friend_id = $this->af->get('id');

		//本人チェック
		if($member_id == $friend_id){
			$this->af->setApp('error' ,"1");
			return 'error_my';
		}

		//相手のプロフィール情報
		$profile = $userManager->getProfile($friend_id);
		if(count($profile) == 0){
			return 'error_404';
		}
		$this->af->setApp("profile", $profile);

		//BlackListCHK
		$black = chkBlackList($member_id,$friend_id);
		if($black['entry']['id'] == $friend_id && $black['entry']['ignorelistId'] == $member_id){
			return "error_black";
		}
		$isReload = $userManager->isReload($member_id ,$ss_id);
		$this->af->setApp("isReload", $isReload);

		//同盟状態からニコニコP取得
		$nicoP = $friendManager->getFriendKbn($member_id ,$friend_id);

		//ニコニココメント取得
		$cmt = $friendManager->getNicoCmt($profile['prof']);

		//前回ニコニコ時間を取得
		$yet = $greetManager->existsGreeting($member_id ,$friend_id);
		if($isReload == True ){
			$domain = $this->config->get("url");
			$www = $domain['www'];
			$endUrl = "?url=http%3A%2F%2F".$www."%2Fother%2Findex.php%3Fid%3D".$friend_id.rawurlencode("&").session_name().'='.session_id().'&'.session_name().'='.session_id();
			//指定URLへの遷移(302)
			header("Location: $endUrl");
			exit;
		}elseif( $yet > 0){
			$hour = substr($yet,0,1);
			$min = intval(substr($yet,1,2));
			$this->af->setApp("hour", $hour);
			$this->af->setApp("min", $min);
			$nicoP = 0;
			$msg = $cmt['nico_cmt_ov'];
		}else{
			//トランザクション開始
			$db = $this->backend->getDb();
			$ret = $db->query('START TRANSACTION');
			if($ret == False){
				return 'error_sys';
			}
			//あいさつ処理lg_greeting
			$retNum = $greetManager->setGreeting($member_id ,$friend_id);
			if($retNum > 0){
				$ret1 = True;
			}else{
			//ニコニコP+回数付与
				$ret1 = $friendManager->setNicoPoint($member_id ,$friend_id,$nicoP,$kbn="niko");
			}
			//ssid登録
			$ret2 = $userManager->updSession($member_id ,$ss_id);

			if($retNum === False || $ret1 === False || $ret2 === False ){
				$db->query('ROLLBACK');
				return 'error_sys';
			}
			//トランザクション終了
			$ret = $db->query('COMMIT');
			if($ret === False){
				return 'error_sys';
			}

		}

		if($nicoP == 1){
			$msg = $cmt['nico_cmt_nt'];
		}elseif($nicoP == 2 || $nicoP == 3){
			$msg = $cmt['nico_cmt_f'];
		}
		if($retNum == 3){
			$msg = $cmt['nico_cmt_ov'];
		}

		//自分のプロフィール情報
		$my_profile = $userManager->getProfile($member_id);
		$this->af->setApp("my_profile", $my_profile);

		$this->af->setApp("nicoP", $nicoP);
		$this->af->setApp("msg", $msg);

		return 'greeting_index';
	}
}

?>
