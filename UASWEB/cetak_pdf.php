<?php
require('fpdf/fpdf.php');
require_once "config.php";

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Laporan Klasemen UEFA 2024', 0, 1, 'C');
        $this->Ln(10);
    }

    function BasicTable($header, $data)
    {
        foreach ($header as $col) {
            $this->Cell(40, 7, $col, 1);
        }
        $this->Ln();
        foreach ($data as $row) {
            foreach ($row as $col) {
                $this->Cell(40, 6, $col, 1);
            }
            $this->Ln();
        }
    }
}

$pdf = new PDF();
$header = array('Group', 'Negara', 'Menang', 'Seri', 'Kalah', 'Poin');
$data = [];

$sql = "SELECT * FROM klasemen";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = array($row['group_name'], $row['country_name'], $row['wins'], $row['draws'], $row['losses'], $row['points']);
    }
}

$pdf->AddPage();
$pdf->BasicTable($header, $data);
$pdf->Output();
?>
