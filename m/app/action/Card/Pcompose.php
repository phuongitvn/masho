<?php
/**
 *  Card/Compose.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

class M_Form_CardPcompose extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
        "sc" => array(),
        "seq" => array(),
        "op" => array(),
        "p" => array(),
        "ssid" => array(),
    );


}

/**
 *  card_compose action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_CardPcompose extends M_ActionClass
{
    /**
     *  preprocess card_compose action.
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
        $sc = $this->af->get('sc');
        $seq = $this->af->get('seq');
        $op = $this->af->get('op');

/*
		//不正対策	statusCHK
	    $exam1 = $cardManager->getCardInfo($member_id , $seq , False);
	    $exam2 = $cardManager->getCardInfo($member_id , $op , False);
		if( ($exam1['status'] != 1 && $exam1['status'] != 0 ) || $exam2['status'] != 1 && $op != "" ){
	        return 'card_404';
		}
*/
		//11/2/7
        $cardFileMax = $this->config->get("cardFileMax");
		//ぶた保持CHK	11/2/19
        $pigGoldId = $this->config->get("pigGoldId");		//金のぶた161
        $pigSilvId = $this->config->get("pigSilvId");		//銀のぶた162
		$pGcnt = $itemManager->getKbn4Count($member_id,$pigGoldId);
		$pScnt = $itemManager->getKbn4Count($member_id,$pigSilvId);
        $this->af->setApp("pGcnt", $pGcnt);
        $this->af->setApp("pScnt", $pScnt);

		//カードのレベル取得
        $card = $cardManager->getDispCardInfo($member_id , $seq );
        $this->af->setApp("card", $card);
        $disp = array();

		if($op == ""){

			//件数制限	11/2/7
	        $limit = 18;
	        $p = $this->af->get("p");
	        if(!$p || !is_numeric($p)){
	            $p = 1;
	            $this->af->set("p", $p);
	        }
	        $list = array();
	        $navi = array();
	        $offset = ($p - 1) * $limit;

			if($pGcnt > 0 && $sc == "pg"){
				//異ランク同武将 + 同ランク異武将 カードを抽出(ファイル限定)
				$status = "1";
				$cnt = $cardManager->getSameSeqOrRankCardCount($member_id , $card['rank_num'] ,$card['seq'], $status,$seq, TRUE);
				if($cnt > 0){
			        $list = $cardManager->getSameSeqOrRankCardList($member_id , $card['rank_num'] ,$card['seq'] ,$status, $seq, TRUE);
				}
			}else{
				//同ランク異武将のカードを抽出(ファイル限定)
				$status = "1";
				$cnt = $cardManager->getSameRankCardCount($member_id , $card['rank_num'] ,$status,$seq);
				if($cnt > 0){
			        $list = $cardManager->getSameRankCardList($member_id , $card['rank_num'] ,$status,$seq);

				}
			}

			//表示数調整
			if($cnt > $limit){
				if($p == 1){
					for ($i=0; $i<$limit; $i++) {
						$disp[$i] = $list[$i];
					}
				}elseif($p == 2){
					for ($i=$limit; $i<$cnt; $i++) {
						$j = $i - $limit;
						$disp[$j] = $list[$i];
					}
				}
		        //ページャーセット
		        $navi = $cardManager->getPagerSource($cardFileMax, $limit, $p, 18);
		        $this->af->setApp("navi", $navi);
			}else{
				for ($i=0; $i<$cnt; $i++) {
					$disp[$i] = $list[$i];

				}
			}

	        $this->af->setApp("list", $disp);
		}else{
        	$opcard = $cardManager->getDispCardInfo($member_id , $op );
			$list[0] = $opcard;
			$cnt = 1;
	        $this->af->setApp("list", $list);
		}


		//成功確率取得	//11/3/4
		$odd = $cardManager->getComposeOdd($card['rank']) + 10;

        $this->af->setApp("odd", $odd);

        $this->af->setApp("cnt", $cnt);
        return 'card_pcompose';
    }
}

?>
