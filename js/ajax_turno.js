$(document).ready(function () {
    // Evitar que se recargue la página al enviar el formulario
    $("#formNewTurn1").submit(function (event) {
        event.preventDefault();
        // Obtener la especialidad seleccionada
        const selectedSpecialityId = $("#speciality").val();
        
        if (selectedSpecialityId) {
            // Realizar una petición AJAX para cargar profesionales
            $.ajax({
                type: "POST",

                url: "php/obtener_medicos.php", // Ruta al archivo PHP que obtendrá los profesionales
                data: { speciality_id: selectedSpecialityId },
                success: function (response) {
                    // Actualizar el segundo select con las opciones de profesionales
                    $("#professional").html(response);

                    
                    // Mostrar una alerta con la especialidad seleccionada
            
                
                },
            });
        } else {
            alert("No se seleccionó una especialidad.");
        }
    });
});
