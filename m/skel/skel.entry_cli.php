<?php
/**
 *  {$action_name}.php
 *
 *  @author     {$author}
 *  @package    M
 *  @version    $Id$
 */
chdir(dirname(__FILE__));
require_once '{$dir_app}/M_Controller.php';

ini_set('max_execution_time', 0);

M_Controller::main_CLI('M_Controller', '{$action_name}');
?>
