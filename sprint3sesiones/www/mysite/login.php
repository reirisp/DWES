<?php
    // Conexión con la BBDD
    $db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail');
?>
<html>
    <body>
        <?php  
            // Recuperaremos lo que introdujo el ususario en el formulario
            $email_introducido = $_POST['email'];
            $password_introducido = $_POST['password'];

            // Consulta para recuperar el usuario de la tabla tUsuarios
            $consultaEmail = $db->prepare("SELECT id, contraseña FROM tUsuarios WHERE email = ?");
            $consultaEmail->bind_param("s",$email_introducido);
            $consultaEmail->execute();
            $resultadoConsultaEmail = $consultaEmail -> get_result();
            
            // Comprobar que la consulta devolvió alguna fila
            if (mysqli_num_rows($resultadoConsultaEmail) > 0) {

                // Si existe asignamos a una variable el resultado de la consulta
                $only_row = mysqli_fetch_array($resultadoConsultaEmail);
                $pv = password_verify($password_introducido, $only_row[1]);
            
                // Comparar la contraseña de base de datos con la que el usuario introdujo en el formulario
                echo '<p>Comparar contraseña</p>';
                if ($pv) {
                    // Si coinciden iniciamos sesión
                    echo '<p>Iniciar sesión</p>';
                    session_start();
                    $_SESSION['user_id'] = $only_row[0];
                    header('Location: main.php');
                } else {
                    // Si no coinciden mostramos un mensaje de error
                    echo '<p>Contraseña incorrecta</p>';
                }
            } else {
                // Si no coincide el usuario mostramos un mensaje de error
                echo '<p>Usuario no encontrado con ese email</p>';
            }

            // Cerrar la BBDD
			mysqli_close($db);
        ?>
    </body>
</html>
