<?php
/**
 *  Card/Complist.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

class M_Form_CardComplist extends M_ActionForm
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
class M_Action_CardComplist extends M_ActionClass
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
        $st = $this->af->get('st');

		//11/2/7
        $cardFileMax = $this->config->get("cardFileMax");
		//11/2/19(デッキも対象)
		$total = $cardFileMax + 5;
		if($st == ""){
			$st = "rk";
		}
        $this->af->setApp("st", $st);
        //ファイルデッキ
        $cnt = $cardManager->getCardlistCount($member_id ,$stF="all");

        if($cnt > 0){
            $file = $cardManager->getCardlist($member_id ,$status="all", $st, $total ,$offset="");
        }
		$okNum =0;

		//千手観音保持CHK	11/2/19
        $senjuId = $this->config->get("senjuId");		//千手観音160
		$scnt = $itemManager->getKbn4Count($member_id,$senjuId);
        $this->af->setApp("scnt", $scnt);

		//件数制限	11/2/19	18->21
        $limit = 21;
        $p = $this->af->get("p");
        if(!$p || !is_numeric($p)){
            $p = 1;
            $this->af->set("p", $p);
        }
        $list = array();
        $navi = array();
        $offset = ($p - 1) * $limit;

		for ($i=0; $i<$cnt; $i++) {
			//同ランク同武将のカードを抽出(ファイル限定)
			$exist[$i] = $cardManager->getSameIdCardCount($member_id , $file[$i]['bushoid'] ,$status="1",$file[$i]['cardseq']);
			if($exist[$i] > 0){
				$list[$okNum] = $file[$i];
				//$list[$okNum]['odd']  = $cardManager->getComposeOdd($file[$i]['rank']);		//成功確率取得
				$okNum ++;
			}else{
				if($scnt > 0 && $file[$i]['level'] < 10){		//千手観音があればLv10以下を抽出
					$list[$okNum] = $file[$i];
					$okNum ++;
				}

			}

		}

		//表示数調整
		if($okNum > $limit){
			if($p == 1){
				for ($i=0; $i<$limit; $i++) {
					$disp[$i] = $list[$i];
				}
			}elseif($p == 2){
				for ($i=$limit; $i<$okNum; $i++) {
					$j = $i - $limit;
					$disp[$j] = $list[$i];
				}
			}
	        //ページャーセット
	        $navi = $cardManager->getPagerSource($total, $limit, $p, 21);
	        $this->af->setApp("navi", $navi);
		}else{
			for ($i=0; $i<$okNum; $i++) {
				$disp[$i] = $list[$i];

			}
		}

        //リロード対策(合成)
		$ssid = $cardManager->getSsId();
        $this->af->setApp("ssid", $ssid);

		//ナビゲーション用
        $cntP  = $cardManager->getCardlistCount($member_id ,$sta="2");
        $cntF  = $cardManager->getCardlistCount($member_id ,$sta="1");

        $this->af->setApp("cnt", $cntF);
        $this->af->setApp("cntP", $cntP);
        $this->af->setApp("okNum", $okNum);
        $this->af->setApp("list", $disp);

        return 'card_complist';
    }
}

?>
