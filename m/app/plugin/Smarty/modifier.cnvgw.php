<?php
/*
 */

function smarty_modifier_cnvgw($url)
{
/*
	$result  = "http://umahan.dev/gw.php";
	$result .= "?url=" .urlencode("http://umahan.dev" .$url);
*/
	$c =& M_Controller::getInstance();
	$config =& $c->getConfig();

	$result  = $config->get('mixi_link');
//	$result .= urlencode("http://umahan.dev" .$url);
	$domain  = $config->get('url');

	//index.php‚ð•t‰Á
	if(strpos($url ,'.php') === False){
		$pos = strpos($url ,'?');

		if($pos === FALSE ){
			$url .= "index.php";
		}else{
			$url = substr($url,0,$pos) ."index.php" .substr($url,$pos);
		}
	}

	$result .= urlencode("http://" .$domain['www'] .$url);

	if (session_id()) {
		if (strpos($url, '?') !== FALSE) {
			$result .= '%26'.session_name().'='.session_id();
		} else {
			$result .= '%3f'.session_name().'='.session_id();
		}
	}

	return $result;
}
?>