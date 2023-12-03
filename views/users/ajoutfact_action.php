<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';
include_once($rootPath . '/config/config.php');
include_once($rootPath . '/models/facture.php');
include_once($rootPath . '/controllers/factureController.php');

try {
   
    $option = $_POST['user_id'] ; 
    $netpaid = $_POST['netpaid'] ;
    $datedeb = $_POST['date1'] ;
    $datefin = $_POST['date2'] ;
    $type = $_POST['type'] ;
    
    
    if ($option !== null && $netpaid !== null && $datedeb !== null && $datefin !== null && $type !== null) {
        $fact = new facture();
        $fact->setIdUser($option);
        $fact->setNetPayer($netpaid);
        $fact->setDateEcheance($datedeb);
        $fact->setDateEmission($datefin);
        $fact->settype($type);

        $factCtr = new factureController();
        $res = $factCtr->insert($fact);
        

        if ($res == true) {
          
            header('Location: ajoutfact.php?success=1');
        } else {
            header('Location: ajoutfact.php?error=1');
        }

    
}
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
    header('Location: ajoutfact.php?error=1');
}
?>

