<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';
include_once($rootPath . '/config/config.php');
include_once($rootPath . '/models/facture.php');
include_once($rootPath . '/controllers/factureController.php');
ob_end_clean();
require($rootPath .'fpdf/fpdf.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    try {



        $pdf=new FPDF();
        $pdf->Open();
        $pdf->AddPage();
        
        $factctr=new factureController();
        $res=$factctr->getFacture($id);
        $pdf->SetFont('Arial','B',16);
        $pdf->SetFont('Arial','',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->MultiCell(50,5,"Socitéte Tunisienne de l'Electricite",0,'L',false);
     
      
        $pdf->SetXY(60,30);
        $pdf->SetFillColor(200,200,200);
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(140,6,"FACTURE",1,2,'C',true);
        $pdf->SetFont('Arial','',12);
        $pdf->SetXY(60,38);
        $pdf->MultiCell(130,5,"Facture Num : ". $res['id']."\nDate de commande : ".date("m.d.y")."\nEtat: " . (($res['paid'] == 1) ? 'Payer' : 'Non Payer')."\nMode de paiement : Carte Bancaire",'','L',false);
     
       
        $pdf->Cell(0,10,"Au ".$res['dateecheance']."DU ".$res['dateecheance'],0,1);
     
       
        $pdf->Cell(0, 10, 'Telephone: '.$res['phone'] , 0, 1);
        $pdf->Cell(0, 10, 'name: '.$res['name'] , 0, 1);
        $pdf->Cell(0, 10, 'Net à payer : ' . $res['net_paye'] .' DT', 0, 1);
        $pdf->Cell(0, 10, 'Date de facturation: '.$res['datepaid'] , 0, 1);
        $pdf->Cell(0, 10, 'type: '.$res['type'] , 0, 1);
     
        $pdf->Output();
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
    }
} else {
    echo "ID de facture non spécifié";
}
?>