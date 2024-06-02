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
    die("Connection failed: " . $conn->connect_error);
?>

<body>
    <section class="mt-5 d-flex justify-content-center">
        <div class="d-flex flex-column">
            <div class="d-flex mb-5">
                <a href="logout.php" class="col btn btn-warning m-2">logout</a>
            </div>
            <table class="table my-5">
                <h1 class="style-6 border-bottom text-center pb-1">Usuarios</h1>
                <thead>
                    <th>id</th>
                    <th><a class="link-underline link-underline-opacity-0 text-dark" href="crud_admin.php?consulta=<?php if (isset($_GET["consulta"])) {
                        echo ($_GET["consulta"] == 1) ? 2 : 1;
                    } ?>"><strong>username</strong></a></th>
                    <th class="text-center">correo</th>
                    <th colspan="3" class="text-center">acciones</th>
                </thead>
                <?php
                $consultaSeleccionada = "select * from usuario";
                if (isset($_GET["consulta"])) {
                    switch ($_GET["consulta"]) {
                        case $_GET["consulta"] == 1:
                            $consultaSeleccionada = "select * from usuario order by usuario asc";
                            break;
                        case $_GET["consulta"] == 2:
                            $consultaSeleccionada = "select * from usuario order by usuario desc";
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
                        <td><a href="perfil_view_admin.php?id=<?php echo $resultado["id"] ?>" class=" <?=($resultado["usuario"] == "admin") ? 'd-none' : ''?> btn btn-primary">ver</a>
                        </td>
                        <td><a href="z_coche_borrado.php?id=<?php echo $resultado["id"] ?>"
                                class="btn btn-danger <?=($resultado["usuario"] == "admin") ? 'disabled' : ''?>">Borrar</a>
                        </td>
                    </tr>
                    <?php
                } ?>
            </table>
            <table class="table mt-5">
                <h1 class="style-6 border-bottom text-center pb-1">Publicaciones</h1>
                <thead>
                    <th>id</th>
                    <th class="text-center"><a class="link-underline link-underline-opacity-0 text-dark" href="crud_admin.php?consulta_pub=<?php if (isset($_GET["consulta_pub"])) {
                        echo ($_GET["consulta_pub"] == 1) ? 2 : 1;
                    } ?>"><strong>fecha</strong></a></th>
                    <th>contenido</th>
                    <th>id_usuario</th>
                    <th>username</th>
                    <th colspan="3" class="text-center">acciones</th>
                </thead>
                <?php
                $consultaPublicaciones = "select * from publicaciones inner join usuario on publicaciones.id_usuario = usuario.id";
                if (isset($_GET["consulta_pub"])) {
                    switch ($_GET["consulta_pub"]) {
                        case $_GET["consulta_pub"] == 1:
                            $consultaPublicaciones = "select * from publicaciones order by fecha asc";
                            break;
                        case $_GET["consulta_pub"] == 2:
                            $consultaPublicaciones = "select * from publicaciones order by fecha desc";
                            break;
                    }
                }
                $consulta = $conn->query($consultaPublicaciones);
                while ($resultado_pub = $consulta->fetch_assoc()) {
                    $id_pub = $resultado_pub["id_publicaciones"];
                    $fecha = $resultado_pub["fecha"];
                    $content = $resultado_pub["contenido"];
                    $id_usu = $resultado_pub["id_usuario"];
                    $usuario_pub = $resultado_pub["usuario"];
                    ?>
                    <tr>
                        <td><?php echo $id_pub ?></td>
                        <td><?php echo $fecha ?></td>
                        <td><?php echo $content ?></td>
                        <td><?php echo $id_usu ?></td>
                        <td><?php echo $usuario_pub ?></td>
                        <td><a href="post_view_admin.php?id_usu=<?= $id_usu ?>&post=<?php echo $resultado_pub["id_publicaciones"] ?>"
                                class="btn btn-primary">ver</a>
                        </td>
                        <td><a href="delete_post.php?borrado=<?php echo $id_pub ?>" class="btn btn-danger">Borrar</a>
                        </td>
                    </tr>
                    <?php
                } ?>
            </table>
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