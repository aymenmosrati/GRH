<?php
require('fpdf/fpdf.php');
require_once('../Employe.php');
require_once('../Fiche.php');
$Employe = new Employe();
$fiche = new Fiche();
$vid = $_REQUEST['dd'];

class PDF extends FPDF
{
    // En-tête
    function Header()
    {
        // Police Arial gras 15
        $this->SetFont('Arial', 'B', 15);
        // Décalage à droite
        $this->Cell(70);
        // Titre
        $this->Cell(50, 10, 'Fiche de paie', 1, 0, 'C');
        // Saut de ligne
        $this->Ln(50);
    }
    // Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial', 'I', 8);
        // Numéro de page
        $this->Cell(0, 10, utf8_decode('Page ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
// Instanciation de la classe dérivée


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('', 'I', 10);

$stmt = $Employe->edit($vid);
$pdf->Cell(63, 7, 'Nom :   ' . $stmt[1], 1, 0, '', 0);
$pdf->Cell(63, 7, 'Prenom :   ' . $stmt[2], 1, 0, '', 0);
$pdf->Cell(63, 7, 'Situation Familliale  :  ' . $stmt[6], 1, 1, '', 0);
$pdf->Cell(63, 7, 'Departement  :  ' . $stmt[17], 1, 0, '', 0);
$pdf->Cell(63, 7, 'Post  :  ' . $stmt[16], 1, 0, '', 0);
$pdf->Cell(63, 7, 'Nombre enfants  :  ' . $stmt[8], 1, 0, '', 0);

$pdf->Ln(15);

$res = $fiche->select();
$pdf->Cell(0, 7, "Salaire  :                                      " . $stmt[24], 0, 1, 'LR', 0);
$pdf->Cell(0, 7, "Prime  :                                        " . $stmt[26], 0, 1, 'LR', 0);
$pdf->Cell(0, 7, "IRPP  :                                         " . $res[7], 0, 1, 'LR', 0);
$pdf->Cell(0, 7, "Avances  :                                      " . $res[3], 0, 1, 'LR', 0);
$pdf->Cell(0, 7, "Jours feries  :                                 " . $res[2], 0, 1, 'LR', 0);
$pdf->Cell(0, 7, 'Total a paye  :                                 ' . $res['Net'], 0, 1, 'LR', 0);
$pdf->Output();

?>