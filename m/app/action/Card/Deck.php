<?php
/**
 *  Card/Deck.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  card_deck form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_CardDeck extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
		"mode" => array(),
		"seq" => array(),
    );

}

/**
 *  card_deck action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_CardDeck extends M_ActionClass
{
    /**
     *  preprocess card_deck action.
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
        $questManager = $this->backend->getManager("Quest");
        
        $member_id = $this->af->get('opensocial_owner_id');
        $mode = $this->af->get('mode');
        $seq  = $this->af->get('seq');
        $this->af->setApp("mode", $mode);

		//昇格候補のカード情報取得
		if($mode == "edit"){
			$busho = $cardManager->getCardInfo($member_id , $seq , 1);
	        $this->af->setApp("busho", $busho);
		}

        //デッキ情報取得
        $deck = $userManager->getDeckProfile($member_id);
        $this->af->setApp("deck", $deck);

		for ($i=1; $i<=5; $i++) {
			$d = "deck".$i;
			//カード情報取得(t_card)
	        $tmp[$i] = $cardManager->getCardInfo($member_id , $deck[$d] , 0);
			$bid[$i] = $tmp[$i]['bushoid'];
			
			//武将属性取得
			$tmpCard = $cardManager->getCardAtt($tmp[$i]['bushoid']);
			$disp[$i] = $tmpCard['nameRank'];
		}

		//陣形名取得
		if($deck['formno'] > 0){
			$form = $cardManager->getFormAtt($deck['formno']);
		}else{
			$form['formno'] = 0;
		}

        //ファイルデッキのカードリスト
        $status = "1";
        $cntF = $cardManager->getCardlistCount($member_id ,$status);
        //プレゼント箱のカードリスト
        $status = "2";
        $cntP = $cardManager->getCardlistCount($member_id ,$status);

		//魔将出現条件
		$profile = $userManager->getProfile($member_id);
		if( $profile['cl_cycle'] > $profile['cl_masho']){
			$masho = $questManager->getMasho($profile['stage'],$profile['cl_cycle']);
        	$this->af->setApp("masho", $masho);
		}

        $this->af->setApp("cntF", $cntF);
        $this->af->setApp("cntP", $cntP);
        $this->af->setApp("bid", $bid);
        $this->af->setApp("card", $tmp);
        $this->af->setApp("disp", $disp);
        $this->af->setApp("form", $form);

        return 'card_deck';
    }
}

?>
