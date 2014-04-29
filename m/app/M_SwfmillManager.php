<?php
class M_SwfmillManager extends M_Manager {
	var $lnkUrl = '';
	var $flash_name = '';
	var $params = array();
	function getXml($a, $b) {
		return $b;
	}
	function compileXml($a, $b) {
		$domain = $this->config->get("url");
		$www = $domain['www'];
		$API = $domain['api'];
		$appId = $domain['appId'];
		foreach ($b as $k => $v) {
			if ($k == 'lnkUrl') {
				$this->lnkUrl = str_replace(
					'http://' . $API . "/" . $appId ,
					'/',
					$v
				);
				if (session_id()) {
					$this->lnkUrl .= (stripos($this->lnkUrl, '%3f') !== FALSE ? '%26' : '%3f')
						.session_name().'='.session_id();
				}
			} else {
				$this->$k = $v;
			}
		}
		$this->flash_name = $a;
		return '';
	}
	function executeSwfmill($a) {
		$head = '<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
<title>flash</title>
</head>
<body style="background-color:#000000;color:#ffffff">';

		$gacha_flash = array(
			'gacha3.xml',
			'gacha2.xml',
			'gacha0.xml',
			'gacha.xml',
		);
		$body = $this->flash_name.'<a href="'.$this->lnkUrl.'">Tiếp</a>';

		$url = 'urls='.rawurlencode($this->lnkUrl);
		if ($this->flash_name == 'clear.xml' || $this->flash_name == 'masho.xml') {
			$body = '<div><embed src="/img/swf/questclear.swf?'.$url.'" quality="high" bgcolor="#000000" width="100%" name="mashola1-4" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></div>'
			;
		} else if ($this->flash_name == 'stage.xml') {
			$body = '<div><embed src="/img/swf/stage.swf?'.$url.'" quality="high" bgcolor="#000000" width="100%" name="mashola1-4" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></div>'
			;
		} else if ($this->flash_name == 'level.xml' || $this->flash_name == 'level2.xml') {
			$body = '<div><embed src="/img/swf/levelup.swf?'.$url.'" quality="high" bgcolor="#000000" width="100%" height="100%" name="mashola1-4" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></div>'
			;
		} else if ($this->flash_name == 'tutorial.xml') {
			header('Location: /my/index?'.session_name().'='.session_id());
			exit;
		} else if ($this->flash_name == 'fight.xml') {
			$p = array();
			foreach ($this->boss_params as $k => $v) {
				$p[] = $k.'='.$v;
			}
			$swf = '/img/swf/fight.swf?'.$url.'&'.implode('&',$p);
			$body = '<div><embed src="'.$swf.'" quality="high" bgcolor="#000000" width="100%" height="100%" name="mashola1-4" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></div>'
			;
		} else if ($this->flash_name == 'composition.xml' || $this->flash_name == 'composition2.xml') {
			$body = '<div><embed src="/img/swf/merge.swf?'.$url.'&img1=/img/card/'.$this->params['img1'].'_p.jpg&img2=/img/card/'.$this->params['img2'].'_p.jpg&img3=/img/card/'.$this->params['img3'].'_p.jpg" quality="high" bgcolor="#000000" width="100%" height="100%" name="mashola1-4" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></div>'
			;
		} else if (in_array($this->flash_name, $gacha_flash, TRUE)) {
			$body = '<div><embed src="/img/swf/cardget_u.swf?'.$url.'" quality="high" bgcolor="#000000" width="100%" height="100%" name="mashola1-4" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></div>'
			;
		} else if ($this->flash_name == 'boss.xml') {
			$p = array();
			foreach ($this->boss_params as $k => $v) {
				$p[] = $k.'='.$v;
			}
			$swf = '/img/swf/boss.swf?'.$url.'&'.implode('&',$p);
			$body = '<div><embed src="'.$swf.'"quality="high" bgcolor="#000000" width="100%" height="100%" name="mashola1-4" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></div>'
			;
			return $body;
		}
		$foot = '<div><a href="'.$this->lnkUrl.'">Tiếp</a></div></body></html>';
		die($head.$body.$foot);
	}
}
