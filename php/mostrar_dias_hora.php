<?php
// Establecer la conexión con la base de datos (reemplaza con tus propios datos)
include 'conexion_be.php';

// Verificar si se proporcionó un ID de profesional
if (isset($_POST['professional_id'])) {
    $specialityId = $_POST['speciality_id'];
    $professionalId = $_POST['professional_id'];

    // ID de la especialidad (debes obtenerlo de alguna manera)
    $specialityId = $_POST['speciality_id'];

    // Consulta SQL para obtener los días y horarios de disponibilidad del profesional
    $sql = "SELECT a.day_of_week, a.start_time, a.end_time 
        FROM availability a 
        WHERE a.professional_id = ? AND a.speciality_id = ?";


    // Preparar la consulta
    $stmt = $conexion->prepare($sql);
    
    // Vincular los parámetros a la consulta
    $stmt->bind_param("ii", $professionalId, $specialityId);

    // Ejecutar la consulta
    if (!$stmt->execute()) {
        // Registro de error en el archivo de registro de errores o salida de errores
        error_log("Error al ejecutar la consulta SQL: " . $stmt->error);
        echo "Error en la consulta SQL: " . $stmt->error;
        exit; // Terminar la ejecución del script
    }

    // Obtener el resultado de la consulta
    $result = $stmt->get_result();

    // Crear una cadena para almacenar los días y horarios
    $availabilityText = "";

    // Procesar los resultados y agregarlos a la cadena
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $day = $row['day_of_week'];
            $startTime = $row['start_time'];
            $endTime = $row['end_time'];

            // Agregar los datos a la cadena
            $availabilityText .= "$day - Desde: $startTime hasta: $endTime, ";
         
        }

        // Eliminar la coma y el espacio extra al final
        $availabilityText = rtrim($availabilityText, ', ');
    } else {
        $availabilityText = "No se encontraron disponibilidades.";
    }

    // Cerrar la conexión
    $stmt->close();

    // Devolver los resultados como una respuesta JSON
    $response = array("availabilityText" => $availabilityText);
    echo json_encode($response);

} else {
    echo "No se proporcionó un ID de profesional.";
}
?>
