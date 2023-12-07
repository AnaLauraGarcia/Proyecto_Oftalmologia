<?php
session_start();
include 'conexion_be.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener el ID del usuario de la sesión
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        $speciality = $_POST["speciality"];
        $professional = $_POST["professional"];
        $dia = $_POST["dia"];
        $horario = $_POST["horario"];

        $sqlVerificarTurno = "SELECT * FROM appointments WHERE speciality_id = ? AND professional_id = ? AND date = ? AND time = ?";
        $stmtVerificarTurno = $conexion->prepare($sqlVerificarTurno);
        $stmtVerificarTurno->bind_param("iiss", $speciality, $professional, $dia, $horario);
        $stmtVerificarTurno->execute();

        $resultVerificarTurno = $stmtVerificarTurno->get_result();

        if ($resultVerificarTurno->num_rows > 0) {
            $row = $resultVerificarTurno->fetch_assoc();
            $estadoTurno = $row["status"];

            if ($estadoTurno == "occupied") {
                echo "turno_ocupado";
            }
        } else {
            $sql = "INSERT INTO appointments (speciality_id, professional_id, date, time, status, users_id)
                    VALUES (?, ?, ?, ?, 'occupied', ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("iissi", $speciality, $professional, $dia, $horario, $user_id);

            if (!$stmt) {
                // Manejar el error en la preparación de la consulta
            }

            if ($stmt->execute()) {
                echo "exito";
            } else {
                die("Error en la ejecución de la consulta: " . $stmt->error);
            }

            $stmt->close();
        }

        $stmtVerificarTurno->close();
        $conexion->close();
    } else {
        // Manejar el caso en el que no hay una sesión activa
        echo "No hay una sesión activa";
    }
}
?>
