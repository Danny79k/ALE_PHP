function checkPassword(event){

    let pass1 = document.getElementById("pass1")
    let pass2 = document.getElementById("pass2")
    if (pass1.value != pass2.value){
        alert("la contraseñas no corresponden")
        event.preventDefault()
    }
}