function checkPassword(event) {

    let pass1 = document.getElementById("pass1")
    let pass2 = document.getElementById("pass2")
    if (pass1.value != pass2.value) {
        alert("la contraseñas no corresponden")
        event.preventDefault()
    }
}
function activarEditar() {

    let doc = document.getElementById("inv");
    doc.style.display = "block";
}


function showPassword() {

    let doc = document.querySelectorAll("#passLogin");
    for (let i = 0; i < doc.length; i++) {
        if (doc[i].type == "password") {
            doc[i].setAttribute('type', 'text');
        } else {
            doc[i].setAttribute('type', 'password');
        }
    }
}
