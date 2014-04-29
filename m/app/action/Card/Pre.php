<?php
/**
 *  Card/Pre.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  card_pre form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_CardPre extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(
       /*
        *  TODO: Write form definition which this action uses.
        *  @see http://ethna.jp/ethna-document-dev_guide-form.html
        *
        *  Example(You can omit all elements except for "type" one) :
        *
        *  'sample' => array(
        *      // Form definition
        *      'type'        => VAR_TYPE_INT,    // Input type
        *      'form_type'   => FORM_TYPE_TEXT,  // Form type
        *      'name'        => 'Sample',        // Display name
        *  
        *      //  Validator (executes Validator by written order.)
        *      'required'    => true,            // Required Option(true/false)
        *      'min'         => null,            // Minimum value
        *      'max'         => null,            // Maximum value
        *      'regexp'      => null,            // String by Regexp
        *      'mbregexp'    => null,            // Multibype string by Regexp
        *      'mbregexp_encoding' => 'UTF-8',   // Matching encoding when using mbregexp 
        *
        *      //  Filter
        *      'filter'      => 'sample',        // Optional Input filter to convert input
        *      'custom'      => null,            // Optional method name which
        *                                        // is defined in this(parent) class.
        *  ),
        */
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
 *  card_pre action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_CardPre extends M_ActionClass
{
    /**
     *  preprocess card_pre action.
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
     *  Index action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {

        $userManager = $this->backend->getManager("User");
        $cardManager = $this->backend->getManager("Card");
        
        $member_id = $this->af->get('opensocial_owner_id');

		//プレゼント箱のデータ総数
		$total = 9;
		$existNum =0;

        $limit = 9;
        $list = array();

        //ファイルデッキのカードリスト
        $status = "1";
        $cntF = $cardManager->getCardlistCount($member_id ,$status);
        //プレゼント箱のカードリスト
        $status = "2";
        $cnt = $cardManager->getCardlistCount($member_id ,$status);

        if($cnt > 0){
			$sort ="rk";
            $list = $cardManager->getCardlist($member_id ,$status,$sort,$limit ,$offset);
			//存在するデータ数を取得
			$existNum = count($list);
        }

		//空枠追加
		for ($i=$existNum; $i<$limit; $i++) {
            $list[$i]["bushoid"] = "non";
            $list[$i]["name_rank"] = "　";
        }

        $this->af->setApp("cntF", $cntF);
        $this->af->setApp("cnt", $cnt);
        $this->af->setApp("list", $list);
        $this->af->setApp("limit", $limit);

        return 'card_pre';
    }
}

?>
