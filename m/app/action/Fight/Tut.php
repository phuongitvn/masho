<?php
/**
 *  Fight/Tut.php
 *
 *  @author	 {$author}
 *  @package	M
 *  @version	$Id$
 */

/**
 *  fight_do Form implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Form_FightTut extends M_ActionForm
{
	/**
	 *  @access private
	 *  @var	array   form definition.
	 */
	var $form = array(

		"opensocial_owner_id" => array(),
		"ssid" => array(),
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
 *  fight_do action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_FightTut extends M_ActionClass
{
	/**
	 *  preprocess of my_p_day Action.
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
	 *  fight_do action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{

		$userManager = $this->backend->getManager("User");
		$cardManager = $this->backend->getManager("Card");
		$member_id = $this->af->get('opensocial_owner_id');
		$domain = $this->config->get("url");
		$www = $domain['www'];
		$API = $domain['api'];
		$appId = $domain['appId'];

		$ssid = $this->af->get('ssid');

		$isReload = $userManager->isReload($member_id ,$ssid);
		$this->af->setApp("ssid", $ssid);

		if($isReload == True){
			$profile = $userManager->getProfile($member_id);
			$ssid = $userManager->getSsId();
			$this->af->setApp("ssid", $ssid);
			$this->af->setApp("profile", $profile);
			$card = $cardManager->getCardAtt($profile['prof']);
			$this->af->setApp("card", $card);
			$stage = $userManager->getStageName($profile['stage']);
			$this->af->setApp("stage", $stage);
			if($profile['tut_num'] >= 12 && $profile['tut_num'] <= 17){
				return 'my_indextutf';
			}elseif($profile['tut_num'] >= 18){
				return 'my_index';
			}
		}else{
			$table ="t_user";
			$column = "tut_num";
			$where = "memberid = '" .$member_id."'";
			$ret = $userManager->incrementColumn($table ,$column ,$where);
			if( $ret == false){
				return 'error_sys';
			}
			//ssid登録
			$ret = $userManager->updSession($member_id ,$ssid);
			if($ret === False){
				return 'error_sys';
			}
			$profile = $userManager->getProfile($member_id);
			if($profile['tut_num'] == 17){

				$profile['aftergenki'] = $profile['genki'] - 5;
				$this->af->setApp("profile", $profile);

				$user = array();
				$user["memberid"] = $member_id;
				$user["genki_rcv_time"]  = $userManager->getGenkiRcvTime($member_id , 5);	//消費するgenkiの値をセット
				$user["exp"] = $profile['exp'] + 2;
				$user["money"] = $profile['money'] + 2;
				$user["win_act"] = 1;
				$ret = $userManager->updateUser($user);
				if($ret == false){
					return false;
				}
			}
		}

		$ssid = $userManager->getSsId();
		$this->af->setApp("ssid", $ssid);

	  	if($profile['tut_num'] == 13){
			if($profile['prof'] == "3d92495b73a39bfd"){
				$otcard = $this->config->get("ot_o");
			}elseif($profile['prof'] == "96310f839fa23dc0"){
				$otcard = $this->config->get("ot_d");
			}elseif($profile['prof'] == "9b1cb1f0a53c3cc3"){
				$otcard = $this->config->get("ot_b");
			}
			$this->af->setApp("otDispCard", $otcard);
			return 'fight_tut1';
		}elseif($profile['tut_num'] == 14){
			if($profile['prof'] == "3d92495b73a39bfd"){
				$card = $this->config->get("reg_o");
			}elseif($profile['prof'] == "96310f839fa23dc0"){
				$card = $this->config->get("reg_d");
			}elseif($profile['prof'] == "9b1cb1f0a53c3cc3"){
				$card = $this->config->get("reg_b");
			}
			$deck = $userManager->getDeckProfile($member_id);
			$this->af->setApp("deck", $deck);
			$this->af->setApp("off", $profile['buki_off']);
			$this->af->setApp("def", $profile['buki_def']);
			$this->af->setApp("profile", $profile);
			$this->af->setApp("card", $card);
			return 'fight_tut2';
		}elseif($profile['tut_num'] == 15){
			if($profile['prof'] == "3d92495b73a39bfd"){
				$card = $this->config->get("reg_o");
			}elseif($profile['prof'] == "96310f839fa23dc0"){
				$card = $this->config->get("reg_d");
			}elseif($profile['prof'] == "9b1cb1f0a53c3cc3"){
				$card = $this->config->get("reg_b");
			}
			$cardManager = $this->backend->getManager("Card");
			for ($i=1; $i<=5; $i++) {
				$tmpCard = $cardManager->getCardAtt($card[$i]);
				$disp[$i] = $tmpCard['nameRank'];
			}
			$profile['aftergenki'] = $profile['genki'] - 5;
			$this->af->setApp("profile", $profile);
			$this->af->setApp("card", $card);
			$this->af->setApp("disp", $disp);
			return 'fight_tut3';
		}elseif($profile['tut_num'] == 16){
			$swfmillManager = $this->backend->getManager('Swfmill');
			$cardManager = $this->backend->getManager("Card");
			//武将連番取得
			$mycard = $cardManager->getCardAtt($profile['prof']);
			$otcard['seq'] = 1;		//天草
			$replaceStrings["lnkUrl"] = "http://".$API."/".$appId."?url=http%3A%2F%2F".$www."%2Ffight%2Ftut.php%3Fssid%3D".$ssid;
			//$replaceStrings['myImg'] = $swfmillManager->getXml(sprintf('card/%d.xml',  $mycard['seq']));
			//$replaceStrings['otImg'] = $swfmillManager->getXml(sprintf('card/%d.xml',  $otcard['seq']));
			//変更 11/01/04
			$replaceStrings['myImg_1'] = $swfmillManager->getXml(sprintf('card/%d_1.xml',  $mycard['seq']));
			$replaceStrings['myImg_2'] = $swfmillManager->getXml(sprintf('card/%d_2.xml',  $mycard['seq']));
			$replaceStrings['otImg_1'] = $swfmillManager->getXml(sprintf('card/%d_1.xml',  $otcard['seq']));
			$replaceStrings['otImg_2'] = $swfmillManager->getXml(sprintf('card/%d_2.xml',  $otcard['seq']));

			// XMLコンパイル
			$xmlString = $swfmillManager->compileXml('fight.xml', $replaceStrings);
			// XML出力実行
			$swfmillManager->executeSwfmill($xmlString);
		}elseif($profile['tut_num'] == 17){
			$this->af->setApp("profile", $profile);
			$cardManager = $this->backend->getManager("Card");

			if($profile['prof'] == "3d92495b73a39bfd"){
				$myOrder = "32154";
				$otcard = $this->config->get("ot_o");
				$type = "o";
			}elseif($profile['prof'] == "96310f839fa23dc0"){
				$myOrder = "31452";
				$otcard = $this->config->get("ot_d");
				$type = "d";
			}elseif($profile['prof'] == "9b1cb1f0a53c3cc3"){
				$myOrder = "41253";
				$otcard = $this->config->get("ot_b");
				$type = "b";
			}

			for ($r = 1; $r <= 5; $r++) {
				$n = $r - 1;
				$sq = substr($myOrder,$n,1);
				$myDispCard[$r] = $cardManager->getDispCardInfo($member_id , $sq );
				$otDispCard[$r] = $cardManager->getCardAtt($otcard[$r]['bushoid']);
				$otDispCard[$r]['damage'] = $otcard[$r]['damage'];
			}

			$this->af->setApp("myDispCard", $myDispCard);
			$this->af->setApp("otDispCard", $otDispCard);
			$this->af->setApp("type", $type);

			return 'fight_tut4';
		}
	}
}
?>