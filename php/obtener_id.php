<?php
include 'conexion_be.php';

function obtenerEspecialidadID($especialidad, $conexion) {
    $sql = "SELECT id FROM speciality WHERE name = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('s', $especialidad);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["id"];
    } else {
        return null; // No se encontró la especialidad
    }
}

function obtenerProfesionalID($profesional, $conexion) {
    $sql = "SELECT id FROM professional WHERE name = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('s', $profesional);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["id"];
    } else {
        return null; // No se encontró el profesional
    }
}