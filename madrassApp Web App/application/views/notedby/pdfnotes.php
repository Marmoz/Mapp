<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Chargement des données
function LoadData($file)
{
    // Lecture des lignes du fichier
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

// Tableau simple
function BasicTable($header, $data)
{
    // En-tête
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Données
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}



}

$pdf = new PDF();
// Titres des colonnes
$header = array('Matiere', 'Note_S1', 'Note_S2', 'Note_Finale','Enseignant');
// Chargement des données
$data = $pdf->LoadData('monbulletin.txt');
$pdf->SetFont('Arial','',12);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->Output();
?>



