<?php
/**
 *  Login/Index.php
 *
 *  @author	 {$author}
 *  @package	M
 *  @version	$Id$
 */

/**
 *  login_index Form implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Form_LoginLogout extends M_ActionForm
{
	/**
	 *  @access private
	 *  @var	array   form definition.
	 */
	var $form = array(
	);
}

/**
 *  login_index action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_LoginLogout extends M_ActionClass
{
	/**
	 *  preprocess of login_index Action.
	 *
	 *  @access public
	 *  @return string	forward name(null: success.
	 *								false: in case you want to exit.)
	 */
	function prepare()
	{
		return null;
	}

	/**
	 *  login_index action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform()
	{
		$userManager = $this->backend->getManager("User");
		$login_success = $userManager->logout();
		$url = $this->config->get('url');
		header('Location: http://'.$url['www']);
		exit();
	}
}

?>