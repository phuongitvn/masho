<?php
/**
 *  Quest/Clear.php
 *
 *  @author	{$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  quest_level form implementation
 *
 *  @author	{$author}
 *  @access	public
 *  @package   M
 */

class M_Form_QuestClear extends M_ActionForm
{
	/**
	 *  @access   private
	 *  @var	  array   form definition.
	 */
	var $form = array(

		"opensocial_owner_id" => array(),
		"id" => array(),
		"ssid" => array(),
		"orgFol" => array(),
		"orgOff" => array(),
		"orgDef" => array(),
		"rfp" => array(),
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
 *  quest_level action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_QuestClear extends M_ActionClass
{
	/**
	 *  preprocess quest_level action.
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
	 *  Clear action implementation.
	 *
	 *  @access	public
	 *  @return	string  Forward Name.
	 */
	function perform()
	{
		$userManager = $this->backend->getManager("User");
		$cardManager = $this->backend->getManager("Card");
		$questManager = $this->backend->getManager("Quest");
		$member_id = $this->af->get('opensocial_owner_id');
		$quest_id = $this->af->get('id');
		$this->af->setApp("id", $quest_id);
		$ssid = $this->af->get('ssid');
		$this->af->setApp("ssid", $ssid);

		$rfp = $this->af->get('rfp');
		$org['fol'] = $this->af->get('orgFol');
		$org['off'] = $this->af->get('orgOff');
		$org['def'] = $this->af->get('orgDef');
		$this->af->setApp("org", $org);
		//�v���t�B�[�����@// t_user stage cl_cycle cl_masho exp money genki_rcv_time
		$profile = $userManager->getProfile($member_id);
		$this->af->setApp("profile", $profile);
		$this->af->setApp("tut_num", $profile['tut_num']);
		$cstage = substr($quest_id,0,1);
		$stage = $userManager->getStageName($cstage);
		$color = $userManager->getStageColor($cstage);
		$title = $questManager->getQuestTitle($profile['stage'], $profile['cl_masho']);
		$this->af->setApp("title", $title);
		$this->af->setApp("color", $color);
		$this->af->setApp("stage", $stage);
		$this->af->setApp("cstage", $cstage);

		//�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�|�| CHK 0
		//�Y������N�G�X�g�łȂ���CHK
		$st_cy = $profile['stage'] .($profile['cl_cycle'] + 1);
		if( substr($quest_id,0,2) > $st_cy || !is_numeric($quest_id)){
			return 'error_404';
		}

		//m_exp_level�@levelid ����exp(臒l)���擾
		$nextExp = $userManager->getNextExpContByLevel($profile['level']);
		$this->af->setApp("nextExp", $nextExp);
		$prevExp = $userManager->getPrevExpContByLevel($profile['level']);

		//�N�G�X�g�}�X�^�@exp money genki_rcv_time�@��speed margin
		$disp = $questManager->getQuest($quest_id);
		//11/01/11 �K����
		//$disp['exp']   = $profile['exp']   + $disp['exp'];
		//$disp['money'] = $profile['money'] + $disp['money'];
		$disp['exp']   = $profile['exp']   - $disp['exp'];
		$disp['money'] = $profile['money'] - $disp['money'];

		$disp['genki'] = $profile['genki'] + $disp['req_genki'];
		$disp['aRate'] = 100;
		$this->af->setApp("disp", $disp);

		//��G�X�P�[�v
		$carrierNo = $this->backend->useragent->getAgentType();
		if($carrierNo == 1 || $carrierNo == 2){
			mb_language("Japanese");
			$word['end_cmnt']  = mb_convert_encoding($disp['end_cmnt'],"SJIS","UTF-8");
		}else{
			$word['end_cmnt'] = $disp['end_cmnt'];
		}
		$this->af->setAppNE("word", $word);

		//�o���l�̍����v�Z
		//11/01/11 �K����
		//$diffExp = $nextExp - $disp['exp'];
		$diffExp = $nextExp - $profile['exp'];

		$this->af->setApp("diffExp", $diffExp);
		//���̉摜�\��
		//11/01/11 �K����
		//$eImg = $questManager->getDispImg( floor( ($disp['exp'] - $prevExp) / ($nextExp - $prevExp) * 100) );
		$eImg = $questManager->getDispImg( floor( ($profile['exp'] - $prevExp) / ($nextExp - $prevExp) * 100) );
		$this->af->setApp("eImg", $eImg);
		$this->af->setApp("aImg", "8");

		//�`���[�g���A��
		if($profile['tut_num'] == 10  ){
			$ssid = $userManager->getSsId();
			$this->af->setApp("ssid", $ssid);
			return 'quest_tut3';
		}

		if($rfp != ""){
			//�ŐV�̏��
			$deck = $userManager->getDeckProfile($member_id);
			$this->af->setApp("deck", $deck);
			for ($i=1; $i<=5; $i++) {
				$j = $i - 1;
				$rfP[$i] = substr($rfp,$j,1);
				$d = "deck".$i;
				//�J�[�h���擾(t_card)
				$tmp = $cardManager->getCardInfo($member_id , $deck[$d] , 0);
				$dispcard[$i] = $tmp['bushoid'];
			}
			$this->af->setApp("card", $dispcard);
			if(strlen($rfp) == 10){
				for ($i=6; $i<=10; $i++) {
					$j = $i - 1;
					$rfP[$i] = substr($rfp,$j,1);
				}
			}
			$this->af->setApp("rfP", $rfP);
		}
		//�Y���X�e�[�W+����̃N�G�X�g�����擾
		$stagecycle = substr($quest_id,0,2);
		$list = array();
		if($profile['tut_num'] < 18 ){
			$list = $questManager->getQuestlist($member_id ,$stagecycle,$only="112");
		}else{
			$list = $questManager->getQuestlist($member_id ,$stagecycle,$quest_id);
		}

		$this->af->setApp("list", $list);

		//�����o��(����N���A)�̔��f
		//�Y������̃N�G�X�g���ƃN���A�����N�G�X�g������v�Ȃ疂���o��
		$questNum =   $questManager->getQuestNumByCycle($profile['stage'], $profile['cl_cycle'] - 1);
		$expNum   = $questManager->expCycle($member_id ,$profile['stage'], $profile['cl_cycle'] - 1);

		if($expNum == $questNum && ($profile['cl_cycle'] - $profile['cl_masho']) == 1){
			//�ǂ̖�����o�ꂳ���邩�́@t_user.cl_cycle ��cl_masho �Ŕ��f
			$masho = $questManager->getMasho($prof_st['stage'],$profile['cl_cycle']);
			$this->af->setApp("masho", $masho);
		}

		return 'quest_clear';
	}
}
