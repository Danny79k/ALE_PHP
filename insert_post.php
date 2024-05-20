<?php
session_start();

$conn = new mysqli("localhost", "root", "7997", "social");

if (isset($_POST["imagen"]) && $_POST["contenido"] != "") {

    $contenido = $_POST["contenido"];
    $imagen = $_POST["imagen"];
    $id = $_SESSION["id"];
    $insert_post = "insert into publicaciones (contenido, imagen, id_usuario) values ('$contenido', '$imagen', $id)";
    $conn->query($insert_post);
    header("location:perfil.php");
    exit();
} else {
    header("location:perfil.php");
}