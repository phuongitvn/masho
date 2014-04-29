<?php
/**
 *  Card/Index.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  card_index form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_CardIndex extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
        "id" => array(),
        "oid" => array(),
        "seq" => array(),
        "deck" => array(),
        "mode" => array(),
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
 *  card_index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_CardIndex extends M_ActionClass
{
    /**
     *  preprocess card_index action.
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
        $mode = $this->af->get('mode');
        $deck = $this->af->get('deck');
        $cardseq = $this->af->get('seq');
        $bushoid = $this->af->get('id');
        $other_id = $this->af->get('oid');
        $this->af->setApp("mode", $mode);
        $this->af->setApp("deck", $deck);
        $this->af->setApp("bushoid", $bushoid);

		//カードのレベル取得
        $card = $cardManager->getCardInfo($member_id , $cardseq , False);
        $this->af->setApp("card", $card);

		//statusのCHK 0:デッキ、1:ファイル、2:プレ、3:満杯tmp
		if($card['status'] >= 4){
	        return 'card_404';
		}

		//リロード対策
		$ssid = $cardManager->getSsId();
        $this->af->setApp("ssid", $ssid);

		if($other_id != ""){
			//プレゼント箱のカードリスト
	        $cntP = $cardManager->getCardlistCount($other_id ,$status="2");
			if($cntP == 9){
		        $other= $userManager->getDeckProfile($other_id);
		        $this->af->setApp("other", $other);
		        return 'card_pful';
			}
		}

		if($mode == "4" || $mode == "5"){
	        $card = $cardManager->getCardAtt($bushoid);
	        $this->af->setApp("bseq", $card['seq']);
		}elseif($mode == "6" || $mode == "7"){
	        //リロード対策(合成)
			$ssid = $userManager->getSsId();
	        $this->af->setApp("ssid", $ssid);
		}

		//ナビゲーション用
        $cnt['file'] = $cardManager->getCardlistCount($member_id ,$status="1");
        $cnt['pre']  = $cardManager->getCardlistCount($member_id ,$status="2");
        $this->af->setApp("cnt", $cnt);

		//武将マスタからデータ取得		//奥義マスタから奥義効果を取得
        $m_busho = $cardManager->getCardAtt($bushoid);
        $this->af->setApp("m_busho", $m_busho);

        //プロフィール情報
		$profile = $userManager->getProfile($member_id);
        $this->af->setApp("profile", $profile);

        return 'card_index';
    }
}

?>
