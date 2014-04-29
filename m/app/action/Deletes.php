<?php
/**
 *  Deletes.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

class M_Form_Deletes extends M_ActionForm
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
 *  Deletes action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_Deletes extends M_ActionClass
{
    /**
     *  preprocess Deletes action.
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
     *  Deletes action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {

        $batchManager = $this->backend->getManager("Batch");

		//最新の削除タームを取得	v_bt_controlより
		$terms = $batchManager->getDeleteTerm();
		//暫定
		$term = $terms['lg_help'];

		//各削除処理を実行
		$ret = $batchManager->deleteRecords($term);
        if($ret === False ){
			//アラートメール配信
			
        }

        //return 'ok';

    }
}

?>
