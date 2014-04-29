<?php
class M_Form_LoginIndex extends M_ActionForm {
	var $form = array(
		'id' => array(
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
			'name' => 'ID'
		),
		'pwd' => array(
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_PASSWORD,
			'name' => 'ID'
		),
		'btn' => array(
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
			'name' => 'BTN'
		),
	);
}

/**
 *  login_index action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_LoginIndex extends M_ActionClass
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
		$domain = $this->config->get('url');
		$this->af->setApp('domain' ,$domain);
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
		$pwd = $this->af->get('pwd');
		$id = $this->af->get('id');
		$btn = $this->af->get('btn');
		$userManager = $this->backend->getManager('User');
		//$can_not_signup = TRUE;//$userManager->countUser() > 5649;
		$can_not_signup = FALSE;

		if (! empty($btn)) {
			if (empty($id)) {
				$this->ae->addObject(
					'id',
					Ethna::raiseNotice('Vui lòng điền tên đăng nhập')
				);
			}
			if (empty($pwd)) {
				$this->ae->addObject(
					'pwd',
					Ethna::raiseNotice('Vui lòng nhập mật khẩu')
				);
			}
			if (! empty($id) && ! empty($pwd)) {
				$login_success = $userManager->login($id, $pwd);
				if (! Ethna::isError($login_success)) {
					$url = $this->config->get('url');
					header('Location: http://'.$url['www'].'?'.session_name().'='.session_id());
					exit();
				}
				if ($login_success->code == E_LOGIN_PASSWORD_ERROR) {
					$this->ae->addObject('pwd', $login_success);
				} else {
					if (! $can_not_signup) {
						$moba = $this->backend->getManager('Moba');
						$moba->init('linhtrieu', 'tyeskuateaktnvt8yDkjtE');
						$moba_user = $moba->login($id, $pwd);
						if ($moba_user) {
							$userManager->regist1st(
								$id,
								$pwd,
								$moba_user['tel'],
								$moba_user['email'],
								TRUE
							);
						} else {
							$this->ae->addObject('id', $login_success);
						}
					}
				}
			}
			$this->af->setApp('id', $id);
		}

		$ran = mt_rand(1,4);
		$this->af->setApp("ran", $ran);
		$st = "my";
		$this->af->setApp("st", $st);
		return 'login_index';
	}
}

?>