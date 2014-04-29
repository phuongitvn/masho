<?php
class M_Form_MyOpenbeta extends M_ActionForm
{
	var $form = array(
		"opensocial_owner_id" => array(),
	);

}

class M_Action_MyOpenbeta extends M_ActionClass {
	function prepare() {
		$domain = $this->config->get('url');
		$this->af->setApp('domain' ,$domain);
		return null;
	}

	function perform() {
		$member_id = $this->af->get('opensocial_owner_id');
		$this->af->setApp('is_login', !empty($member_id));
		return 'my_openbeta';
	}
}

?>