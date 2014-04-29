<?php
/**
 *  Qa/Gr.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  item_index form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_QaGr extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
        "c" => array(),
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
 *  item_index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_QaGr extends M_ActionClass
{
    /**
     *  preprocess item_index action.
     *
     *  @access    public
     *  @return    string  Forward name (null if no errors.)
     */
    function prepare()
    {
        /**
        if ($this->af->validate() > 0) {
            return 'error';
        }
        $sample = $this->af->get('sample');
        return null;
        */

        return parent::prepare();
    }

    /**
     *  Gr action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {

        $qaManager = $this->backend->getManager("Qa");
        $userManager = $this->backend->getManager("User");

        $member_id = $this->af->get('opensocial_owner_id');

		$max = $qaManager->getMaxIds();
		//カテゴリ
        $cid = $this->af->get('c');

        if($cid == ""){
            $cid = 0;
        }elseif($cid > $max['cateid'] || is_numeric($cid) === False){
        	return 'qa_index';
        }

	    $title = $qaManager->getQaCategory($cid);
        $this->af->setApp("title", $title['0']);

	    $cate = $qaManager->getQuestionsByCategory($cid);
        $this->af->setApp("cate", $cate);
      
        return 'qa_gr';
    }
}

?>
