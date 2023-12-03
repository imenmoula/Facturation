<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';
include_once($rootPath . '/config/config.php');
include_once($rootPath . '/models/facture.php');
include_once($rootPath . '/controllers/factureController.php');
try{
$factCtr=new  factureController();
$res=$factCtr->delete($_GET['id']);
if($res==true)
{
    header('Location: invoice.php?success=1');

}else{
    header('Location: invoice.php?success=1');
}

}catch(Exception $e)
{
echo "error ".$e->getMessage();
}

?>