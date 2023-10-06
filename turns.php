<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro de Salud Integral - Turnos</title>
    <link rel="icon" href="img/logo.webp">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">
</head>

<body id="app">
    <header class="header" id="header">
        <miheader></miheader>
    </header>
    <main class="main">
        <section class="hero">
            <div class="container">
                <h1>Mis Turnos</h1>
            </div>
        </section>
        <div class="container">
            <div class="content">
                <h4 class="turns-alert">Los turnos solo podrán ser modificados y/o eliminados con no menos de 48 hs hábiles de anticipación.</h4>
                <table class="turns-table">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Especialización</th>
                            <th>Profesional</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'php/conexion_be.php';
                    
                        // Realiza una consulta para obtener los turnos desde la base de datos
                        $sql = "SELECT a.id, a.date, a.time, s.name AS speciality, p.name AS professional
                        FROM appointments AS a
                        INNER JOIN speciality AS s ON a.speciality_id = s.id
                        INNER JOIN professional AS p ON a.professional_id = p.id
                        WHERE a.users_id = 1
                        ORDER BY a.date ASC;"; // Cambia el ID de usuario según tus necesidades
                    
                        $result = $conexion->query($sql);
                    
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row['date'] . '</td>';
                                echo '<td>' . $row['time'] . '</td>';
                                echo '<td>' . $row['speciality'] . '</td>';
                                echo '<td>' . $row['professional'] . '</td>';
                                echo '<td class="actions">';
                                echo '<button>Modificar</button>';
                                echo '<button class="Eliminar" data-id="' . $row['id'] . '">Eliminar</button>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="5">No se encontraron turnos.</td></tr>';
                        }
                    
                        $conexion->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer class="footer">
        <mifooter></mifooter>
    </footer>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="js/components.js"></script>
    <script src="js/scriptvue.js"></script>
    <script src="js/index.js"></script>
    <script>
        $(document).ready(function() {
            
            $('.Eliminar').click(function() {
                var idTurno = $(this).data('id');

              
                var confirmar = confirm("¿Estás seguro de que deseas eliminar este turno?");

                if (confirmar) {
                   
                    $.ajax({
                        type: 'POST',
                        url: 'php/eliminar_turno.php', 
                        data: { id: idTurno },
                        success: function(response) {
                            if (response === 'success') {
                                
                                location.reload();
                            } else {
                                
                                alert('Error al eliminar el turno.');
                            }
                        }
                    });
                } 
            });
        });
    </script>

</body>

</html>