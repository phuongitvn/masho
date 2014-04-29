<?php
/**
 *  Card/File.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  card_file form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_CardFile extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
        "id" => array(),
        "p" => array(),
        "st" => array(),
        "mode" => array(),
        "seq" => array(),
        "deck" => array(),
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
 *  card_file action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_CardFile extends M_ActionClass
{
    /**
     *  preprocess card_file action.
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
        $seq = $this->af->get('seq');
        $st = $this->af->get('st');
        $other_id = $this->af->get('id');
        $this->af->setApp("mode", $mode);
        $this->af->setApp("deck", $deck);
        $this->af->setApp("st", $st);

		//11/2/7
        $cardFileMax = $this->config->get("cardFileMax");

		//ファイルへ戻すカード情報取得
		if($mode == "edit"){

	        //デッキ情報取得
	        $tmp= $userManager->getDeckProfile($member_id);
			$deckno = "deck".$deck;
			$card = $cardManager->getCardInfo($member_id , $tmp[$deckno], '0');
	        $this->af->setApp("card", $card);

		}elseif($mode == "add"){
			//不正対策	status2:プレ
	        $exam = $cardManager->getCardInfo($member_id , $seq , False);
			if($seq != "" && $exam['status'] != 2){
		        return 'card_404';
			}
    	    $cnt = $cardManager->getCardlistCount($member_id ,$stADD="1");
			//カードが満杯かのCHK
			if($cnt >= $cardFileMax){
				$msg ="Kho Card đã đầy. Hãy giải phóng bằng cách kết hợp card hay tặng quà, hoặc bỏ đi";
			}else{
				//カードをファイルへ移動　status2->1
				$msg = "Đã chuyển đến kho Card";
		        $pre = array();
		        $pre["memberid"] = $member_id;
		        $pre["cardseq"]  = $seq;
		        $pre["status"]   = '1';
				$ret = $cardManager->updateCardStatus($pre);
			}
			$this->af->setApp("msg", $msg);

		}elseif($mode == "pre"){
	        $other= $userManager->getDeckProfile($other_id);
	        $this->af->setApp("other", $other);
			$wlist = $cardManager->getWishlist($other_id ,$stPRE="0" ,$seq="" ,$rank="",$friend_id="");	//status　0:登録時 1:中止　2:プレゼント
			$eNum = count($wlist);
			if($eNum >0){
				//空枠追加
				for ($i=$eNum; $i<3; $i++) {
		            $wlist[$i]["bushoid"] = "non";
		            $wlist[$i]["name_rank"] = "　";
		        }
			}
        	$this->af->setApp("wlist", $wlist);
		}

		//ファイルのデータ総数
		if($mode == "wish"){
			$status = "all";
			$wlist = $cardManager->getWishlist($member_id ,$stW="0" ,$seq="" ,$rank="",$friend_id="");	//status　0:登録時 1:中止　2:プレゼント
			$rNum  = 3 - count($wlist);
	        $this->af->setApp("rNum", $rNum);
        	$cnt = 5 + $cardFileMax;
			$st = "rk";
			$total = $cnt;
			
		}else{
			$status = "1";
	        //ファイルデッキのカードリスト
	        $cnt = $cardManager->getCardlistCount($member_id ,$stF="1");
			$total = $cardFileMax;
			$existNum =0;
	        //プレゼント箱のカードリスト
	        $cntP = $cardManager->getCardlistCount($member_id ,$stP="2");
	        $this->af->setApp("cntP", $cntP);
		}

        $limit = 9;
        $p = $this->af->get("p");
        if(!$p || !is_numeric($p)){
            $p = 1;
            $this->af->set("p", $p);
        }
        $list = array();
        $navi = array();
        $offset = ($p - 1) * $limit;
        if($cnt > 0){
            $list = $cardManager->getCardlist($member_id ,$status, $st, $limit ,$offset);
			$existNum = count($list);	//存在するデータ数を取得
            //ページャーセット
            $navi = $cardManager->getPagerSource($total, $limit, $p, 9);
        }

		//空枠追加	$cardFileMaxに応じて調整
		if($p == 5){
			$filMax = 5;
		}else{
			$filMax = $limit;
		}
		for ($i=$existNum; $i<$filMax; $i++) {
            $list[$i]["bushoid"] = "non_s";
            $list[$i]["name_rank"] = "　";
        }

        $this->af->setApp("cnt", $cnt);
        $this->af->setApp("list", $list);
        $this->af->setApp("navi", $navi);
        $this->af->setApp("limit", $limit);

        return 'card_file';
    }
}

?>
