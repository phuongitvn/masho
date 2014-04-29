<?php
/**
 *  Other/List.php
 *
 *  @author	 {$author}
 *  @package	M
 *  @version	$Id$
 */

class M_Form_OtherList extends M_ActionForm
{
	/**
	 *  @access private
	 *  @var	array   form definition.
	 */
	var $form = array(

		"opensocial_owner_id" => array(),
		"p" => array(),
		"md" => array(),
		"lv" => array(),
		"tid" => array(),
		"q" => array()
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
 *  other_list action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_OtherList extends M_ActionClass
{
	/**
	 *  preprocess of other_list Action.
	 *
	 *  @access public
	 *  @return string	forward name(null: success.
	 *								false: in case you want to exit.)
	 */
	function prepare()
	{
		return parent::prepare();
	}

	/**
	 *  other_list action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		
		$userManager = $this->backend->getManager("User");
		//md <ファイト系>　無:通常　tr：お宝狙い　rv：過去の対戦
		//fr <同　盟　系>　同盟申請候補
		$member_id = $this->af->get('opensocial_owner_id');
		$md = $this->af->get('md');
		$lv = $this->af->get('lv');
		$trid = $this->af->get('tid');
		$q = $this->af->get('q');
		$this->af->setApp("md", $md);
		$this->af->setApp("lv", $lv);
		$this->af->setApp("q", $q);
		$this->af->setApp("trid", $trid);
		//プロフィール情報
		$profile = $userManager->getProfile($member_id);

		if($md == "fr"){
			$friendManager = $this->backend->getManager("Friend");
			//同盟リスト
			$nums['friend'] = $friendManager->getFriendlistCount($member_id ,$status="2",$kbn="");
			$nums['send']   = $friendManager->getFriendlistCount($member_id ,$status="0",$kbn="send");
			$nums['rcv']	= $friendManager->getFriendlistCount($member_id ,$status="0",$kbn="");
			$nums['max'] = $userManager->getMaxFriendContByLevel($profile['level']);
			$nums['rest'] = $nums['max'] - ( $nums['friend'] + $nums['send'] + $nums['rcv'] );
			$this->af->setApp("nums", $nums);
			//同盟候補表示可能件数　11/1/28
			$sMax = 5;
			if($nums['rest'] < $sMax){
				$frLimit = $nums['rest'];
			}else{
				$frLimit = $sMax;
			}
			//リロード対策 11/1/26
			$ssid = $userManager->getSsId();
			$this->af->setApp("ssid", $ssid);
		}elseif($md == "tr"){
			$treasureManager = $this->backend->getManager("Treasure");
			$tr = $treasureManager->TrDtInfo($trid);
			$sr = $treasureManager->TrSeriInfo($tr['tr_seriesid']);
			//所持チェック
			$ownChk = $treasureManager->getTrindOwn($member_id,$trid,0);
			$this->af->setApp("own", $ownChk);
			$this->af->setApp("tr", $tr);
			$this->af->setApp("sr", $sr);
		}

		//他軍団リスト
		if($md == "rv"){
			$limit = 10;
			$p = $this->af->get("p");
			if(!$p || !is_numeric($p)){
				$p = 1;
				$this->af->set("p", $p);
			}
			$navi = array();
			$offset = ($p - 1) * $limit;
			$cnt = $userManager->getRevengelistCount($member_id);
			if($cnt > 0){
				$list = $userManager->getRevengelist($member_id , $lv,$limit ,$offset);
				$navi = $userManager->getPagerSource($cnt, $limit, $p, 10);
			}
			$this->af->setApp("cnt", $cnt);
			$this->af->setApp("navi", $navi);
			$this->af->setApp("limit", $limit);
		}elseif($md == "tr"){
			//$list = $userManager->getOtherList($member_id ,$profile['level'],$lv ,$trid,1);
			//110128 ロジック　再　見直し
			$list = $userManager->getNewTrOtherList($member_id ,$profile['level'] ,$trid,5);
		}elseif($md == "fr"){
			//110117 10→5件
			//$lv は同盟申請時に使用
			//110128 ロジック　再　見直し
			//$list = $userManager->getOtherList($member_id ,$profile['level'],$lv ,$trid,5);
			$list = $userManager->getNewOtherList($member_id ,$profile['level'], $lv, $md, 5, $q);//$frLimit );
		}else{
			//110117 10→5件
			//110127 ロジック見直し
			//$list = $userManager->getOtherList($member_id ,$profile['level'],$lv ,$trid,5);
			$list = $userManager->getNewOtherList($member_id ,$profile['level'], $lv="", $md, 5, $q );
		}
		$this->af->setApp("list", $list);

		return 'other_list';
	}
}

?>
