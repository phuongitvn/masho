<?php
/**
 *  Card/Done.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  card_do form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_CardPdone extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
        "bid" => array(),
        "dp" => array(),
        "ot" => array(),
        "sc" => array(),
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
 *  card_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_CardPdone extends M_ActionClass
{
    /**
     *  preprocess card_do action.
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

        $cardManager = $this->backend->getManager("Card");
        $itemManager = $this->backend->getManager("Item");
        $member_id = $this->af->get('opensocial_owner_id');

        $bid = $this->af->get('bid');
        $disp = $this->af->get('dp');
        $ot = $this->af->get('ot');
        $sc = $this->af->get('sc');

		//11/2/7
        $cardFileMax = $this->config->get("cardFileMax");

		$card = $cardManager->getDispCardInfo($member_id , $disp);
		$otcard = $cardManager->getDispCardInfo($member_id , $ot);
		//成功・失敗の判断
		if($sc == 1){
			$org['O']  = $card['offense'] -  $otcard['offense'];
			$org['D']  = $card['defense'] -  $otcard['defense'];
			$org['F'] = $card['follower'] - $otcard['follower'];

			$this->af->setApp("done", "OK");
			$this->af->setApp("bid", $bid);
			$this->af->setApp("org", $org);
			$this->af->setApp("card", $card);
		}elseif($sc == 0){
			$this->af->setApp("done", "NG");
			$this->af->setApp("bid", $bid);
			$this->af->setApp("card", $otcard);
			//ぶた保持CHK	11/2/19
	        $pigGoldId = $this->config->get("pigGoldId");		//金のぶた161
	        $pigSilvId = $this->config->get("pigSilvId");		//銀のぶた162
			$pGcnt = $itemManager->getKbn4Count($member_id,$pigGoldId);
			$pScnt = $itemManager->getKbn4Count($member_id,$pigSilvId);
	        $this->af->setApp("pGcnt", $pGcnt);
	        $this->af->setApp("pScnt", $pScnt);

		}

		//ファイル満杯で受け取れない状態(status=3)のカードがあるかCHK
		$tbdCnt = $cardManager->getCardlistCount($member_id ,$status="3");
		$tbdSeq = $cardManager->getTbdCardSeqRow($member_id);
		$tbdMax = $tbdCnt;

		for ($i=0; $i < $tbdMax; $i++) {
			//ファイル枚数のCHK
			$cntF = $cardManager->getCardlistCount($member_id ,$stF="1");
			if($cntF >= $cardFileMax){
				$stay = $cardManager->getDispCardInfo($member_id , $tbdSeq[$i]['cardseq'] );
				$this->af->setApp("stay", $stay);
				$tbdCnt = $tbdCnt - 1;
			}else{
		        $tbdCard = $cardManager->getDispCardInfo($member_id , $tbdSeq[$i]['cardseq'] );
				$this->af->setApp("tbdCard", $tbdCard);
		        $cardTbd = array();
		        $cardTbd["memberid"] = $member_id;
		        $cardTbd["cardseq"]  = $tbdSeq[$i]['cardseq'] ;
		        $cardTbd["status"]   = '1';
		        $retTbd = $cardManager->updateCardStatus($cardTbd);
				if($retTbd === False){
					return 'error_sys';
				}
			}

		}
		//表示すべきTbdカードがあれば表示
		if($tbdCnt > 0){
			$this->af->setApp("tbdCnt", $tbdCnt);
		}else{
			$retTbd = True;
		}

        return 'card_pdo';

    }
}

?>
