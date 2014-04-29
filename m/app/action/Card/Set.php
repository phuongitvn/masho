<?php
/**
 *  Card/Set.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  card_edit form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_CardSet extends M_ActionForm
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
        "seq" => array(),
        "q" => array(),
        "ssid" => array(),
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
 *  card_edit action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_CardSet extends M_ActionClass
{
    /**
     *  preprocess card_edit action.
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
        $seq = $this->af->get('seq');
        $ss_id = $this->af->get('ssid');

		//カードのレベル取得
        $card = $cardManager->getDispCardInfo($member_id , $seq );

        $this->af->setApp("card", $card);

        $isReload = $cardManager->isReload($member_id ,$ss_id);
        $this->af->setApp("isReload", $isReload);

        if($isReload == True){
			//return 'card_404';
        }else{
			if($card['status'] == 3 ){

		        $profile = $userManager->getProfile($member_id);
		        $this->af->setApp("profile", $profile);
				//トランザクション開始
		        $db = $this->backend->getDb();
		        $ret = $db->query('START TRANSACTION');
		        if($ret == False){
		            return 'error_sys';
		        }
				//カードStatus変更
		        $cardU = array();
		        $cardU["memberid"] = $member_id;
		        $cardU["cardseq"]  = $seq;
		        $cardU["status"]   = '1';
		        $ret1 = $cardManager->updateCardStatus($cardU);
				//ssid登録
		        $ret2 = $userManager->updSession($member_id ,$ss_id);
		        if( $ret1 === False || $ret2 === False ){
		            $db->query('ROLLBACK');
		            return 'error_sys';
		        }
		        //トランザクション終了
		        $ret = $db->query('COMMIT');
		        if($ret === False){
		            return 'error_sys';
		        }
			}else{
				return 'card_404';
			}
			
		}

		$ssid = $userManager->getSsId();
        $this->af->setApp("ssid", $ssid);

        return 'card_set';
    }
}

?>
