<?php
include 'conexion_be.php';

// Verificar si hay al menos una especialidad
if (isset($_POST['speciality_id'])) {
    $specialityId = $_POST['speciality_id'];

    
   
   $sqlProfesionales = "SELECT DISTINCT p.name, a.speciality_id
                        FROM professional p
                        INNER JOIN availability a ON p.id = a.professional_id
                        INNER JOIN speciality s ON a.speciality_id = s.id
                        WHERE a.speciality_id = ?";

    
    $stmt = $conexion->prepare($sqlProfesionales);
    $stmt->bind_param("i", $specialityId);
    $stmt->execute();
    $result = $stmt->get_result();


    $professionalOptions = '';
    while ($row = $result->fetch_assoc()) {
        $professionalOptions .= '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
    }

    echo $professionalOptions;
    $stmt->close();
} else {
    echo '<option value="">No se proporcionó una especialidad válida</option>';
}

$conexion->close();
?>