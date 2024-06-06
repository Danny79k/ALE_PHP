<?php
$conn = new mysqli("localhost", "root", "7997", "social");
$cons_usu_print = "select * from usuario limit 5";
$ex_cons = $conn->query($cons_usu_print);
ob_start();
require ("fpdf186/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
while ($registro = $ex_cons->fetch_assoc()) {
    $nombre_usu = $registro["usuario"];
    $id_usu = $registro["id"];
    $pdf->MultiCell(40, 10, $nombre_usu);
    $pdf->Output();
}
    ob_end_flush();