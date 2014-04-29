<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/m/app/M_Controller.php';
$entry_point = array (
    'card_wish_index',
    'card_wish_complete',
    'card_wish_cc',
);
M_Controller::main('M_Controller', $entry_point);
?>
