<?php
include 'conexion_be.php';

// Recibir los parámetros de la solicitud AJAX
$speciality = $_POST["speciality"];
$professional = $_POST["professional"];
$dia = $_POST["dia"];
$horario = $_POST["horario"];





$dayOfWeekSelected = date('l', strtotime($dia));

// Mapear los días de la semana en inglés a español
$daysMapping = [
    'Monday' => 'Lunes',
    'Tuesday' => 'Martes',
    'Wednesday' => 'Miercoles',
    'Thursday' => 'Jueves',
    'Friday' => 'Viernes',
    'Saturday' => 'Sabado',
    'Sunday' => 'Domingo'
];



// Verificar si el día está en inglés y mapearlo a español
$dayOfWeekSpanish = array_key_exists($dayOfWeekSelected, $daysMapping) ? $daysMapping[$dayOfWeekSelected] : '';

// Consulta para obtener la disponibilidad según los parámetros
$sql = "SELECT p.name, s.name, a.day_of_week 
        FROM availability a 
        INNER JOIN professional p ON p.id = a.professional_id
        INNER JOIN speciality s ON s.id = a.speciality_id
        WHERE professional_id = ? AND speciality_id = ?";



$stmt = $conexion->prepare($sql);
$stmt->bind_param("ii", $professional, $speciality);
$stmt->execute();

$result = $stmt->get_result();

$availabilityData = array(); // Inicializar array para los datos de disponibilidad

$dayAssigned = null; // Inicializar la variable para almacenar el día asignado
if ($result->num_rows > 0) {
    // Recopilar los resultados de la consulta en un array
    while ($row = $result->fetch_assoc()) {
        $availabilityData[] = $row;
        $dayAssigned = $row['day_of_week']; // Guardar el día asignado
    }

    $availableDays = array_column($availabilityData, 'day_of_week');

    if (in_array($dayOfWeekSpanish, $availableDays)) {
        $response = array(
            'status' => 'exito', // Indicador de éxito
            'dayAssigned' => $dayAssigned // Nombre del día asignado
        );
    } else {
        $response = array(
            'status' => 'fallo', // Indicador de fallo
            'dayAssigned' => $dayAssigned // Nombre del día asignado
        );
    }
} else {
    $response = array(
        'status' => 'nodata', // Si no se encontraron datos de disponibilidad
        'dayAssigned' => $dayAssigned // Aquí puedes manejar el nombre del día
    );
}


// Cerrar la conexión a la base de datos
$stmt->close();

echo json_encode($response);

?>
