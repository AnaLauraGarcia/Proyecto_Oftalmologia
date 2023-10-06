<?php
// Verificar si se ha enviado un ID de turno válido
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $idTurno = $_POST['id'];

    // Realizar la conexión a la base de datos (ajusta las credenciales según tu configuración)
    include 'conexion_be.php';

    // Consulta SQL para eliminar el turno por su ID
    $sql = "DELETE FROM appointments WHERE id = $idTurno";

    if ($conexion->query($sql) === TRUE) {
        // Éxito en la eliminación
        echo 'success';
    } else {
        // Error en la eliminación
        echo 'error';
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    // Si no se proporciona un ID válido, muestra un mensaje de error
    echo 'ID de turno no válido';
}
?>