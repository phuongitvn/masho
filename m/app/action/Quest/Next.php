<?php
/**
 *  Quest/Next.php
 *
 *  @author	{$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  quest_get form implementation
 *
 *  @author	{$author}
 *  @access	public
 *  @package   M
 */

class M_Form_QuestNext extends M_ActionForm
{
	/**
	 *  @access   private
	 *  @var	  array   form definition.
	 */
	var $form = array(

		"opensocial_owner_id" => array(),
		"id" => array(),
		"rfp" => array(),
		"gR" => array(),
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
 *  quest_get action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_QuestNext extends M_ActionClass
{
	/**
	 *  preprocess quest_get action.
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
	 *  Get action implementation.
	 *
	 *  @access	public
	 *  @return	string  Forward Name.
	 */
	function perform()
	{

		$userManager = $this->backend->getManager("User");
		$cardManager = $this->backend->getManager("Card");
		$questManager = $this->backend->getManager("Quest");
		$swfmillManager = $this->backend->getManager('Swfmill');
		$domain = $this->config->get("url");
		$www = $domain['www'];
		$API = $domain['api'];
		$appId = $domain['appId'];

		$member_id = $this->af->get('opensocial_owner_id');
		$ssid = $this->af->get('ssid');
		$rfp = $this->af->get('rfp');
		$gR = $this->af->get('gR');
		$profile = $userManager->getProfile($member_id);
		$quest_id = $this->af->get('id');

		//－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－ CHK 0
		if($quest_id != "ms"){
			//該当周回クエストでないかCHK
			$st_cy = $profile['stage'] .($profile['cl_cycle'] + 1);
			if( substr($quest_id,0,2) > $st_cy || !is_numeric($quest_id)){
				return 'error_404';
			}
		}
		if($quest_id == "ms"){
			$replaceStrings["lnkUrl"] = "http://".$API."/".$appId."?url=http%3A%2F%2F".$www."%2Fboss%2Findex.php%3Fact%3Dboss_talk1%26gR%3D".$gR."%26rfp%3D".$rfp;
			//魔将クリア3回目
			if(abs($profile['stage'] - $profile['get_masho'] ) == 2 && $profile['cl_cycle'] == 0 && $profile['cl_masho'] == 0 ){
				$xmlString = $swfmillManager->compileXml('stage.xml', $replaceStrings);
			}else{
				$xmlString = $swfmillManager->compileXml('masho.xml', $replaceStrings);
			}
		}else{
			//リロード対策
			$ssid = $userManager->getSsId();
			$replaceStrings["lnkUrl"] = "http://".$API."/".$appId."?url=http%3A%2F%2F".$www."%2Fquest%2Fclear.php%3Fid%3D".$quest_id."%26ssid%3D".$ssid."%26ex_genki%3D".$profile['genki'];
			$xmlString = $swfmillManager->compileXml('clear.xml', $replaceStrings);
		}

		// XML出力実行
		$swfmillManager->executeSwfmill($xmlString);

	}
}
