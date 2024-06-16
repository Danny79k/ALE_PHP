<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location:login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "7997", "social");
$saber_si_ya_estoy_en_el_grupo = "select * from pertenecer_grupo where id_usuario = " . $_SESSION['id'] . " and id_grupo = " . $_GET['idgrp'];

$SQL = $conn->query($saber_si_ya_estoy_en_el_grupo);

if ($SQL->num_rows >= 1) {
    header("location:../pages/grupos.php");
} else {

    $insert_grupo = 'insert into pertenecer_grupo values (' . $_SESSION['id'] . ',' . $_GET['idgrp'] . ')';
    $conn->query($insert_grupo);

    header('location:../pages/grupos.php');
}