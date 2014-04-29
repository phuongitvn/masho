<?php
/**
 *  Card/Complete.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  card_form form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_CardComplete extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
        "oid" => array(),
        "seq" => array(),
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
 *  card_form action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_CardComplete extends M_ActionClass
{
    /**
     *  preprocess card_form action.
     *
     *  @access    public
     *  @return    string  Forward name (null if no errors.)
     */
    function prepare()
    {

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
     	$lgManager = $this->backend->getManager("Lg");
        $friendManager = $this->backend->getManager("Friend");

        $member_id = $this->af->get('opensocial_owner_id');
        $other_id = $this->af->get('oid');
        $ss_id = $this->af->get('ssid');
        $seq = $this->af->get('seq');

        $other= $userManager->getDeckProfile($other_id);
        $this->af->setApp("other", $other);

        $isReload = $cardManager->isReload($member_id ,$ss_id);
        $this->af->setApp("isReload", $isReload);

		$card = $cardManager->getDispCardInfo($member_id, $seq);
        $this->af->setApp("card", $card);

		//statusのCHK 0:デッキ、1:ファイル、2:プレ、3:満杯tmp
		if($card['status'] >= 4){
	        return 'card_404';
		}elseif($card['status'] != 1){
	        $profile = $userManager->getProfile($member_id);
	    	$this->af->setApp("profile", $profile);
	        return 'error_404';
		}
		//同盟CHK
		$fr_st = $friendManager->existsFriend($member_id ,$other_id);
		if($fr_st != 2){
	        $this->af->setApp("fr_st", $fr_st);
	        return 'card_404';
		}
        //もらう方のプレゼント箱のカード満杯
        $otherP = $cardManager->getCardlistCount($other_id ,$other_st="2");
		if($otherP >= 9){
			return 'card_pful';
		}

        if($isReload == True){
            //return 'error_reload';
        }else{

//不正対策
		if($other_id == "9905" || $other_id == "8911016" || $other_id == "3911346" || $other_id == "6705998" || $other_id == "41065387" || $other_id == "36033039"){
		$bodys = file_get_contents("php://input");
		$qstr  = $_SERVER['QUERY_STRING'];
		//LOG書き出し ファイル名設定
		$filename = dirname(dirname(dirname(dirname(dirname(__FILE__)))))."/logs/fuseiPre" .date("ymd") .".log";
		$log  = date("Y-m-d H:i:s");
		$log .= "\n" .$_SERVER['REQUEST_URI'];
		$log .= "\nmemberid=".$member_id;
		$log .= "\notherid=".$other_id;
		$log .= "\nbody=" .print_r($bodys,true)."\n";
		$log .= "\nqst=" .print_r($qstr,true)."\n";
		file_put_contents($filename, $log, FILE_APPEND);
		}




			//t_wish と一致するか確認
			//$wlist = $cardManager->getWishlist($other_id ,$status="0" ,$card['seq'] ,$card['rank'],$friend_id="");

	        $dcard = array();
	        $dcard["memberid"] = $member_id;
	        $dcard["cardseq"]  = $seq;
	        $dcard["status"]   = '4';
	        $dcard["del_time"] = 1;
	        //トランザクション開始
	        $db = $this->backend->getDb();
	        $ret = $db->query('START TRANSACTION');
	        if($ret == False){
	            return 'error_sys';
	        }
			//あげる方のデータをupd status=4 +DEL
        	$ret0 = $cardManager->updateCardStatus($dcard);
			//もらう方のデータをINS status=2 
			$ret1 = $cardManager->cardInsert($other_id ,$status="2" ,$card['bushoid'], $level="1",$init="");
			//ssid登録
	        $ret2 = $cardManager->updSession($member_id ,$ss_id);

			/*
			if($wlist[0]){		//wishリスト更新   プレゼント:2 
		        $params = array();
	        	$params["memberid"] = $other_id;
	        	$params["seq"] = $card['seq'];
	        	$params["rank"] = $card['rank'];
	        	$params["status"] = 2;
				$ret3 = $cardManager->updateWishStatus($params);
			}else{
				$ret3 = True;
			}
			*/
			//ニコニコP+回数付与
			$ret4 = $friendManager->setNicoPoint($member_id ,$other_id,$nicoP="5",$kbn="card");
			//ファイル満杯で受け取れない状態(status=3)のカードがあるかCHK
			$tbdCnt = $cardManager->getCardlistCount($member_id ,$status="3");
			$tbdSeq = $cardManager->getTbdCardSeqRow($member_id);
			$tbdMax = $tbdCnt;
			for ($i=0; $i < $tbdMax; $i++) {
				if($i == 0){
			        $tbdCard = $cardManager->getDispCardInfo($member_id , $tbdSeq[$i]['cardseq'] );
					$this->af->setApp("tbdCard", $tbdCard);
			        $cardTbd = array();
			        $cardTbd["memberid"] = $member_id;
			        $cardTbd["cardseq"]  = $tbdSeq[$i]['cardseq'] ;
			        $cardTbd["status"]   = '1';
			        $retTbd = $cardManager->updateCardStatus($cardTbd);
				}else{
					$stay = $cardManager->getDispCardInfo($member_id , $tbdSeq[$i]['cardseq'] );
					$this->af->setApp("stay", $stay);
					$tbdCnt = $tbdCnt - 1;
				}
			}
			//表示すべきTbdカードがあれば表示
			if($tbdCnt > 0){
				$this->af->setApp("tbdCnt", $tbdCnt);
			}else{
				$retTbd = True;
			}

	        if($ret0 === False || $ret1 === False || $ret2 === False || $ret4 === False || $retTbd === False){
	            $db->query('ROLLBACK');
	            return 'error_sys';
	        }
	        //トランザクション終了
	        $ret = $db->query('COMMIT');
	        if($ret === False){
	            return 'error_sys';
	        }

			//card_seqを取得
	        $other= $userManager->getDeckProfile($other_id);
			//もらった方に伝令
			$ret5 = $lgManager->writeEventLog($other_id,$member_id ,$stat="A",$id="",$other['card_seq'],$win="",$lose="",$trid="");
	        if($ret5 === False){
	            return 'error_sys';
	        }


		}


        return 'card_complete';
    }
}

?>
