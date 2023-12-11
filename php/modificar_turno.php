<?php
session_start();
include 'conexion_be.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        $speciality = $_POST["speciality"];
        $professional = $_POST["professional"];
        $dia = $_POST["dia"];
        $horario = $_POST["horario"];

        // Verificar si ya existe un turno con los mismos datos
        $sqlCheckDuplicate = "SELECT COUNT(*) FROM appointments WHERE speciality_id = ? AND professional_id = ? AND date = ? AND time = ? AND users_id = ?";
        $stmtCheckDuplicate = $conexion->prepare($sqlCheckDuplicate);
        $stmtCheckDuplicate->bind_param("iissi", $speciality, $professional, $dia, $horario, $user_id);
        $stmtCheckDuplicate->execute();
        $stmtCheckDuplicate->bind_result($count);
        $stmtCheckDuplicate->fetch();
        $stmtCheckDuplicate->close();

        if ($count > 0) {
            echo "Ya existe un turno con esos datos para este usuario.";
        } else {
            // Proceder con la actualización
            $sqlUpdateTurno = "UPDATE appointments SET professional_id = ?, date = ?, time = ? WHERE speciality_id = ? AND users_id = ?";
            $stmtUpdateTurno = $conexion->prepare($sqlUpdateTurno);
            $stmtUpdateTurno->bind_param("issii", $professional, $dia, $horario, $speciality, $user_id);

            if ($stmtUpdateTurno->execute()) {
                echo "exito";
            } else {
                echo "error en la actualización: " . $stmtUpdateTurno->error;
            }

            $stmtUpdateTurno->close();
        }

        $conexion->close();
    } else {
        echo "No hay una sesión activa";
    }
}
?>
