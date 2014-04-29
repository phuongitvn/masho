<?php
class M_Form_MyEvent extends M_ActionForm
{
	var $form = array(

		"opensocial_owner_id" => array(),
	);
}

class M_Action_MyEvent extends M_ActionClass
{
	function prepare()
	{
		return parent::prepare();
	}

	function perform()
	{
		$userManager = $this->backend->getManager('User');
		$lgManager = $this->backend->getManager('Lg');
		$infoManager = $this->backend->getManager('Info');
		
		$member_id = $this->af->get('opensocial_owner_id');
		$profile = $userManager->getSimpleProfile($member_id);
		$this->af->setApp("profile", $profile);

		$limit = 10;
		$list = array();

		$list = $lgManager->getEventLoglist($member_id ,$limit ,@$offset);
		$list2 = $infoManager->getWallByOther($member_id, $limit);

		$this->af->setApp('list', $list);
		$this->af->setApp('list2', $list2);
		$this->af->setApp('limit', $limit);

		return 'my_event';
	}
}

?>
