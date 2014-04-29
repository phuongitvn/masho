<?php
require_once dirname(dirname(dirname(__FILE__))) . '/m/app/M_Controller.php';
$entry_point = array (
    'boss_index',
    'boss_fight',
    'boss_result',
    'boss_talk1',
    'boss_talk2',
    'boss_card',
);
M_Controller::main('M_Controller', $entry_point);
?>
