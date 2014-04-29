<?php
class M_Form_LoginPolicy extends M_ActionForm
{
	var $form = array(
		"opensocial_owner_id" => array(),
	);
}

class M_Action_LoginPolicy extends M_ActionClass
{
	function prepare()
	{
		$domain = $this->config->get('url');
		$this->af->setApp('domain' ,$domain);
		return null;
	}

	function perform() {
		$ran = mt_rand(1,4);
		$member_id = $this->af->get('opensocial_owner_id');
		$this->af->setApp('member_id', $member_id);
		$st = "my";
		$this->af->setApp("st", $st);
		$this->af->setApp("ran", $ran);

		$domain = $this->config->get("url");
		$this->af->setApp('domain' ,$domain);

		return 'login_policy';
	}
}
?>