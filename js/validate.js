/* Validación de Formulario de Login */
function login() {
    console.log("Login function called");
    let email = document.getElementById(`emailLogin`);
    let password = document.getElementById(`passwordLogin`)
    if (email.value === '' && password.value === '') {
        Swal.fire({
            icon: `error`,
            title: `Oops...`,
            text: `Debes completar los campos`
        })
        email.classList.add("error");
        password.classList.add("error");
    } else {
        if (controlEmail() && controlPassword()) {
            Swal.fire({
                icon: `success`,
                title: `OK`,
                text: `Te damos la bienvenida...`
                
            })

            email.classList.remove("error");
            password.classList.remove("error");           
        }
    }
}

//control de visualizacion del password

function showPassword(){
    let password = document.getElementById(`passwordLogin`) ; 
    let imgEye = document.getElementById(`eye`)
    let eye = "./img/login/ojo.png" ;
    let notEye = "./img/login/ver.png"

    if(password.type===`password`){
        password.type=`text`
        imgEye.src=notEye
    }else{
        if(password.type===`text`){
            password.type=`password`
            imgEye.src=eye
        }
    }

}

// Validacion del correo de login
function controlEmail() {
    let digitEmail = /^[a-zA-Z][a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    let email = document.getElementById(`emailLogin`);
    if (!digitEmail.test(email.value)) {
        Swal.fire({
            icon: `error`,
            title: `Oops...`,
            text: `Revisa la sintaxis del email. Debe ser del tipo: ejemplo@email.com`
        })
        email.classList.add("error")
        return false
    } else {
        email.classList.remove("error")
        return true
    }
}

// Validacion de la clave de login
function controlPassword() {
    let regexPassword = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]).+$/;
    let password = document.getElementById(`passwordLogin`);
    if (!regexPassword.test(password.value)) {
        Swal.fire({
            icon: `error`,
            title: `Oops...`,
            text: `La clave debe contener al menos 8 caracteres y tener: \n
             al menos una mayúscula, un caracter especial y un numero`
        })
        password.classList.add("error");
        return false
    } else {
        password.classList.remove("error");
        return true
    }
}


// Validación de campos de los formularios de Register y Contact
function confirmation(){
    let password2 = document.getElementById(`password2`) ; 
    let imgEye2 = document.getElementById(`eyeRegister2`) ;
    let eye = "./img/login/ojo.png" ;
    let notEye = "./img/login/ver.png"

    if(password2.type===`password`){
        password2.type=`text`
        imgEye2.src=notEye
    }else{
        if(password2.type===`text`){
            password2.type=`password`
            imgEye2.src=eye
        }
    }
    
}

function passwordDisplay(){
    let password = document.getElementById(`password`) ;
    let imgEye = document.getElementById(`eyeRegister`) ;
    
    let eye = "./img/login/ojo.png" ;
    let notEye = "./img/login/ver.png"

    if(password.type===`password`){
        password.type=`text`
        imgEye.src=notEye
    }else{
        if(password.type===`text`){
            password.type=`password`
            imgEye.src=eye
        }
    }
    
}

function evalName() {
    let name = document.getElementById("name").value;
    let element = document.getElementById("nameStatus");
    let regExName = /^([A-Z][a-z]+\s{0,1})+$/g;
    if (name != '') {
        if (regExName.test(name)) {
            element.innerHTML = ''
            return true;
        } else {
            element.innerHTML = "Solo se permiten letras. Primer letra mayúscula y el resto minúsculas";
            element.style.color = "red";
        }
    } else {
        element.innerHTML = "Este campo es obligatorio";
        element.style.color = "red";
    }
}
function evalLastName() {
    let lastName = document.getElementById("lastName").value;
    let element = document.getElementById("lastNameStatus");
    let regExName = /^([A-Z][a-z]+\s{0,1})+$/g;
    if (lastName != '') {
        if (regExName.test(lastName)) {
            element.innerHTML = ''
            return true;
        } else {
            element.innerHTML = "Solo se permiten letras. Primer letra mayúscula y el resto minúsculas";
            element.style.color = "red";
        }
    } else {
        element.innerHTML = "Este campo es obligatorio";
        element.style.color = "red";
    }
}
function evalDni() {
    let dni = document.getElementById("dni").value;
    let element = document.getElementById("dniStatus");
    let regExName = /^([0-9]{8})$/g;
    if (dni != '') {
        if (regExName.test(dni)) {
            element.innerHTML = ''
            return true;
        } else {
            element.innerHTML = "Solo se permiten el ingreso de ocho números";
            element.style.color = "red";
        }
    } else {
        element.innerHTML = "Este campo es obligatorio";
        element.style.color = "red";
    }
}
function evalBirthday() {
    let birthday = document.getElementById("birthday").value;
    let element = document.getElementById("birthdayStatus");
    if (birthday != '') {
        element.innerHTML = ''
        return true
    } else {
        element.innerHTML = "Este campo es obligatorio";
        element.style.color = "red";
    }
}
function evalPhone() {
    let phone = document.getElementById("phone").value;
    let element = document.getElementById("phoneStatus");
    let regExName = /^(?:(?!(0|15))\d{10})$/;
    if (phone != '') {
        if (regExName.test(phone)) {
            element.innerHTML = ''
            return true;
        } else {
            element.innerHTML = "El número no debe contner ni el 0 ni el 15";
            element.style.color = "red";
        }
    } else {
        element.innerHTML = "Este campo es obligatorio";
        element.style.color = "red";
    }
}
function evalEmail() {
    let email = document.getElementById("email").value;
    let element = document.getElementById("emailStatus");
    let regExName = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email != '') {
        if (regExName.test(email)) {
            element.innerHTML = ''
            return true;
        } else {
            element.innerHTML = "El formato de email debe ser: ejemplo@email.com";
            element.style.color = "red";
        }
    } else {
        element.innerHTML = "Este campo es obligatorio";
        element.style.color = "red";
    }
}
function evalAffiliateName() {
    let aName = document.getElementById("affiliateName").value;
    let element = document.getElementById("affiliateNameStatus");
    let regExName = /^([A-Z][a-z]+\s{0,1})+$/g;
    if (aName != '') {
        if (regExName.test(aName)) {
            element.innerHTML = ''
            return true;
        } else {
            element.innerHTML = "Solo se permiten letras. Primer letra mayúscula y el resto minúsuculas";
            element.style.color = "red";
        }
    } else {
        element.innerHTML = "Este campo es obligatorio";
        element.style.color = "red";
    }
}
function evalAffiliateNumber() {
    let aNumber = document.getElementById("affiliateNumber").value;
    let element = document.getElementById("affiliateNumberStatus");
    let regExName = /^([0-9]{10})$/g;
    if (aNumber != '') {
        if (regExName.test(aNumber)) {
            element.innerHTML = ''
            return true;
        } else {
            element.innerHTML = "Solo se permiten números con un máximo de 10";
            element.style.color = "red";
        }
    } else {
        element.innerHTML = "Este campo es obligatorio";
        element.style.color = "red";
    }
}
function evalProvincia() {
    let prov = document.getElementById("selectProvincia").value;
    let element = document.getElementById("provinciaStatus");
    if (prov != 'Seleccione una Provincia') {
        element.innerHTML = ''
        return true;
    } else {
        element.innerHTML = "Este campo es obligatorio";
        element.style.color = "red";
    }
}
function evalMunicipio() {
    let muni = document.getElementById("selectMunicipio");
    let element = document.getElementById("municipioStatus");
    if (muni.value != 'Seleccione un Municipio' || muni.disabled) {
        element.innerHTML = ''
        return true;
    } else {
        element.innerHTML = "Este campo es obligatorio";
        element.style.color = "red";
    }
}
function evalLocalidad() {
    let loc = document.getElementById("selectLocalidad").value;
    let element = document.getElementById("localidadStatus");
    if (loc != 'Seleccione una Localidad') {
        element.innerHTML = ''
        return true;
    } else {
        element.innerHTML = "Este campo es obligatorio";
        element.style.color = "red";
    }
}
function evalAddress() {
    let address = document.getElementById("address").value;
    let element = document.getElementById("addressStatus");
    let regExName = /^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚäëïöüÄËÏÖÜ\s\.,-]+$/g;
    if (address != '') {
        if (regExName.test(address)) {
            element.innerHTML = ''
            return true;
        } else {
            element.innerHTML = "No es una dirección válida";
            element.style.color = "red";
        }
    } else {
        element.innerHTML = "Este campo es obligatorio";
        element.style.color = "red";
    }
}
function evalPass() {
    let pass = document.getElementById("password").value;
    let element = document.getElementById("passwordStatus");
    let regExName = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[_.!])(?!.*\s).{8,}$/;
    if (pass != '') {
        if (regExName.test(pass)) {
            element.innerHTML = ''
            return true;
        } else {
            element.innerHTML = "No es una contraseña válida";
            element.style.color = "red";
        }
    } else {
        element.innerHTML = "Este campo es obligatorio";
        element.style.color = "red";
    }
}
function evalPass2() {
    let pass = document.getElementById("password").value;
    let pass2 = document.getElementById("password2").value;
    let element = document.getElementById("password2Status");
    if (pass2 != '') {
        if (pass === pass2) {
            element.innerHTML = ''
            return true;
        } else {
            element.innerHTML = "Las contraseñas no coinciden";
            element.style.color = "red";
        }
    } else {
        element.innerHTML = "Este campo es obligatorio";
        element.style.color = "red";
    }
}
function evalSocialCheck() {
    let socialCheck = document.getElementById("social-work__check");
    if (socialCheck.checked) {
        return true;
    }
}
function evalMessage() {
    let message = document.getElementById("message").value;
    let element = document.getElementById("messageStatus");
    if (message != '') {
        element.innerHTML = ''
        return true;
    } else {
        element.innerHTML = "Este campo es obligatorio";
        element.style.color = "red";
    }
}


evalRegisterForm = () => {
    document.getElementById("name").addEventListener("input", evalName);
    document.getElementById("lastName").addEventListener("input", evalLastName);
    document.getElementById("dni").addEventListener("input", evalDni);
    document.getElementById("birthday").addEventListener("input", evalBirthday);
    document.getElementById("phone").addEventListener("input", evalPhone);
    document.getElementById("email").addEventListener("input", evalEmail);
    document.getElementById("affiliateName").addEventListener("input", evalAffiliateName);
    document.getElementById("affiliateNumber").addEventListener("input", evalAffiliateNumber);
    document.getElementById("selectProvincia").addEventListener("input", evalProvincia);
    document.getElementById("selectMunicipio").addEventListener("input", evalMunicipio);
    document.getElementById("selectLocalidad").addEventListener("input", evalLocalidad);
    document.getElementById("address").addEventListener("input", evalAddress);
    document.getElementById("password").addEventListener("input", evalPass);
    document.getElementById("password2").addEventListener("input", evalPass2);
    document.getElementById("social-work__check").addEventListener("change", evalSocialCheck);

    if (evalName() & evalLastName() & evalDni() & evalBirthday() & evalPhone() & evalEmail() & evalProvincia() & evalMunicipio() & evalLocalidad() & evalAddress() & evalPass() & evalPass2()) {
        Swal.fire({
            icon: 'success',
            title: 'Gracias por registrarse!',
            text: 'Sus datos se guardaron exitosamente'
        });
    } else if (evalSocialCheck()) {
        if (evalAffiliateName() & evalAffiliateNumber()) {
            Swal.fire({
                icon: 'success',
                title: 'Gracias por registrarse!',
                text: 'Sus datos se guardaron exitosamente'
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Verifique los errores'
            });
        }
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Verifique los errores'
        });
    }
}

evalContactForm = () => {
    document.getElementById("name").addEventListener("input", evalName);
    document.getElementById("lastName").addEventListener("input", evalLastName);
    document.getElementById("phone").addEventListener("input", evalPhone);
    document.getElementById("message").addEventListener("input", evalMessage);
    if (!(evalName() & evalLastName() & evalPhone() & evalMessage())) {
        Swal.fire({
            icon: 'error',
            title: 'Verifique los errores'
        });
    }
}

evalRecoveryForm = () => {
    document.getElementById("email").addEventListener("input", evalEmail);
    if (evalEmail()) {
        Swal.fire({
            icon: 'success',
            title: 'Tu email se ha enviado correctamente!'
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Verifique los errores'
        });
    }
}

/* Validación formularios New Turn */
/*function evalService() {
    let especialidad = document.getElementById("especialidad").value;
    let element = document.getElementById("servicesStatus");
    if (especialidad != 'Seleccione una especialidad') {
        element.innerHTML = ''
        return true;
    } else {
        element.innerHTML = "Este campo es obligatorio";
        element.style.color = "red";
    }
}
function evalProfessionals() {
    let profesional = document.getElementById("medicos").value;
    let element = document.getElementById("professionalsStatus");
    if (profesional != 'Seleccione un médico') {
        element.innerHTML = ''
        return true;
    } else {
        element.innerHTML = "Este campo es obligatorio";
        element.style.color = "red";
    }
}
function evalDate() {
    let fecha= document.getElementById("date").value;
    let element = document.getElementById("dateStatus");
    if (fecha != '' ) {
        element.innerHTML = ''
        return true;
    } else {
        element.innerHTML = "Este campo es obligatorio";
        element.style.color = "red";
    }
}    
function evalHour() {
    let hora = document.getElementById("hour").value;
    let element = document.getElementById("hourStatus");
    if (hora != '' ) {
        element.innerHTML = ''
        return true;
    } else {
        element.innerHTML = "Este campo es obligatorio";
        element.style.color = "red";
    }
}

evalNewTurnForm1 = () => {
    document.getElementById("especialidad").addEventListener("input", evalService);
    document.getElementById("medicos").addEventListener("input", evalProfessionals);
    if (evalService() && evalProfessionals()) {
        Swal.fire({
            icon: 'success',
            title: 'Envio Exitoso'
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Verifique los errores'
        });
    }
}

evalNewTurnForm2 = () => {
    document.getElementById("date").addEventListener("input", evalDate);
    document.getElementById("hour").addEventListener("input", evalHour);
    if (evalDate() && evalHour()) {
        Swal.fire({
            icon: 'success',
            title: 'Envio Exitoso'
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Verifique los errores'
        });
    }
}*/

