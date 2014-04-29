<?php
/**
 *  Diary/Index.php
 *
 *  @author    {$author}
 *  @package   M
 *  @version   $Id$
 */

/**
 *  item_index form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   M
 */

class M_Form_DiaryIndex extends M_ActionForm
{
    /**
     *  @access   private
     *  @var      array   form definition.
     */
    var $form = array(

		"opensocial_owner_id" => array(),
		"id" => array(),
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
 *  item_index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    M
 */
class M_Action_DiaryIndex extends M_ActionClass
{
    /**
     *  preprocess item_index action.
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
        $questManager = $this->backend->getManager("Quest");

        $member_id = $this->af->get('opensocial_owner_id');
        $id = $this->af->get('id');
        $stageMax = $userManager->getStageMaxNum();

        //�����[�h�΍�
		$ssid = $userManager->getSsId();
        $this->af->setApp("ssid", $ssid);

        //�v���t�B�[�����
        $profile = $userManager->getProfile($member_id);
		//id��CHK
		if($id != "" && ($id > $profile['stage'] || !is_numeric($id)) ){
	        $this->af->setApp("profile", $profile);
        	return 'error_404';
		}
		//���݂̍ŐV�N���A�N�G�X�g
		$questId = $questManager->getNowQuestId($member_id);

		//�X�e�[�W��+�^�C�g���擾
		if($id == ""){
			if($stageMax < $profile['stage']){
				$stage_id = $stageMax;
				$cycle = 3;
				$stagecycle = $stageMax.$cycle;
				$max = 3;
			}else{
				$stage_id = $profile['stage'];
				//�Y���X�e�[�W+����̃N�G�X�g�����擾(�����N���A�Ŕ��f)
				$cycle = $profile['cl_masho']+1;
				$stagecycle = $profile['stage'].$cycle;
				$max  = substr($questId,1,1);
			}
	        $stage = $userManager->getStageName($stage_id);
			$color = $userManager->getStageColor($stage_id);
			$title = $questManager->getQuestTitle($profile['stage'], $profile['cl_masho']);

		}else{
			$stage_id = $id;
	        $stage = $userManager->getStageName($stage_id);
			$color = $userManager->getStageColor($stage_id);
			$cyTitle = $this->config->get('cyTitle');

			if($id < $profile['stage']){
				$title = $cyTitle['4'];
			}else{
				$title = $questManager->getQuestTitle($profile['stage'], $profile['cl_masho']);
			}
			//�Y���X�e�[�W+����̃N�G�X�g�����擾(�����N���A�Ŕ��f)
			if($id == $profile['stage']){
				$cycle = $profile['cl_masho']+1;
				$stagecycle = $profile['stage'].$cycle;
				$max  = substr($questId,1,1);
			}else{
				$stagecycle = $stage_id."3";
				$max = 3;
			}
		}

		if($stage_id  == 1 && $id == ""){
			$pid = "";
			$nid = "";
		}elseif($stage_id  == 1 && $id != ""){
			$pid = "";
			$nid = $stage_id + 1;
		}elseif($stage_id  == $stageMax){
			$pid = $stage_id - 1;
			$nid = "";
		}else{
			$pid = $stage_id - 1;
			$nid = $stage_id + 1;
		}

        $this->af->setApp("id", $stage_id);
        $this->af->setApp("pid", $pid);
        $this->af->setApp("nid", $nid);
        $this->af->setApp("cs", $profile['stage']);
        $this->af->setApp("stage", $stage);
        $this->af->setApp("color", $color);
        $this->af->setApp("title", $title);
        $this->af->setApp("profile", $profile);

		//�R�����g�擾
		for ($i=0; $i<$max; $i++) {
			$j = $max - $i;
			$cur = $stage_id.$j;
			$cyc[$i] = $questManager->getQuestDiary($member_id ,$cur,$questId);
			//��G�X�P�[�v
	        $carrierNo = $this->backend->useragent->getAgentType();
			if($carrierNo == 1 || $carrierNo == 2){
				mb_language("Japanese");
				for ($k=0; $k < count($cyc[$i]); $k++) {
					$word[$i][$k]['end_cmnt']  = mb_convert_encoding($cyc[$i][$k]['end_cmnt'],"SJIS","UTF-8");
					$word[$i][$k]['end_bg'] = $cyc[$i][$k]['end_bg'];
					$word[$i][$k]['name']  = mb_convert_encoding($cyc[$i][$k]['name'],"SJIS","UTF-8");
				}
			}else{
				for ($k=0; $k < count($cyc[$i]); $k++) {
					$word[$i][$k]['end_cmnt'] = $cyc[$i][$k]['end_cmnt'];
					$word[$i][$k]['end_bg'] = $cyc[$i][$k]['end_bg'];
					$word[$i][$k]['name'] = $cyc[$i][$k]['name'];
				}
			}
		}

		$this->af->setAppNE("word", $word);
    	$this->af->setApp("cyc", $cyc);

        return 'diary_index';

    }
}

?>