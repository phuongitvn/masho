<?php
error_reporting(E_ALL);
require_once dirname(__FILE__) . '/../app/M_Controller.php';

M_Controller::main('M_Controller', array(
    '__ethna_unittest__',
    )
);
?>
