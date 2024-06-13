<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"] != "admin") {
    header("location:login.php?error=3");

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<?php
$conn = new mysqli('localhost', 'root', '7997', 'social');
if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error)
        ?>

    <body class="bg-dark text-light">
        <section class="mt-5 d-flex justify-content-center">
            <div class="d-flex flex-column">
                <div class="d-flex mb-5">
                    <a href="../func/logout.php" class="col btn btn-warning m-2">logout</a>
                </div>
                <div class="tab-content">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home">Usuario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#menu1">Publicaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#menu2">Grupos</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane container active" id="home">
                        <div class="col3">
                            <a href="print_pdf.php?usu_pdf" class="btn btn-primary mt-4">Imprime tabla</a>
                        </div>
                        <table class="table table-striped table-dark my-5">
                            <h1 class="style-6 text-center py-1">Usuarios</h1>
                            <thead>
                                <th>id</th>
                                <th><a class="link-underline link-underline-opacity-0 text-warning" href="crud_admin.php?consulta_username=<?php if (isset($_GET["consulta_username"])) {
    echo ($_GET["consulta_username"] == 1) ? 2 : 1;
} ?>"><strong>username</strong></a></th>
                            <th class="text-center"><a class="link-underline link-underline-opacity-0 text-warning"
                                    href="crud_admin.php?consulta_correo=<?php if (isset($_GET["consulta_correo"])) {
                                        echo ($_GET["consulta_correo"] == 1) ? 2 : 1;
                                    } ?>"><strong>correo</strong></a></th>
                            <th colspan="3" class="text-center">acciones</th>
                        </thead>
                        <?php
                        $consultaSeleccionada = "select * from usuario";
                        if (isset($_GET["consulta_username"])) {
                            switch ($_GET["consulta_username"]) {
                                case $_GET["consulta_username"] == 1:
                                    $consultaSeleccionada = "select * from usuario order by usuario asc";
                                    break;
                                case $_GET["consulta_username"] == 2:
                                    $consultaSeleccionada = "select * from usuario order by usuario desc";
                                    break;
                            }
                        }
                        if (isset($_GET["consulta_correo"])) {
                            switch ($_GET["consulta_correo"]) {
                                case $_GET["consulta_correo"] == 1:
                                    $consultaSeleccionada = "select * from usuario order by email asc";
                                    break;
                                case $_GET["consulta_correo"] == 2:
                                    $consultaSeleccionada = "select * from usuario order by email desc";
                                    break;
                            }
                        }
                        $consulta = $conn->query($consultaSeleccionada);
                        while ($resultado = $consulta->fetch_assoc()) {
                            $id = $resultado["id"];
                            $nombre = $resultado["usuario"];
                            $correo = $resultado["email"];
                            ?>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $nombre ?></td>
                                <td><?php echo $correo ?></td>
                                <td><a href="perfil_view_admin.php?id=<?php echo $resultado["id"] ?>"
                                        class=" <?= ($resultado["usuario"] == "admin") ? 'd-none' : '' ?> btn btn-primary">ver</a>
                                </td>
                                <td><a href="delete_user.php?user_id=<?php echo $resultado["id"] ?>"
                                        class="btn btn-danger <?= ($resultado["usuario"] == "admin") ? 'd-none' : '' ?>">Eliminar
                                        usuario</a>
                                </td>
                            </tr>
                            <?php
                        } ?>
                    </table>
                </div>
                <div class="tab-pane container fade" id="menu1">
                    <div class="col3">
                        <a href="print_pdf.php?pub_pdf" class="btn btn-primary mt-4">Imprime tabla</a>
                    </div>
                    <table class="table table-striped table-dark mt-5">
                        <h1 class="style-6 text-center py-1">Publicaciones</h1>
                        <thead>
                            <th>id</th>
                            <th id="fecha" class="text-center"><a
                                    class="link-underline link-underline-opacity-0 text-warning" href="crud_admin.php?consulta_pub=<?php if (isset($_GET["consulta_pub"])) {
                                        echo ($_GET["consulta_pub"] == 1) ? 2 : 1;
                                    } ?>"><strong>fecha</strong></a></th>
                            <th>contenido</th>
                            <th>enlace imagen</th>
                            <th>id_usuario</th>
                            <th>username</th>
                            <th colspan="3" class="text-center">acciones</th>
                        </thead>
                        <?php
                        $consultaPublicaciones = "select * from publicaciones inner join usuario on publicaciones.id_usuario = usuario.id";
                        if (isset($_GET["consulta_pub"])) {
                            switch ($_GET["consulta_pub"]) {
                                case $_GET["consulta_pub"] == 1:
                                    $consultaPublicaciones = "select * from publicaciones inner join usuario on publicaciones.id_usuario = usuario.id order by fecha asc";
                                    break;
                                case $_GET["consulta_pub"] == 2:
                                    $consultaPublicaciones = "select * from publicaciones inner join usuario on publicaciones.id_usuario = usuario.id order by fecha desc";
                                    break;
                            }
                        }
                        $consulta = $conn->query($consultaPublicaciones);
                        while ($resultado_pub = $consulta->fetch_assoc()) {
                            $id_pub = $resultado_pub["id_publicaciones"];
                            $fecha = $resultado_pub["fecha"];
                            $content = $resultado_pub["contenido"];
                            $img_URL = $resultado_pub["imagen"];
                            $id_usu = $resultado_pub["id_usuario"];
                            $usuario_pub = $resultado_pub["usuario"];
                            ?>
                            <tr>
                                <td><?php echo $id_pub ?></td>
                                <td><?php echo $fecha ?></td>
                                <td><?php echo $content ?></td>
                                <td><?php echo $img_URL ?></td>
                                <td><?php echo $id_usu ?></td>
                                <td><?php echo $usuario_pub ?></td>
                                <td><a href="post_view_admin.php?id_usu=<?= $id_usu ?>&post=<?php echo $resultado_pub["id_publicaciones"] ?>"
                                        class="btn btn-primary">ver</a>
                                </td>
                                <td><a href="delete_post.php?borrado=<?php echo $id_pub ?>"
                                        class="btn btn-danger">Borrar</a>
                                </td>
                            </tr>
                            <?php
                        } ?>
                    </table>
                </div>
                <div class="tab-pane container fade" id="menu2">
                    <div class="col3">
                        <a href="print_pdf.php?gru_pdf" class="btn btn-primary mt-4">Imprime tabla</a>
                    </div>
                    <table class="table table-striped table-dark my-5">
                        <h1 class="style-6 text-center py-1">Grupos</h1>
                        <thead>
                            <th>id grupo</th>
                            <th><a class="link-underline link-underline-opacity-0 text-warning" href="crud_admin.php?consulta_grupo=<?php if (isset($_GET["consulta_grupo"])) {
                                echo ($_GET["consulta_grupo"] == 1) ? 2 : 1;
                            } ?>"><strong>nombre grupo</strong></a></th>
                            <th class="text-center">descricion</th>
                            <th class="text-center">owner</th>
                            <th colspan="3" class="text-center">acciones</th>
                        </thead>
                        <?php
                        $consultaSeleccionada = "select * from grupos inner join usuario on grupos.id_usuario_premium = usuario.id";
                        if (isset($_GET["consulta_grupo"])) {
                            switch ($_GET["consulta_grupo"]) {
                                case $_GET["consulta_grupo"] == 1:
                                    $consultaSeleccionada = "select * from grupo order by nombre asc";
                                    break;
                                case $_GET["consulta_username"] == 2:
                                    $consultaSeleccionada = "select * from grupo order by nombre desc";
                                    break;
                            }
                        }
                        $consulta = $conn->query($consultaSeleccionada);
                        while ($resultado = $consulta->fetch_assoc()) {
                            $id = $resultado["id_grupo"];
                            $nombre = $resultado["nombre"];
                            $descripcion = $resultado["descripcion"];
                            $prop_grupo = $resultado["usuario"];
                            ?>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $nombre ?></td>
                                <td><?php echo ($descripcion == "") ? "N/A" : $descripcion ?></td>
                                <td><?php echo $prop_grupo?></td>
                                <td><a href="view_grupo.php?idgrp=<?php echo $resultado["id_grupo"] ?>"
                                        class="btn btn-primary">ver</a>
                                </td>
                                <td><a href="delete_grupos.php?group_id=<?php echo $resultado["id_grupo"] ?>"
                                        class="btn btn-danger">Borrar</a>
                                </td>
                            </tr>
                            <?php
                        } ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <footer class="d-flex flex-column justify-content-center p-5 mt-5 flex-wraps flex-md-row text-center">
        <p xmlns:cc="http://creativecommons.org/ns#" xmlns:dct="http://purl.org/dc/terms/"><a property="dct:title"
                rel="cc:attributionURL" href="https://github.com/Danny79k/Proyecto-III-trimestre">Syphon</a> by <a
                rel="cc:attributionURL dct:creator" property="cc:attributionName"
                href="https://github.com/Danny79k">Danny Belloli</a> is licensed under <a
                href="https://creativecommons.org/licenses/by-nc-sa/4.0/?ref=chooser-v1" target="_blank"
                rel="license noopener noreferrer" style="display:inline-block;">CC BY-NC-SA 4.0<img
                    style="height:22px!important;margin-left:3px;vertical-align:text-bottom;"
                    src="https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1" alt=""><img
                    style="height:22px!important;margin-left:3px;vertical-align:text-bottom;"
                    src="https://mirrors.creativecommons.org/presskit/icons/by.svg?ref=chooser-v1" alt=""><img
                    style="height:22px!important;margin-left:3px;vertical-align:text-bottom;"
                    src="https://mirrors.creativecommons.org/presskit/icons/nc.svg?ref=chooser-v1" alt=""><img
                    style="height:22px!important;margin-left:3px;vertical-align:text-bottom;"
                    src="https://mirrors.creativecommons.org/presskit/icons/sa.svg?ref=chooser-v1" alt=""></a></p>
    </footer>
    <!-- SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>