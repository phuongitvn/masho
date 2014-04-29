<?php
/**
 *  Card/Del.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

class M_Form_CardDelIndex extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
        "ssid" => array(),
        "seq" => array(),
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
 *  card_form action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_CardDelIndex extends M_ActionClass
{
    /**
     *  preprocess card_form action.
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
        $profile = $userManager->getProfile($member_id);
        $this->af->setApp("profile", $profile);

		//カードのレベル取得
        $card = $cardManager->getDispCardInfo($member_id , $seq );
        $this->af->setApp("card", $card);

		$num = $card['rank_num'];
		$cbmoney = $this->config->get("cardCashBack");
		$after = $profile['money'] + $cbmoney[$num];

        $m_busho = $cardManager->getCardAtt($card['bushoid']);

   		$this->af->setApp("after", $after);
        $this->af->setApp("card",$card);
        $this->af->setApp("m_busho", $m_busho);

        return 'card_del_index';
    }
}

?>
