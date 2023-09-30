<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro de Salud Integral - Nuevo Turno</title>
    <link rel="icon" href="img/logo.webp">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body id="app">
    <header class="header" id="header">
        <miheader></miheader>
    </header>
    <main class="main">
        <section class="hero">
            <div class="container">
                <h1>Solicitar Turno</h1>
            </div>
        </section>
        <div class="container">
            <div class="content">
                <div class="container-turno">

                    <div class="div-informacion informacion1" id="div-informacion">
                        <p>Seleccione la especialidad y el médico para buscar un turno disponible. Luego seleccione la
                            opción "Registrar Turno"</p>
                    </div>
                    <div class="div-form" id="first-block">

                        <form action="" id="formNewTurn1" method="post">
                            <div class="input-container">
                                <div class="form-register__input">
                                    <label class="text-label" for="Especialidades"> Especialidad:</label>
                                    <select class="input-text" name="speciality_id" id="speciality" required>

                                        <option value="Seleccione una especialidad" selected disabled>Seleccione una
                                            especialidad</option>

                                        
                                            <?php
                                                include 'php/obtener_especialidad.php';

                                                if ($resultEspecialidades->num_rows > 0) {
                                                    while ($row = $resultEspecialidades->fetch_assoc()) {
                                                        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                    }
                                                } else {
                                                    echo "No se encontraron especialidades.";
                                                }
                                                ?>
                                        
                                        
                                    </select>

                                    <p id="servicesStatus"> </p>
                                    
                                </div>

                                <div class="form-register__input">
                                    <label class="text-label" for="Medicos">Profesional:</label>
                                    <select class="input-text" id="professional" name="professional" required>
                                        <option value="Seleccione un médico" selected disabled>Seleccione un médico</option>    
                                    </select>

                                  
                                    <p id="professionalsStatus"> </p>
                                </div>

                            </div>
                            <div class="div-button">
                                <input id="btnBuscar" type="submit" value="Buscar" class="button button-turno">
                            </div>
                        </form>
                        
                        <div class="div-informacion">
                            <p id="texto1">
                            </p>
                        </div>
                        <div class="div-informacion informacion2">
                            <p id="texto2"></p>
                        </div>

                        <form id="formulario">
                            <div class="datos-container">
                                <div class="form-register__input">
                                    <label for="date">Fecha</label>
                                    <input class="input-text" type="date" name="" id="date" required>
                                    <p id="dateStatus"> </p>
                                </div>
                                <div class="form-register__input">
                                    <label for="hora">Hora</label>
                                    <input id="hour" class="input-text" type="time" list="popularHours"
                                        required>
                                    <datalist id="popularHours">
                                        <option value="08:00"></option>

                                    <p id="hourStatus"></p>
                                </div>
                                <div class="form-register__input">
                                    <label for="consultorio">Consultorio</label>
                                    <input class="input-text" type="text" name="" value="" id="consultorio" readonly>
                                </div>
                            </div>
                            <div class=" div-button " id="boton">
                                <input class="button button-turno" type="submit" value="Registrar" id="btnAgregar">
                            </div>
                        </form>
                    </div>


                </div>

            </div>
        </div>
        </div>
    </main>
    <footer class="footer">
        <mifooter></mifooter>
    </footer>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="js/components.js"></script>
    <script src="js/scriptvue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/index.js"></script>
    <script src="js/ajax_turno.js"></script>
    <!-- <script src="js/validate.js"></script> -->
</body>

</html>