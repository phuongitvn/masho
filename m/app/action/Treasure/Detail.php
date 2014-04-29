<?php
/**
 *  Treasure/Index.php
 *
 *  @author	{$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  treasure_index form implementation
 *
 *  @author	{$author}
 *  @access	public
 *  @package   M
 */

class M_Form_TreasureDetail extends M_ActionForm
{
	/**
	 *  @access   private
	 *  @var	  array   form definition.
	 */
	var $form = array(

		"opensocial_owner_id" => array(),
		"oid" => array(),
	);

	/**
	 *  Form input value convert filter : sample
	 *
	 *  @access protected
	 *  @param  mixed   $value  Form Input Value
	 *  @return mixed		   Converted result.
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
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_TreasureDetail extends M_ActionClass
{
	/**
	 *  preprocess treasure_index action.
	 *
	 *  @access	public
	 *  @return	string  Forward name (null if no errors.)
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
	 *  @access	public
	 *  @return	string  Forward Name.
	 */
	function perform() {
		$userManager = $this->backend->getManager("User");
		$treasureManager = $this->backend->getManager("Treasure");
		$member_id = $this->af->get('opensocial_owner_id');

		$profile = $userManager->getProfile($member_id);
		$this->af->setApp("tut_num", $profile['tut_num']);
		$trId = $this->af->get('tid');
		$this->af->setApp("trId", $trId);
		$mode = $this->af->get('mode');
		$this->af->setApp("mode", $mode);
		$other_id = $this->af->get('oid');

		//お宝個別情報
		$detailInfo = $treasureManager->TrDtInfo($trId);
		$this->af->setApp("detailInfo", $detailInfo);

		//該当シリーズ最低1個保持CHK
		$least = $treasureManager->getTrindOwn($member_id,$detailInfo['tr_seriesid'],1);
		if($least['0']['Num'] == 0 && $least['1']['Num'] == 0 && $least['2']['Num'] == 0 && $least['3']['Num'] == 0 && $least['4']['Num'] == 0){
			$this->af->setApp("kbn", "sr");
			return 'treasure_notown';
		}

		//シリーズ情報
		$sirInfo = $treasureManager->TrSeriInfo($detailInfo['tr_seriesid']);
		$this->af->setApp("sirInfo", $sirInfo);

		//自己所持チェック
		$ownChk = $treasureManager->getTrindOwn($member_id,$trId,0);
		$this->af->setApp("ownChk", $ownChk);

		//設定護符数
		$on = $treasureManager->getTrapNum($member_id,$trId);
		$on['trap2num'] = ceil($on['trap2num'] / 2);
		$on['trapSum'] = $on['trap1num'] + $on['trap2num'];
		$this->af->setApp("on", $on);

		//相手所持チェック
		if($other_id != ""){
			$other= $userManager->getDeckProfile($other_id);
			$this->af->setApp("other", $other);

			$othChk = $treasureManager->getTrindOwn($other_id,$trId,0);
			$this->af->setApp("othChk", $othChk);

			//コンプリーチチェック
			$ReachFlg = 0;
			$othSirId = $treasureManager->TrDtInfo($trId);
			$CmOthChk = $treasureManager->getTrindOwn($other_id,$othSirId['tr_seriesid'],2);
		}

		//シリーズ毎のIDを取得
		$sId = $treasureManager->TrSerindInfo($othSirId['tr_seriesid']);
		for($i = 0; $i < 5; $i++){
			$t = $sId[$i]['treasureid'];
			if($CmOthChk[$t]['Num'] !== 0){
				$ReachFlg++;
			}
		}

		if($CmOthChk[$trId]['Num'] == 0 && $ReachFlg == 4){
			$CmOthFlg = 1;
		} else {
			
			$CmOthFlg = 0;
		}
		$this->af->setApp("CmOthFlg", $CmOthFlg);


		//プレゼント後の各所持数
		$preownChk = $ownChk - 1;
		$this->af->setApp("preownChk", $preownChk);
		$preothChk = $othChk + 1;
		$this->af->setApp("preothChk", $preothChk);

		//コンプリートチェック
		$compChk = $treasureManager->getTrComp($member_id);
		$sirId = $detailInfo['tr_seriesid'];
		$sirCompFlg = $compChk[$sirId]['CompFlg'];
		$this->af->setApp("sirCompFlg", $sirCompFlg);

		if($ownChk == 0 && $mode == "pre"){
			return 'treasure_notown';
		}else{
			if($profile['tut_num'] < 16 || $mode == "pre"){
				$ssid = $treasureManager->getSsId();
				$this->af->setApp("ssid", $ssid);
			}
			return 'treasure_detail';
		}
	}
}

?>