<?php
/**
 *  Gacha/Lot.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

class M_Form_GachaLot extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
        "ssid" => array(),
        "kb" => array(),
    );
}


class M_Action_GachaLot extends M_ActionClass
{
    /**
     *  preprocess gacha_lot action.
     *
     *  @access    public
     *  @return    string  Forward name (null if no errors.)
     */
    function prepare()
    {


        return parent::prepare();
    }

    /**
     *  Lot action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    function perform()
    {

		$member_id = $this->af->get('opensocial_owner_id');
        $userManager = $this->backend->getManager("User");
        $cardManager = $this->backend->getManager("Card");
        $itemManager = $this->backend->getManager("Item");
        $lgManager = $this->backend->getManager("Lg");

		//11/2/19
        $profile = $userManager->getProfile($member_id);

		//ガチャ札115
		$gachaId = $this->config->get('gachaItemid');
		//ガチャ札Free139
		$gachaFreeId = $this->config->get('gachaFreeItemid');
		//ガチャ札GOLD140 
		$gachaGoldId = $this->config->get('gachaGoldItemid');
		//ガチャ札Pt141
		$gachaPtId = $this->config->get('gachaPtItemid');
        $kb = $this->af->get('kb');

		//11/2/7
        $cardFileMax = $this->config->get("cardFileMax");

        $ss_id = $this->af->get('ssid');
        $isReload = $cardManager->isReload($member_id ,$ss_id);
        $this->af->setApp("isReload", $isReload);

        if($isReload == True){
	        //リロード対策(ガチャ)
			$newid = $cardManager->getSsId();
	        $this->af->setApp("ssid", $newid);
	        return 'gacha_err';
        }else{
			//ガチャ札の数
			$gcnt = $itemManager->getKbn4Count($member_id,$gachaId);
			//ガチャ札Freeの数
			$gFcnt = $itemManager->getKbn4Count($member_id,$gachaFreeId);
			//ガチャ札GOLDの数
			$gGcnt = $itemManager->getKbn4Count($member_id,$gachaGoldId);
			//ガチャ札ぷらちなの数
			$gPcnt = $itemManager->getKbn4Count($member_id,$gachaPtId);

	        //ファイルデッキのカードリスト
	        $status = "1";
	        $cnt = $cardManager->getCardlistCount($member_id ,$status);
			if($kb == ""){
				if($gcnt == 0 && $gGcnt == 0 && $gPcnt == 0){
					$kb = "gF";
				}elseif($gFcnt == 0 && $gGcnt == 0 && $gPcnt == 0){
					$kb = "gN";
				}elseif($gcnt == 0 && $gFcnt == 0 && $gPcnt == 0){
					$kb = "gG";
				}elseif($gcnt == 0 && $gFcnt == 0 && $gGcnt == 0){
					$kb = "gP";
				}
			}

//11/2/19
			if( ($gcnt == 0 && $gFcnt == 0 && $gGcnt == 0 && $gPcnt == 0 && $profile['friend_pt'] < 100 ) || $cnt >= $cardFileMax){
				$this->af->setApp("cnt", $cnt);
				$this->af->setApp("gcnt", $gcnt);
				$this->af->setApp("gFcnt", $gFcnt);
				$this->af->setApp("gGcnt", $gGcnt);
				$this->af->setApp("gPcnt", $gPcnt);
		        return 'gacha_index';
			}else{
				if($kb == "gF"){
					$targetId  = $gachaFreeId;
					$targetCnt = $gFcnt;
				}elseif($kb == "gN"){
					$targetId  = $gachaId;
					$targetCnt = $gcnt;
				}elseif($kb == "gG"){
					$targetId  = $gachaGoldId;
					$targetCnt = $gGcnt;
				}elseif($kb == "gP"){
					$targetId  = $gachaPtId;
					$targetCnt = $gPcnt;
				}
		        //トランザクション開始
		        $db = $this->backend->getDb();
		        $ret = $db->query('START TRANSACTION');
		        if($ret == False){
		            return 'error_sys';
		        }

//11/2/19
				if( $gcnt == 0 && $gFcnt == 0 && $gGcnt == 0 && $gPcnt == 0 ){
					$fr = 1;
			        $user = array();
			        $user["memberid"] = $member_id;
					$user["friend_pt"] = $profile['friend_pt'] - 100;
		    	    $ret1 = $userManager->updateUser($user);
				}else{
					//ガチャ札(FREE,GOLD,ぷらちな)　-1 ただし0の時はレコード削除
					if($targetCnt == 1){
						$table = "t_item";
						$where = "memberid = '".$member_id."' AND itemid = '" .$targetId ."'";
						$ret1 = $cardManager->deleteRecord($table ,$where);
					}else{
						$table = "t_item";
						$column = "num";
						$where = "memberid = '".$member_id."' AND itemid = '" .$targetId ."'";
						$ret1 = $cardManager->decrementColumn($table ,$column ,$where);
					}
				}
				//ランク+LV+武将連番決定
				if($kb == "gP"){
					$card = $cardManager->getGachaPtCard();
				}elseif($kb == "gG"){
					$card = $cardManager->getGachaGoldCard();
				}else{
					$card = $cardManager->getGachaCard();
				}
				$this->af->setApp("card", $card);
				//m_bushoから必要事項取得
				$busho = $cardManager->getGachaCardInfo($card['bushoseq'],$card['rank']);
				$this->af->setApp("busho", $busho);
				//t_cardに登録
				$status ="1";
				//ガチャぷらちなは強化pt処理を実施		//11/1/21追加
				if($kb == "gP"){
					$ret2 = $cardManager->cardInsert($member_id ,$status ,$busho['bushoid'], $card['level'],$card['rank']);
				}else{
					$ret2 = $cardManager->cardInsert($member_id ,$status ,$busho['bushoid'], $card['level'],$init="");
				}
				//レアカードなら同盟通信に記録
				if($card['rank'] ==  "A" || $card['rank'] ==  "B" || $card['rank'] ==  "C"){
					$ret3 = $lgManager->writeFriendLog($member_id ,$status="3",$stage="",$seriesid="",$trid="",$card['bushoseq'],$card['rank']);
				}else{
					$ret3 = True;
				}
				//ssid登録
		        $ret4 = $cardManager->updSession($member_id ,$ss_id);
		        if($ret1 === False || $ret2 === False || $ret3 === False || $ret4 === False){
		            $db->query('ROLLBACK');
		            return 'error_sys';
		        }
		        //トランザクション終了
		        $ret = $db->query('COMMIT');
		        if($ret === False){
		            return 'error_sys';
		        }

				if($kb == "gP" && $ret2){
					$rfp = $cardManager->getCardInfo($member_id , $ret2 , $status = False);
					$this->af->setApp("rfp", $rfp);
				}


//11/2/19
				if($fr == 1){
			        $profile = $userManager->getProfile($member_id);
			        $this->af->setApp("profile", $profile);
				}
		        //リロード対策(ガチャ)
				$newid = $cardManager->getSsId();
		        $this->af->setApp("ssid", $newid);
	        	return 'gacha_lot';
			}
		}

    }
}

?>
