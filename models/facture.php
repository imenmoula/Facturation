<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'].'/Facturation/';
include_once($rootPath.'/config/config.php');
class facture extends config{
    public $id;
    public $iduser;
    public $net_payer;
    public $dateecheance;
    public $dateemission;
    public $date_paid;
    public $paid;
    public $type;
    
    function __construct(){ 
        parent::__construct();
    }
    
     // Getters (accesseurs)
        public function getId() {
            return $this->id;
        }
    
        public function getIdUser() {
            return $this->iduser;
        }
    
        public function getNetPayer() {
            return $this->net_payer;
        }
    
        public function getDateEcheance() {
            return $this->dateecheance;
        }
    
        public function getDateEmission() {
            return $this->dateemission;
        }
    
        public function getDatePaid() {
            return $this->date_paid;
        }
    
        public function getPaid() {
            return $this->paid;
        }
    
        // Setters (mutateurs)
        public function setId($id) {
            $this->id = $id;
        }
    
        public function setIdUser($iduser) {
            $this->iduser = $iduser;
        }
    
        public function setNetPayer($net_payer) {
            $this->net_payer = $net_payer;
        }
    
        public function setDateEcheance($dateecheance) {
            $this->dateecheance = $dateecheance;
        }
    
        public function setDateEmission($dateemission) {
            $this->dateemission = $dateemission;
        }
    
        public function setDatePaid($date_paid) {
            $this->date_paid = $date_paid;
        }
    
        public function setPaid($paid) {
            $this->paid = $paid;
        }
        public function gettype()
        {
            return $this->type;
        }
        public function settype($type)
        {
            $this->type= $type;
        }
    }
    
?>