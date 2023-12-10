<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

include_once($rootPath . '/models/facture.php');
include_once($rootPath . '/controllers/factureController.php');
try{
    $id=$_POST['id'];
   
    $factr=new factureController();    
    $res=$factr->paiement($id);

   if($res==true)
   {
     header('Location:paiment.php?id='.$id.'&success=1');

   }
   else{
    header('Location:paiment.php?id='.$id.'&error=1');

   }

}catch(Exception $e)
{
    echo "error ".$e->getMessage();
}

?>