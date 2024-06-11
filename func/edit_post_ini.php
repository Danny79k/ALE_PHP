<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"] != "admin") {
    header("location:../pages/login.php");
}

$conn = new mysqli("localhost", "root", "7997", "social");


if (isset($_FILES["imagen_edit"])) {
    if ($_FILES["imagen_edit"]["type"] == "image/jpeg" || $_FILES["imagen_edit"]["type"] == "image/jpg" || $_FILES["imagen_edit"]["type"] == "image/png") {
        echo "encontre una imagen";
        $nueva_imagen = $_FILES["imagen_edit"];
        $imagen_tmp = $nueva_imagen["tmp_name"];
        $imagen_nombre = $nueva_imagen["name"];
        $rnd_numero = random_int(1, 10000000);
        $nuevo_imagen_nombre = "$rnd_numero-$imagen_nombre";
        move_uploaded_file($imagen_tmp, "../upload/" . $nuevo_imagen_nombre);
        $nueva_imagen = '../upload/' . $nuevo_imagen_nombre;
        $update_post = "update publicaciones set imagen = '$nueva_imagen' where id_publicaciones = " . $_GET["post"];
        $conn->query($update_post);
        header("location:../pages/perfil.php");
    }
}
if (isset($_POST["contenido_edit"])) {
    $contenido_edit = $_POST["contenido_edit"];
    $update_post = "update publicaciones set contenido = '$contenido_edit' where id_publicaciones = " . $_GET["post"];
    $conn->query($update_post);
    header("location:../pages/perfil.php");
}