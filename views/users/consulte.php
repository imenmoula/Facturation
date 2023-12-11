<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';
include_once($rootPath . '/models/User.php');
include_once($rootPath . '/controllers/UserController.php');
include_once($rootPath.'/views/users/users.php');
try{
$userctr=new UserController();
$result=$userctr->getUser($id);
if ($result == true) {
    echo "succe";
} 
else
{
    echo "error";
}
} catch (Exception $e) {
echo "Error: " . $e->getMessage();
header('Location:index.php');
}

?>