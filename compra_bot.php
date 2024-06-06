<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="estilos.css" rel="stylesheet">
    <title>Carrito de compra - Comida de peces</title>
</head>

<body>

    <!-- Bloque de encabezado -->
    <div class="d-flex flex-column flex-md-row  justify-content-around align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">Servicios</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#">Features</a>
            <a class="p-2 text-dark" href="#">Enterprise</a>
            <a class="p-2 text-dark" href="#">Support</a>
            <a class="p-2 text-dark" href="#">Precios</a>
        </nav>
        <!-- Bloque donde comienza el menú donde se encuentra el carrito de compra -->
        <ul>
            <li class="submenu">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                </svg>
                <!-- Carrito de compra -->
                <div id="carrito" class="row border border-primary">
                    <div class="col-xs-12">
                        <!-- Tabla donde se agregan los arreglos -->
                        <table id="listaCarrito" class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>X</th> <!-- Se utilizará paa borrar cursos   -->
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <a href="#" id="vaciarCarrito" class="col-12 btn btn-danger btn-sm">Vaciar Carrito</a>
                    </div> <!-- Fin col-xs-12 -->
                </div>
            </li>
        </ul>
        <a class="btn btn-outline-primary" href="#">Sign up</a>
    </div>
    <!-- Bloque Para colocar alguna publicidad de la empresa -->
    <div class=" bg-secondary-subtle pricing-header p-3 mb-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4 ">Pricing</h1>
        <p class="lead">Elija el precio ideal de la oferta para ser nuestro cliente</p>
    </div>
    <!-- Contenedor MAIN del sitio donde están las cards de los precios -->
    <div class="container">
        <!-- Fila única que contiene los CARDS -->
        <div class="row flex-wrap justify-content-evenly" id="productos">
            <div class="col-3 mx-2 card mb-4 shadow-sm text-center">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Base</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">7€ </h1>
                    <h3>/months</h3>
                    <h5>cod:<span class="h5"> 1000001</span></h5>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>10 users included</li>
                        <li>2 GB of storage</li>
                        <li>Email support</li>
                        <li>Help center access</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary" data-id="1">agregar</button>
                </div>
            </div>
            <div class="col-3 mx-2 card mb-4 shadow-sm text-center">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Pro</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">15€ </h1>
                    <h3>/months</h3>
                    <h5>cod:<span class="h5"> 1000002</span></h5>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>20 users included</li>
                        <li>10 GB of storage</li>
                        <li>Priority email support</li>
                        <li>Help center access</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-primary" data-id="2">agregar</button>
                </div>
            </div>
            <div class="col-3 mx-2 card mb-4 shadow-sm text-center">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Enterprise</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">30€ </h1>
                    <h3>/months</h3>
                    <h5>cod:<span class="h5"> 1000003</span></h5>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>30 users included</li>
                        <li>15 GB of storage</li>
                        <li>Phone and email support</li>
                        <li>Help center access</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary" data-id="3">agregar</button>
                </div>
            </div>
            <div class="col-3 mx-2 card mb-4 shadow-sm text-center">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Pro - Special</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">45€ </h1>
                    <h3>/months</h3>
                    <h5>cod:<span class="h5"> 1000004</span></h5>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>50 users included</li>
                        <li>25 GB of storage</li>
                        <li>Priority email support</li>
                        <li>Help center access</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary" data-id="4">agregar</button>
                </div>
            </div>
            <div class="col-3 mx-2 card mb-4 shadow-sm text-center">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Master</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">65€ </h1>
                    <h3>/months</h3>
                    <h5>cod:<span class="h5"> 1000005</span></h5>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>80 users included</li>
                        <li>50 GB of storage</li>
                        <li>Phone / Whatsapp and email support</li>
                        <li>Help center access & more</li>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-primary" data-id="5">agregar</button>
                </div>
            </div>
        </div> <!-- Fin del ROW -->
    </div>
    <!-- Inicio del FOOTER con enlaces a los datos más relevantes de la empresa -->
    <footer class=" bg-secondary-subtle my-md-5 pt-md-5 border-top">
        <div class="row d-flex justify-content-evenly">
            <div class="col-3">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Cool stuff</a></li>
                    <li><a class="text-muted" href="#">Random feature</a></li>
                    <li><a class="text-muted" href="#">Team feature</a></li>
                    <li><a class="text-muted" href="#">Stuff for developers</a></li>
                    <li><a class="text-muted" href="#">Another one</a></li>
                    <li><a class="text-muted" href="#">Last time</a></li>
                </ul>
            </div>
            <div class="col-3">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Resource</a></li>
                    <li><a class="text-muted" href="#">Resource name</a></li>
                    <li><a class="text-muted" href="#">Another resource</a></li>
                    <li><a class="text-muted" href="#">Final resource</a></li>
                </ul>
            </div>
            <div class="col-3">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Team</a></li>
                    <li><a class="text-muted" href="#">Locations</a></li>
                    <li><a class="text-muted" href="#">Privacy</a></li>
                    <li><a class="text-muted" href="#">Terms</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- JS de autor -->
    <script src="carrito_compra.js"></script>

    <!-- JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>