<?php

    session_start();
    include 'conexion_be.php';
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $validate_login = mysqli_query($conexion, "SELECT * FROM users WHERE email = '$email' AND password ='$password' ");

    // Hice esto porque si no ingresaba igual al menu.
    if (empty($email) || empty($password)) {
        echo '
            <script>
                alert("Debes ingresar un correo electrónico y una contraseña.");
                window.location = "login.php";
            </script>
        ';
        exit;
    }

    $validate_user = mysqli_query($conexion, "SELECT * FROM users WHERE email = '$email'");


    if (mysqli_num_rows($validate_user) > 0 ){   // Verificar si la contraseña es correcta
        $validate_login = mysqli_query($conexion, "SELECT * FROM users WHERE email = '$email' AND password = '$password' ");

        if (mysqli_num_rows($validate_login) > 0 ){ 
            $_SESSION['users'] = $email;
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
           
    } else  {
        echo '
            <script>
                alert("Usuario inexistente. Verifica los datos ingresados.");
                window.location = "../login.php";
            </script>
        ';
        exit;

    }




?>


