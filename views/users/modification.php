<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

include_once($rootPath . '/models/User.php');
include_once($rootPath . '/controllers/UserController.php');
try {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confpass = $_POST['confirm_password'];
    $adresse = $_POST['adresse'];
    $phone = $_POST['phone'];
    $rib = $_POST['rib'];
    $cin = $_POST['cin'];
    $ville = $_POST['ville'];
  

    $userctr=new UserController();
    $user=new User();

    $user->setName($name);
    $user->setEmail($email);
    $user->setPassword($password);
    $user->setAddress($adresse);
    $user->setPhone($phone);
    $user->setRib($rib);
    $user->setCin($cin);
    $user->setCity($ville);
    $user->setId($id);
    //var_dump($user) ;
    $res=$userctr->modifier_user($user);
    
    if($res==true){

       
            header('Location:modif.php?id='.$id.'&success=1');
    
    }
    else{
        header('Location:modif.php?id='.$id.'&error=1');
    }

}catch(Exception $e){
echo 'Error:'.$e->getMessage();

header('Location:users/modif.php');

}
?>