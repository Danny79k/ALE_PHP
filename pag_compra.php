<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DaytonaNails</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style_carrito.css">
</head>
<body>
   
    <div    class="wrapper">
        <aside>
            <header>
                <h1 class="logo">DaytonaNails</h1>
            </header>
            <nav>
                <ul class="menu">
                    <li>
                        <button  id="todos" class="boton-menu boton-categoria active"><i class="bi bi-brush-fill"></i> Todos los productos</button>
                    </li>
                        <a class="boton-menu boton-carrito" href="carrito.php"><i class="bi bi-bag-heart"></i> Carrito <span id="numero" class="numero">0</span></a>
                    </li>
                </ul>
            </nav>
            <footer>
                <p class="texto-footer">© 2024 Daydona Shop</p>
            </footer>

        </aside>
        <main>
            <h2 class="titulo-principal" id="titulo-principal" >Todos los productos</h2>
            <div id="contenedor-productos" class="contenedor-productos">
            </div>
        </main>


    </div>

    <script src="index.js"></script>
</body>
</html>