<?php
//die('Your request is Invalid!');
if(isset($_GET['mode']) && $_GET['mode']=='dev'){
	ini_set('display_errors', 'On');
}
require_once dirname(dirname(__FILE__)) . '/m/app/M_Controller.php';

M_Controller::main('M_Controller', 'index');
?>
