<?php
/**
 *  Sus.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  Sus form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_Sus extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
		"eventtype" => array(),
		"id" => array(),
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
 *  Sus action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_Sus extends M_ActionClass
{
    /**
     *  preprocess Sus action.
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
     *  Sus action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {

		//GREE GWチェック
		$retGw = Util::fromGreeLifeCycle();

		if($retGw ){

			//LOG書き出し ファイル名設定
			$path = dirname(dirname(dirname(dirname(__FILE__)))) . '/logs/';
			$filename = $path ."sus_" .date("Ymd") .".log";
			$log  = date("Y-m-d H:i:s");
			$log .= " " .$_SERVER['REQUEST_URI'];
			$log .= "\n";
			file_put_contents($filename, $log, FILE_APPEND);
		}

        return 'ok';
    }
}

?>
