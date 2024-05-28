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

if (isset($_POST["usuario"]) && $_POST["usuario"] != " ") {
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

    $stmt = $conn->prepare("insert into perfil (id_usuario, nombre) values (?,?)");
    $stmt->bind_param("is", $id_norm, $usuario);
    $stmt->execute();

    header("location:login.php");
    exit();
} else {
    header("location:signin.php?signin_mal");
}


