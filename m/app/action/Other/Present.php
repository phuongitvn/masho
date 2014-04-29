<?php
class M_Form_OtherPresent extends M_ActionForm
{
	var $form = array(
		"opensocial_owner_id" => array(),
	);
}

class M_Action_OtherPresent extends M_ActionClass
{
	function prepare() {
		$domain = $this->config->get('url');
		$this->af->setApp('domain' ,$domain);
		return null;
	}

	function perform()
	{
		return 'other_present';
	}
}

?>
