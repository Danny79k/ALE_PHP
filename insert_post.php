<?php
session_start();

$conn = new mysqli("localhost", "root", "7997", "social");

if (isset($_FILES["imagen"]) && $_FILES["imagen"]["type"] == "image/jpeg" || $_FILES["imagen"]["type"] == "image/jpg" || $_FILES["imagen"]["type"] == "image/png") {

    $contenido = $_POST["contenido"];
    $imagen = $_FILES["imagen"];
    $imagen_tmp = $imagen["tmp_name"];
    $imagen_nombre = $imagen["name"];
    $rnd_numero = random_int(1,10000000);
    $nuevo_imagen_nombre = "$rnd_numero-$imagen_nombre";
    $id = $_SESSION["id"];
    move_uploaded_file($imagen_tmp, "upload/" . $nuevo_imagen_nombre);
    $nueva_imagen = 'upload/' . $nuevo_imagen_nombre;
    echo "insert into publicaciones (contenido, imagen, id_usuario) values ('$contenido', '$nueva_imagen', $id)";
    $insert_post = "insert into publicaciones (contenido, imagen, id_usuario) values ('$contenido', '$nueva_imagen', $id)";
    $conn->query($insert_post);
    header("location:perfil.php");
    exit();
} else {
    header("location:perfil.php");
}