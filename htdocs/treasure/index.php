<?php
require_once dirname(dirname(dirname(__FILE__))) . '/m/app/M_Controller.php';
$entry_point = array (
    'treasure_index',
    'treasure_confirm',
    'treasure_complete',
);
M_Controller::main('M_Controller', $entry_point);
?>
