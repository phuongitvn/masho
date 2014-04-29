<?php
class M_Form_MyCampaign extends M_ActionForm {
	var $form = array(
		"opensocial_owner_id" => array(),
	);
}

class M_Action_MyCampaign extends M_ActionClass
{
	function prepare() {
		$domain = $this->config->get('url');
		$this->af->setApp('domain' ,$domain);
		return null;
	}

	function perform()
	{
		$userManager = $this->backend->getManager("User");
		
		$member_id = $this->af->get('opensocial_owner_id');


		return 'my_campaign';
	}
}

?>