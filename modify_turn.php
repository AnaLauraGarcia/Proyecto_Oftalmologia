

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
     
    <script>
        
    </script>






        <header class="header" id="header">
            <miheader></miheader>
        </header>
        <main class="main">
            <section class="hero">
                <div class="container">
                    <h1>Modificar Turno</h1>
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
                            
                            <p>Modifique el día y el horario.</p>
                        </div>
                        <div class="div-form" id="first-block">

                            <form action="" id="formNewTurn1" method="post">
                                <div class="input-container">
                                    <div class="form-register__input">
                                        <label class="text-label" for="Especialidades"> Especialidad:</label>
                                            <select class="input-text" name="speciality_id" id="speciality" required disabled></select>
                                            
                                        <p id="servicesStatus"> </p>
                                    </div>

                                    <div class="form-register__input">
                                    <label class="text-label" for="Medicos">Profesional:</label>
                                    <select class="input-text" id="professional" name="professional" required>
                                        <option value="Seleccione un médico" selected disabled>Seleccione un profesional</option>    
                                    </select>
                                        <p id="professionalsStatus"></p>
                                        <script>
                                            var idSpeciality; // Inicializar la variable con un valor inicial
        
                                                $(document).ready(function () {
                                                    
                                                    var dateInput;
                                                    var popularHours;
                                                    var hourInput;
                                                    var professionalSelect;

                                                    var idTurno = localStorage.getItem('idTurno');
                                                    var date = localStorage.getItem('date');
                                                    var time = localStorage.getItem('time');
                                                    var speciality = localStorage.getItem('speciality');
                                                    var professional = localStorage.getItem('professional');


                                                    $('#date').prop('disabled', true);
                                                    $('#hour').prop('disabled', true);

                                                    $.ajax({
                                                        type: "POST",
                                                        url: "php/obtener_datos_turno.php",
                                                        data: { idTurno: idTurno },
                                                        success: function (response) {
                                                            try {
                                                                var datosTurno = JSON.parse(response);
                                                                console.log(response);
                                                                idSpeciality = datosTurno.speciality_id;


                                                                $('#date').prop('disabled', false);
                                                                $('#hour').prop('disabled', false);

                                                                $('#date').val(date);
                                                                $('#hour').val(time);

                                                                var optionSpeciality = new Option(speciality);
                                                                $('#speciality').append(optionSpeciality).trigger('change');

                                                                obtenerProfesionales();
                                                            
                                                            } catch (error) {
                                                                console.error("Error al analizar la respuesta JSON:", error);
                                                            }
                                                        },
                                                        error: function (xhr, status, error) {
                                                            console.error("Error en la solicitud AJAX para obtener datos del turno:", error);
                                                        }

                                                   });
                                


                                                    var specialitySelect = document.getElementById("speciality");
                                    
                                                    specialitySelect.value = idSpeciality;
                                                    professionalSelect = document.getElementById("professional");

                                                    function obtenerProfesionales() {
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "php/obtener_medicos.php",
                                                            data: { speciality_id: idSpeciality },
                                                            success: function (response) {
                                                                $("#professional").html(response);

                                                                $(professionalSelect).on("change", function () {
                                                                    // Obtén el nombre y el ID del profesional seleccionado
                                                                    const selectedProfessional = professionalSelect.options[professionalSelect.selectedIndex];
                                                                    const professionalName = selectedProfessional.text;
                                                                    const professionalId = selectedProfessional.value;

                                                                    // Muestra el nombre y el ID en un elemento HTML
                                                                });

                                                                // Establece el valor seleccionado si ya hay un profesional almacenado
                                                                professionalSelect.value = professional;
                                                            },
                                                        });
                                                    }

                                                    professionalSelect.addEventListener("change", function () {
                                                        var selectedProfessional = professionalSelect.value;

                                                        console.log("Cambio en la selección del profesional. ID " + selectedProfessional);

                                                        $.ajax({
                                                            type: "POST",
                                                            url: "php/mostrar_dias_hora.php",
                                                            data: { speciality_id: idSpeciality, professional_id: selectedProfessional },

                                                            success: function (response) {
                                                        
                                                                var responseData = JSON.parse(response);

                                                                var availabilityText = responseData.availabilityText;

                                                                var professionalsStatusElement = document.getElementById("professionalsStatus");
                                                                professionalsStatusElement.textContent = "Atiende los " + availabilityText;

                                                            },
                                                            error: function (xhr, status, error) {
                                                                console.error("Error en la solicitud AJAX: " + error);
                                                            }
                                                        });
                                                    });
                                                });
                                               
                                        </script>

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
                                        <p id="professionalsDate" style="font-size: 16px; color: #bd1717; margin-top: 10px;"></p>

                                    </div>
                                    <div class="form-register__input">
                                        <label for="hour">Hora</label>
                                        <input id="hour" class="input-text" type="time" list="popularHours"
                                            required>
                                            <datalist id="popularHours"></datalist>
                                            


                                            <script>
                                                document.addEventListener("DOMContentLoaded", function () {
                                                    const dateInput = document.getElementById("date");
                                                    const popularHours = document.getElementById("popularHours");
                                                    const hourInput = document.getElementById('hour');
                                                    const registerButton = document.getElementById('btnAgregar');
                                                    const specialityElement = document.getElementById('speciality');
                                                    const professionalElement = document.getElementById('professional');
                                                    
             

                                                    function obtenerHorariosOcupados() {
                                                        const selectedDate = dateInput.value;
                                                        const speciality = specialityElement.value;
                                                        const professional = professionalElement.value;

                                                        $.ajax({
                                                            type: "POST",
                                                            url: "php/consultar_horarios_ocupados.php",
                                                            data: { speciality: speciality, professional: professional, dia: selectedDate },
                                                            success: function (response) {
                                                                try {
                                                                    const horariosOcupadosResponse = JSON.parse(response);

                                                                    if (horariosOcupadosResponse.horariosOcupados) {
                                                                        const horariosOcupadosArray = horariosOcupadosResponse.horariosOcupados;

                                                                        popularHours.innerHTML = ""; // Limpiar las opciones

                                                                        const todosHorarios = [];
                                                                        for (let i = 8; i < 16; i++) {
                                                                            todosHorarios.push(`${i.toString().padStart(2, '0')}:00:00`);
                                                                            todosHorarios.push(`${i.toString().padStart(2, '0')}:30:00`);
                                                                        }

                                                                        const horariosDisponibles = todosHorarios.filter((horario) => !horariosOcupadosArray.includes(horario));

                                                                        horariosDisponibles.forEach((horario) => {
                                                                            const option = document.createElement('option');
                                                                            option.value = horario;
                                                                            popularHours.appendChild(option);
                                                                        });
                                                                    } else {
                                                                        console.error("La respuesta no contiene horarios ocupados:", response);
                                                                    }
                                                                } catch (error) {
                                                                    console.error("Error al analizar la respuesta JSON:", error);
                                                                }
                                                            },
                                                            error: function (xhr, status, error) {
                                                                console.error("Error al obtener los horarios ocupados:", error);
                                                            }
                                                        });
                                                    }

                                                    dateInput.addEventListener("change", function () {
                                                        const selectedDate = new Date(dateInput.value);
                                                        const currentDate = new Date();    
                                                        console.log("Fecha seleccionada por el usuario:", selectedDate);

                                                        if (selectedDate.toDateString() >= currentDate.toDateString()) {
                                                            const speciality = idSpeciality;
                                                            const professional = professionalElement.value;
                                                            const dia = dateInput.value;
                                                            const horario = hourInput.value;
                                                            console.log("Reeeeeeeeeecibido speciality:", speciality);
                                                            console.log("Recibido professional:", professional);
                                                            console.log("Recibido dia:", dia);
                                                            console.log("Recibido horario:", horario);

                                                            $.ajax({
                                                                type: "POST",
                                                                url: "php/obtener_disponibilidad.php",
                                                                data: { speciality, professional, dia, horario },
                                                                success: function (response) {
                                                                    var responseData = JSON.parse(response);
                                                                    var professionalsDateElement = document.getElementById("professionalsDate");
                                                                    var messageText = responseData.message;

                                                                    professionalsDateElement.textContent = messageText;

                                                                    if (responseData.status === "exito") {
                                                                        obtenerHorariosOcupados();
                                                                        hourInput.disabled = false;
                                                                        registerButton.style.display = "inline"; // Muestra el botón
                                                                    } else if (responseData.status === "fallo") {
                                                                        professionalsDateElement.textContent = "Este profesional junto con esta especialidad atiende solo los días: " + responseData.dayAssigned;
                                                                        hourInput.disabled = true;
                                                                        registerButton.style.display = "none"; // Oculta el botón
                                                                    }
                                                                },
                                                                error: function (xhr, status, error) {
                                                                    console.error("Error en la solicitud AJAX: " + error);
                                                                }
                                                            });
                                                        } else {
                                                            hourInput.disabled = true;
                                                            popularHours.disabled = true;
                                                            popularHours.innerHTML = "";
                                                            registerButton.disabled = true;
                                                        }
                                                    });


                                                    obtenerHorariosOcupados(); // Llamada inicial al cargar el formulario
                                                });

                                            </script>
                                    </div>
                                    
                                </div>
                                <div class=" div-button " id="boton">
                                <input class="button button-turno" type="button" value="Modificar" id="btnAgregar" style="display: none;">

                                </div>
                                
                                <script>

                                    document.addEventListener("DOMContentLoaded", function () {
                                        var turnoGuardado = false;

                                        document.getElementById("btnAgregar").addEventListener("click", function () {
                                            console.log("Clic en el botón");
                                            var speciality = document.getElementById("speciality").value;
                                            var professional = document.getElementById("professional").value;
                                            var dia = document.getElementById("date").value;
                                            var horario = document.getElementById("hour").value;

                                            console.log("Especialidad seleccionada:", idSpeciality);
                                            console.log("Profesional seleccionado:", professional);
                                            console.log("Día seleccionado:", dia);
                                            console.log("Horario seleccionado:", horario);

                                            // Deshabilitar el botón para evitar clics repetidos
                                            document.getElementById("btnAgregar").disabled = true;

                                            $.ajax({
                                                type: "POST",
                                                url: "php/modificar_turno.php",
                                                data: {
                                                    speciality: idSpeciality,
                                                    professional: professional,
                                                    dia: dia,
                                                    horario: horario
                                                },
                                                success: function (response) {
                                                    console.log(response);
                                                    if (response.trim() === "exito") {
                                                        console.log("Turno guardado correctamente.");
                                                        // Redirigir a la página de turnos una vez que el turno se guarde con éxito.
                                                        // window.location.href = "turns.php";
                                                    } else {
                                                        alert("El turno seleccionado no está disponible. Por favor, elige otro horario.");
                                                    }
                                                },
                                                error: function (xhr, status, error) {
                                                    console.error("Error en la solicitud AJAX: " + error);
                                                },
                                                complete: function () {
                                                    // Habilitar el botón después de completar la solicitud, ya sea éxito o error
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
        <!-- <script src="js/obtener_horas.js"></script> -->
        <!-- <script src="js/validate.js"></script> -->
    </body>

</html>