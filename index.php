<?php 
ini_set('display_errors',1);
error_reporting(E_ERROR);
session_start();
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/models/Autoload.php');
$router = new Router();
$router->run();
?>