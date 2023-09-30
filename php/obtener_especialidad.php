<?php
include 'php/conexion_be.php';

// Obtener la lista de especialidades
$sqlEspecialidades = "SELECT id, name FROM speciality";
$resultEspecialidades = $conexion->query($sqlEspecialidades);
?>