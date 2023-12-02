<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';
include_once($rootPath . '/models/User.php');
include_once($rootPath . '/controllers/UserController.php');
include_once($rootPath.'/views/users/users.php');
$id=$_POST['search'];
$userctr=new UserController();
$result=$userctr->recherche($id);
if ($result)
{
    echo "recherche avec succe";
}
else{
    echo "error: dans le recherche";
}

?>

