 <?php
    // session_start();

    // if( ! isset($_SESSION['users'])){
    //     echo '
    //         <script> 
    //             alert("Para continuar debes iniciar sesión."); 
    //             window.location = "index.php";
    //         </script>
    //     ';
        
    //     session_destroy();
    //     die(); // Este es el freno. Si el usuario no existe no sigue ejecutando el code.
    // }

   

?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro de Salud Integral - Home</title>
    <link rel="icon" href="img/logo.webp">
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
        <section class="home-hero">
            <div class="overlay"></div>
            <div class="container">
                <h1>Centro de Salud Integral</h1>
                <p>Un centro de salud que promueva el bienestar físico y mental de la comunidad en un ambiente acogedor
                    y cálido.</p>
                <a href="#about" class="button button-banner">Nuestra Misión</a>
            </div>
        </section>
        <section class="about" id="about">
            <div class="container">
                <div class="about-content">
                    <div class="upper-title">
                        <p>Nuestra Misión</p>
                    </div>
                    <h2 class="mision">

                        Nuestra misión es promover y preservar la salud ocular de nuestros pacientes, brindando
                        servicios integrales y de calidad en un ambiente acogedor.
                    </h2>
                </div>
                <div class="about-image">
                    <div class="image">
                        <img src="img/about.webp" alt="Doctor saludando al paciente">
                    </div>
                </div>
            </div>
        </section>
        <section class="professionals">
            <h2>Nuestro Equipo</h2>
            <div class="container">
                <div class="grid-container">
                    <div class="grid-item">
                        <div class="grid-item__content">
                            <div>
                                <img src="img/proffesionals/dra6.webp" alt="Dra. María Miller">
                            </div>
                            <h3>Dra. María Miller</h3>
                            <p>Oftalmóloga especializada en optometría y corrección de problemas de visión.</p>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="grid-item__content">
                            <div>
                                <img src="img/proffesionals/dc2.webp" alt="Dr. Luis Williams">
                            </div>
                            <h3>Dr. Luis Williams</h3>
                            <p>Oculista optometrico dedicado al diagnóstico y tratamiento de enfermedades del glaucoma.</p>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="grid-item__content">
                            <div>
                                <img src="img/proffesionals/dra5.webp" alt="Enfermera Juliana Evans">
                            </div>
                            <h3>Dra. Juliana Evans</h3>
                            <p>Oftalmóloga con enfoque en el diagnóstico y tratamiento de cirugías oculares.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="professionals-button">
                <a href="professionals.html" class="button button-banner">Conocer Mas</a>
            </div>
        </section>
        <section class="services">
            <div class="container">
                <h2>Servicios</h2>
                <div class="grid-services">
                    <a href="services.html#oculista" class="service">
                        <div class="service-item">
                            <h3>Oculista</h3>
                            <div class="service-image">
                                <img src="img/imgServices/oculista.webp" alt="Oculista">
                            </div>
                            <p>Especializado en el diagnóstico, tratamiento y manejo de enfermedades oculares. Su principal objetivo es...
                            </p>
                        </div>
                    </a>
                    <a href="services.html#oftalmologia" class="service">
                        <div class="service-item">
                            <h3>Oftalmología</h3>
                            <div class="service-image">
                                <img src="img/imgServices/oftalmologia.webp" alt="Oftalmología">
                            </div>
                            <p>Especialista médico altamente capacitado en el cuidado integral de la salud ocular. Realiza exámenes minuciosos y...</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <section class="contact-section">
            <div class="container">
                <div class="contact-content">
                    <h2>Contactanos</h2>
                    <h4>Te ayudamos con tu consulta</h4>
                    <a href="contact.html" class="button button-banner">Contacto</a>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <mifooter></mifooter>
    </footer>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="js/components.js"></script>
    <script src="js/scriptvue.js"></script>
    <script src="js/index.js"></script>
</body>
</body>

</html>