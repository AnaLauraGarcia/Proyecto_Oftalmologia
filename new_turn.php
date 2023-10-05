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

                <div class="div-informacion informacion3" id="div-informacion">
                        
                        <p>Lunes y Miércoles - Oftalmología<br>
                            Martes y Jueves - Optometría<br>
                        Viernes - Cirugía Ocular </p>
                    </div>

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
                                    <p id="professionalsStatus"></p>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            console.log("El DOM se ha cargado.");

                                            // Obtiene el elemento select de especialidades
                                            var specialitySelect = document.getElementById("speciality");

                                            // Obtiene el elemento select de médicos
                                            var professionalSelect = document.getElementById("professional");

                                            // Variable para almacenar el ID de la especialidad seleccionada
                                            var selectedSpecialityId;

                                            // Agrega un controlador de eventos al elemento select de especialidades
                                            specialitySelect.addEventListener("change", function () {
                                                console.log("Cambio en la selección de especialidad");
                                                // Obtén el valor seleccionado
                                                selectedSpecialityId = specialitySelect.value;

                                                // Llama a la función deseada con el valor seleccionado
                                                if (selectedSpecialityId) {
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "php/obtener_medicos.php",
                                                        data: { speciality_id: selectedSpecialityId },
                                                        success: function (response) {
                                                            // Actualizar el segundo select con las opciones de profesionales
                                                            $("#professional").html(response);
                                                        },
                                                    });
                                                }
                                            });

                                            // Agrega un controlador de eventos al elemento select de médicos
                                            professionalSelect.addEventListener("change", function () {
                                                // Obtén el valor seleccionado del médico y guárdalo en selectedProfessional
                                                var selectedProfessional = professionalSelect.value;

                                                // Muestra un mensaje en la consola cuando se selecciona un médico
                                                console.log("Médico seleccionado: " + selectedProfessional);

                                                // Realiza la solicitud AJAX aquí dentro, para asegurarte de que selectedProfessional esté definida
                                                // y tenga el valor correcto al hacer la solicitud.
                                                $.ajax({
                                                    type: "POST",
                                                    url: "php/mostrar_dias_hora.php",
                                                    data: { speciality_id: selectedSpecialityId, professional_id: selectedProfessional },

                                                    success: function (response) {
                                                        console.log("Solicitud AJAX exitosa. Respuesta recibida:");
                                                        console.log(response);
                                                        var responseData = JSON.parse(response);

                                                        // Accede a la propiedad "availabilityText" del objeto
                                                        var availabilityText = responseData.availabilityText;

                                                        // Actualiza el contenido del elemento <p> con id "professionalsStatus"
                                                        var professionalsStatusElement = document.getElementById("professionalsStatus");
                                                        professionalsStatusElement.textContent = "Atiende el/los: " + availabilityText;

                                                    },
                                                    error: function (xhr, status, error) {
                                                        console.error("Error en la solicitud AJAX: " + error);
                                                    }
                                                });
                                            });
                                        });

                                    </script>
                                  
                                  
                                    

                                    
                                </div>

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
                                        <option value="08:30"></option>
                                        <option value="09:00"></option>
                                        <option value="09:30"></option>
                                        <option value="10:00"></option>
                                        <option value="10:30"></option>
                                        <option value="11:00"></option>
                                        <option value="11:30"></option>
                                        <option value="12:00"></option>
                                        <option value="12:30"></option>
                                        <option value="13:00"></option>
                                        <option value="13:30"></option>
                                        <option value="14:00"></option>
                                        <option value="14:30"></option>
                                        <option value="15:00"></option>
                                        <option value="15:30"></option>
                                    
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

                            <script>
                                // Agrega un controlador de eventos al botón "Registrar"
                                document.getElementById("btnAgregar").addEventListener("click", function () {
                                    // Recopila los datos del formulario
                                    var especialidadSeleccionada = document.getElementById("speciality").value;
                                    var profesionalSeleccionado = document.getElementById("professional").value;
                                    var diaSeleccionado = document.getElementById("date").value;
                                    var horarioSeleccionado = document.getElementById("hour").value;

                                    // Realiza una solicitud AJAX para verificar la disponibilidad del turno
                                    $.ajax({
                                        type: "POST",
                                        url: "verificar_turno_disponible.php",
                                        data: {
                                            especialidad: especialidadSeleccionada,
                                            profesional: profesionalSeleccionado,
                                            dia: diaSeleccionado,
                                            horario: horarioSeleccionado
                                        },
                                        success: function (response) {
                                            if (response === "disponible") {
                                                // El turno está disponible, ahora puedes llamar a la función para guardar el turno
                                                guardarTurno(profesionalSeleccionado, especialidadSeleccionada, diaSeleccionado, horarioSeleccionado);
                                            } else {
                                                // El turno no está disponible, muestra un mensaje de aviso al usuario
                                                alert("El turno seleccionado no está disponible. Por favor, elige otro horario.");
                                            }
                                        },
                                        error: function (xhr, status, error) {
                                            // Maneja errores si ocurren
                                        }
                                    });
                                });

                                // Función para guardar el turno en la base de datos
                                function guardarTurno(especialista, especialidad, dia, horario) {
                                    // Realiza una solicitud AJAX para guardar los datos del turno
                                    $.ajax({
                                        type: "POST",
                                        url: "verificar_turno_disponible.php", // Ruta al archivo PHP que guarda el turno en la base de datos
                                        data: {
                                            especialidad: especialidadSeleccionada,
                                            profesional: profesionalSeleccionado,
                                            dia: diaSeleccionado,
                                            horario: horarioSeleccionado
                                        },
                                        success: function (response) {
                                            // Procesa la respuesta del servidor (puede ser una confirmación de éxito o error)
                                            if (response === "exito") {
                                                alert("El turno se ha registrado exitosamente.");
                                            } else {
                                                alert("Hubo un error al registrar el turno. Por favor, inténtalo nuevamente.");
                                            }
                                        },
                                        error: function (xhr, status, error) {
                                            // Maneja errores si ocurren
                                        }
                                    });
                                }
                            </script>
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
    <!-- <script src="js/ajax_turno.js"></script> -->
    <script src="js/obtener_horas.js"></script>
    <!-- <script src="js/validate.js"></script> -->
</body>

</html>