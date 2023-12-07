<?php
include 'conexion_be.php';

// Aquí tu lógica para consultar los horarios ocupados según la fecha recibida
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedDate = $_POST["dia"];

    // Realiza la consulta para obtener los horarios ocupados para la fecha seleccionada
    $sql = "SELECT a.time FROM appointments a WHERE DATE(a.date) = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $selectedDate);
    $stmt->execute();
    $result = $stmt->get_result();

    $horariosOcupados = [];
    while ($row = $result->fetch_assoc()) {
        $horariosOcupados[] = $row['time'];
    }

    $response = [
        'message' => 'Horarios ocupados para la fecha seleccionada:',
        'horariosOcupados' => $horariosOcupados
    ];

    echo json_encode($response);
}
?>
