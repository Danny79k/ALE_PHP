<?php

session_start();

$conn = new mysqli("localhost", "root", "7997", "social");

$usuario = $_POST["usuario"];
$password = $_POST["password"];
$consulta = $conn->query("select * from usuario where usuario='$usuario' and contrasena = sha1('$password') or email='$usuario' and contrasena = sha1('$password')");

$registro = $consulta->fetch_assoc();


if ($_POST["usuario"] == "") {
    header("location:../pages/login.php?nologin");
} else {

    if ($consulta->num_rows == 1) {
        $id = $registro["id"];
        $_SESSION["usuario"] = $usuario;
        $_SESSION["id"] = $id;
        $_SESSION['cookies'] = 'pendientes';
        $ID_SESSION = $_SESSION["id"];
        header("location:../pages/main.php");
    } else {
        header("location:../pages/login.php?login_mal");
    }
}

