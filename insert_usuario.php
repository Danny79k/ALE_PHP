<?php

$conn = new mysqli("localhost", "root", "7997", "social");

$usuario = $_POST["usuario"];
$correo = $_POST["correo"];
$password = $_POST["password"];

$consulta = $conn->query("select * from usuario where usuario='$usuario' or email = '$correo'");

if ($consulta->num_rows == 1) {
    header("location:signin.php?login_existente");
} else {
    if (isset($_POST["usuario"]) && $_POST["usuario"] != "") {

        $usuario = $_POST["usuario"];
        $correo = $_POST["correo"];
        $password = $_POST["password"];

        $conn->query("insert into usuario (usuario, email, contrasena) values ('$usuario', '$correo', sha1('$password'))");
        $cons_usu_norm = $conn->query("select id from usuario where usuario = '$usuario'");
        $resultado = $cons_usu_norm -> fetch_assoc();
        $id_norm = $resultado["id"];
        $conn->query("insert into usuario_normal (id_usuario_normal) values ($id_norm)");
        header("location:login.php");
        exit();
    } else {
        header("location:signin.php?signin_mal");
    }
}


