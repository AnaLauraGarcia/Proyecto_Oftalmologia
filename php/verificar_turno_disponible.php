<?php
include 'conexion_be.php'; 
// Verifica si se ha recibido la solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario
    $professional = $_POST["professional"];
    $dia = $_POST["dia"];
    $horario = $_POST["horario"]; 
    
    // Asegúrate de que coincida con el nombre del campo en tu formulario

    // Verifica si el turno está disponible (puedes implementar esta lógica según tus necesidades)

    $turnoDisponible = "disponible"; // Cambia esto según tu lógica de disponibilidad

    if ($turnoDisponible) {
        // Aquí va la lógica para verificar la disponibilidad del turno

        // Luego, si el turno está disponible, puedes continuar con la inserción de datos en la base de datos
        // Incluye el archivo de conexión a la base de datos

        // Prepara la consulta SQL para insertar el turno
        $sql = "INSERT INTO appointments (professional_id, date, time, status, users_id)
                VALUES (?, ?, ?, 'available', 1)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("iss", $professional, $dia, $horario);

        // Después de la preparación de la consulta
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $conexion->error);
        }

        // Después de la ejecución de la consulta
        if ($stmt->execute()) {
            echo "exito"; // Indica éxito en la inserción
        } else {
            die("Error en la ejecución de la consulta: " . $stmt->error);
        }

        // Cierra la conexión
        $stmt->close();
        $conexion->close();
    } else {
        echo "no_disponible"; // Indica que el turno no está disponible
    }
}
?>
