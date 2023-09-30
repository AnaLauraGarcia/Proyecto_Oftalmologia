function showPassword(){
    console.log("La función se está ejecutando.");

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