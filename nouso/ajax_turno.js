document.addEventListener("DOMContentLoaded", function () {
    // Obtiene el elemento select de especialidades
    var specialitySelect = document.getElementById("speciality");

    // Agrega un controlador de eventos al elemento select
    specialitySelect.addEventListener("change", function () {
        // Obtén el valor seleccionado
        var selectedSpecialityId = specialitySelect.value;

        // Llama a la función deseada con el valor seleccionado
        if (selectedSpecialityId) {
            $.ajax({
                type: "POST",

                url: "php/obtener_medicos.php", // Ruta al archivo PHP que obtendrá los profesionales
                data: { speciality_id: selectedSpecialityId },
                success: function (response) {
                    // Actualizar el segundo select con las opciones de profesionales
                    $("#professional").html(response);
                
              },
            });
        }
    });
});

