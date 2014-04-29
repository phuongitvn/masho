<?php
/**
 *  Card/Compose.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

class M_Form_CardCompose extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
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
class M_Action_CardCompose extends M_ActionClass
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
        $seq = $this->af->get('seq');
        $op = $this->af->get('op');

		//不正対策	statusCHK
	    $exam1 = $cardManager->getCardInfo($member_id , $seq , False);
	    $exam2 = $cardManager->getCardInfo($member_id , $op , False);
		if( ($exam1['status'] != 1 && $exam1['status'] != 0 ) || ($exam2['status'] != 1 && $op != "sj" && $op != "" ) ){
	        return 'card_404';
		}

		//11/2/7
        $cardFileMax = $this->config->get("cardFileMax");
		//千手観音保持CHK	11/2/19
        $senjuId = $this->config->get("senjuId");		//千手観音160
		$scnt = $itemManager->getKbn4Count($member_id,$senjuId);
        $this->af->setApp("scnt", $scnt);

		//カードのレベル取得
        $card = $cardManager->getDispCardInfo($member_id , $seq );
        $this->af->setApp("card", $card);

		//千手観音適用範囲CHK
		if($scnt > 0 && $op == "sj" && $card['level'] >= 10 ){
	        $this->af->setApp("hlv", "1");
			return 'card_buy';
		}

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

			//同ランク同武将のカードを抽出(ファイル限定)
			$status = "1";
			$cnt = $cardManager->getSameIdCardCount($member_id , $card['bushoid'] ,$status,$seq);
			if($cnt > 0){
		        $list = $cardManager->getSameIdCardList($member_id , $card['bushoid'] ,$status,$seq);

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
		}elseif($op =="sj"){
			if($scnt == 0){
				return 'card_buy';
			}
			$cnt = 1;
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
        return 'card_compose';
    }
}

?>
