<?php
ini_set('display_errors',true);
error_reporting(E_ALL);


require_once('config/dbConnect.php');
require_once('config/routes.php');
require_once('core/Boot.php');
require_once('core/Core.php');
require_once('core/Start.php');
require_once('core/Router.php');




debug_print_backtrace();

$start = new Start();
Start::run();





