<?php
require_once dirname(dirname(dirname(__FILE__))) . '/m/app/M_Controller.php';
$entry_point = array (
    'greeting_hello',
    'greeting_complete',
);
M_Controller::main('M_Controller', $entry_point);
?>
