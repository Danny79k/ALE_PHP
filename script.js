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



