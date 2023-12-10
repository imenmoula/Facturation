<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

include_once($rootPath . '/models/User.php');
include_once($rootPath . '/controllers/UserController.php');
try{

    $userctr=new UserController();
    $res=$userctr->deconnexion();
    if($res==true)
   {
     header('Location:index.php?id='.$id.'&success=1');

   }
   else{
    header('Location:index.php?id='.$id.'&error=1');

   }
    
} catch (Exception $e) {
    echo "error";
  }
?>