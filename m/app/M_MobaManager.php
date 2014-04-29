<?php
class M_MobaManager extends M_Manager {
	var $base_url;
	var $id;
	var $key;
	var $_c_res;
	var $_iv;

	function __destruct() {
		mcrypt_module_close($this->_c_res);
	}

	function init($id, $key) {	
		$this->base_url = 'http://www.moba.vn/api/';
		$this->_c_res = mcrypt_module_open(MCRYPT_BLOWFISH, '',  MCRYPT_MODE_CBC, '');
		$iv_length = mcrypt_enc_get_iv_size($this->_c_res);
		$this->_iv = str_pad('', $iv_length, 'mobaMoBaMOBA');

		$this->id = $id;
		$this->key = $key;
	}

	function login($id, $pwd) {
		$data = array(
			'id' => $id,
			'pwd' => $this->_crypt($pwd)
		);
		$url = $this->build_url('login', $data);

		$obj = unserialize(file_get_contents($url));
		if (empty($obj['ret'])) {
			return FALSE;
		}

		return $obj['user'];
	}

	function check_signup($id, $pwd, $tel, $email) {
		$data = array(
			'name' => $id,
			'password' => $this->_crypt($pwd),
			'password_confirm' => $this->_crypt($pwd),
			'gioi_tinh' => '1',
			'birth_day' => '1',
			'birth_month' => '1',
			'birth_year' => '1990',
			'accept' => '1',
			'tel' => $tel,
			'email' => $email
		);
		$url = $this->build_url('check_signup', $data);
		$data = file_get_contents($url);
		return unserialize($data);
	}

	function signup($id, $pwd, $tel, $email) {
		$data = array(
			'name' => $id,
			'password' => $this->_crypt($pwd),
			'password_confirm' => $this->_crypt($pwd),
			'gioi_tinh' => '1',
			'birth_day' => '1',
			'birth_month' => '1',
			'birth_year' => '1990',
			'accept' => '1',
			'tel' => $tel,
			'email' => $email
		);
		$url = $this->build_url('signup', $data);
		$data = file_get_contents($url);
		return unserialize($data);
	}

	function build_url($action, $data) {
		$q = http_build_query(array_merge(
			$data,
			array('pid' => $this->id, 'pkey' => $this->key)	
		));
		return $this->base_url.$action.'?'.$q;
	}

	function _crypt($v) {
		mcrypt_generic_init($this->_c_res, $this->key, $this->_iv);
		$ret = mcrypt_generic($this->_c_res, base64_encode($v));
		mcrypt_generic_deinit($this->_c_res);
		return bin2hex($ret);
	}
}
?>