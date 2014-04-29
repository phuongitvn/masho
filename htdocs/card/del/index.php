<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/m/app/M_Controller.php';
$entry_point = array (
    'card_del_index',
    'card_del_complete',
);
M_Controller::main('M_Controller', $entry_point);
?>
