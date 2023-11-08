<?php
    // Conexión con la BBDD
	$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail');
?>
<html>
	<body>
		<?php
            // Recuperar los datos del formulario
            $nombre=$_POST['nombre'];
            $apellidos=$_POST['apellidos'];
            $email=$_POST['email'];
            $contraseña=$_POST['contraseña'];
            $contraseña2=$_POST['contraseña2'];

            // Verificar si las contraseñas coinciden
			if($contraseña2 != $contraseña){
				die('Usuario o contraseña erróneos, intentalo de nuevo:');
            }

            // Cifrar la contraseña antes de almacenarla en la base de datos
            $ph = password_hash($contraseña, PASSWORD_DEFAULT);
            
            // Verificar si el correo ya existe en la base de datos
            $queryEmail = 'SELECT email FROM tUsuarios';
			$resultadoQuery = mysqli_query($db, $queryEmail) or die ('Query error');
			while ($row = mysqli_fetch_array($resultadoQuery)) {
                if($email == $row[0]){
                    die('El correo ya está registrado, utiliza otro o inicia sesión');
                }
			}

            // Insertar el nuevo usuario en la base de datos con SQL Inyection
            $consulta = $db->prepare("INSERT INTO tUsuarios (nombre,apellidos,email,contraseña) VALUES (?,?,?,?)");
            $consulta->bind_param("ssss",$nombre,$apellidos,$email,$ph);
            $consulta->execute();

            // Mensaje para confirmar al usuario su registro
            echo '<h2>Regitro completado correctamente</h2>';

            // Redirigir al usuario a la página de registros
            echo '<a href="/register.html">Volver</a>';

            $consulta->close();
            
			// Cerrar la BBDD
			mysqli_close($db);
		?>
	</body>
</html>