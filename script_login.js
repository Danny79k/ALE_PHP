let element_pass = document.querySelectorAll(".pswd");

element_pass.forEach((element) => {
    element.addEventListener("keyup", () => {
        for (let i = 0; i < element_pass.length; i++) {
            element_pass[i].style.backgroundColor = "pink";
            if (element_pass[i].value.length >= 4) {
                element_pass[i].style.backgroundColor = "lightgreen";
            }
        }
    });

    element.addEventListener("blur", () => {
        for (let i = 0; i < element_pass.length; i++) {
            element_pass[i].style.backgroundColor = "white";
            if (element_pass[i].value.length > 0 && element_pass[i].value.length < 4) {
                element_pass[i].style.backgroundColor = "pink";
            }
            if (element_pass[i].value.length >= 4) {
                element_pass[i].style.backgroundColor = "lightgreen";
            }
        }
    });
});


// validando el correo

let correo = document.querySelector("#correo");

correo.addEventListener("keyup", () => {
    correo.style.backgroundColor = "pink"
    if (correo.value.includes('@')) {
        if (correo.value.includes('.com') || correo.value.includes('.es') || correo.value.includes('.org')) {
            correo.style.backgroundColor = "lightgreen"
        }
    }
})

correo.addEventListener("blur", () => {

    correo.style.backgroundColor = "white";
    if (correo.value.includes('@')) {
        if (correo.value.endsWith('.com')) {
            correo.style.backgroundColor = "lightgreen"
        } else {
            correo.style.backgroundColor = "pink"
        }
    } else {
        correo.style.backgroundColor = "pink"
    }
})

let usu = document.querySelector("#usuario")

usu.addEventListener("keyup", () => {
    usu.style.backgroundColor = "pink"
    if (usu.value != "" && usu.value != "admin") {
        usu.style.backgroundColor = "lightgreen"
    }
})

usu.addEventListener("blur", () => {

    usu.style.backgroundColor = "white";
            if (usu.value == "" || usu.value == "admin") {
                usu.style.backgroundColor = "pink";
            }
            if (usu.value != "" && usu.value != "admin") {
                usu.style.backgroundColor = "lightgreen";
            }
})


function checkPassword(event) {

    let pass1 = document.getElementById("pass1")
    let pass2 = document.getElementById("pass2")
    if (pass1.value != pass2.value) {
        alert("la contraseñas no corresponden")
        event.preventDefault()
        return
    }
    if (pass1.value.length < 4) {
        event.preventDefault();
        alert("la contraseña debe tener al menos 4 caracteres")
        return
    }
    if (!correo.value.includes('@')) {
        alert("correo no valido")
        event.preventDefault()
        return
    }
    if (!correo.value.endsWith('.com')) {
        alert("dominio de correo no valido")
        event.preventDefault()
        return
    }
    if (usu.value == "" || usu.value == "admin") {
        alert("usuario no valido")
        event.preventDefault()
        return
    }
}