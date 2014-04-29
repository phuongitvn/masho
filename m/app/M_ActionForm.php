<?php
// vim: foldmethod=marker
/**
 *  M_ActionForm.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

// {{{ M_ActionForm
/**
 *  ActionForm class.
 *
 *  @author     {$author}
 *  @package    M
 *  @access     public
 */
class M_ActionForm extends Ethna_ActionForm
{
    /**#@+
     *  @access private
     */

    /** @var    array   form definition (default) */
    var $form_template = array(
        'opensocial_owner_id' => array(
            'type'          => VAR_TYPE_INT,
            'required'      => true,
        ),
		/* viola ADD 0614 */
		/*
        'formid' => array(
            'type'          => VAR_TYPE_STRING,
            'form_type'     => FORM_TYPE_HIDDEN,
            'required'      => true,
        ),
		*/
    );

    /**#@-*/

    /**
     *  Error handling of form input validation.
     *
     *  @access public
     *  @param  string      $name   form item name.
     *  @param  int         $code   error code.
     */
    function handleError($name, $code)
    {
        return parent::handleError($name, $code);
    }

    /**
     *  setter method for form template.
     *
     *  @access protected
     *  @param  array   $form_template  form template
     *  @return array   form template after setting.
     */
    function _setFormTemplate($form_template)
    {
        return parent::_setFormTemplate($form_template);
    }

    /**
     *  setter method for form definition.
     *
     *  @access protected
     */
    function _setFormDef()
    {
        return parent::_setFormDef();
    }

	/*
	* 携帯用コード変換
	*/

	//function setApp($name, $value ,$fromEncoding="UTF-8" ,$toEncoding="SJIS-win")
	function setApp($name, $value ,$fromEncoding="UTF-8" ,$toEncoding="UTF-8")
    {

		/* viola ADD*/
        $carrierNo = $this->backend->useragent->getAgentType();

		if($carrierNo == 3){
			mb_convert_variables("UTF-8", $fromEncoding, $value);
		}else{
			mb_convert_variables($toEncoding, $fromEncoding, $value);
		}
        
        $this->app_vars[$name] = $value;
    }

}
// }}}

?>
