<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

include_once($rootPath . '/models/facture.php');
include_once($rootPath . '/controllers/factureController.php');
try{
    $iduser=$_POST['user_id'];
    $datedeb=$_POST['date1'];
    $datefin=$_POST['date2'];
    $type=$_POST['type'];

    $factctr=new factureController();
    $fact=new facture();

    $fact->setIdUser($iduser);
    $fact->setDateEcheance($datedeb);
    $fact->setDateEmission($datefin);
    $fact->settype($type);

    $res=$factctr->modif_fact($fact);
    if($res==true)
    {
        header('Location:modifFact.php?id='.$id.'&success=1');

    }else{
        header('Location:modifFact.php?id='.$id.'&success=1');
    }
}catch(Exception $e)
{
    echo "error".$e->getMessage();

}
?>
