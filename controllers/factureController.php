<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';
include_once($rootPath . '/config/config.php');
include_once($rootPath . '/models/facture.php');

class factureController extends facture{
    function __construct()
  {
    parent::__construct();
  }
  /*********ajout ********** */
  function insert(facture $f)
  {
    try{
        $query="insert into invoices (iduser,net_paye,dateecheance,dateemission,type)values(?,?,?,?,?)";
        $res=$this->pdo->prepare($query);
        $arry=array($f->getIdUser(),$f->getNetPayer(),$f->getDateEcheance(),$f->getDateEmission(),$f->gettype());
        return $res->execute($arry);
        
    }catch(Exception $e)
    {
        echo "error".$e;
        header('location :home.php');
    }
  }
// public function insertInvoice($f)
// {
//     try {
//         // Vérification si les méthodes existent avant de les utiliser
//         if (
//             method_exists($f, 'getNetPayer') &&
//             method_exists($f, 'getDateEcheance') &&
//             method_exists($f, 'getDateEmission') &&
//             method_exists($f, 'getDatePaid') &&
//             method_exists($f, 'getType') &&
//             method_exists($f, 'getIdUser')
//         ) {
//             // Requête SQL pour l'insertion d'une facture en utilisant iduser comme clé étrangère
//             $query = "INSERT INTO invoices (iduser,net_paye, dateecheance, dateemission, datepaid, type) VALUES (?, ?, ?, ?, ?, ?)";
            
//             // Préparation de la requête
//             $res = $this->pdo->prepare($query);

//             // Récupération des valeurs de l'objet Facture ($f)
//             $iduser = $f->getIdUser();
//             $net_payer = $f->getNetPayer();
//             $dateecheance = $f->getDateEcheance();
//             $dateemission = $f->getDateEmission();
//             $datepaid = $f->getDatePaid();
//             $type = $f->getType();

//             // Liaison des valeurs avec la requête préparée
//             $res->bindParam(1, $iduser);
//             $res->bindParam(2, $net_payer);
//             $res->bindParam(3, $dateecheance);
//             $res->bindParam(4, $dateemission);
//             $res->bindParam(5, $datepaid);
//             $res->bindParam(6, $type);

//             // Exécution de la requête
//             $res->execute();

//             // Redirection après l'insertion réussie
//             header('Location: index.php');
//             exit(); // Assure que le script se termine après la redirection
//         } else {
//             echo "Méthodes manquantes dans l'objet Facture.";
//         }
//     } catch (Exception $e) {
//         echo "Erreur : " . $e->getMessage();
//     }
// }

  //**********liste********************* */
  function liste(facture $f)
  {
    $query="select * from invoices";
    $res=$this->pdo->prepare($query);
    $res->execute();
    return $res;
  }

}

?>