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
        // Ajouter le titre de la facture
        $factctr=new factureController();
        $res=$factctr->getFacture($id);
       // $pdf->Cell(0, 10, 'Facture', 0, 1, 'C');
       // Add a Unicode font (uses UTF-8)


 
        //Logo

        //Adresse
        $pdf->SetFont('Arial','B',16);
        $pdf->SetFont('Arial','',12);
        $pdf->SetTextColor(0,0,0);
        $pdf->MultiCell(50,5,"Socitéte Tunisienne de l'Electricite",0,'L',false);
     
        //Informations Facture
        $pdf->SetXY(60,30);
        $pdf->SetFillColor(200,200,200);
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(140,6,"FACTURE",1,2,'C',true);
        $pdf->SetFont('Arial','',12);
        $pdf->SetXY(60,38);
        $pdf->MultiCell(130,5,"Facture Num : ". $res['id']."\nDate de commande : ".date("m.d.y")."\nEtat: " . (($res['paid'] == 1) ? 'Payer' : 'Non Payer')."\nMode de paiement : Carte Bancaire",'','L',false);
     
        //Adresse de Facturation
        $pdf->Cell(0,10,"Au ".$res['dateecheance']."DU ".$res['dateecheance'],0,1);
     
        //Adresse de livraison
        $pdf->Cell(0, 10, 'Telephone: '.$res['phone'] , 0, 1);
        $pdf->Cell(0, 10, 'name: '.$res['name'] , 0, 1);
        $pdf->Cell(0, 10, 'Net à payer : ' . $res['net_paye'] .' DT', 0, 1);
        $pdf->Cell(0, 10, 'Date de facturation: '.$res['datepaid'] , 0, 1);
        $pdf->Cell(0, 10, 'type: '.$res['type'] , 0, 1);
     
        





        $pdf->Output();
        

        // Récupérer les détails de la facture depuis la base de données en fonction de $id_facture


        /*if($facture) {
            // Création d'une nouvelle instance TCPDF

            // Instantiate and use the FPDF class  
                $pdf = new FPDF(); 
                
                //Add a new page 
                $pdf->AddPage(); 

            // Début du contenu du PDF
            $html = '<h1>Facture</h1>';
            $html .= '<p>ID: ' . $facture['id'] . '</p>';
            $html .= '<p>Type: ' . $facture['type'] . '</p>';
            // Ajoutez d'autres détails de la facture ici...

            // Sortie du contenu HTML dans le PDF
            $pdf->writeHTML($html, true, false, true, false, '');

            // Fin du document PDF et génération du fichier
            $pdf->Output('facture_'.$id_facture.'.pdf', 'D');
            exit;
        } else {
            echo "Facture non trouvée";
        }*/
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
    }
} else {
    echo "ID de facture non spécifié";
}
?>