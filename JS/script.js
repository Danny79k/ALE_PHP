setTimeout(() => {
    let doc = document.querySelector("#timer_alert");
    doc.style.display = "none";
}, 5000)

//activador de cookies
document.addEventListener("DOMContentLoaded", () => {
    setTimeout(() => {
        let element_cookie = document.querySelector("#cookie")
        let element_cookie_cover = document.querySelector("#cookie_cover")
        element_cookie.classList.toggle("d-none", false)
        element_cookie.classList.toggle("d-block", true)
        element_cookie_cover.classList.toggle("d-none", false)
        element_cookie_cover.classList.toggle("d-block", true)
        document.querySelector("body").style.overflowY = "hidden"
    }, 500)
});

//listener de boton de aceptar las cookies

let btn_cookies = document.querySelector("#aceptar_cookies");
btn_cookies.addEventListener("click", () => {
    let element_cookie = document.querySelector("#cookie")
    let element_cookie_cover = document.querySelector("#cookie_cover")
    element_cookie.classList.toggle("d-block", false)
    element_cookie.classList.toggle("d-none", true)
    element_cookie_cover.classList.toggle("d-block", false)
    element_cookie_cover.classList.toggle("d-none", true)
    document.querySelector("body").style.overflowY = "scroll"
})

// quiero crear un div usando JS para cuando le das a rechazar las cookies

let btn_cookies_denegar = document.querySelector("#denegar_cookies");

btn_cookies_denegar.addEventListener("click", () => {
    let parentCookie = btn_cookies_denegar.parentElement.parentElement;
    let divRechazar = document.createElement('div');
    divRechazar.className = 'alert alert-danger text-center';
    divRechazar.innerHTML = 'Nuh uh';
    parentCookie.appendChild(divRechazar);
});
let btn_cookies_preguntar = document.querySelector("#preguntar_cookies");

// quiero crear un div usando JS para cuando le das a pregutnar a las cookies

btn_cookies_preguntar.addEventListener("click", () => {
    let parentCookie2 = btn_cookies_preguntar.parentElement.parentElement;
    let divPreguntar = document.createElement('div');
    divPreguntar.className = 'alert alert-warning text-center';
    divPreguntar.innerHTML = 'No hay nada que saber chamito, dale a aceptar';
    parentCookie2.appendChild(divPreguntar);
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



