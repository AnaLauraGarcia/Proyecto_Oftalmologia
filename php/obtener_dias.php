<?php


include 'conexion_be.php';

$professionalDay = $_POST['professional_id'];
$specialityDay = $_POST['speciality_id'];

if (isset($_POST['date'])) {

    $sql = "SELECT DISTINCT a.day_of_week
    FROM professional p
    INNER JOIN availability a ON p.id = a.professional_id
    INNER JOIN speciality s ON a.speciality_id = s.id
    WHERE a.speciality_id = $specialityDay AND p.name = '$professionalDay'";

    // Preparar la consulta
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    // Agrega un console.log para depuración
    while ($row = $result->fetch_assoc()) {
        $dayOfWeek = $row['day_of_week'];
    // Agrega un console.log para ver el día
        echo "<script>console.log('Día de la semana: " . $dayOfWeek . "');</script>";

    $dayOptions .= '<option value="' . $dayOfWeek . '">' . $dayOfWeek . '</option>';
    }
    // ...

} else {
    echo '<option value="">Selecciona una fecha primero</option>';
}
?>
