<?php 

// Obtenez le chemin absolu de la racine du serveur
$rootPath = $_SERVER['DOCUMENT_ROOT'].'/Facturation/';

include_once($rootPath.'/models/User.php');
include_once($rootPath.'/config/config.php');

class UserController extends User {
    function __construct() {
        parent::__construct();
    }
    function insert(User $u){
        try {
        $query="insert into users (name,email, password,adresse,phone,rib,cin,ville) values(?, ?, ?, ?,?,?,?,?)";
        $res=$this->pdo->prepare($query);
        $aryy =array($u->getName(),$u->getEmail(),$u->getPassword(),$u->getAddress(),$u->getPhone(),$u->getRib(), $u->getCin(),$u->getCity()) ;
        //var_dump($aryy);
        return $res->execute($aryy);
    } catch (Exception $e) {
        echo "Error: " . $e;
        header('Location:index.php');
    }
        
        }




}


?>