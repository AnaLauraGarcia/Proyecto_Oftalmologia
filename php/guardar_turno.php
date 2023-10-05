function saveAppointment($professional, $speciality, $date, $time, $user) {
    include 'conexion_be.php'; // Asegúrate de incluir tu archivo de conexión

    // Ejemplo de consulta SQL (ajusta la consulta según tu base de datos)
    $sql = "INSERT INTO turnos (profesional_id, especialidad_id, fecha, hora, usuario_id) VALUES (?, ?, ?, ?, ?)";
    
    // Prepara la consulta
    $stmt = $conexion->prepare($sql);
    
    // Enlaza los parámetros
    $stmt->bind_param("iissi", $professional, $speciality, $date, $time, $user);
    
    // Ejecuta la consulta
    if ($stmt->execute()) {
        // El turno se guardó exitosamente
        return true;
    } else {
        // Ocurrió un error al guardar el turno
        return false;
    }
    
    // Cierra la conexión y el statement
    $stmt->close();
    $conexion->close();
}