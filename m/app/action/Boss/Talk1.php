<?php
/**
 *  Boss/Talk1.php
 *
 *  @author	{$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  boss_fight form implementation
 *
 *  @author	{$author}
 *  @access	public
 *  @package   M
 */

class M_Form_BossTalk1 extends M_ActionForm
{
	/**
	 *  @access   private
	 *  @var	  array   form definition.
	 */
	var $form = array(

		"opensocial_owner_id" => array(),
	);


}

/**
 *  boss_fight action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_BossTalk1 extends M_ActionClass
{
	/**
	 *  preprocess boss_fight action.
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
	 *  Talk1 action implementation.
	 *
	 *  @access	public
	 *  @return	string  Forward Name.
	 */
	function perform()
	{

		$userManager  = $this->backend->getManager("User");
		$questManager = $this->backend->getManager("Quest");

		$member_id = $this->af->get('opensocial_owner_id');
		$profile = $userManager->getProfile($member_id);
		$this->af->setApp("profile", $profile);

		if(	$profile['cl_masho'] == 0){
			$stage = $profile['stage'] - 1;
			$cycle = 3;
		}else{
			$stage = $profile['stage'];
			$cycle = $profile['cl_cycle'];
		}
		$masho = $questManager->getMasho($stage,$cycle);
		$this->af->setApp("masho", $masho);

		//非エスケープ
		$carrierNo = $this->backend->useragent->getAgentType();
		if($carrierNo == 1 || $carrierNo == 2){
			mb_language("Japanese");
			$word['end_cmnt']  = mb_convert_encoding($masho['end_cmnt'],"SJIS","UTF-8");
		}else{
			$word['end_cmnt'] = $masho['end_cmnt'];
		}
		$this->af->setAppNE("word", $word);

		return 'boss_talk1';
	}
}

?>
