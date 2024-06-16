<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location:login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "7997", "social");
$delete_grupo = 'delete from pertenecer_grupo where id_grupo = '.$_GET['idgrp'].' and id_usuario = '.$_SESSION['id'];
$conn-> query($delete_grupo);

header('location:../pages/grupos.php');