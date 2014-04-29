<?php
class M_Cli_Form_BatchRegularEvent extends M_ActionForm
{
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
 *  batch_regular_event action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Cli_Action_BatchRegularEvent extends M_ActionClass
{
	function prepare()
	{
		return null;
	}

	/**
	 *  batch_regular_event action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		$manager = $this->backend->getManager("RegularEvent");
		$manager->doevent();
		return null;
	}
}

?>
