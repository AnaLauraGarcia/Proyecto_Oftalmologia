<?php
    include 'conexion_be.php';

    
    $dni = $_POST['dni'] ;
    $lastName = $_POST['lastName'] ;
    $name = $_POST['name'] ;
    $birthday = $_POST['birthday'] ;
    $affiliateName = $_POST['affiliateName'] ;
    $affiliateNumber = $_POST['affiliateNumber'];
    $phone = $_POST['phone'] ;
    $email = $_POST['email'] ;
    $province = $_POST['province'] ;
    $city = $_POST['city'] ;
    $localate = $_POST['localate'] ;
    $zip = $_POST['zip'] ;
    $address = $_POST['address'] ;
    $password = $_POST['password'] ;
        

    $query = " INSERT INTO users
    (dni, lastName, name, birthday, affiliateName, affiliateNumber, phone, email, province, city, localate, zip, address, password)
    VALUES 
    ('$dni', '$lastName', '$name', '$birthday', '$affiliateName', '$affiliateNumber', '$phone', '$email', '$province', '$city', '$localate', '$zip', '$address', '$password')
";


    $verificar_email = mysqli_query($conexion, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($verificar_email) > 0) {//Si es mayor que cero, significa que se encontraron registros coincidentes en la tabla "usuario" con el correo electrónico proporcionado.
        echo '
            <script>
                alert("Este correo ya está registrado, intenta con otro.");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar){
        echo '
            <script>
                alert("Usuario registrado con éxito.");
                window.location = "../index.php";
            </script>
        ';
    } else {
        echo '
        <script>
            alert("Error, intentalo nuevamente.");
            window.location = "../index.php";
        </script>
    ';
    }

    mysqli_connection_close($conexion);
?>