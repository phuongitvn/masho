<?php
/**
 *  Qa/Detail.php
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

class M_Form_QaDetail extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
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
 *  item_index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_QaDetail extends M_ActionClass
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
     *  Detail action implementation.
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
        $qaid = $this->af->get('id');
        if($qaid == "" || $qaid > $max['qaid'] || is_numeric($qaid)=== False){
        	return 'qa_index';
        }

	    $qa = $qaManager->getQuestionAnswer($qaid);
        $this->af->setApp("qa", $qa);

	    $title = $qaManager->getQaCategory($qa['cateid']);
        $this->af->setApp("title", $title['0']);

		for ($i=1; $i<=5; $i++) {
			$rt = "rel".$i;
			$j = $i - 1 ;
			if($qa[$rt] > 0){
				$ret = $qaManager->getQuestionAnswer($qa[$rt]);
				$rel[$j]['question'] = $ret['question'];
				$rel[$j]['qaid'] = $qa[$rt];
			}
		}

        $this->af->setApp("rel", $rel);



        return 'qa_detail';
    }
}

?>
