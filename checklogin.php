<?php

session_start();

$conn = new mysqli("localhost", "root", "7997", "social");

$usuario = $_POST["usuario"];
$password = $_POST["password"];

$consulta = $conn -> query("select * from usuario where usuario='$usuario' or email='$usuario' and contrasena = sha1('$password')");

$registro = $consulta -> fetch_assoc(); 
$id = $registro["id"];

if ($consulta->num_rows == 1) {
    $_SESSION["usuario"] = $usuario;
    header("location:main.php?id=$id;");
} else {
    header("location:login.php?login_mal");
}

