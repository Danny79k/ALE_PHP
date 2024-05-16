<?php

$conn = new mysqli("localhost", "root", "7997", "social");

if (isset($_POST["imagen"])) {

    $contenido = $_POST["contenido"];
    $imagen = $_POST["imagen"];
    $id = $_GET["id"];
    $id_usuario = trim($_GET["id"],";");
    $insert_post = "insert into publicaciones (contenido, imagen, id_usuario) values ('$contenido', '$imagen', $id_usuario)";
    $conn->query($insert_post);
    header("location:perfil.php?id=$id");
    exit();
}