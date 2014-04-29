<?php
/**
 *  Treasure/Index.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  treasure_index form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_TreasureIndex extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

	"opensocial_owner_id" => array(),
	"id" => array(),
	"oid" => array(),
	"q" => array(),
	"mode" => array(),
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
 *  treasure_index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_TreasureIndex extends M_ActionClass
{
    /**
     *  preprocess treasure_index action.
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
	$treasureManager = $this->backend->getManager("Treasure");

	$member_id = $this->af->get('opensocial_owner_id');
	$profile = $userManager->getProfile($member_id);
	$this->af->setApp("tut_num", $profile['tut_num']);
	$trId = $this->af->get('tid');
	$this->af->setApp("trId", $trId);
	$mode = $this->af->get('mode');
	$this->af->setApp("mode", $mode);
    $other_id = $this->af->get('id');
    $toPre_id = $this->af->get('oid');
    $q = $this->af->get('q');

	//シリーズ情報
	$sirInfo = $treasureManager->TrSeriInfo($trId);
	$this->af->setApp("sirInfo", $sirInfo);

	//お宝シリーズ一括情報
	$sirindInfo = $treasureManager->TrSerindInfo($trId);
	$this->af->setApp("sirindInfo", $sirindInfo);

	if($toPre_id != ""){
		$toPreprofile = $userManager->getProfile($toPre_id);
		$this->af->setApp("toPreprofile", $toPreprofile);
	}
	if($other_id == ""){

		//コンプリートチェック
		$compChk = $treasureManager->getTrComp($member_id);
		$sirCompFlg = $compChk[$trId]['CompFlg'];
		$RegDate = $compChk[$trId]['RegDate'];
		$this->af->setApp("sirCompFlg", $sirCompFlg);
		$this->af->setApp("RegDate", $RegDate);
		//コンプリートアイテム
		if($sirCompFlg == "1"){
			$itemManager = $this->backend->getManager("Item");
			$item = $itemManager->getItemData($sirInfo['itemid']);
			$this->af->setApp("item", $item);
		}
		//所持チェック
		$ownChk = $treasureManager->getTrindOwn($member_id,$trId,1);
		$this->af->setApp("ownChk", $ownChk);
	}else{
		$ot_profile = $userManager->getProfile($other_id);
		$this->af->setApp("ot_profile", $ot_profile);
		//コンプリートチェック
		$compChk = $treasureManager->getTrComp($other_id);
		$sirCompFlg = $compChk[$trId]['CompFlg'];
		$RegDate = $compChk[$trId]['RegDate'];
		$this->af->setApp("sirCompFlg", $sirCompFlg);
		$this->af->setApp("RegDate", $RegDate);
		//コンプリートアイテム
		if($sirCompFlg == "1"){
			$itemManager = $this->backend->getManager("Item");
			$item = $itemManager->getItemData($sirInfo['itemid']);
			$this->af->setApp("item", $item);
		}
		//自分の所持チェック
		//11/1/28 
		//$ownChk = $treasureManager->getTrindOwn($member_id,$trId,1);
		$ownChk = $treasureManager->getTrindOwn($other_id,$trId,1);
		$this->af->setApp("ownChk", $ownChk);

		//他人の所持チェック
		$ownOtChk = $treasureManager->getTrindOwn($other_id,$trId,1);
		$this->af->setApp("ownOtChk", $ownOtChk);

	}

	if($ownChk['0']['ownFlg'] == 0 && $ownChk['1']['ownFlg'] == 0 && $ownChk['2']['ownFlg'] == 0 && $ownChk['3']['ownFlg'] == 0 && $ownChk['4']['ownFlg'] == 0){
		$this->af->setApp("kbn", "sr");
         return 'treasure_notown';
	}else{
		if($profile['tut_num'] < 16){
			$ssid = $treasureManager->getSsId();
			$this->af->setApp("ssid", $ssid);
		}
		if($q != ""){
			$ssid = $treasureManager->getSsId();
			$this->af->setApp("ssid", $ssid);
		}
        return 'treasure_index';
    }

	}

}

?>
