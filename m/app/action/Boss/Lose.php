<?php
class M_Form_BossLose extends M_ActionForm {
	var $form = array(
		"opensocial_owner_id" => array(),
		"ssid" => array(),
	);
}

class M_Action_BossLose extends M_ActionClass {
	function prepare() {
		return parent::prepare();
	}

	function perform() {
		$userManager  = $this->backend->getManager("User");
		$questManager = $this->backend->getManager("Quest");

		$member_id = $this->af->get('opensocial_owner_id');
		$profile = $userManager->getProfile($member_id);

		//ステージサイクル
		$stagecycle = $profile['stage'].$profile['cl_cycle'];
		$clmasho = $profile['cl_masho'];

		$masho = $questManager->getMasho($profile['stage'],$profile['cl_cycle']);

		return 'boss_lose';
	}
}

?>
