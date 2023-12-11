<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

include_once($rootPath . '/models/facture.php');
include_once($rootPath . '/controllers/factureController.php');
try{
    $id=$_POST['id'];
    $iduser=$_POST['user_id'];
    $datedeb=$_POST['date1'];
    $datefin=$_POST['date2'];
    $type=$_POST['type'];
    $netpaid=$_POST['netpaid'];


    $factctr=new factureController();
    $fact=new facture();
    $fact->setId($id);
    $fact->setIdUser($iduser);
    $fact->setDateEcheance($datedeb);
    $fact->setDateEmission($datefin);
    $fact->settype($type);
    $fact->setNetPayer($netpaid);


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
