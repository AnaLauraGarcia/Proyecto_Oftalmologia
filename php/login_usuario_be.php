<?php

session_start();
include 'conexion_be.php';

$email = $_POST['email'];
$password = $_POST['password'];

$validate_user = mysqli_query($conexion, "SELECT * FROM users WHERE email = '$email'");

if (mysqli_num_rows($validate_user) > 0) {   // Verificar si el usuario existe
    $validate_login = mysqli_query($conexion, "SELECT * FROM users WHERE email = '$email' AND password = '$password' ");

    if (mysqli_num_rows($validate_login) > 0) {
        // Obtener el ID del usuario
        $user_data = mysqli_fetch_assoc($validate_login);
        $user_id = $user_data['id'];

        // Iniciar sesión y almacenar el ID del usuario
        $_SESSION['user_id'] = $user_id;

        // Redirigir al usuario a la página principal (o a donde desees)
        header("Location: ../index.php");
        exit;
    } else {
        echo '
            <script>
                alert("Contraseña incorrecta. Verifica los datos ingresados.");
                window.location = "../login.php";
            </script>
        ';
        exit;
    }
} else {
    echo '
        <script>
            alert("Usuario inexistente. Verifica los datos ingresados.");
            window.location = "../login.php";
        </script>
    ';
    exit;
}
?>
