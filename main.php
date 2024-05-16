<?php
$conn = new mysqli("localhost", "root", "7997", "social");
    session_start();
if (!isset($_SESSION["usuario"])) {
    echo "<p>no deberias estar aca, perro</p>";
    echo '<a href="login.php">vuelve a login</a>';
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Home | Syphon</title>
</head>

<body>
    <header class="d-flex flex-wrap justify-content-center bg-white m-5 pb-2 px-2 border-bottom sticky-top">
        <a href="/"
            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto ps-3 link-body-emphasis text-decoration-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="66" height="66" fill="currentColor" class=" bi bi-alipay"
                viewBox="0 0 16 16">
                <path
                    d="M2.541 0H13.5a2.55 2.55 0 0 1 2.54 2.563v8.297c-.006 0-.531-.046-2.978-.813-.412-.14-.916-.327-1.479-.536q-.456-.17-.957-.353a13 13 0 0 0 1.325-3.373H8.822V4.649h3.831v-.634h-3.83V2.121H7.26c-.274 0-.274.273-.274.273v1.621H3.11v.634h3.875v1.136h-3.2v.634H9.99c-.227.789-.532 1.53-.894 2.202-2.013-.67-4.161-1.212-5.51-.878-.864.214-1.42.597-1.746.998-1.499 1.84-.424 4.633 2.741 4.633 1.872 0 3.675-1.053 5.072-2.787 2.08 1.008 6.37 2.738 6.387 2.745v.105A2.55 2.55 0 0 1 13.5 16H2.541A2.55 2.55 0 0 1 0 13.437V2.563A2.55 2.55 0 0 1 2.541 0" />
                <path
                    d="M2.309 9.27c-1.22 1.073-.49 3.034 1.978 3.034 1.434 0 2.868-.925 3.994-2.406-1.602-.789-2.959-1.353-4.425-1.207-.397.04-1.14.217-1.547.58Z" />
            </svg>
            <span class="fs-4 ps-3">Syphon</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="perfil.php?id=<?php echo $_GET['id'] ?>" class="nav-link">Perfil</a></li>
            <li class="nav-item"><a href="logout.php" class="btn btn-danger">logout</a></li>
        </ul>
    </header>
    <div class="container py-4">
        <?php
        $consulta_display = "select * from publicaciones";
        $ejecutar_consulta = $conn->query($consulta_display);
        $encontrar_nombre = $conn->query("select * from usuario inner join publicaciones on usuario.id = publicaciones.id_usuario");
        while ($resultado = $ejecutar_consulta->fetch_assoc()) {
            $fecha = $resultado["fecha"];
            $imagen = $resultado["imagen"];
            $publicacion = $resultado["contenido"];
            ?>
            <section class="mt-5 d-flex justify-content-center">
                <div class="d-flex flex-column col-8">
                    <div class="card col-12 my-5 rounded-3">
                        <div class="card-img rounded-3">
                            <img src="<?php echo $imagen ?>" class="img-fluid col-12 rounded-3">
                        </div>
                        <div class="d-flex justify-content-evenly mt-5">
                            <p>
                                <?php
                                echo $fecha;
                                ?>
                            </p>
                            <p>
                                <?php
                                echo $publicacion;
                                ?>
                            </p>
                            <p>
                                <?php
                                echo $autor = $encontrar_nombre->fetch_assoc()["usuario"];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
        ?>
    </div>

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>