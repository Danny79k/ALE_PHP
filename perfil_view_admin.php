<?php
session_start();
if (!isset($_SESSION["usuario"])) {
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
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.20.10/dist/css/uikit.min.css">

    <title><?php
    $encontrar_nombre = $conn->query("select * from usuario where id = " . $_GET["id"]);
    echo $encontrar_nombre->fetch_assoc()["usuario"];
    ?> | Home page</title>
</head>

<body data-bs-theme="dark">

    <!-- MODAL INSERT-->

    <div class="modal" id="insert">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <form action="insert_post.php" method="post" class="d-inline-block p-5"
                            enctype="multipart/form-data">
                            <div class="d-flex justify-content-center"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="66" height="66" fill="currentColor" class=" bi bi-alipay"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M2.541 0H13.5a2.55 2.55 0 0 1 2.54 2.563v8.297c-.006 0-.531-.046-2.978-.813-.412-.14-.916-.327-1.479-.536q-.456-.17-.957-.353a13 13 0 0 0 1.325-3.373H8.822V4.649h3.831v-.634h-3.83V2.121H7.26c-.274 0-.274.273-.274.273v1.621H3.11v.634h3.875v1.136h-3.2v.634H9.99c-.227.789-.532 1.53-.894 2.202-2.013-.67-4.161-1.212-5.51-.878-.864.214-1.42.597-1.746.998-1.499 1.84-.424 4.633 2.741 4.633 1.872 0 3.675-1.053 5.072-2.787 2.08 1.008 6.37 2.738 6.387 2.745v.105A2.55 2.55 0 0 1 13.5 16H2.541A2.55 2.55 0 0 1 0 13.437V2.563A2.55 2.55 0 0 1 2.541 0" />
                                    <path
                                        d="M2.309 9.27c-1.22 1.073-.49 3.034 1.978 3.034 1.434 0 2.868-.925 3.994-2.406-1.602-.789-2.959-1.353-4.425-1.207-.397.04-1.14.217-1.547.58Z" />
                                </svg>
                                <span class="display-5">Syphon</span>
                            </div>
                            <div class="uk-margin">
                                <textarea class="uk-textarea bg-dark" name="contenido" rows="5" placeholder="Textarea"
                                    aria-label="Textarea"></textarea>
                            </div>
                            <div class="js-upload uk-placeholder uk-text-center">
                                <span uk-icon="icon: cloud-upload"></span>
                                <span class="uk-text-middle">sube una o arrastra foto!</span>
                                <div uk-form-custom>
                                    <input type="file" accept="images/*" name="imagen">
                                    <span class="uk-link">archivo</span>
                                </div>
                            </div>


                            <p class="d-flex justify-content-center my-4">
                                <input type="submit" class="btn btn-primary col-12 px-5">
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL INSERT END -->



    <main class="d-flex justify-content-center">
        <section class="mt-5 d-flex flex-column col-md-10 col-12">
            <div class="d-flex flex-column align-items-center">
                <!-- #region perfil-->
                <div class="d-flex flex-column mb-4 float-end col-6">
                    <?php
                    $consulta_perfil = "select * from perfil where id_usuario =" . $_GET["id"];
                    $ex_cons = $conn->query($consulta_perfil);
                    while ($row = $ex_cons->fetch_assoc()) {
                        $bio = $row["descripcion"];
                        $img_perf = $row["icono"];
                        if ($bio != "") {
                            ?>
                            <div class="border-bottom pb-2 m-5 d-flex flex-sm-row flex-column">
                                <div class="col-lg-2 col-md-2 col-12 me-5">
                                    <img class="rounded-circle img-fluid "
                                        src="<?php echo ($img_perf == "") ? "https://t4.ftcdn.net/jpg/04/99/93/31/360_F_499933117_ZAUBfv3P1HEOsZDrnkbNCt4jc3AodArl.jpg" : $img_perf; ?>">
                                </div>
                                <p class="col-lg-12 col-md-12 col-12 d-md-block d-none">
                                    <?= $bio ?>
                                </p>
                            </div>
                            <div class="d-md-none d-block">
                                <?= $bio ?>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="d-flex justify-content-center">
                                <div class="border-bottom m-5 col-6">
                                    <p class="text-center">
                                        no hay descripcion
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>

                <div class="d-flex flex-column text-center col-md-7 col-10 px-3">
                    <?php
                    $consulta_display = "select * from publicaciones where id_usuario=" . $_GET['id'] . " order by fecha desc";
                    $ejecutar_consulta = $conn->query($consulta_display);
                    if ($ejecutar_consulta->num_rows >= 1) {
                        while ($resultado = $ejecutar_consulta->fetch_assoc()) {
                            $encontrar_nombre = $conn->query("select * from usuario where id = " . $_GET["id"]);
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
    <script src="script.js"></script>
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