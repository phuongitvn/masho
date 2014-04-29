<?php
/**
 *  Maintain.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  Maintain form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_Maintain extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),

    );

    /**
     *  Form input value convert filter : sample
     *
     *  @access protected
     *  @param  mixed   $value  Form Input Value
     *  @return mixed           Converted result.
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
 *  Maintain action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_Maintain extends M_ActionClass
{
    /**
     *  preprocess Maintain action.
     *
     *  @access    public
     *  @return    string  Forward name (null if no errors.)
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
     *  Maintain action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {


        return 'maintain';
    }
}

?>
