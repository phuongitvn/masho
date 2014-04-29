<?php
/**
 *  Gacha/Index.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

class M_Form_GachaIndex extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(
		"opensocial_owner_id" => array(),
		"bonux" => array(),
		"ssid" => array(),
    );


}

class M_Action_GachaIndex extends M_ActionClass
{
    /**
     *  preprocess gacha_index action.
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

        $member_id = $this->af->get('opensocial_owner_id');
        $userManager = $this->backend->getManager("User");
        $cardManager = $this->backend->getManager("Card");
        $itemManager = $this->backend->getManager("Item");

        $ssid = $this->af->get('ssid');
		$this->af->setApp("ssid", $ssid);

		//ガチャ札115
		$gachaId = $this->config->get('gachaItemid');
		//ガチャ札FREE139
		$gachaFreeId = $this->config->get('gachaFreeItemid');
		//ガチャ札GOLD140 
		$gachaGoldId = $this->config->get('gachaGoldItemid');
		//ガチャ札Pt141
		$gachaPtId = $this->config->get('gachaPtItemid');

        //ファイルデッキのカードリスト
        $status = "1";
        $cnt = $cardManager->getCardlistCount($member_id ,$status);
		//ガチャ札の数
		$gcnt = $itemManager->getKbn4Count($member_id,$gachaId);
		//ガチャ札FREEの数
		$gFcnt = $itemManager->getKbn4Count($member_id,$gachaFreeId);
		//ガチャ札GOLDの数
		$gGcnt = $itemManager->getKbn4Count($member_id,$gachaGoldId);
		//ガチャ札ぷらちなの数
		$gPcnt = $itemManager->getKbn4Count($member_id,$gachaPtId);

		//11/2/19
        $profile = $userManager->getProfile($member_id);
        $this->af->setApp("profile", $profile);
		if($profile['friend_pt'] >= 100){
			$af_friend_pt = $profile['friend_pt'] -100;
    	    $this->af->setApp("af_friend_pt", $af_friend_pt);
			$af_cnt  = $cnt  + 1;
		}
		//11/2/7
        $cardFileMax = $this->config->get("cardFileMax");

		if($gcnt > 0 && $cnt < $cardFileMax){
			$af_gcnt = $gcnt - 1;
			$af_cnt  = $cnt  + 1;
		}
		if($gFcnt > 0 && $cnt < $cardFileMax){
			$af_gFcnt = $gFcnt - 1;
			$af_cnt  = $cnt  + 1;
		}
		if($gGcnt > 0 && $cnt < $cardFileMax){
			$af_gGcnt = $gGcnt - 1;
			$af_cnt  = $cnt  + 1;
		}
		if($gPcnt > 0 && $cnt < $cardFileMax){
			$af_gPcnt = $gPcnt - 1;
			$af_cnt  = $cnt  + 1;
		}

		//表示用カード
		if($gGcnt > 0 || $gPcnt > 0){
			$type="GOLD";	//A,HG,VR
		}else{
			$type="";		//B,A,HG
		}
    	$disp = $cardManager->getGachaDemo($type);
		$this->af->setApp("disp", $disp);

		$this->af->setApp("cnt", $cnt);
		$this->af->setApp("gcnt", $gcnt);
		$this->af->setApp("gFcnt", $gFcnt);
		$this->af->setApp("gGcnt", $gGcnt);
		$this->af->setApp("gPcnt", $gPcnt);
		$this->af->setApp("af_cnt", $af_cnt);
		$this->af->setApp("af_gcnt", $af_gcnt);
		$this->af->setApp("af_gFcnt", $af_gFcnt);
		$this->af->setApp("af_gGcnt", $af_gGcnt);
		$this->af->setApp("af_gPcnt", $af_gPcnt);
		$this->af->setApp('bonus', $this->af->get('bonus'));

        return 'gacha_index';
    }
}

?>
