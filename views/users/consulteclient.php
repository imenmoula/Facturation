<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';
include_once($rootPath . '/config/config.php');
include_once($rootPath . '/models/facture.php');
include_once($rootPath . '/controllers/factureController.php');
ob_end_clean();
require($rootPath .'fpdf/fpdf.php');


// Vérifier si l'ID de la facture est spécifié dans l'URL
if (isset($_GET['id'])) {
    $id_facture = $_GET['id'];


    try {



        $pdf=new FPDF();
        $pdf->Open();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        // Ajouter le titre de la facture
$pdf->Cell(0, 10, 'Facture', 0, 1, 'C');

// Ajouter les informations de la facture
$id_facture = 1; // Remplacez ceci par l'ID de votre facture récupéré depuis votre base de données
$montant = 100; // Exemple de montant pour la facture
$date_facturation = '2023-12-31'; // Exemple de date de facturation

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'ID Facture: ' . $id_facture, 0, 1);
$pdf->Cell(0, 10, 'Montant: $' . $montant, 0, 1);
$pdf->Cell(0, 10, 'Date de facturation: ' . $date_facturation, 0, 1);



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
