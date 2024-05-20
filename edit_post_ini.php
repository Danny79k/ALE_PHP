<?php

session_start();

$conn = new mysqli("localhost", "root", "7997", "social");


$nueva_imagen = $_POST["imagen_edit"];
$nuevo_contenido = $_POST["contenido_edit"];
$id_post = $_GET["post"];

if (isset($_POST["contenido_edit"])){
$update_SQL = $conn -> prepare("update publicaciones set imagen = ? , contenido = ? where id_publicaciones = ?");
$update_SQL -> bind_param("ssi", $nueva_imagen, $nuevo_contenido, $id_post);
$update_SQL -> execute();
header("location:perfil.php");
} else {
    header("location:perfil.php");
}