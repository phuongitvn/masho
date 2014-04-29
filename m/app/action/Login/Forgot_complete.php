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
		$encode = $this->af->get('e');
		var_dump($encode);
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
