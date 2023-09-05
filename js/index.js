/* Funcion para que aparezca o desaparezca los campos de obra social al clickear el checkbox */
function showSocialWork() {

    social_work__check = document.getElementById("social-work__check");
    if (social_work__check.checked) {
        document.getElementById("affiliate").style.display = "block";
    } else {
        document.getElementById("affiliate").style.display = "none";
    }
}

/* Cuando scrolleo hacia abajo se oculta el header y si scrolleo hacia arriba aparece */
let ubicacionPrincipal = window.pageYOffset;
window.onscroll = function () {
    let desplazamientoActual = window.pageYOffset;
    if (ubicacionPrincipal >= desplazamientoActual) {
        document.querySelector('header').style.top = '0';
    } else {
        document.querySelector('header').style.top = '-100px';
    }
    ubicacionPrincipal = desplazamientoActual
}

/* Función para que aparezca/desaparezca el menú */
function toggleMenu() {
    var menu = document.getElementById("menu-responsive");
    var icon = document.getElementById("icon");
    if (menu.className === "show") {
        menu.className = "";
        icon.className = "";
    } else {
        menu.className = "show";
        icon.className = "close";
    }
}

var button = document.getElementById("burger");
button.onclick = toggleMenu;

/* Mostrar y ocultar bloques en la página de Solicitar Turno */
/*let $info = document.getElementById("div-informacion");
let $firstBlock = document.getElementById("first-block");
//let $secondBlock = document.querySelector("#second-block");
let $newTurn = document.getElementById("btnNuevoTurno");
//let $search = document.querySelector("#search_btn");

$info.style.display = 'none';
$firstBlock.style.display = 'none';
$secondBlock.style.display = 'none';

$newTurn.addEventListener('click', () => {
    $info.style.display = 'block';
    $firstBlock.style.display = 'block';
})

$search.addEventListener('click', () => {
    $secondBlock.style.display = 'block';
})*/


