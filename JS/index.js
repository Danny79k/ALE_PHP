// PRODUCTOS
const productos = [
    // Esmaltes
    {
        id: "esmalte01",
        titulo: "Esmalte Verde",
        imagen: "upload/48165-ilcaneleggendariojpeg.jpg",
        categoria: {
            nombre: "Esmaltes",
            id: "esmaltes"
        },
        precio: 7
    },
    {
        id: "esmalte02",
        titulo: "Esmalte Rosa",
        imagen: "../images/esmaltes/esmalte02.jpg",
        categoria: {
            nombre: "Esmaltes",
            id: "esmaltes"
        },
        precio: 7
    },
    {
        id: "esmalte03",
        titulo: "Esmalte Azul",
        imagen: "../images/esmaltes/esmalte03.jpg",
        categoria: {
            nombre: "Esmaltes",
            id: "esmaltes"
        },
        precio: 7
    },
    {
        id: "esmalte04",
        titulo: "Esmalte Rojo",
        imagen: "../images/esmaltes/esmalte04.jpg",
        categoria: {
            nombre: "Esmaltes",
            id: "esmaltes"
        },
        precio: 7
    },
    // Limas
    {
        id: "lima01",
        titulo: "Lima Pequeña 100/180",
        imagen: "../images/limas/lima01.jpg",
        categoria: {
            nombre: "Limas",
            id: "limas"
        },
        precio: 12
    },
    {
        id: "lima02",
        titulo: "Lima de 4 lados",
        imagen: "../images/limas/lima02.jpg",
        categoria: {
            nombre: "Limas",
            id: "limas"
        },
        precio: 25
    },
    {
        id: "lima03",
        titulo: "Lima Grande 100/180",
        imagen: "../images/limas/lima03.jpg",
        categoria: {
            nombre: "Limas",
            id: "limas"
        },
        precio: 14
    },
    {
        id: "lima04",
        titulo: "Lima Grande 180/240",
        imagen: "../images/limas/lima04.jpg",
        categoria: {
            nombre: "Limas",
            id: "limas"
        },
        precio: 18
    },

    // Pinceles
    {
        id: "pincel01",
        titulo: "Pincel N02",
        imagen: "../images/pinceles/pincel01.jpg",
        categoria: {
            nombre: "Pinceles",
            id: "pinceles"
        },
        precio: 19
    },
    {
        id: "pincel02",
        titulo: "Pincel Grueso Basico",
        imagen: "../images/pinceles/pincel02.jpg",
        categoria: {
            nombre: "Pinceles",
            id: "pinceles"
        },
        precio: 21
    },
    {
        id: "pincel03",
        titulo: "Pincel N01",
        imagen: "../images/pinceles/pincel03.jpg",
        categoria: {
            nombre: "Pinceles",
            id: "pinceles"
        },
        precio: 19
    },
    {
        id: "pincel04",
        titulo: "Pincel Doble Acrilico",
        imagen: "../images/pinceles/pincel04.jpg",
        categoria: {
            nombre: "Pinceles",
            id: "pinceles"
        },
        precio: 40
    },
];

const contenedorProductos = document.querySelector("#contenedor-productos");
const botonesCategorias = document.querySelectorAll(".boton-categoria");
const tituloPrincipal =document.querySelector("#titulo-principal");
let botonesAñadir =document.querySelectorAll(".producto-añadir");
const numero = document.querySelector("#numero");

function cargarProductos(productoElegidos) {

    contenedorProductos.innerHTML = "";

    productoElegidos.forEach(producto => {

        const div =document.createElement("div");
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
    })


    actualizarBotonesAñadir();
}


cargarProductos(productos)

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


   })
})

function actualizarBotonesAñadir() {
    botonesAñadir = document.querySelectorAll(".producto-añadir");
    
    botonesAñadir.forEach(boton => {
        boton.addEventListener("click", añadirAlcarrito);
    });

    

}

let productosEnCarrito;

const productosEnCarritoLS = JSON.parse(localStorage.getItem("productos-en-carrito"));


if(productosEnCarritoLS) {
    productosEnCarrito = productosEnCarritoLS;
    actualizarNumero();
} else {
    productosEnCarrito = [];
}

function añadirAlcarrito(e) {
    const idBoton = e.currentTarget.id;
    const productoAgregado = productos.find(producto => producto.id === idBoton);

    if(productosEnCarrito.some(producto => producto.id === idBoton)) {
        const index = productosEnCarrito.findIndex(producto => producto.id === idBoton);
        productosEnCarrito[index].cantidad++;
    } else {
        productoAgregado.cantidad = 1;
        productosEnCarrito.push(productoAgregado);
    }

    actualizarNumero();

    console.log(productosEnCarrito);

    localStorage.setItem("productos-en-carrito", JSON.stringify(productosEnCarrito));
}

function actualizarNumero() {
    let nuevoNumero = productosEnCarrito.reduce((acc, producto) => acc + producto.cantidad, 0);
    numero.innerText = nuevoNumero;
}


