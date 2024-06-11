<?php
session_start();
if (!isset($_SESSION["usuario"]) && $_SESSION["usuario"] != "admin") {
    header("location:login.php");
    exit();
}
$conn = new mysqli("localhost", "root", "7997", "social");
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.20.10/dist/css/uikit.min.css">

    <title><?php
    $encontrar_nombre = $conn->query("select * from usuario where id = " . $_SESSION["id"]);
    echo $encontrar_nombre->fetch_assoc()["usuario"];
    ?> | Home page</title>
</head>

<body data-bs-theme="dark">


    <!-- #region publicaciones -->
    <main class="d-flex justify-content-center">
        <section class="mt-5 d-flex flex-column col-md-10 col-12">
            <div class="d-flex flex-column align-items-center">
                <div class="d-flex flex-column text-center col-md-7 col-10 px-3">
                    <?php
                    $consulta_display = "select * from publicaciones where id_usuario=" . $_GET['id_usu'] . " and id_publicaciones = " . $_GET["post"];
                    $ejecutar_consulta = $conn->query($consulta_display);
                    if ($ejecutar_consulta->num_rows >= 1) {
                        while ($resultado = $ejecutar_consulta->fetch_assoc()) {
                            $encontrar_nombre = $conn->query("select * from usuario where id = " . $_GET["id_usu"]);
                            $fecha = $resultado["fecha"];
                            $imagen = $resultado["imagen"];
                            $publicacion = $resultado["contenido"];
                            $id_publicacion = $resultado["id_publicaciones"];
                            ?>
                            <div class="card col-12 mt-5 rounded-3 shadow-lg border-0 bg-black">
                                <p class="pt-2 col-lg-4 col-sm-4 col-md-4 col-12 text-center">
                                    <?php
                                    echo $encontrar_nombre->fetch_assoc()["usuario"];
                                    ?>
                                </p>
                                <div class="card-img rounded-3">
                                    <img src="<?php echo $imagen ?>" class="img-fluid col-12 rounded-3">
                                </div>
                                <div class="row pt-3">
                                    <p class="col-lg-3 col-sm-3 col-md-3 col-12 text-center">
                                        <?php
                                        echo $fecha;
                                        ?>
                                    </p>
                                    <p class="col-lg-9 col-sm-9 col-md-9 col-12 text-center">
                                        <?php
                                        echo $publicacion;
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div>
                            <p class="text-center text-secondary">
                                no hay nada aqui... <img src="img/caja-vacia.png" alt="">
                            </p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
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
    <!-- script -->
    <script src="../JS/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.20.10/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.20.10/dist/js/uikit-icons.min.js"></script>
</body>

</html>