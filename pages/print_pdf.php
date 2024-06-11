<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"] != "admin") {
    header("location:login.php");
}

$conn = new mysqli("localhost", "root", "7997", "social");
ob_start();
require ("../fpdf186/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$x = 100;
$y = 10;
if (isset($_GET["usu_pdf"])) {
    $cons_print = "select * from usuario";
    $ex_cons = $conn->query($cons_print);
    $pdf->MultiCell($x, $y, "INFO USUARIOS");
    $pdf->MultiCell($x, $y, "----------------------------------------------------");
    while ($registro = $ex_cons->fetch_assoc()) {
        $nombre_usu = $registro["usuario"];
        $correo = $registro["email"];
        $id_usu = $registro["id"];
        $pdf->MultiCell($x, $y, $id_usu);
        $pdf->MultiCell($x, $y, $nombre_usu);
        $pdf->MultiCell($x, $y, $correo);
        $pdf->MultiCell($x, $y, " ");
        $pdf->MultiCell($x, $y, "------------");
        $pdf->MultiCell($x, $y, " ");
    }
}
if (isset($_GET["pub_pdf"])) {
    $cons_print = "select * from publicaciones inner join usuario on publicaciones.id_usuario = usuario.id";
    $ex_cons = $conn->query($cons_print);
    $pdf->MultiCell($x, $y, "INFO PUBLICACIONES");
    $pdf->MultiCell($x, $y, "----------------------------------------------------");
    while ($registro = $ex_cons->fetch_assoc()) {
        $id_publicaciones = $registro["id_publicaciones"];
        $fecha = $registro["fecha"];
        $contenido = $registro["contenido"];
        $imagen = $registro["imagen"];
        $id_usuario = $registro["id"];

        $pdf->MultiCell($x, $y, $id_publicaciones);
        $pdf->MultiCell($x, $y, $fecha);
        $pdf->MultiCell($x, $y, $contenido);
        $pdf->MultiCell($x, $y, $imagen);
        $pdf->MultiCell($x, $y, $id_usuario);
        $pdf->MultiCell($x, $y, " ");
        $pdf->MultiCell($x, $y, "------------");
        $pdf->MultiCell($x, $y, " ");
    }
}
if (isset($_GET["gru_pdf"])) {
    $cons_print = "select * from grupos inner join usuario on grupos.id_usuario_premium = usuario.id";
    $ex_cons = $conn->query($cons_print);
    $pdf->MultiCell($x, $y, "INFO GRUPOS");
    $pdf->MultiCell($x, $y, "----------------------------------------------------");
    while ($registro = $ex_cons->fetch_assoc()) {
        $id_grupo = $registro["id_grupo"];
        $nombre_grupo = $registro["nombre"];
        $descripcion = $registro["descripcion"];
        $imagen = $registro["imagen"];
        $prop_grupo = $registro["usuario"];
        $pdf->MultiCell($x, $y, $id_grupo);
        $pdf->MultiCell($x, $y, $nombre_grupo);
        $pdf->MultiCell($x, $y, ($descripcion == "") ? "N/A" : $descripcion);
        $pdf->MultiCell($x, $y, ($imagen == "") ? "N/A" : $imagen);
        $pdf->MultiCell($x, $y, $prop_grupo);
        $pdf->MultiCell($x, $y, " ");
        $pdf->MultiCell($x, $y, "------------");
        $pdf->MultiCell($x, $y, " ");
    }
}
$pdf->Output();
ob_end_flush();