<?php
/**
 *  M_Controller.php
 *
 *  @author	 {$author}
 *  @package	M
 *  @version	$Id$
 */

/** Application base directory */
define('BASE', dirname(dirname(__FILE__)));

/** include_path setting (adding "/app" and "/lib" directory to include_path) */
$app = BASE . "/app";
$lib = BASE . "/lib";
set_include_path(implode(PATH_SEPARATOR, array($app, $lib)) . PATH_SEPARATOR . get_include_path());

/** including application library. */
require_once 'Ethna/Ethna.php';
require_once 'M_Error.php';
require_once 'M_ActionClass.php';
require_once 'M_ActionForm.php';
require_once 'M_ViewClass.php';
/* ADD viola */
require_once 'M_Backend.php';
require_once 'M_Manager.php';
//require_once('Ethna/class/DB/Ethna_DB_ADOdb.php');
require_once('M_DB_ADOdb.php');
include_once('classes/UserAgent.class.php');

include_once( dirname(dirname(dirname(__FILE__))) .'/inc/Util.class.php');
include_once( dirname(dirname(dirname(__FILE__))) .'/inc/Crypt.class.php');
require_once( dirname(dirname(dirname(__FILE__))) .'/oauth/gree.php');

/* ADD viola */ /*
require_once( dirname(dirname(dirname(__FILE__))) .'/inc/comvar.php');
*//* ADD viola */

/**
 *  M application Controller definition.
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	M
 */
class M_Controller extends Ethna_Controller
{
	/**#@+
	 *  @access private
	 */

	/**
	 *  @var	string  Application ID(appid)
	 */
	var $appid = 'M';

	/**
	 *  @var	array   forward definition.
	 */
	var $forward = array(
		/*
		 *  TODO: write forward definition here.
		 *
		 *  Example:
		 *
		 *  'index'		 => array(
		 *	  'view_name' => 'M_View_Index',
		 *  ),
		 */
	);

	/**
	 *  @var	array   action definition.
	 */
	var $action = array(
		/*
		 *  TODO: write action definition here.
		 *
		 *  Example:
		 *
		 *  'index'	 => array(
		 *	  'form_name' => 'Sample_Form_SomeAction',
		 *	  'form_path' => 'Some/Action.php',
		 *	  'class_name' => 'Sample_Action_SomeAction',
		 *	  'class_path' => 'Some/Action.php',
		 *  ),
		 */
	);

	/**
	 *  @var	array   SOAP action definition.
	 */
	var $soap_action = array(
		/*
		 *  TODO: write action definition for SOAP application here.
		 *  Example:
		 *
		 *  'sample'			=> array(),
		 */
	);

	/**
	 *  @var	array	   application directory.
	 */
	var $directory = array(
		'action'		=> 'app/action',
		'action_cli'	=> 'app/action_cli',
		'action_xmlrpc' => 'app/action_xmlrpc',
		'app'		   => 'app',
		'plugin'		=> 'app/plugin',
		'bin'		   => 'bin',
		'etc'		   => 'etc',
		'filter'		=> 'app/filter',
		'locale'		=> 'locale',
		'log'		   => 'log',
		'plugins'	   => array('app/plugin/Smarty',),
		'template'	  => 'template',
		'template_c'	=> 'tmp',
		'tmp'		   => 'tmp',
		'view'		  => 'app/view',
		'www'		   => 'www',
		'test'		  => 'app/test',
	);

	/**
	 *  @var	array	   database access definition.
	 */
	var $db = array(
		''			  => DB_TYPE_RW,
		'r'			  => DB_TYPE_RO,
	);

	/**
	 *  @var	array	   extention(.php, etc) configuration.
	 */
	var $ext = array(
		'php'		   => 'php',
		'tpl'		   => 'tpl',
	);

	/**
	 *  @var	array   class definition.
	 */
	var $class = array(
		/*
		 *  TODO: When you override Configuration class, Logger class,
		 *		SQL class, don't forget to change definition as follows!
		 */
		'class'		 => 'Ethna_ClassFactory',
//		'backend'	   => 'Ethna_Backend',
		'backend'	   => 'M_Backend',
		'backend_cli'  => 'M_ClientBackend',
		'config'		=> 'Ethna_Config',
//		'db'			=> 'Ethna_DB_PEAR',
//		'db'			=> 'Ethna_DB_ADOdb',
		'db'			=> 'M_DB_ADOdb',
		'error'		 => 'Ethna_ActionError',
		'form'		  => 'M_ActionForm',
		'i18n'		  => 'M_I18N',
		'logger'		=> 'Ethna_Logger',
		'plugin'		=> 'Ethna_Plugin',
		'session'	   => 'M_Session',
		'sql'		   => 'Ethna_AppSQL',
		'view'		  => 'M_ViewClass',
		'renderer'	  => 'Ethna_Renderer_Smarty',
		'url_handler'   => 'M_UrlHandler',
	);

	/**
	 *  @var	array	   list of application id where Ethna searches plugin.
	 */
	var $plugin_search_appids = array(
		/*
		 *  write list of application id where Ethna searches plugin.
		 *
		 *  Example:
		 *  When there are plugins whose name are like "Common_Plugin_Foo_Bar" in
		 *  application plugin directory, Ethna searches them in the following order.
		 *
		 *  1. Common_Plugin_Foo_Bar,
		 *  2. M_Plugin_Foo_Bar
		 *  3. Ethna_Plugin_Foo_Bar
		 *
		 *  'Common', 'M', 'Ethna',
		 */
		'M', 'Ethna',
	);

	/**
	 *  @var	array	   filter definition.
	 */
	var $filter = array(
		'Moba'
	);
	//var $client_encoding = 'utf-8';

	/**#@-*/

	function _getDefaultLanguage() {
		return array('ja_JP', 'UTF-8', 'UTF-8');
	}

	function _setDefaultTemplateEngine(&$renderer) {
	}

	function &getBackend() {
		if ($this->gateway == GATEWAY_CLI) {
			//return $this->class_factory->getObject('backend_cli');
			require_once('M_ClientBackend.php');
			$this->backend = new M_ClientBackend($this);
			return $this->backend;
		}
		return $this->class_factory->getObject('backend');
	}

	function _getActionName_Form() {
		if (! empty($_REQUEST['act']))
			return $_REQUEST['act'];

		$url = @$_REQUEST['url'];
		if (empty($url))
			return null;

		
		$url_info = parse_url($url);
		$params = explode('&', @$url_info['query']);
		$ret = str_replace('/', '_', substr($url_info['path'], 1, strlen($url_info['path']) - 5));
		$tmp_params = array();
		foreach ($params as $p) {
			if (empty($p))
				continue;
			list($k, $v) = explode('=', @$p);
			$tmp_params[$k] = $v;
		}
		$_GET = $tmp_params;
		return $ret;
	}
	/**#@-*/
}

?>
