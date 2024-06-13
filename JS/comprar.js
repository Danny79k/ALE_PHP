// PRODUCTOS
const productos = [

    {
        "id": "servicio01",
        "titulo": "Desarrollo Web",
        "imagen":"../upload/web-service.png",
        "descripcion": "Creación de sitios web personalizados y optimizados para SEO.",
        "categoria": {
            "nombre": "Desarrollo Web",
            "id": "desarrollo_web"
        },
        "precio": 700
    },
    {
        "id": "servicio02",
        "titulo": "Mantenimiento Web",
        "imagen":"../upload/web-service.png",
        "descripcion": "Servicios de mantenimiento y actualización de sitios web.",
        "categoria": {
            "nombre": "Mantenimiento Web",
            "id": "mantenimiento_web"
        },
        "precio": 300
    },
    {
        "id": "servicio03",
        "titulo": "Desarrollo de Aplicaciones Móviles",
        "imagen":"../upload/web-service.png",
        "descripcion": "Desarrollo de aplicaciones móviles para Android y iOS.",
        "categoria": {
            "nombre": "Desarrollo de Aplicaciones",
            "id": "desarrollo_aplicaciones"
        },
        "precio": 1500
    },
    {
        "id": "servicio04",
        "titulo": "Consultoría IT",
        "imagen":"../upload/web-service.png",
        "descripcion": "Consultoría especializada en tecnologías de la información.",
        "categoria": {
            "nombre": "Consultoría IT",
            "id": "consultoria_it"
        },
        "precio": 200
    },
    {
        "id": "servicio05",
        "titulo": "Seguridad Informática",
        "imagen":"../upload/web-service.png",
        "descripcion": "Servicios de auditoría y mejoras de seguridad en sistemas informáticos.",
        "categoria": {
            "nombre": "Seguridad Informática",
            "id": "seguridad_informatica"
        },
        "precio": 1000
    },
    {
        "id": "servicio06",
        "titulo": "Migración a la Nube",
        "imagen":"../upload/web-service.png",
        "descripcion": "Servicios de migración y gestión de infraestructuras en la nube.",
        "categoria": {
            "nombre": "Servicios en la Nube",
            "id": "servicios_nube"
        },
        "precio": 1200
    },
    {
        "id": "servicio07",
        "titulo": "Desarrollo de Software a Medida",
        "imagen":"../upload/web-service.png",
        "descripcion": "Desarrollo de soluciones de software personalizadas.",
        "categoria": {
            "nombre": "Desarrollo de Software",
            "id": "desarrollo_software"
        },
        "precio": 2000
    },
    {
        "id": "servicio08",
        "titulo": "Optimización de Bases de Datos",
        "imagen":"../upload/web-service.png",
        "descripcion": "Servicios de optimización y gestión de bases de datos.",
        "categoria": {
            "nombre": "Bases de Datos",
            "id": "bases_datos"
        },
        "precio": 800
    },

];

// Selección de elementos del DOM
const contenedorProductos = document.querySelector("#contenedor-productos");
const botonesCategorias = document.querySelectorAll(".boton-categoria");
const tituloPrincipal = document.querySelector("#titulo-principal");
let botonesAñadir = document.querySelectorAll(".producto-añadir");
const numero = document.querySelector("#numero");

// Función para cargar productos en el contenedor
function cargarProductos(productoElegidos) {
    contenedorProductos.innerHTML = "";

    productoElegidos.forEach(producto => {
        const div = document.createElement("div");
        div.classList.add("producto");
        div.innerHTML = `
            <img class="producto-imagen" src="${producto.imagen}" alt="${producto.titulo}">
            <div class="producto-detalles">
                <h3 class="producto-titulo">${producto.titulo}</h3>
                <p class="producto-precio">${producto.precio}€</p>
                <button class="producto-añadir" id="${producto.id}">añadir</button>
            </div>
        `;

        contenedorProductos.append(div);
    });

    actualizarBotonesAñadir();
}

// Inicializar la carga de productos
cargarProductos(productos);

// Asignar eventos a los botones de categorías
botonesCategorias.forEach(boton => {
    boton.addEventListener("click", (e) => {
        botonesCategorias.forEach(boton => boton.classList.remove("active"));
        e.currentTarget.classList.add("active");

        if (e.currentTarget.id != "todos") {
            const productoCategoria = productos.find(producto => producto.categoria.id === e.currentTarget.id);
            tituloPrincipal.innerText = productoCategoria.categoria.nombre;
            const productosBoton = productos.filter(producto => producto.categoria.id === e.currentTarget.id);
            cargarProductos(productosBoton);
        } else {
            tituloPrincipal.innerText = "Todos los productos";
            cargarProductos(productos);
        }
    });
});

// Actualizar los eventos de los botones "añadir"
function actualizarBotonesAñadir() {
    botonesAñadir = document.querySelectorAll(".producto-añadir");

    botonesAñadir.forEach(boton => {
        boton.addEventListener("click", añadirAlcarrito);
    });
}

// Variables y manejo del carrito
let productosEnCarrito;
const productosEnCarritoLS = JSON.parse(localStorage.getItem("productos-en-carrito"));

if (productosEnCarritoLS) {
    productosEnCarrito = productosEnCarritoLS;
    actualizarNumero();
} else {
    productosEnCarrito = [];
}

// Función para añadir productos al carrito
function añadirAlcarrito(e) {
    const idBoton = e.currentTarget.id;
    const productoAgregado = productos.find(producto => producto.id === idBoton);

    if (productosEnCarrito.some(producto => producto.id === idBoton)) {
        const index = productosEnCarrito.findIndex(producto => producto.id === idBoton);
        productosEnCarrito[index].cantidad++;
    } else {
        productoAgregado.cantidad = 1;
        productosEnCarrito.push(productoAgregado);
    }

    actualizarNumero();
    localStorage.setItem("productos-en-carrito", JSON.stringify(productosEnCarrito));
}

// Actualizar el número de productos en el carrito
function actualizarNumero() {
    let nuevoNumero = productosEnCarrito.reduce((acc, producto) => acc + producto.cantidad, 0);
    numero.innerText = nuevoNumero;
}