<?php
/**
 *  Login/Forgot.php
 *
 *  @author	 {$author}
 *  @package	M
 *  @version	$Id$
 */

/**
 *  login_forgot Form implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Form_LoginForgotcomplete extends M_ActionForm
{
	/**
	 *  @access private
	 *  @var	array   form definition.
	 */
	var $form = array(
	   
		'e' => array(
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
			'name' => 'username'
		),
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
 *  login_forgot action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_LoginForgotcomplete extends M_ActionClass
{
	/**
	 *  preprocess of login_forgot Action.
	 *
	 *  @access public
	 *  @return string	forward name(null: success.
	 *								false: in case you want to exit.)
	 */
	function prepare()
	{
		$domain = $this->config->get("url");
		$this->af->setApp('domain' ,$domain);
		return null;
	}

	/**
	 *  login_forgot action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{	
		$code = $this->af->get('e');
		$supportManager = $this->backend->getManager('Support');
		$userManager = $this->backend->getManager('User');
		
		$ret=$supportManager->checkForgotCode($code);
		if($ret!=false){
		$passnew = $this->generatePassword();
		$this->af->setApp("passnew", $passnew);
		$pwd = sha1('masho'.$passnew);
		$rs_update_forgot_code=$supportManager->updateForgotCode($ret["id"]);
				$rs_select_user=$supportManager->getInfoUser($ret["memberid"]);
				$this->af->setApp("username",$rs_select_user["handle"]);
				$rs_update_pass=$supportManager->setPass($ret["memberid"],$pwd);
				//$rs=$userManager->login($rs_select_user["handle"],$pwd);
		}else{
			$this->af->setApp("error","1");
		}
		return 'login_forgotcomplete';
		
	}
	function generatePassword() {
		$seed = 'abcdefghijklmnopqrstuvwxyz0123456789';
		srand();
		$count = rand(6, 12);
		$p = '';
		for ($i=0; $i<$count; $i++) {
			$p .= substr($seed, rand(0, strlen($seed)-1), 1);
		}
		return $p;
}
}

?>
