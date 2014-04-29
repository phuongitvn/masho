<?php
class M_Backend extends Ethna_Backend
{
	var $useragent;

	function M_Backend(&$controller)
	{
		parent::Ethna_Backend($controller);

		$this->useragent = New UserAgent;

		$user_agent = @$_SERVER['HTTP_USER_AGENT'];
		/*
		$remote_ip = @$_SERVER['REMOTE_ADDR'];
		$company_ipaddresses = array('118.70.67.78', '183.91.3.139');
		if (in_array(
			$remote_ip,
			$company_ipaddresses,
			TRUE
		) === FALSE) {
			header('Location: /maintain.html');
			die;
		}
		*/

		$carrierNo = $this->useragent->getAgentType();
		if($carrierNo == USER_AGENT_DOCOMO || $carrierNo == USER_AGENT_AU){
			header("Content-Type: application/xhtml+xml");
		}
		//only mobile device
		/*if (! $this->deviceDetect()) {
			header('Location: /error.html');
			die;
		}*/
		
		if ($controller->action == 'boss_fight') {
			// the temporary
		} else {
			header("Cache-Control: no-cache");
		}
/*
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
*/
	}

	function deviceDetect() {
		$user_agent = @$_SERVER['HTTP_USER_AGENT'];
		$remote_ip = @$_SERVER['REMOTE_ADDR'];
		$company_ipaddresses = array('118.70.67.78', '183.91.3.139');
		if (preg_match('/nokia(.*?)\//i',$user_agent,$matches)) {
			return TRUE;
		} else if (preg_match('/(mot-|MOTOROKR)(.*?)\//i',$user_agent,$matches)) {
			return TRUE;
		} else if (preg_match('/(samsung-|sec-)(.*?)\//i',$user_agent,$matches)) {
			return TRUE;
		} else if (preg_match('/(sonyericsson)(.*?)\//i',$user_agent,$matches)) {
			return TRUE;
		} else if (preg_match('/(lg-)(.*?)\//i',$user_agent,$matches)) {
			return TRUE;
		} else if (preg_match('/(MAUI\s)(.*)/i', $user_agent, $matches)) {
			return TRUE;
		} else if (stripos($user_agent, 'Mobile Safari') !== FALSE) {
			return TRUE;
		} else if (stripos($user_agent, 'iPhone') !== FALSE) {
			return TRUE;
		} else if (stripos($user_agent, 'iPod;') !== FALSE) {
			return TRUE;
		} else if (stripos($user_agent, 'PDA;') !== FALSE) {
			return TRUE;
		} else if (stripos($user_agent, 'Opera Mini') !== FALSE) {
			return TRUE;
		}
		return in_array(
			$remote_ip,
			$company_ipaddresses,
			TRUE
		);
	}

	function _dump($v, $lv=0) {
		foreach ($v as $k=>$v2) {
			if (is_array($v2)) {
				echo $this->_t($lv).$k."\n";
				if ($lv < 3)
					$this->_dump($v2, $lv+1);
			} else {
				echo $this->_t($lv).$k.':'.$v2."\n";
			}
		}
	}
	function _t($lv) {
		$ret = '';
		for ($i=0; $i<$lv; $i++) {
			$ret .= "\t";
		}
		return $ret;
	}
}
// }}}
?>
