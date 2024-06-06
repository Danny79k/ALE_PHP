const carrito = document.querySelector("#carrito");
const conteCarrito = document.querySelector("#listaCarrito");
const listaCarrito = document.querySelector("table tbody");
const vaciarCarrito = document.querySelector("#vaciarCarrito");
const productos = document.querySelector("#productos");
const btnBoLinea = document.querySelector(".borrarProd");

let compra = []; // Arreglo vacío;

// EVENTOS
cargarEventList();
function cargarEventList() {
    productos.addEventListener('click', agregarProd);
    carrito.addEventListener('click', eliminarProdCarrito);

    // 7.2 Creamos un addeventListener() para el botón Vaciar carrito que ejecute la
    // función vaciarCompra() y que ejecute una función flecha directa que agregue el
    // arreglo vacío y que luego cargue el carritoHTML();
    vaciarCarrito.addEventListener('click', () => {
        compra = [];
        carritoHTML();
    });
}

// FUNCIONES 
function agregarProd(e) {
    if (e.target.classList.contains("btn")) {
        const prodSelec = e.target.parentElement.parentElement;
        leerDatosProd(prodSelec);
    } else {
        console.log("se pulsó en otro lado");
    }
}

function eliminarProdCarrito(e) {
    console.log("Pulsando eliminarProdCarrito"); // Solo para comprobar
    console.log(e.target.classList);
    if (e.target.classList.contains("borrarProd")) {
        console.log("Estamos pulsando sobre borrar"); // Solo para demostrar
        const prodID = e.target.getAttribute("data-id")
        compra = compra.filter(prod => prod.id !== prodID);
        console.log(compra);
        carritoHTML();
    }
}

function leerDatosProd(prod) {
    const infoProd = {
        codigo: prod.querySelector("h5 span").textContent,
        nombre: prod.querySelector("h4").textContent,
        precio: parseFloat(prod.querySelector("h1").textContent),
        cantidad: 1,
        id: prod.querySelector("button").getAttribute("data-id"),
    }
    const seRepite = compra.some(prod => prod.id === infoProd.id)
    if (seRepite) {
        const actualCant = compra.map(prod => {
            if (prod.id === infoProd.id) {
                prod.cantidad++;
                return prod;
            } else {
                return prod;
            }
        })
    } else {
        compra.push(infoProd);
    }
    console.log(infoProd); // Solo para comprobar
    carritoHTML();
}

function carritoHTML() {
    limpiarHTML();
    compra.forEach(prod => {
        let row = document.createElement("tr");
        row.innerHTML =
            ` <td> ${prod.codigo} </td>
          <td> ${prod.nombre} </td>
          <td> ${prod.precio}€ </td>
          <td> ${prod.cantidad} </td>
          <td> 
            <a href="#" class="borrarProd" data-id="${prod.id}">X</a>
          </td>   
        `;
        listaCarrito.appendChild(row);

        // 1.1 Guardar el Carrito en el LS llamando a la función
        guardarCarritoLS(); // Hay que crear la función



    })
    console.log(compra);
}

// 1.2 Creamos la función LOCAL STORAGE
function guardarCarritoLS() {
    localStorage.setItem("compra", JSON.stringify(compra))
}

function limpiarHTML() {
    listaCarrito.innerHTML = "";
}