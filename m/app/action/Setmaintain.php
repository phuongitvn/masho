<?php
/**
 *  Setmaintain.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

class M_Form_Setmaintain extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(
/*
		"opensocial_owner_id" => array(),
*/
    );

}

/**
 *  Setmaintain action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_Setmaintain extends M_ActionClass
{
    /**
     *  preprocess Setmaintain action.
     *
     *  @access    public
     *  @return    string  Forward name (null if no errors.)
     */
    function prepare()
    {
/*
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
*/
    }

    /**
     *  Setmaintain action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {

        $batchManager = $this->backend->getManager("Batch");

		//メンテナンス状態へ
		$ret = $batchManager->setMaintainanceStatus();

        if($ret === False ){
			//アラートメール配信
			
        }

        //return 'ok';

    }
}

?>
