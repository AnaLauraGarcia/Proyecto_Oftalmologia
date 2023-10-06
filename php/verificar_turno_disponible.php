<?php
include 'conexion_be.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $professional = $_POST["professional"];
    $dia = $_POST["dia"];
    $horario = $_POST["horario"]; 
    
    
    $sqlVerificarTurno = "SELECT * FROM appointments WHERE professional_id = ? AND date = ? AND time = ?";
    $stmtVerificarTurno = $conexion->prepare($sqlVerificarTurno);
    $stmtVerificarTurno->bind_param("iss", $professional, $dia, $horario);
    $stmtVerificarTurno->execute();


    $resultVerificarTurno = $stmtVerificarTurno->get_result();

    if ($resultVerificarTurno->num_rows > 0) {
        
        $row = $resultVerificarTurno->fetch_assoc();
        $estadoTurno = $row["status"];

        
        if ($estadoTurno == "occupied") {
            echo "turno_ocupado"; 
        }
    } else {
        
        $turnoDisponible = true;

        if ($turnoDisponible) {
           
            guardarTurno($professional, $dia, $horario);
        } else {
            echo "no_disponible";
        }
    }

    $stmtVerificarTurno->close();
    $conexion->close();
}


function guardarTurno($professional, $dia, $horario) {
    global $conexion;

    
    $sql = "INSERT INTO appointments (professional_id, date, time, status, users_id)
            VALUES (?, ?, ?, 'occupied', 1)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("iss", $professional, $dia, $horario);

    
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

   
    if ($stmt->execute()) {
        echo "exito"; 
    } else {
        die("Error en la ejecución de la consulta: " . $stmt->error);
    }

    
    $stmt->close();
}
?>
