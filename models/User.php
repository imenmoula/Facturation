<?php


$rootPath = $_SERVER['DOCUMENT_ROOT'].'/Facturation/';


include_once($rootPath.'/config/config.php');

class User extends config {
    Public $id;
    Public $name;
    Public $email;
    Public $password;
    Public $is_admin;
    Public $adresse;
    Public $phone;
    Public $rib;
    Public $cin;
    Public $ville;

 
    function __construct(){ 
        parent::__construct();
     }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getIsAdmin() {
        return $this->is_admin;
    }

    public function setIsAdmin($isAdmin) {
        $this->is_admin = $isAdmin;
    }

    public function getAddress() {
        return $this->adresse;
    }

    public function setAddress($adresse) {
        $this->adresse = $adresse;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getRib() {
        return $this->rib;
    }

    public function setRib($rib) {
        $this->rib = $rib;
    }

    public function getCin() {
        return $this->cin;
    }

    public function setCin($cin) {
        $this->cin = $cin;
    }

    public function getCity() {
        return $this->ville;
    }

    public function setCity($ville) {
        $this->ville= $ville;
    }
}
