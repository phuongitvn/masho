<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/m/app/M_Controller.php';
$entry_point = array (
    'friend_apply_index',
    'friend_apply_complete',
);
M_Controller::main('M_Controller', $entry_point);
?>