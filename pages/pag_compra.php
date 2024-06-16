<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location:login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syphon</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style_carrito.css">
</head>

<body>

    <div class="wrapper">
        <aside>
            <header>
                <h1 class="logo">Syphon | zona de compras</h1>
            </header>
            <nav>
                <ul class="menu">
                    <li>
                    <a href="main.php" id="volver" class="boton-menu boton-categoria">
                    volver atrás</a>
                    </li>
                    <li>
                        <button id="todos" class="boton-menu boton-categoria active"><i class="bi bi-telephone"></i>
                            Todos los productos</button>
                    </li>
                    <a class="boton-menu boton-carrito" href="carrito.php"><i class="bi bi-bag"></i> Carrito <span
                            id="numero" class="numero">0</span></a>
                    </li>
                </ul>
            </nav>
            <footer>
                <p class="texto-footer">
                <p xmlns:cc="http://creativecommons.org/ns#" xmlns:dct="http://purl.org/dc/terms/"><a
                        property="dct:title" rel="cc:attributionURL"
                        href="https://github.com/Danny79k/Proyecto-III-trimestre">Syphon</a> by <a
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
                            src="https://mirrors.creativecommons.org/presskit/icons/sa.svg?ref=chooser-v1" alt=""></a>
                </p>
                </p>
            </footer>

        </aside>
        <main>
            <h2 class="titulo-principal" id="titulo-principal">Todos los productos</h2>
            <div id="contenedor-productos" class="contenedor-productos">
            </div>
        </main>


    </div>

    <script src="../JS/comprar.js"></script>
</body>

</html>