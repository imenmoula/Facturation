<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

include_once($rootPath . '/models/User.php');
include_once($rootPath . '/controllers/UserController.php');
try{
$userctr=new UserController();
$res=$userctr->delete($_GET['id']);
if($res==true)
{
    header('Location: users.php?success=1');

}else{
    header('Location: users.php?success=1');
}

}catch(Exception $e)
{
    echo "error".$e->getMessage();
}


?>