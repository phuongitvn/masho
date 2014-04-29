<?php
/**
 *  Card/Do.php
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

class M_Form_CardDo extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
        "seq" => array(),
        "op" => array(),
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
 *  card_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_CardDo extends M_ActionClass
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
        $seq = $this->af->get('seq');
        $op = $this->af->get('op');
        $ss_id = $this->af->get('ssid');
		$domain = $this->config->get("url");
		$www = $domain['www'];
		$API = $domain['api'];
		$appId = $domain['appId'];

		//不正対策	statusCHK
	    $exam1 = $cardManager->getCardInfo($member_id , $seq , False);
	    $exam2 = $cardManager->getCardInfo($member_id , $op , False);
		if( ($exam1['status'] != 1 && $exam1['status'] != 0 ) || ($exam2['status'] != 1 && $op != "sj") ){
	        return 'card_404';
		}

		/*
        $odd = $this->af->get('odd');
        $bid = $this->af->get('bid');
        $org_level = $this->af->get('cl');
        $op_level = $this->af->get('opcl');
		*/

		//千手観音保持CHK	11/2/19
        $senjuId = $this->config->get("senjuId");		//千手観音160
		$scnt = $itemManager->getKbn4Count($member_id,$senjuId);
        $this->af->setApp("scnt", $scnt);
		if($scnt == 0 && $op == "sj"){
			return 'card_buy';
		}
		//ベースカード
        $card = $cardManager->getDispCardInfo($member_id , $seq );
		$orgSta = $card['status'];
		$bid  = $card['bushoid'];
		$org_level = $card['level'];

		//素材カード
		if($op == "sj"){
			$op_level = 1;
			$odd = 100;
			$ranNum = 100;
		}else{
	        $opcard = $cardManager->getDispCardInfo($member_id , $op);
			$op_level = $opcard['level'];
			$odd = $cardManager->getComposeOdd($card['rank']);
			$ranNum = mt_rand(0,100);
		}

		$level = 0;

        $isReload = $cardManager->isReload($member_id ,$ss_id);
        $this->af->setApp("isReload", $isReload);

        if($isReload == True){
			$level = 99;
			$this->af->setApp("level", $level);
			return 'card_do';
        }else{

			if($ranNum <= $odd){				//成功　->元のカードupdLVUP+合成に利用したカード削除
				//LVとランクの決定
				$level = $org_level + $op_level;
				if($level > 20){
					//次の武将ID取得
					$rankup = $cardManager->getNextBushoId($bid);
					if($rankup == "0"){//ランクVRの時
						$level = 20;
						$up = 0;
					}else{
						$level = 1;
						$bid = $rankup;
						$up = 1;
					}
				}else{
					$up = 0;
				}

				//トランザクション開始
		        $db = $this->backend->getDb();
		        $ret = $db->query('START TRANSACTION');
		        if($ret == False){
		            return 'error_sys';
		        }
		       	//元のカードをUPD
		        $card1 = array();
		        $card1["memberid"] = $member_id;
		        $card1["cardseq"]  = $seq;
		        $card1["status"]   = $orgSta;
		        $card1["level"]   = $level;
		        $card1["bushoid"]   = $bid;
		        $ret1 = $cardManager->updateCardStatus($card1);

				if($op == "sj"){
					//千手観音　-1 ただし0の時はレコード削除
					if($scnt == 1){
						$table = "t_item";
						$where = "memberid = '".$member_id."' AND itemid = '" .$senjuId ."'";
						$ret2 = $cardManager->deleteRecord($table ,$where);
					}else{
						$table = "t_item";
						$column = "num";
						$where = "memberid = '".$member_id."' AND itemid = '" .$senjuId ."'";
						$ret2 = $cardManager->decrementColumn($table ,$column ,$where);
					}
					$ret5 = True;
				}else{
					//合成に利用したカード削除
			        $card2 = array();
			        $card2["memberid"] = $member_id;
			        $card2["cardseq"]  = $op;
			        $card2["status"]   = '5';
			        $card2["del_time"] = '1';
			        $ret2 = $cardManager->updateCardStatus($card2);
					//統計情報記録
					$ret5 = $cardManager->writeCardStat($bid,$num="-1");
				}
		        //ssid登録
		        $ret3 = $cardManager->updSession($member_id ,$ss_id);
				//回数cntUP
				$table ="t_user";
				$column = "ok_compose";
				$where = "memberid = '" .$member_id."'";
				$ret4 = $cardManager->incrementColumn($table ,$column ,$where);
		        if( $ret1 === False || $ret2 === False || $ret3 === False || $ret4 === False || $ret5 === False){
		            $db->query('ROLLBACK');
		            return 'error_sys';
		        }
		        //トランザクション終了
		        $ret = $db->query('COMMIT');
		        if($ret === False){
		            return 'error_sys';
		        }
				$disp = $seq;
				$ol = $org_level;
			}else{								//失敗　->合成に利用したカード削除
				//トランザクション開始
		        $db = $this->backend->getDb();
		        $ret = $db->query('START TRANSACTION');
		        if($ret == False){
		            return 'error_sys';
		        }

				//元のカードをUPD	11/1/17追加
		        $card1 = array();
		        $card1["memberid"] = $member_id;
		        $card1["cardseq"]  = $seq;
		        $card1["status"]   = $orgSta;
		        $card1["offense"]   = $opcard['offense'];//加算分のみ
		        $card1["defense"]   = $opcard['defense'];//加算分のみ
		        $card1["follower"]  = $opcard['follower'];//加算分のみ
		        $ret1 = $cardManager->updateCardStatus($card1);

				//合成に利用したカード削除
		        $card2 = array();
		        $card2["memberid"] = $member_id;
		        $card2["cardseq"]  = $op;
		        $card2["status"]   = '5';
		        $card2["del_time"] = '1';
		        $ret2 = $cardManager->updateCardStatus($card2);
				//統計情報記録
				$ret5 = $cardManager->writeCardStat($bid,$num="-1");
				//ssid登録
		        $ret3 = $cardManager->updSession($member_id ,$ss_id);
				//回数cntUP
				$table ="t_user";
				$column = "ng_compose";
				$where = "memberid = '" .$member_id."'";
				$ret4 = $cardManager->incrementColumn($table ,$column ,$where);
		        if( $ret1 === False || $ret2 === False || $ret3 === False || $ret4 === False || $ret5 === False){
		            $db->query('ROLLBACK');
		            return 'error_sys';
		        }
		        //トランザクション終了
		        $ret = $db->query('COMMIT');
		        if($ret === False){
		            return 'error_sys';
		        }
				$disp = $op;
				$up = $seq;		//11/1/17追加
			}
		}

		/*
		$card = $cardManager->getDispCardInfo($member_id , $disp);
		$this->af->setApp("card", $card);
		$this->af->setApp("bid", $bid);
		$this->af->setApp("level", $level);
        return 'card_do';
		*/

		$swfmillManager = $this->backend->getManager('Swfmill');
		$param = "bid%3D".$bid."%26dp%3D".$disp."%26lv%3D".$level."%26ol%3D".$ol."%26up%3D".$up;
		$replaceStrings["lnkUrl"] = "http://" . $API . "/" . $appId . "?url=http%3A%2F%2F".$www."%2Fcard%2Fdone.php%3F".$param;

		//11/1/20 リリース予定
		$swfmillManager->params['img1']  = $card['bushoid'];
		$swfmillManager->params['img2']  = ($op == "sj") ? 'sj' : $opcard['bushoid'];
		$swfmillManager->params['img3']  = $card['bushoid'];

		// XMLコンパイル
		$xmlString = $swfmillManager->compileXml('composition.xml', $replaceStrings);
		// XML出力実行
		$swfmillManager->executeSwfmill($xmlString);
		//die('<a href="/?url=http%3A%2F%2F'.$www.'%2Fcard%2Fdone.php%3F'.$param.'">next</a>');

    }
}

?>
