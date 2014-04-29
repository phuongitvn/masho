<?php
/**
 *  Boss/Index.php
 *
 *  @author	{$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  boss_index form implementation
 *
 *  @author	{$author}
 *  @access	public
 *  @package   M
 */

class M_Form_BossIndex extends M_ActionForm
{
	/**
	 *  @access   private
	 *  @var	  array   form definition.
	 */
	var $form = array(

		"opensocial_owner_id" => array(),
		"eid" => array(),
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
 *  boss_index action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_BossIndex extends M_ActionClass
{
	/**
	 *  preprocess boss_index action.
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
	function perform()
	{

		$userManager = $this->backend->getManager("User");
		$friendManager = $this->backend->getManager("Friend");
		$questManager = $this->backend->getManager("Quest");
		$itemManager = $this->backend->getManager("Item");
		$cardManager = $this->backend->getManager("Card");

		$member_id = $this->af->get('opensocial_owner_id');
		$profile = $userManager->getProfile($member_id);
		$masho = $questManager->getMasho($profile['stage'],$profile['cl_cycle']);
		$this->af->setApp("profile", $profile);
		$this->af->setApp("masho", $masho);

		//クリア後　ブラウザバック対応(11/01/04)
		if( abs($profile['cl_cycle'] - $profile['cl_masho'] ) != 1 ){
			return 'quest_reload';
		}

		//非エスケープ
		$carrierNo = $this->backend->useragent->getAgentType();
		if($carrierNo == 1 || $carrierNo == 2){
			mb_language("Japanese");
			$word['expla_l']  = mb_convert_encoding($masho['expla_l'],"SJIS","UTF-8");
		}else{
			$word['expla_l'] = $masho['expla_l'];
		}
		$this->af->setAppNE("word", $word);
		//参戦同盟のCHK
		$entry_id = $this->af->get('eid');
		if($entry_id != ""){
			$e_profile = $userManager->getProfile($entry_id);
			if(!is_numeric($entry_id) || count($e_profile) == 0 ){
				return "error_404";
			}
			$ret = $friendManager->addBossFight($member_id,$entry_id);
			if($ret === False){
				return 'error_sys';
			}
		}
		//リロード対策
		$ssid = $userManager->getSsId();
		$this->af->setApp("ssid", $ssid);

		//デッキ情報取得
		$deck = $userManager->getDeckProfile($member_id);
		for ($i=1; $i<=5; $i++) {
			$d = "deck".$i;
			//カード情報取得(t_card)
			$tmp = $cardManager->getCardInfo($member_id , $deck[$d] , 0);
			$card[$i] = $tmp['bushoid'];

		}

		//連携同盟の取得(同盟効果含む)
		$existNum =0;
		$cnt = $friendManager->getLegionlistCount($member_id);
		if($cnt > 0){
			$friend = $friendManager->getLegionlist($member_id,$profile['level']);
			$existNum = count($friend);
		}
		//空枠追加
		for ($i=$existNum; $i<2; $i++) {
			$friend[$i]["prof"] = "non";
			$friend[$i]["handle"] = "???";
		}
		$this->af->setApp("friend", $friend);

		$coeff = $friend['0']['coeff'] + $friend['1']['coeff'];
		//上昇分
		$diff['off'] = floor($deck['offense'] * $coeff);
		$diff['def'] = floor($deck['defense'] * $coeff);
		$diff['fol'] = floor($deck['follower'] * $coeff);
		//表示計
		$legion['off'] = $diff['off'] + $deck['offense'];
		$legion['def'] = $diff['def'] + $deck['defense'];
		$legion['fol'] = $diff['fol'] + $deck['follower'];

		//陣形名取得
		if($deck['formno'] > 0){
			$form = $cardManager->getFormAtt($deck['formno']);
			$jin['off'] = 0;
			$jin['def'] = 0;
			$jin['fol'] = 0;
			for ($n=1; $n<=2; $n++) {
				$toW  =  "to".$n;
				$minW = "min".$n;
				if($form[$toW] == "o"){
					$jin['off']  = floor($legion['off'] * $form[$minW] / 100);
				}elseif($form[$toW] == "d"){
					$jin['def']  = floor($legion['def'] * $form[$minW] / 100);
				}elseif($form[$toW] == "f"){
					$jin['fol']  = floor($legion['fol'] * $form[$minW] / 100);
				}
			}
			$total['off'] = $legion['off'] + $jin['off'];
			$total['def'] = $legion['def'] + $jin['def'];
			$total['fol'] = $legion['fol'] + $jin['fol'];
			$this->af->setApp("total", $total);
			$this->af->setApp("jin", $jin);
		}else{
			$form['formno'] = 0;
		}
		$this->af->setApp("form", $form);
/*
echo "SANSENfriends<br>";
var_dump($friend);
*/

		$this->af->setApp("card", $card);
		$this->af->setApp("legion", $legion);
		$this->af->setApp("diff", $diff);


		return 'boss_index';
	}
}

?>