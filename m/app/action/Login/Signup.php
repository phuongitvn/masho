<?php
/**
 *  Login/Signup.php
 *
 *  @author	 {$author}
 *  @package	M
 *  @version	$Id$
 */

/**
 *  login_signup Form implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Form_LoginSignup extends M_ActionForm
{
	/**
	 *  @access private
	 *  @var	array   form definition.
	 */
	var $form = array(
		'id' => array(
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
			'name' => 'ID'
		),
		'pwd' => array(
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_PASSWORD,
			'name' => 'PWD'
		),
		'pwd2' => array(
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_PASSWORD,
			'name' => 'PWD2'
		),
		'email' => array(
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
			'name' => 'EMAIL'
		),
		'tel' => array(
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
			'name' => 'TEL'
		),
		'btn' => array(
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_TEXT,
			'name' => 'BTN'
		),
		'accept' => array(
			'type' => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_CHECKBOX,
			'name' => 'accept'
		),
		'code' => array()
	);

	/**
	 *  Form input value convert filter : sample
	 *
	 *  @access protected
	 *  @param  mixed   $value  Form Input Value
	 *  @return mixed		   Converted result.
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
 *  login_signup action implementation.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Action_LoginSignup extends M_ActionClass
{
	/**
	 *  preprocess of login_signup Action.
	 *
	 *  @access public
	 *  @return string	forward name(null: success.
	 *								false: in case you want to exit.)
	 */
	function prepare()
	{
		$domain = $this->config->get("url");
		$this->af->setApp('domain' ,$domain);
		return null;
	}

	/**
	 *  login_signup action implementation.
	 *
	 *  @access public
	 *  @return string  forward name.
	 */
	function perform() {
		$btn = $this->af->get('btn');
		$userManager = $this->backend->getManager('User');
		$friendManager = $this->backend->getManager('Friend');
		$can_not_signup = FALSE;

		$code = $this->af->get('code');
		if (! empty($code)) {
			$code_tel = $friendManager->getTelByCode($code);
			if ($tel !== FALSE) {
				$this->af->setApp('tel', $code_tel);
				$this->af->setApp('code', $code);
			}
		}

		if (! empty($btn)) {
			if ($can_not_signup) {
				return 'login_signup';
			}

			$id = $this->af->get('id');
			$pwd = $this->af->get('pwd');
			$pwd2 = $this->af->get('pwd2');
			$email = $this->af->get('email');
			$tel = $this->af->get('tel');
			$accept = $this->af->get('accept');
			//TODO: move to validation
			if (empty($id)) {
				$this->ae->addObject(
					'id',
					Ethna::raiseNotice('Vui lòng điền tên đăng nhập')
				);
			} else if (! $this->_isValidUserName($id)) {
				$this->ae->addObject(
					'id',
					Ethna::raiseNotice('Tên đăng nhập không đúng. Vui lòng xem hướng dẫn chi tiết')
				);
			}

			if (empty($pwd)) {
				$this->ae->addObject(
					'pwd',
					Ethna::raiseNotice('Vui lòng nhập mật khẩu')
				);
			} else if (! $this->_isValidPassword($pwd)) {
				$this->ae->addObject(
					'pwd',
					Ethna::raiseNotice('Vui lòng nhập mật khẩu')
				);
			}

			if (empty($email)) {
				$this->ae->addObject(
					'email',
					Ethna::raiseNotice('Vui lòng nhập địa chỉ email')
				);
			} else if (Ethna_Util::checkMailAddress($email) === FALSE) {
				$this->ae->addObject(
					'email',
					Ethna::raiseNotice('Địa chỉ email không đúng. Vui lòng xem hướng dẫn chi tiết')
				);
			}

			if (empty($tel)) {
				$this->ae->addObject(
					'tel',
					Ethna::raiseNotice('Vui lòng nhập số điện thoại')
				);
			} else if (! $this->_isValidTel($tel)) {
				$this->ae->addObject(
					'tel',
					Ethna::raiseNotice('Số điện thoại không đúng. Vui lòng xem hướng dẫn chi tiết')
				);
			}

			if ($pwd != $pwd2) {
				$this->ae->addObject(
					'pwd',
					Ethna::raiseNotice('Nhập lại mật khẩu không đúng. Xin vui lòng thao tác lại')
				);
			}
			if (empty($accept)) {
				$this->ae->addObject(
					'accept',
					Ethna::raiseNotice('Bạn chưa đồng ý với Điều khoản sử dụng của Linh Triều Bình Ca')
				);
			}

			if ($this->ae->count() == 0) {
				$mobaManager = $this->backend->getManager('Moba');
				$mobaManager->init('linhtrieu', 'tyeskuateaktnvt8yDkjtE');
				//$moba_ret = $mobaManager->check_signup($id, $pwd, $tel, $email);
				$moba_ret['ret'] = 'success';
				if (empty($moba_ret['ret'])) {
					switch ($moba_ret['reason']['code']) {
						case 3:	// exists id
							$this->ae->addObject(
								'id',
								Ethna::raiseNotice('Tên đăng nhập này đã tồn tại. Xin vui lòng chọn tên đăng nhập khác')
							);
							break;
						case 4:	// exists email
							$this->ae->addObject(
								'email',
								Ethna::raiseNotice('Địa chỉ email này đã tồn tại. Xin vui lòng chọn địa chỉ email khác')
							);
							break;
						case 20:	// exists tel
							$this->ae->addObject(
								'tel',
								Ethna::raiseNotice('Số điện thoại này đã tồn tại. Xin vui lòng chọn số điện thoại khác')
							);
							break;
						default:
					}
				} else {
					if (! empty($code)) {
						if ($code_tel != $tel) {
							$code = '';
						}
					}
					$userManager->regist1st(
						$id,
						$pwd,
						$tel,
						$email,
						FALSE,
						$code
					);
				}
			}
			$this->af->setApp('id', $id);
			$this->af->setApp('email', $email);
			$this->af->setApp('tel', $tel);
			$this->af->setApp('accept', $accept);
		}

		$this->af->setApp('can_not_signup', $can_not_signup);
		$ran = mt_rand(1,4);
		$this->af->setApp("ran", $ran);
		$st = "my";
		$this->af->setApp("st", $st);
		return 'login_signup';
	}

	function _isValidTel($tel) {
		$p1 = '/^01[2689][0-9]{8}$/';
		$p2 = '/^09[0-9]{8}$/';
		return (preg_match($p1, $tel) || preg_match($p2, $tel));
	}

	function _isValidPassword($pwd) {
		return preg_match('/^[a-zA-Z0-9_]{4,16}$/', $pwd);
	}

	function _isValidUserName($id) {
		return preg_match('/^[a-zA-Z][a-zA-Z0-9_]{3,15}$/', $id);
	}
}

?>
