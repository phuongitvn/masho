<?php
/**
 *  Setopen.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

class M_Form_Setopen extends M_ActionForm
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
 *  Setopen action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_Setopen extends M_ActionClass
{
    /**
     *  preprocess Setopen action.
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
     *  Setopen action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {

        $batchManager = $this->backend->getManager("Batch");

		//メンテナンス状態へ
		$ret = $batchManager->setOpenStatus();

        if($ret === False ){
			//アラートメール配信
			
        }

        //return 'ok';

    }
}

?>
