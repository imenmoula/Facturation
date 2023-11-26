<?php


// Obtenez le chemin absolu de la racine du serveur
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

include_once($rootPath . '/models/User.php');
include_once($rootPath . '/controllers/UserController.php');
try {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confpass = $_POST['confirm_password'];
    $adresse = $_POST['adresse'];
    $phone = $_POST['phone'];
    $rib = $_POST['rib'];
    $cin = $_POST['cin'];
    $ville = $_POST['ville'];
  

    $user = new User();
    $user->setName($name);
    $user->setEmail($email);
    $user->setPassword($password);
    $user->setAddress($adresse);
    $user->setPhone($phone);
    $user->setRib($rib);
    $user->setCin($cin);
    $user->setCity($ville);
    $UserCtr = new UserController();
    $res = $UserCtr->insert($user);
    if ($res == true) {
        echo "succe";
    } else {
        echo "error";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    header('Location:index.php');
}
