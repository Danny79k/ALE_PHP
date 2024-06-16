setTimeout(() => {
    let doc = document.querySelector("#timer_alert");
    doc.style.display = "none";
}, 5000)

//activador de cookies
document.addEventListener("DOMContentLoaded", () => {
    if (sessionStorage.getItem('cookies') === 'true') {
        console.log("dsd");
        aceptarCookie();
    } else {
        setTimeout(() => {
            let element_cookie = document.querySelector("#cookie");
            let element_cookie_cover = document.querySelector("#cookie_cover");
            if (element_cookie && element_cookie_cover) {
                element_cookie.classList.remove("d-none");
                element_cookie.classList.add("d-block");
                element_cookie_cover.classList.remove("d-none");
                element_cookie_cover.classList.add("d-block");
                document.querySelector("body").style.overflowY = "hidden";
            }
        }, 500);
    }

    // Listener for accepting cookies
    let btn_cookies = document.querySelector("#aceptar_cookies");
    if (btn_cookies) {
        btn_cookies.addEventListener("click", () => {
            sessionStorage.setItem('cookies', 'true');
            aceptarCookie();
        });
    }
});

function aceptarCookie() {
    let element_cookie = document.querySelector("#cookie");
    let element_cookie_cover = document.querySelector("#cookie_cover");
    if (element_cookie && element_cookie_cover) {
        element_cookie.classList.remove("d-block");
        element_cookie.classList.add("d-none");
        element_cookie_cover.classList.remove("d-block");
        element_cookie_cover.classList.add("d-none");
        document.querySelector("body").style.overflowY = "scroll";
    }
}
// quiero crear un div usando JS para cuando le das a rechazar las cookies

let btn_cookies_denegar = document.querySelector("#denegar_cookies");

btn_cookies_denegar.addEventListener("click", () => {
    let parentCookie = btn_cookies_denegar.parentElement.parentElement;
    let divRechazar = document.createElement('div');
    divRechazar.className = 'alert alert-danger text-center';
    divRechazar.id = 'rechazar'
    divRechazar.innerHTML = 'Nuh uh';
    parentCookie.appendChild(divRechazar);
    let div_rojo = document.querySelectorAll("#rechazar");
    setTimeout(() => {
        for (let i = 0; i < div_rojo.length; i++) {
            div_rojo[i].remove();
        }
    }, 1000)
});
let btn_cookies_preguntar = document.querySelector("#preguntar_cookies");

// desaparecen los divs rojos con yun temporizador


// quiero crear un div usando JS para cuando le das a pregutnar a las cookies

btn_cookies_preguntar.addEventListener("click", () => {
    let parentCookie2 = btn_cookies_preguntar.parentElement.parentElement;
    let divPreguntar = document.createElement('div');
    divPreguntar.className = 'alert alert-warning text-center';
    divPreguntar.id = 'preguntar'
    divPreguntar.innerHTML = 'No hay nada que saber chamito, dale a aceptar';
    parentCookie2.appendChild(divPreguntar);
    let div_amarillo = document.querySelectorAll("#preguntar");
    setTimeout(() => {
        for (let i = 0; i < div_amarillo.length; i++) {
            div_amarillo[i].remove();
        }
    }, 1000)
});


function activarEditar() {

    let doc = document.getElementById("inv");
    doc.style.display = "block";
}


function showPassword() {

    let doc = document.querySelectorAll(".pswd");
    for (let i = 0; i < doc.length; i++) {
        if (doc[i].type == "password") {
            doc[i].setAttribute('type', 'text');
            document.getElementById("eye_close").style.display = "inline-block"
            document.getElementById("eye_open").style.display = "none"
        } else {
            doc[i].setAttribute('type', 'password');
            document.getElementById("eye_close").style.display = "none"
            document.getElementById("eye_open").style.display = "inline-block"
        }
    }
}



//la rana

// ESTE BLOQUE DE CODIGO ES UN EASTER EGG ES UNA FUNCION INEDITA Y MAGICA DE MI CODIGO, YA QUE NO ES PARTE EVALUABLE TE RETO A QUE ENCUENTRES LA MAGIA EN MI CODIGO, PISTA: SE ENCUENTRA EN MAIN 

document.addEventListener("DOMContentLoaded", () => {
    const rana = document.querySelector(".rana");
    const moveRanaButton = document.getElementById("moveRana");

    moveRanaButton.addEventListener("click", () => {
        rana.classList.toggle("mover");
    });
});

let sus = document.querySelector("#bababoi");
sus.addEventListener('click', () => {

    let boton_sus = document.querySelector(".helo");
    boton_sus.classList.toggle("d-none", false);
    boton_sus.classList.toggle("d-block", true);
})