<?php
session_start();

$conn = new mysqli("localhost", "root", "7997", "social");

$nombre_grupo = $_POST["nombre_grupo"];
$info_grupo = $_POST["info_grupo"];
$get_premium_id = "select id_usuario_premium from usuario_premium where id_usuario_premium = " . $_SESSION["id"];
$ex_cons = $conn->query($get_premium_id);

if ($ex_cons->num_rows > 0) {
    $registro = $ex_cons -> fetch_assoc();
    $id_premium = $registro["id_usuario_premium"];
    if (isset($nombre_grupo)) {
        if (isset($_FILES["icono_grupo"]) && $_FILES["icono_grupo"]["type"] == "image/jpeg" || $_FILES["icono_grupo"]["type"] == "image/jpg" || $_FILES["icono_grupo"]["type"] == "image/png") {

            $imagen = $_FILES["icono_grupo"];
            $imagen_tmp = $imagen["tmp_name"];
            $imagen_nombre = $imagen["name"];
            $rnd_numero = random_int(1,10000000);
            $nuevo_imagen_nombre = "$rnd_numero-$imagen_nombre";
            move_uploaded_file($imagen_tmp, "upload/" . $nuevo_imagen_nombre);
            $nueva_imagen = 'upload/' . $nuevo_imagen_nombre;
        }
        $stmt = $conn -> prepare("insert into grupos (nombre, descripcion, imagen, id_usuario_premium) values (?,?,?,?)");
        $stmt -> bind_param("sssi", $nombre_grupo, $info_grupo, $nueva_imagen, $id_premium);
        $stmt -> execute();
        header("location:grupos.php");
    }
} else {
    header("location:grupos.php?error=1"); //error de permisos
}