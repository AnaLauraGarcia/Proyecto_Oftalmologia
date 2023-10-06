<?php
include 'php/conexion_be.php';

$sqlEspecialidades = "SELECT id, name FROM speciality";
$resultEspecialidades = $conexion->query($sqlEspecialidades);
?>