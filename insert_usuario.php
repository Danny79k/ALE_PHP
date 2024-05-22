<?php

$conn = new mysqli("localhost", "root", "7997", "social");

$usuario = $_POST["usuario"];
$correo = $_POST["correo"];
$password = $_POST["password"];

// recoger informacion perfil

$bio = $_POST["bio"];

$consulta = $conn->query("select * from usuario where usuario='$usuario' or email = '$correo'");

if ($consulta->num_rows == 1) {
    header("location:signin.php?login_existente");
    exit();
}

if (isset($_POST["usuario"]) && $_POST["usuario"] != "") {
    $usuario = $_POST["usuario"];
    $correo = $_POST["correo"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("insert into usuario (usuario, email, contrasena) values (?,?, sha1(?))");
    $stmt->bind_param("sss", $usuario, $correo, $password);
    $stmt->execute();

    $cons_usu_norm = $conn->prepare("select id from usuario where usuario =?");
    $cons_usu_norm->bind_param("s", $usuario);
    $cons_usu_norm->execute();
    $resultado = $cons_usu_norm->get_result()->fetch_assoc();
    $id_norm = $resultado["id"];

    $stmt = $conn->prepare("insert into usuario_normal (id_usuario_normal) values (?)");
    $stmt->bind_param("i", $id_norm);
    $stmt->execute();

    if (isset($_FILES["img_perf"]) && $_FILES["img_perf"]["type"] == "image/jpeg" || $_FILES["img_perf"]["type"] == "image/jpg" || $_FILES["img_perf"]["type"] == "image/png") {

        $imagen = $_FILES["img_perf"];
        $imagen_tmp = $imagen["tmp_name"];
        $imagen_nombre = $imagen["name"];
        $rnd_numero = random_int(1, 10000000);
        $nuevo_imagen_nombre = "$rnd_numero-$imagen_nombre";
        move_uploaded_file($imagen_tmp, "upload/" . $nuevo_imagen_nombre);
        $nueva_imagen = 'upload/' . $nuevo_imagen_nombre;
        $stmt = $conn->prepare("insert into perfil (id_usuario, nombre, icono, descripcion) values (?,?,?,?)");
        $stmt->bind_param("isss", $id_norm, $usuario, $icono_perf, $bio);
        $stmt->execute();
    }




    header("location:login.php");
    exit();
} else {
    header("location:signin.php?signin_mal");
}


