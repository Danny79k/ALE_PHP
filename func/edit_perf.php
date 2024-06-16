<?php

session_start();

$conn = new mysqli("localhost", "root", "7997", "social");

if (isset($_FILES["icono"])) {
    if ($_FILES["icono"]["type"] == "image/jpeg" || $_FILES["icono"]["type"] == "image/jpg" || $_FILES["icono"]["type"] == "image/png") {

        $imagen = $_FILES["icono"];
        $imagen_tmp = $imagen["tmp_name"];
        $imagen_nombre = $imagen["name"];
        $rnd_numero = random_int(1, 10000000);
        $nuevo_imagen_nombre = "$rnd_numero-$imagen_nombre";
        move_uploaded_file($imagen_tmp, "../upload/" . $nuevo_imagen_nombre);
        $nueva_imagen = '../upload/' . $nuevo_imagen_nombre;
        $stmt = $conn->prepare("update perfil set icono = ? where id_usuario = ?");
        $stmt->bind_param("si", $nueva_imagen, $_SESSION["id"]);
        $stmt->execute();

    }
}

if (isset($_POST["bio"])) {

    $bio = $_POST["bio"];
    $stmt = $conn->prepare("update perfil set descripcion = ? where id_usuario = ?");
    $stmt->bind_param("si", $bio, $_SESSION["id"]);
    $stmt->execute();
}

header("location:../pages/perfil.php");