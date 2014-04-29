<?php
/**
 *  Card/Del.php
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

class M_Form_CardDelComplete extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
        "seq" => array(),
        "q" => array(),
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
class M_Action_CardDelComplete extends M_ActionClass
{
    /**
     *  preprocess card_form action.
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
        $seq = $this->af->get('seq');
        $ss_id = $this->af->get('ssid');

		//11/2/7
        $cardFileMax = $this->config->get("cardFileMax");

		//カードのレベル取得
        $card = $cardManager->getDispCardInfo($member_id , $seq );
        $this->af->setApp("card", $card);

        $isReload = $cardManager->isReload($member_id ,$ss_id);
        $this->af->setApp("isReload", $isReload);

        if($isReload == True){
            //return 'error_reload';
        }else{
			if($card['status'] == 1 || $card['status'] == 3 ){

		        $profile = $userManager->getProfile($member_id);
		        $this->af->setApp("profile", $profile);
				$num = $card['rank_num'];
				//トランザクション開始
		        $db = $this->backend->getDb();
		        $ret = $db->query('START TRANSACTION');
		        if($ret == False){
		            return 'error_sys';
		        }

				//ファイル満杯で受け取れない状態(status=3)のカードがあるかCHK
				$tbdCnt = $cardManager->getCardlistCount($member_id ,$status="3");
				$tbdSeq = $cardManager->getTbdCardSeqRow($member_id);

				$tbdMax = $tbdCnt;
				//破棄しようとしているものと一致するか確認
				for ($i=0; $i < $tbdMax; $i++) {
					if($seq == $tbdSeq[$i]['cardseq'] ){
						$tbdCnt = $tbdCnt - 1;
					}else{
						//ファイル枚数のCHK
						$cntF = $cardManager->getCardlistCount($member_id ,$stF="1");
						if($cntF == $cardFileMax && ($tbdMax - $i) >= 1 && $tbdCnt == $tbdMax ){
					        $tbdCard = $cardManager->getDispCardInfo($member_id , $tbdSeq[$i]['cardseq'] );
							$this->af->setApp("tbdCard", $tbdCard);
					        $cardTbd = array();
					        $cardTbd["memberid"] = $member_id;
					        $cardTbd["cardseq"]  = $tbdSeq[$i]['cardseq'] ;
					        $cardTbd["status"]   = '1';
					        $retTbd = $cardManager->updateCardStatus($cardTbd);
						}elseif($cntF >= $cardFileMax){
							$stay = $cardManager->getDispCardInfo($member_id , $tbdSeq[$i]['cardseq'] );
							$this->af->setApp("stay", $stay);
							$tbdCnt = $tbdCnt - 1;
						}elseif($cntF < $cardFileMax){
					        $tbdCard = $cardManager->getDispCardInfo($member_id , $tbdSeq[$i]['cardseq'] );
							$this->af->setApp("tbdCard", $tbdCard);
					        $cardTbd = array();
					        $cardTbd["memberid"] = $member_id;
					        $cardTbd["cardseq"]  = $tbdSeq[$i]['cardseq'] ;
					        $cardTbd["status"]   = '1';
					        $retTbd = $cardManager->updateCardStatus($cardTbd);
						}
					}
				}
				//表示すべきTbdカードがあれば表示
				if($tbdCnt > 0){
					$this->af->setApp("tbdCnt", $tbdCnt);
				}else{
					$retTbd = True;
				}
				//カード削除
		        $cardU = array();
		        $cardU["memberid"] = $member_id;
		        $cardU["cardseq"]  = $seq;
		        $cardU["status"]   = '6';
		        $cardU["del_time"] = '1';
		        $ret1 = $cardManager->updateCardStatus($cardU);

				//統計情報記録
				$ret4 = $cardManager->writeCardStat($card['bushoid'],$stat_num="-1");

				//t_user 更新 money戻す
				$cbmoney = $this->config->get("cardCashBack");
				$after = $profile['money'] + $cbmoney[$num];
	       		$this->af->setApp("after", $after);

		        $user = array();
		        $user["memberid"] = $member_id;
		        $user["money"]   = $after;
		        $ret2 = $userManager->updateUser($user);
				//ssid登録
		        $ret3 = $userManager->updSession($member_id ,$ss_id);

		        if( $ret1 === False || $ret2 === False  || $ret3 === False || $ret4 === False || $retTbd === False){
		            $db->query('ROLLBACK');
		            return 'error_sys';
		        }
		        //トランザクション終了
		        $ret = $db->query('COMMIT');
		        if($ret === False){
		            return 'error_sys';
		        }
			}
		}

		$ssid = $userManager->getSsId();
        $this->af->setApp("ssid", $ssid);
        return 'card_del_complete';
    }
}

?>
