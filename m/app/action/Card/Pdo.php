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

class M_Form_CardPdo extends M_ActionForm
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
class M_Action_CardPdo extends M_ActionClass
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
        $sc = $this->af->get('sc');
        $seq = $this->af->get('seq');
        $op = $this->af->get('op');
        $ss_id = $this->af->get('ssid');
		$domain = $this->config->get("url");
		$www = $domain['www'];
		$API = $domain['api'];
		$appId = $domain['appId'];
/*
		//不正対策	statusCHK
	    $exam1 = $cardManager->getCardInfo($member_id , $seq , False);
	    $exam2 = $cardManager->getCardInfo($member_id , $op , False);
		if( ($exam1['status'] != 1 && $exam1['status'] != 0 ) || $exam2['status'] != 1){
	        return 'card_404';
		}
*/
		//ベースカード
        $card = $cardManager->getDispCardInfo($member_id , $seq );
		$orgSta = $card['status'];
		$bid  = $card['bushoid'];

		//ぶた保持CHK	11/2/19
        $pigGoldId = $this->config->get("pigGoldId");		//金のぶた161
        $pigSilvId = $this->config->get("pigSilvId");		//銀のぶた162
		$pGcnt = $itemManager->getKbn4Count($member_id,$pigGoldId);
		$pScnt = $itemManager->getKbn4Count($member_id,$pigSilvId);
        $this->af->setApp("pGcnt", $pGcnt);
        $this->af->setApp("pScnt", $pScnt);
		if( ($pGcnt == 0 && $sc == "pg") || ($pScnt == 0 && $sc == "ps") ){
			return 'card_buy';
		}

		//素材カード
        $opcard = $cardManager->getDispCardInfo($member_id , $op);

		//成功確率取得
		if($sc == "pg" ){
			$odd    = 100;
			$ranNum = 100;
			$targetCnt = $pGcnt;
			$targetId  = $pigGoldId;
		}elseif( $sc == "ps" ){
			$odd    = 100;
			$ranNum = 100;
			$targetCnt = $pScnt;
			$targetId  = $pigSilvId;
		}else{
			$odd = $cardManager->getComposeOdd($card['rank']);
			$ranNum = mt_rand(0,100);
		}

        $isReload = $cardManager->isReload($member_id ,$ss_id);
        $this->af->setApp("isReload", $isReload);

        if($isReload == True){
			$this->af->setApp("done", "RELOAD");
			return 'card_pdo';
        }else{

			if($ranNum <= $odd){				//成功　->元のカードupd 強化PT加算+合成に利用したカード削除

				//元のカードをUPD
		        $card1 = array();
		        $card1["memberid"] = $member_id;
		        $card1["cardseq"]  = $seq;
		        $card1["status"]   = $orgSta;
		        $card1["offense"]   = $opcard['offense'];//加算分のみ
		        $card1["defense"]   = $opcard['defense'];//加算分のみ
		        $card1["follower"]  = $opcard['follower'];//加算分のみ

				//トランザクション開始
		        $db = $this->backend->getDb();
		        $ret = $db->query('START TRANSACTION');
		        if($ret == False){
		            return 'error_sys';
		        }
		        $ret1 = $cardManager->updateCardStatus($card1);
				//合成に利用したカード削除
		        $card2 = array();
		        $card2["memberid"] = $member_id;
		        $card2["cardseq"]  = $op;
		        $card2["status"]   = '7';	//強化pt合成
		        $card2["del_time"] = '1';
		        $ret2 = $cardManager->updateCardStatus($card2);
				//統計情報記録
				$ret5 = $cardManager->writeCardStat($opcard['bushoid'],$num="-1");
		        //ssid登録
		        $ret3 = $cardManager->updSession($member_id ,$ss_id);
				//回数cntUP
				$table ="t_user";
				$column = "ok_pcomp";
				$where = "memberid = '" .$member_id."'";
				$ret4 = $cardManager->incrementColumn($table ,$column ,$where);

				if($sc == "pg" || $sc == "ps"){
					//ぶた　-1 ただし0の時はレコード削除
					if($targetCnt == 1){
						$table = "t_item";
						$where = "memberid = '".$member_id."' AND itemid = '" .$targetId ."'";
						$ret6 = $cardManager->deleteRecord($table ,$where);
					}else{
						$table = "t_item";
						$column = "num";
						$where = "memberid = '".$member_id."' AND itemid = '" .$targetId ."'";
						$ret6 = $cardManager->decrementColumn($table ,$column ,$where);
					}
				}else{
						$ret6 = True;
				}
		        if( $ret1 === False || $ret2 === False || $ret3 === False || $ret4 === False || $ret5 === False || $ret6 === False){
		            $db->query('ROLLBACK');
		            return 'error_sys';
		        }
		        //トランザクション終了
		        $ret = $db->query('COMMIT');
		        if($ret === False){
		            return 'error_sys';
		        }
				$disp = $seq;
				$ot = $op;
				$sc = 1;
			}else{								//失敗　->合成に利用したカード削除
				//トランザクション開始
		        $db = $this->backend->getDb();
		        $ret = $db->query('START TRANSACTION');
		        if($ret == False){
		            return 'error_sys';
		        }
				//合成に利用したカード削除
		        $card2 = array();
		        $card2["memberid"] = $member_id;
		        $card2["cardseq"]  = $op;
		        $card2["status"]   = '7';	//強化pt合成
		        $card2["del_time"] = '1';
		        $ret2 = $cardManager->updateCardStatus($card2);
				//統計情報記録
				$ret5 = $cardManager->writeCardStat($opcard['bushoid'],$num="-1");
				//ssid登録
		        $ret3 = $cardManager->updSession($member_id ,$ss_id);
				//回数cntUP
				$table ="t_user";
				$column = "ng_pcomp";
				$where = "memberid = '" .$member_id."'";
				$ret4 = $cardManager->incrementColumn($table ,$column ,$where);
		        if( $ret2 === False || $ret3 === False || $ret4 === False || $ret5 === False){
		            $db->query('ROLLBACK');
		            return 'error_sys';
		        }
		        //トランザクション終了
		        $ret = $db->query('COMMIT');
		        if($ret === False){
		            return 'error_sys';
		        }
				$disp = $op;
				$ot = $seq;
				$sc = 0;
			}
		}

		$swfmillManager = $this->backend->getManager('Swfmill');
		$param = "bid%3D".$bid."%26dp%3D".$disp."%26ot%3D".$ot."%26sc%3D".$sc;
		$replaceStrings["lnkUrl"] = "http://" . $API . "/" . $appId . "?url=http%3A%2F%2F".$www."%2Fcard%2Fpdone.php%3F".$param;

		//11/1/20 リリース予定
/*
		$replaceStrings['rank'] = $swfmillManager->getXml(sprintf('rank/%d_1.xml',  $card['rank_num']));
		$replaceStrings['rankBg'] = $swfmillManager->getXml(sprintf('rank/%d_2.xml',  $card['rank_num']));
		$replaceStrings['rankBgbmp'] = $swfmillManager->getXml(sprintf('rank/%d_3.xml',  $card['rank_num']));
		$replaceStrings['rankBmp'] = $swfmillManager->getXml(sprintf('rank/%d_4.xml',  $card['rank_num']));
		$replaceStrings['bushoImg'] = $swfmillManager->getXml(sprintf('card/%d.xml',  $card['seq']));
		$replaceStrings['nameImg'] = $swfmillManager->getXml(sprintf('name/%d.xml',  $card['seq']));
*/
		$swfmillManager->params['img1']  = $card['bushoid'];
		$swfmillManager->params['img2']  = $opcard['bushoid'];
		$swfmillManager->params['img3']  = $card['bushoid'];

		// XMLコンパイル
		//$xmlString = $swfmillManager->compileXml('composition.xml', $replaceStrings);
		$xmlString = $swfmillManager->compileXml('composition2.xml', $replaceStrings);
		// XML出力実行
		$swfmillManager->executeSwfmill($xmlString);
		//die('<a href="/?url=http%3A%2F%2F'.$www.'%2Fcard%2Fpdone.php%3F'.$param.'">next</a>');
	}
}

?>
