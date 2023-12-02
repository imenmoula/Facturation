<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

include_once($rootPath . '/models/User.php');
include_once($rootPath . '/controllers/UserController.php');
$userctr=new UserController();
$userctr->delete($_GET['id']);


?>