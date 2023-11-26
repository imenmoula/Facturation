<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

include_once($rootPath . '/models/User.php');
include_once($rootPath . '/controllers/UserController.php');
try {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = new User();
    $user->setPassword($password);
    $user->setEmail($username);
    $userCtr = new UserController();
    $res = $userCtr->connexion($user);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    header('Location:index.php');
}
