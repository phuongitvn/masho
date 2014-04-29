<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/m/app/M_Controller.php';
$entry_point = array (
    'item_tut_index',
    'item_tut_complete',
);
M_Controller::main('M_Controller', $entry_point);
?>
