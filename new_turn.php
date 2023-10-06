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

                                            var specialitySelect = document.getElementById("speciality");

                                            var professionalSelect = document.getElementById("professional");

                                            var selectedSpecialityId;
                                            

                                            specialitySelect.addEventListener("change", function () {
                                                console.log("Cambio en la selección de especialidad");
                                                selectedSpecialityId = specialitySelect.value;

                                                if (selectedSpecialityId) {
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "php/obtener_medicos.php",
                                                        data: { speciality_id: selectedSpecialityId },
                                                        success: function (response) {
                                                            // Actualizar el segundo select con las opciones de profesionales
                                                            $("#professional").html(response);
                                                            professionalSelect.value = "Seleccione un médico";
                                                        },
                                                    });
                                                }
                                            });

                                            professionalSelect.addEventListener("change", function () {
                                                var selectedProfessional = professionalSelect.value;

                                                console.log("Médico seleccionado: " + selectedProfessional);

                                                $.ajax({
                                                    type: "POST",
                                                    url: "php/mostrar_dias_hora.php",
                                                    data: { speciality_id: selectedSpecialityId, professional_id: selectedProfessional },

                                                    success: function (response) {
                                                        console.log("Solicitud AJAX exitosa. Respuesta recibida:");
                                                        console.log(response);
                                                        var responseData = JSON.parse(response);

                                                        var availabilityText = responseData.availabilityText;

                                                        var professionalsStatusElement = document.getElementById("professionalsStatus");
                                                        professionalsStatusElement.textContent = "Atiende los: " + availabilityText;

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
                                    <input class="input-text" type="date" name="date" id="date" required>
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
                                
                            </div>
                            <div class=" div-button " id="boton">
                                <input class="button button-turno" type="button" value="Registrar" id="btnAgregar">

                            </div>

                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    console.log("El DOM se ha cargado.");

                                    var turnoGuardado = false; 

                                    
                                    document.getElementById("btnAgregar").addEventListener("click", function () {
                                       
                                        if (turnoGuardado) {
                                            alert("El turno ya se ha guardado anteriormente.");
                                            return;
                                        }

                                        var professional = document.getElementById("professional").value;
                                        var dia = document.getElementById("date").value;
                                        var horario = document.getElementById("hour").value;

                                        console.log("Profesional seleccionado:", professional);
                                        console.log("Día seleccionado:", dia);
                                        console.log("Horario seleccionado:", horario);

                                        document.getElementById("btnAgregar").disabled = true;

                                        $.ajax({
                                            type: "POST",
                                            url: "php/verificar_turno_disponible.php",
                                            data: {
                                                professional: professional,
                                                dia: dia,
                                                horario: horario
                                            },
                                            success: function (response) {
                                                console.log(response);
                                                if (response === "exito") {
                                                    guardarTurno(professional, dia, horario);
                                                } else {
                                                    alert("El turno seleccionado no está disponible. Por favor, elige otro horario.");

                                                    // Habilita el botón nuevamente para que el usuario pueda intentar de nuevo
                                                    document.getElementById("btnAgregar").disabled = false;
                                                }
                                            },
                                            error: function (xhr, status, error) {
                                                // Habilita el botón nuevamente en caso de error
                                                document.getElementById("btnAgregar").disabled = false;
                                            }
                                        });
                                    });
                                });
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