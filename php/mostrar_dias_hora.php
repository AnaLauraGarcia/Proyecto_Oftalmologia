<?php
include 'conexion_be.php';

if (isset($_POST['professional_id'])) {
    $specialityId = $_POST['speciality_id'];
    $professionalId = $_POST['professional_id'];

    $specialityId = $_POST['speciality_id'];

    $sql = "SELECT a.day_of_week, a.start_time, a.end_time 
        FROM availability a 
        WHERE a.professional_id = ? AND a.speciality_id = ?";


    $stmt = $conexion->prepare($sql);
    
    $stmt->bind_param("ii", $professionalId, $specialityId);

    if (!$stmt->execute()) {
        error_log("Error al ejecutar la consulta SQL: " . $stmt->error);
        echo "Error en la consulta SQL: " . $stmt->error;
        exit; 
    }

    $result = $stmt->get_result();

    $availabilityText = "";


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $day = $row['day_of_week'];
            $startTime = $row['start_time'];
            $endTime = $row['end_time'];

            $availabilityText .= "$day - Desde: $startTime hasta: $endTime, ";
         
        }

        // Eliminar la coma y el espacio extra al final
        $availabilityText = rtrim($availabilityText, ', ');
    } else {
        $availabilityText = "No se encontraron disponibilidades.";
    }

    $stmt->close();

    $response = array("availabilityText" => $availabilityText);
    echo json_encode($response);

} else {
    echo "No se proporcionó un ID de profesional.";
}
?>
