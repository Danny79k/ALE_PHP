<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location:login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "7997", "social");

$insert_premium = 'insert into usuario_premium values ('.$_SESSION['id'].')';
$conn-> query($insert_premium);

header('location:../pages/grupos.php');