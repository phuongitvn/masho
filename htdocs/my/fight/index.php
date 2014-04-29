<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/m/app/M_Controller.php';
$entry_point = array (
    'my_fight_index',
);
M_Controller::main('M_Controller', $entry_point);
?>
