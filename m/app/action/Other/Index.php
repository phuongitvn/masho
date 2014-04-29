<?php
/**
 *  Other/Index.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */

/**
 *  other_index Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Form_OtherIndex extends M_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    var $form = array(

        "opensocial_owner_id" => array(),
        "id" => array(),
        "uid" => array(),
        "tid" => array(),

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
 *  other_index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_OtherIndex extends M_ActionClass
{
    /**
     *  preprocess of other_index Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    function prepare()
    {
        return parent::prepare();
    }

    /**
     *  other_index action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    function perform()
    {

        $userManager = $this->backend->getManager("User");
        $itemManager = $this->backend->getManager("Item");
        $cardManager = $this->backend->getManager("Card");
        $friendManager = $this->backend->getManager("Friend");
        $treasureManager = $this->backend->getManager("Treasure");
        $greetManager = $this->backend->getManager("Greet");
		$member_id = $this->af->get('opensocial_owner_id');
        $other_id = $this->af->get('id');
        $tr_id = $this->af->get('tid');
        $this->af->setApp("trid", $tr_id);

//11/1/27 タグ追加
        $uid = $this->af->get('uid');
		if($uid != "" && $other_id ==""){
			$other_id = $userManager->getDecyptUserId($uid);
		}

        //自軍は表示できない
		if($member_id == $other_id){
			$domain = $this->config->get("url");
			$www = $domain['www'];
			$endUrl = "?url=http%3A%2F%2F".$www."%2Fmy%2Findex.php";
			//指定URLへの遷移(302)
			header("Location: $endUrl");
			exit;
		}
//11/1/27 タグ追加

        //Otherプロフィール情報
        $profile = $userManager->getProfile($other_id);
        if(count($profile) == 0){
            return "error_404";
        }
		//BlackListCHK
		$black = chkBlackList($member_id,$other_id);
		//$black = array('entry' => array('id' => 0));

		if($black['entry']['id'] == $other_id && $black['entry']['ignorelistId'] == $member_id){
	        $this->af->setApp('black' ,"200");
            return "error_black";
		}else{
			if($profile['gtxtid'] != NULL){
				$txt = getTxt($member_id,$txtGroup="comments",$profile['gtxtid']);
				//0 監査中 1 監査結果OK 2 削除 3 監査結果NG 
				if($txt['entry']['0']['status'] == 2 || $txt['entry']['0']['status'] == 3 ){
					$comnt = "Comment";
				}else{
					$comnt = $txt['entry']['0']['data'];
				}
			}else{
				$comnt = "Comment";
			}
	        $this->af->setApp('comment' ,$comnt);
		}



		//OwnerIDからみた同盟状態取得	1は非同盟　2同盟 3モバ友
		$kbn = $friendManager->getFriendKbn($member_id ,$other_id);
        $this->af->setApp("kbn", $kbn);

		//武将名とランクを取得
		$card = $cardManager->getCardAtt($profile['prof']);
		$this->af->setApp("card", $card);
		//ステージとサイクルの取得
		$stageName = $userManager->getStageName($profile['stage']);
		$this->af->setApp("stageName", $stageName);
		$cyTitle = $this->config->get('cyTitle');
		$cycle = $profile['cl_cycle'] + 1;
		$this->af->setApp("cycle", $cyTitle[$cycle]);
		//max同盟数
		$maxFr = $userManager->getMaxFriendContByLevel($profile['level']);
        $this->af->setApp("maxFr", $maxFr);
		$profile['friend_num'] = $friendManager->getFriendlistCount($other_id,$sta="2",$kb="");
        $this->af->setApp("profile", $profile);
		//アイテム保有合計
		$sum1 = $itemManager->getMyItemCount($other_id ,$dispKbn="1",$unit="");	//保有武器アイテムの個数の合計
		$sum2 = $itemManager->getMyItemCount($other_id ,$dispKbn="2",$unit="");	//保有防具アイテムの個数の合計
        $this->af->setApp("sum1", $sum1);
        $this->af->setApp("sum2", $sum2);

		//お宝関連
		$maxTr = $treasureManager->TrSerindNum($series_id="");
		$numChk = $treasureManager->getTrcoNum($other_id);
		$numChk['archieve'] = floor($numChk['OwnNum']/$maxTr*100);
		$this->af->setApp("numChk", $numChk);
		//欲しいカード+デッキ/ファイル
		if($kbn == 2 || $kbn == 3){
			$wlist = $cardManager->getWishlist($other_id ,$status="0" ,$seq="" ,$rank="",$member_id);
			$wlist_num = count($wlist);
			$this->af->setApp("wlist", $wlist);
			$this->af->setApp("wlist_num", $wlist_num);
			//$cnt = $cardManager->getCardlistCount($other_id ,$status="0");
	    	//$cnt += $cardManager->getCardlistCount($other_id ,$status="1");
			//$this->af->setApp("cnt", $cnt);
		}
		$cnt = $cardManager->getCardlistCount($other_id ,$status="0");
	    $cnt += $cardManager->getCardlistCount($other_id ,$status="1");
		$this->af->setApp("cnt", $cnt);
		//11/2/4 	3→5件に
        $limit = 5;
        $p = $this->af->get("p");
        if(!$p || !is_numeric($p)){
            $p = 1;
            $this->af->set("p", $p);
        }

        $list = array();
        $navi = array();
        $offset = ($p - 1) * $limit;

       //ニコニコ一覧
        $cntNico = $greetManager->getGreetListCount($other_id ,$status="");
        if($cntNico > 0){
            $listN = $greetManager->getGreetList($other_id ,$status="" ,$limit ,$offset);
            $navi = $greetManager->getPagerSource($cntNico, $limit="5", $p, 5);		//11/2/4 	3→5件に
        }
        $this->af->setApp("listN", $listN);

        //リロード対策
		$ssid = $userManager->getSsId();
        $this->af->setApp("ssid", $ssid);

        return 'other_index';
    }
}

?>
