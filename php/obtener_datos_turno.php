<?php
// obtener_datos_turno.php

// Función para obtener el ID de especialidad y médico por el ID del turno
function obtenerDatosTurno($idTurno) {
    // Conexión a la base de datos (ajusta según tus configuraciones)
    include 'conexion_be.php';


    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    // Consulta para obtener los datos del turno
    $consulta = "SELECT speciality_id, professional_id FROM appointments WHERE id = ?";

    // Preparar la consulta
    $stmt = $conexion->prepare($consulta);

    // Verificar si la preparación de la consulta fue exitosa
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    // Vincular el parámetro (ID del turno)
    $stmt->bind_param("i", $idTurno);

    // Ejecutar la consulta
    $stmt->execute();

    // Vincular las variables de resultado
    $stmt->bind_result($specialityId, $professionalId);

    // Obtener los resultados
    $stmt->fetch();

    // Cerrar la consulta y la conexión
    $stmt->close();
    $conexion->close();

    // Devolver los resultados en un array asociativo
    return array(
        'speciality_id' => $specialityId,
        'professional_id' => $professionalId
    );
}

// Obtener el ID del turno del cliente
$idTurno = $_POST['idTurno'];

// Obtener los datos del turno
$datosTurno = obtenerDatosTurno($idTurno);

// Devolver los datos del turno en formato JSON
echo json_encode($datosTurno);
?>
