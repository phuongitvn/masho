<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/m/app/M_Controller.php';
$entry_point = array (
    'friend_approve_index',
    'friend_approve_confirm',
    'friend_approve_complete',
);
M_Controller::main('M_Controller', $entry_point);
?>
