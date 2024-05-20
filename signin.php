<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
<header class="my-5">
        <h1 class="display-3 text-center">
            sign in
        </h1>
    </header>
    <div class="d-flex justify-content-center">
        <div class="d-flex justify-content-center flex-column">
        <?php
            if (isset($_GET["signin_mal"])){
                echo "<div class='alert alert-danger text-center mx-3'><strong>Mal!</strong>, usuario o contraseña no validos o ya existentes</div>";
            }
            if (isset($_GET["login_existente"])){
                echo "<div class='alert alert-primary text-center mx-3'><strong>Atención</strong>, usuario o contraseña ya existentes</div>";
            }
            ?>
            <form action="insert_usuario.php" method="post" class="shadow-lg d-inline-block p-5" onsubmit="checkPassword(event)">
                <div class="d-flex justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" width="66"
                        height="66" fill="currentColor" class=" bi bi-alipay" viewBox="0 0 16 16">
                        <path
                            d="M2.541 0H13.5a2.55 2.55 0 0 1 2.54 2.563v8.297c-.006 0-.531-.046-2.978-.813-.412-.14-.916-.327-1.479-.536q-.456-.17-.957-.353a13 13 0 0 0 1.325-3.373H8.822V4.649h3.831v-.634h-3.83V2.121H7.26c-.274 0-.274.273-.274.273v1.621H3.11v.634h3.875v1.136h-3.2v.634H9.99c-.227.789-.532 1.53-.894 2.202-2.013-.67-4.161-1.212-5.51-.878-.864.214-1.42.597-1.746.998-1.499 1.84-.424 4.633 2.741 4.633 1.872 0 3.675-1.053 5.072-2.787 2.08 1.008 6.37 2.738 6.387 2.745v.105A2.55 2.55 0 0 1 13.5 16H2.541A2.55 2.55 0 0 1 0 13.437V2.563A2.55 2.55 0 0 1 2.541 0" />
                        <path
                            d="M2.309 9.27c-1.22 1.073-.49 3.034 1.978 3.034 1.434 0 2.868-.925 3.994-2.406-1.602-.789-2.959-1.353-4.425-1.207-.397.04-1.14.217-1.547.58Z" />
                    </svg>
                    <span class="display-5">Syphon</span>
                </div>
                <p class="bg-secondary-subtle rounded-3 p-1 mt-5 mb-5">
                    <label for="usuario">Usuario:&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" name="usuario" class="rounded-3 border-0" required>
                </p>
                <p class="bg-secondary-subtle rounded-3 p-1 mt-5 mb-5">
                    <label for="usuario">correo:&nbsp;&nbsp;&nbsp;</label>
                    <input type="email" name="correo" class="rounded-3 border-0" required>
                </p>
                <p class="bg-secondary-subtle rounded-3 p-1 mt-5 mb-5">
                    <label for="password">password:</label>
                    <input type="password" name="password" class="rounded-3 border-0" id="pass1" required>
                </p>
                <p class="bg-secondary-subtle rounded-3 p-1 mt-5 mb-5">
                    <label for="password">password:</label>
                    <input type="password" name="password" class="rounded-3 border-0" id="pass2" required>
                </p>
                <p class="d-flex justify-content-center my-4">
                    <input type="submit" class="btn btn-primary col-12 px-5">
                </p>
            </form>
        </div>
    </div>
    <footer class="d-flex flex-column justify-content-center p-5 flex-wraps flex-md-row text-center">
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
</body>

</html>