<?php
session_start();

$conn = new mysqli("localhost", "root", "7997", "social");

if (isset($_FILES["imagen_grupo"]) && $_FILES["imagen_grupo"]["type"] == "image/jpeg" || $_FILES["imagen_grupo"]["type"] == "image/jpg" || $_FILES["imagen_grupo"]["type"] == "image/png") {

    $contenido = $_POST["contenido_grupo"];
    $imagen = $_FILES["imagen_grupo"];
    $imagen_tmp = $imagen["tmp_name"];
    $imagen_nombre = $imagen["name"];
    $rnd_numero = random_int(1, 10000000);
    $nuevo_imagen_nombre = "$rnd_numero-$imagen_nombre";
    $id = $_SESSION["id"];
    move_uploaded_file($imagen_tmp, "../upload/" . $nuevo_imagen_nombre);
    $nueva_imagen = '../upload/' . $nuevo_imagen_nombre;
    echo "insert into pub_grupo (id_grupo, imagen, texto) values (" . $_GET['idgrp'] . ", '$nueva_imagen', $contenido)";
    $insert_post = "insert into pub_grupo (id_grupo, imagen, texto) values (" . $_GET['idgrp'] . ", '$nueva_imagen', '$contenido')";
    $conn->query($insert_post);
    header("location:../pages/view_grupo.php?idgrp=" . $_GET['idgrp']);
    exit();
} else {
    header("location:../pages/view_grupo.php?idgrp=" . $_GET['idgrp']);
}