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
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.20.10/dist/css/uikit.min.css">

    <title><?php
    $encontrar_nombre = $conn->query("select * from usuario where id = " . $_SESSION["id"]);
    echo $encontrar_nombre->fetch_assoc()["usuario"];
    ?> | Home page</title>
</head>

<body data-bs-theme="dark" class="border pb-5">

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
                        <form action="../func/insert_post.php" method="post" class="d-inline-block p-5"
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
                                <svg aria-label="Icono para representar contenido multimedia, como imágenes o vídeos"
                                    class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="77" role="img"
                                    viewBox="0 0 97.6 77.3" width="96">
                                    <title>Icono para representar contenido multimedia, como imágenes o vídeos</title>
                                    <path
                                        d="M16.3 24h.3c2.8-.2 4.9-2.6 4.8-5.4-.2-2.8-2.6-4.9-5.4-4.8s-4.9 2.6-4.8 5.4c.1 2.7 2.4 4.8 5.1 4.8zm-2.4-7.2c.5-.6 1.3-1 2.1-1h.2c1.7 0 3.1 1.4 3.1 3.1 0 1.7-1.4 3.1-3.1 3.1-1.7 0-3.1-1.4-3.1-3.1 0-.8.3-1.5.8-2.1z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M84.7 18.4 58 16.9l-.2-3c-.3-5.7-5.2-10.1-11-9.8L12.9 6c-5.7.3-10.1 5.3-9.8 11L5 51v.8c.7 5.2 5.1 9.1 10.3 9.1h.6l21.7-1.2v.6c-.3 5.7 4 10.7 9.8 11l34 2h.6c5.5 0 10.1-4.3 10.4-9.8l2-34c.4-5.8-4-10.7-9.7-11.1zM7.2 10.8C8.7 9.1 10.8 8.1 13 8l34-1.9c4.6-.3 8.6 3.3 8.9 7.9l.2 2.8-5.3-.3c-5.7-.3-10.7 4-11 9.8l-.6 9.5-9.5 10.7c-.2.3-.6.4-1 .5-.4 0-.7-.1-1-.4l-7.8-7c-1.4-1.3-3.5-1.1-4.8.3L7 49 5.2 17c-.2-2.3.6-4.5 2-6.2zm8.7 48c-4.3.2-8.1-2.8-8.8-7.1l9.4-10.5c.2-.3.6-.4 1-.5.4 0 .7.1 1 .4l7.8 7c.7.6 1.6.9 2.5.9.9 0 1.7-.5 2.3-1.1l7.8-8.8-1.1 18.6-21.9 1.1zm76.5-29.5-2 34c-.3 4.6-4.3 8.2-8.9 7.9l-34-2c-4.6-.3-8.2-4.3-7.9-8.9l2-34c.3-4.4 3.9-7.9 8.4-7.9h.5l34 2c4.7.3 8.2 4.3 7.9 8.9z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M78.2 41.6 61.3 30.5c-2.1-1.4-4.9-.8-6.2 1.3-.4.7-.7 1.4-.7 2.2l-1.2 20.1c-.1 2.5 1.7 4.6 4.2 4.8h.3c.7 0 1.4-.2 2-.5l18-9c2.2-1.1 3.1-3.8 2-6-.4-.7-.9-1.3-1.5-1.8zm-1.4 6-18 9c-.4.2-.8.3-1.3.3-.4 0-.9-.2-1.2-.4-.7-.5-1.2-1.3-1.1-2.2l1.2-20.1c.1-.9.6-1.7 1.4-2.1.8-.4 1.7-.3 2.5.1L77 43.3c1.2.8 1.5 2.3.7 3.4-.2.4-.5.7-.9.9z"
                                        fill="currentColor"></path>
                                </svg>
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


    <!-- MODAL CREATE GROUP -->

    <div class="modal" id="createGroup">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <form action="../func/create_grupo.php" method="post" class="d-inline-block p-5"
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
                                <input type="text" name="nombre_grupo" class="uk-input bg-dark"
                                    placeholder="nombre del grupo" required>
                            </div>
                            <div class="uk-margin">
                                <textarea name="info_grupo" class="uk-textarea bg-dark" placeholder="info"></textarea>
                            </div>
                            <div class="js-upload uk-placeholder uk-text-center">
                                <svg aria-label="Icono para representar contenido multimedia, como imágenes o vídeos"
                                    class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="77" role="img"
                                    viewBox="0 0 97.6 77.3" width="96">
                                    <title>Icono para representar contenido multimedia, como imágenes o vídeos</title>
                                    <path
                                        d="M16.3 24h.3c2.8-.2 4.9-2.6 4.8-5.4-.2-2.8-2.6-4.9-5.4-4.8s-4.9 2.6-4.8 5.4c.1 2.7 2.4 4.8 5.1 4.8zm-2.4-7.2c.5-.6 1.3-1 2.1-1h.2c1.7 0 3.1 1.4 3.1 3.1 0 1.7-1.4 3.1-3.1 3.1-1.7 0-3.1-1.4-3.1-3.1 0-.8.3-1.5.8-2.1z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M84.7 18.4 58 16.9l-.2-3c-.3-5.7-5.2-10.1-11-9.8L12.9 6c-5.7.3-10.1 5.3-9.8 11L5 51v.8c.7 5.2 5.1 9.1 10.3 9.1h.6l21.7-1.2v.6c-.3 5.7 4 10.7 9.8 11l34 2h.6c5.5 0 10.1-4.3 10.4-9.8l2-34c.4-5.8-4-10.7-9.7-11.1zM7.2 10.8C8.7 9.1 10.8 8.1 13 8l34-1.9c4.6-.3 8.6 3.3 8.9 7.9l.2 2.8-5.3-.3c-5.7-.3-10.7 4-11 9.8l-.6 9.5-9.5 10.7c-.2.3-.6.4-1 .5-.4 0-.7-.1-1-.4l-7.8-7c-1.4-1.3-3.5-1.1-4.8.3L7 49 5.2 17c-.2-2.3.6-4.5 2-6.2zm8.7 48c-4.3.2-8.1-2.8-8.8-7.1l9.4-10.5c.2-.3.6-.4 1-.5.4 0 .7.1 1 .4l7.8 7c.7.6 1.6.9 2.5.9.9 0 1.7-.5 2.3-1.1l7.8-8.8-1.1 18.6-21.9 1.1zm76.5-29.5-2 34c-.3 4.6-4.3 8.2-8.9 7.9l-34-2c-4.6-.3-8.2-4.3-7.9-8.9l2-34c.3-4.4 3.9-7.9 8.4-7.9h.5l34 2c4.7.3 8.2 4.3 7.9 8.9z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M78.2 41.6 61.3 30.5c-2.1-1.4-4.9-.8-6.2 1.3-.4.7-.7 1.4-.7 2.2l-1.2 20.1c-.1 2.5 1.7 4.6 4.2 4.8h.3c.7 0 1.4-.2 2-.5l18-9c2.2-1.1 3.1-3.8 2-6-.4-.7-.9-1.3-1.5-1.8zm-1.4 6-18 9c-.4.2-.8.3-1.3.3-.4 0-.9-.2-1.2-.4-.7-.5-1.2-1.3-1.1-2.2l1.2-20.1c.1-.9.6-1.7 1.4-2.1.8-.4 1.7-.3 2.5.1L77 43.3c1.2.8 1.5 2.3.7 3.4-.2.4-.5.7-.9.9z"
                                        fill="currentColor"></path>
                                </svg>
                                <span class="uk-text-middle">sube una o arrastra foto!</span>
                                <div uk-form-custom>
                                    <input bg-dark type="file" accept="images/*" name="icono_grupo">
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
    <!-- MODAL CREATE GROUP END -->


    <main class="d-flex justify-content-between bg-dark pb-5">
        <aside class="col-md-2 border-end">
            <div class="fixed-top col-2">
                <header class="d-flex flex-column d-md-block d-none align-items-center flex-lg-row mx-5 mb-5 py-4 px-2">
                    <a href="main.php"
                        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto ps-3 link-body-emphasis text-decoration-none flex-column flex-lg-row">
                        <svg xmlns="http://www.w3.org/2000/svg" width="66" height="66" fill="currentColor"
                            class="bi bi-alipay" viewBox="0 0 16 16">
                            <path
                                d="M2.541 0H13.5a2.55 2.55 0 0 1 2.54 2.563v8.297c-.006 0-.531-.046-2.978-.813-.412-.14-.916-.327-1.479-.536q-.456-.17-.957-.353a13 13 0 0 0 1.325-3.373H8.822V4.649h3.831v-.634h-3.83V2.121H7.26c-.274 0-.274.273-.274.273v1.621H3.11v.634h3.875v1.136h-3.2v.634H9.99c-.227.789-.532 1.53-.894 2.202-2.013-.67-4.161-1.212-5.51-.878-.864.214-1.42.597-1.746.998-1.499 1.84-.424 4.633 2.741 4.633 1.872 0 3.675-1.053 5.072-2.787 2.08 1.008 6.37 2.738 6.387 2.745v.105A2.55 2.55 0 0 1 13.5 16H2.541A2.55 2.55 0 0 1 0 13.437V2.563A2.55 2.55 0 0 1 2.541 0" />
                            <path
                                d="M2.309 9.27c-1.22 1.073-.49 3.034 1.978 3.034 1.434 0 2.868-.925 3.994-2.406-1.602-.789-2.959-1.353-4.425-1.207-.397.04-1.14.217-1.547.58Z" />
                        </svg>
                        <span class="fs-4 ps-3">Syphon</span>
                    </a>
                    <?php
                    $select_nombre = $conn->query("select * from usuario where id = " . $_SESSION['id']);
                    ?>
                </header>
                <!-- aside -->
                <div class="d-none d-lg-block">
                    <ul class="d-flex flex-column align-items-center col-12">
                        <div class="p-3 col-12 d-flex justify-content">
                            <a href="perfil.php"
                                class="col-12 text-center text-light link-underline link-underline-opacity-0"><?php echo $select_nombre->fetch_assoc()["usuario"] ?></a>
                        </div>
                        <div class="p-3 col-12 d-flex justify-content"><a href="main.php"
                                class="col-12 text-center text-light link-underline link-underline-opacity-0"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-house" viewBox="0 0 16 16">
                                    <path
                                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                                </svg> | Home</a></div>
                        <div class="p-3 col-12 d-flex justify-content"><a href="perfil.php"
                                class="col-12 text-center text-light link-underline link-underline-opacity-0"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                </svg> | Perfil</a>
                        </div>
                        <div class="p-3 col-12 d-flex justify-content"><a href="#"
                                class="col-12 text-center text-light link-underline link-underline-opacity-0"
                                type="button" data-bs-toggle="modal" data-bs-target="#insert"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                                </svg> | nuevo</a></div>
                        <div class="p-3 col-12 d-flex justify-content"><a href="grupos.php"
                                class="col-12 text-center text-light link-underline link-underline-opacity-0"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                </svg> | grupos</a></div>
                        <div class="p-3 col-12 d-flex justify-content"><a href="../func/logout.php"
                                class="col-12 text-center text-light link-underline link-underline-opacity-0"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                    <path fill-rule="evenodd"
                                        d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                </svg> | logout</a></div>
                        <div class="px-3">
                            <form action="grupos.php" method="post"><input type="text" placeholder="Buscar"
                                    name="busqueda" required></form>
                            <?php
                            if (isset($_POST["busqueda"])) {
                                $busqueda = $_POST["busqueda"];
                                $select_nombre = $conn->query("select * from usuario where usuario like '%$busqueda%' limit 5");
                                ?>
                                <!-- estamos intentando visualizar el perfil ajeno -->
                                <div class="shadow-lg pt-3 d-flex flex-column">
                                    <?php
                                    while ($cuenta = $select_nombre->fetch_assoc()) {
                                        echo "<a href='perfil_ajeno.php?id=" . $cuenta["id"] . "' class='p-1'>" . $cuenta["usuario"] . "</a>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        <div class="mt-5">
                            <?php
                            $sacar_mis_grupos = 'select id_grupo,nombre from grupos where id_grupo in(select id_grupo from pertenecer_grupo where id_usuario = ' . $_SESSION['id'] . ')';
                            $execute_query = $conn->query($sacar_mis_grupos);
                            while ($registro = $execute_query->fetch_assoc()) {
                                $nombre_grupo1 = $registro['nombre'];
                                $id_grp = $registro['id_grupo'];
                                ?>
                                <div class="border-bottom text-center d-flex justify-content-between">
                                    <a href="view_grupo.php?idgrp=<?= $id_grp ?>"
                                        class="link-underline link-underline-opacity-0 text-white fs-5"><?= $nombre_grupo1 ?></a><a
                                        href="../func/exit_group.php?idgrp=<?= $id_grp ?>" class="text-danger"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                            <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                        </svg></a>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </ul>
                </div>

                <!-- aside responsive -->
                <?php
                $select_nombre_res = $conn->query("select * from usuario where id = " . $_SESSION['id']);
                ?>
                <div class="btn-group dropend d-lg-none border">
                    <button type="button" class="btn border-0 dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor"
                            class="rotate_css bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                        </svg>
                    </button>
                    <ul class="dropdown-menu border-0 shadow-lg rounded-2">
                        <div class="d-flex justify-content-center">
                            <div class="d-flex flex-column text-center col-10">
                                <a href="perfil.php"
                                    class="btn btn-primary my-1"><?php echo $select_nombre_res->fetch_assoc()["usuario"] ?></a>
                                <a href="main.php" class="btn btn-outline-primary"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-house" viewBox="0 0 16 16">
                                        <path
                                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                                    </svg> | Home</a>
                                <a href="perfil.php" class="btn btn-outline-primary my-1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                        <path fill-rule="evenodd"
                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                    </svg> | Perfil</a>
                                <button href="#" class="btn btn-outline-success my-1" type="button"
                                    data-bs-toggle="modal" data-bs-target="#insert"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                                    </svg> | nuevo</button>
                                <a href="grupos.php" class="btn btn-outline-info my-1" disabled>🔒grupos</a>
                                <a href="../func/logout.php" class="btn btn-danger my-1"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                        <path fill-rule="evenodd"
                                            d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                    </svg> | logout</a>
                                <div class="border-top pt-2 mt-3">
                                    <form action="grupos.php" method="post" class="col-12"><input class="col-12"
                                            type="text" placeholder="busqueda" name="busqueda" required></form>
                                    <?php
                                    if (isset($_POST["busqueda"])) {
                                        $busqueda = $_POST["busqueda"];
                                        $select_nombre = $conn->query("select * from usuario where usuario like '%$busqueda%'");
                                        ?>
                                        <div class="shadow-lg pt-3 d-flex flex-column">
                                            <?php
                                            while ($cuenta = $select_nombre->fetch_assoc()) {
                                                echo "<a href='perfil_ajeno.php?id=" . $cuenta["id"] . "' class='p-1'>" . $cuenta["usuario"] . "</a>";
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>  
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </aside>
        <section class="mt-5 d-flex flex-column col-md-10 col-12">
            <nav class="p-3 border col-12">
                <a href="#" data-bs-target="#createGroup" data-bs-toggle="modal">crear grupo</a>
            </nav>
            <?php
            if (isset($_GET["error"]) && $_GET["error"] == 1) {
                echo "<div id='timer_alert' role='alert' class='alert alert-warning alert-dismissible'><strong>No eres usuario Premium</strong> actualiza tu suscripcion a premium en un <a href='../func/user_premium.php' class='link-underline link-underline-opacity-0 text-warning'><strong>link</strong></a>
                <button type='button' class='btn btn-close' data-bs-dismiss='alert'></button></div>";
            }
            ?>
            <div class="row d-flex justify-content-evenly">
                <?php
                $select_group = "select * from grupos";
                $ex_cons_gr = $conn->query($select_group);
                while ($registro = $ex_cons_gr->fetch_assoc()) {
                    $id_grupo = $registro['id_grupo'];
                    $nombre_gr = $registro["nombre"];
                    $bio_gr = $registro["descripcion"];
                    $img_gr = $registro["imagen"];
                    $id_creador = $registro['id_usuario_premium'];
                    ?>
                    <div class="col-md-4 col-11">
                        <div class="card">
                            <?php echo ($id_creador == $_SESSION['id'] ? '<a href="delete_grupos.php?group_id=' . $id_grupo . '" class="link-underline link-underline-opacity-0 text-danger">Elimina Grupo</a>' : "") ?>
                            <img class="card-img-top"
                                src="<?php echo ($img_gr == "") ? "https://www.htgtrading.co.uk/wp-content/uploads/2016/03/no-user-image-square.jpg" : $img_gr ?>"
                                alt="Card image">
                            <div class="row p-3 text-center d-flex justify-content-between">
                                <h4 class="col-8 card-title"><?= $nombre_gr; ?></h4>
                                <a href="../func/join_grupo.php?idgrp=<?= $id_grupo ?>"
                                    class="btn btn-success link-underline link-underline-opacity-0 col-4">Únete al grupo</a>
                            </div>
                        </div>
                    </div>
                    <?php

                }
                ?>
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