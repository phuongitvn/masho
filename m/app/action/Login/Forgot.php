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
class M_Form_LoginForgot extends M_ActionForm
{
	/**
	 *  @access private
	 *  @var	array   form definition.
	 */
	var $form = array(
	   /*
		*  TODO: Write form definition which this action uses.
		*  @see http://ethna.jp/ethna-document-dev_guide-form.html
		*
		*  Example(You can omit all elements except for "type" one) :
		*
		*  'sample' => array(
		*	  // Form definition
		*	  'type'		=> VAR_TYPE_INT,	// Input type
		*	  'form_type'   => FORM_TYPE_TEXT,  // Form type
		*	  'name'		=> 'Sample',		// Display name
		*  
		*	  //  Validator (executes Validator by written order.)
		*	  'required'	=> true,			// Required Option(true/false)
		*	  'min'		 => null,			// Minimum value
		*	  'max'		 => null,			// Maximum value
		*	  'regexp'	  => null,			// String by Regexp
		*	  'mbregexp'	=> null,			// Multibype string by Regexp
		*	  'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp 
		*
		*	  //  Filter
		*	  'filter'	  => 'sample',		// Optional Input filter to convert input
		*	  'custom'	  => null,			// Optional method name which
		*										// is defined in this(parent) class.
		*  ),
		*/
		'username' => array(
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
			'name' => 'username'
		),
		'btn' => array(
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
			'name' => 'btn'
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
class M_Action_LoginForgot extends M_ActionClass
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
		$btn = $this->af->get('btn');
		$username = $this->af->get('username');
		$this->af->setApp("username", $username);
		$ran = mt_rand(1,4);
		$this->af->setApp("ran", $ran);
		$st = "my";
		$this->af->setApp("st", $st);
		if (!empty($btn)) {
			if (empty($username)) {
				$this->ae->addObject(
					'username',
					Ethna::raiseNotice('Vui lòng điền tên đăng nhập')
				);
				return 'login_forgot';
			} 
			$userManager = $this->backend->getManager('User');
			$ret=$userManager->checkUserForgot($username);
			$supportManager = $this->backend->getManager('Support');
			$code=sha1($ret['memberid']. time());
			$ret1=$supportManager->setForgotCode($ret['memberid'],$code);
			if($ret!=false){
				$to=$ret['email'];
				$ethna_mail =& new Ethna_MailSender($this->backend);	
				$e=$ethna_mail->send($to,
    				'mailforgot.tpl',
   					 array('username' => $username,
   							'code'=>$code
   					)
   				);
   				if (Ethna::isError($e)) {
   					$msg="Error!";
   				}else{
   					$msg="Một mật khẩu mới đã được gửi tới Email của bạn mời bạn check Email!";
   				}
			    $this->af->setApp("msg",$msg);
			    return 'login_forgotsuccess';
			}else{
				$this->ae->addObject(
					'username',
					Ethna::raiseNotice('Tên đăng nhập không đúng')
				);
			}
		}
		
		return 'login_forgot';
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
