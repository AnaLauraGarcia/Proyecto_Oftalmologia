<?php
    // session_start();

    // if (isset($_SESSION['users'])){
    //     header("location: index.php");
    // }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro de Salud Integral - Login</title>
    <link rel="icon" href="img/logo.svg">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">
</head>

<body id="app">
    <header class="header" id="header">
        <miheader></miheader>
    </header>
    <main class="main">
        <section class="hero">
            <div class="container">
                <h1>Ingreso</h1>
            </div>
        </section>
        <div class="container">
            <div class="content">
                <div class="form-flex">
                    <!-- form login -->
                    <form action="php/login_usuario_be.php" method="POST" class="formLogin" id="formLogin">
                        <legend>Acceda a su cuenta</legend>
                        <label for="emailLogin" class="form-label">Email*</label>
                        <input id="emailLogin" type="text" placeholder="Ingrese su Email" name="email" autocomplete="email">

                        <!--  -->
                        <label for="passwordLogin" class="form-label">Contraseña*</label>
                        <div class="showP">
                        
                        <img src="./img/login/ojo.png" alt="" class="showPassword" onclick="showPassword()" id="eye">
                        </div>
                        <input id="passwordLogin" type="password" class="form-control" id="exampleInputPassword1" name="password" 
                            placeholder="Ingrese su Contraseña" autocomplete="password">
                  
                        <!--  -->
                        <div class="containerFooterLogin">
                            <label class="social-work__label">
                                <input type="checkbox" name="social-work" id="social-work__check"
                                    onclick="showSocialWork()">Recordarme
                                
                                <i></i>
                        
                            </label>
                            <span class="span-text"> <a href="recovery.html">Recuperar Contraseña</a></span>
                            <span class="span-text">¿No tiene cuenta? <a href="./register.html">Registrese
                                    acá</a></span>
                            <button type="button" class="button submit-button" id="access" onclick="submit()">Ingresar</button>

                        </div>
                    </form>
                    <!-- =============================------=========================== -->
                </div>
            </div>
        </div>
    </main>
    <footer class="footer">
        <mifooter></mifooter>
    </footer>

    <script src="js/components.js"></script>
    <script src="js/scriptvue.js"></script>

    <script src="js/eye.js"></script>

</body>
</body>

</html>