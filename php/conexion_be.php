<?php
    $conexion = mysqli_connect("localhost", "root", "", "clinic_project");

    if ($conexion){
        echo 'Conectado exitosamente a la base de datos';
    } else{
        echo 'No se ha podido conectar a la base de datos';
    }
    
?>