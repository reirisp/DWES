<?php
	$db = mysqli_connect('172.16.0.2', 'root', '1234', 'mysitedb') or die ('Fail');
?>
<html>
	<body>
		<?php
			// Recuperar los datos del formulario
			session_start();
			$user_id = NULL;
			if (!empty($_SESSION['user_id'])) {
				$user_id=$_SESSION['user_id'];
			}

			$juego_id=$_POST['juego_id'];
			$comentario=$_POST['new_comment'];
			$mostrarFecha=date('y-m-d');

			// Query para añadir el comentario del juego con SQL Inyection
			$consultaComentarios = $db->prepare("INSERT INTO tComentarios (comentario,usuario_id,juego_id,fecha) VALUES (?,?,?,?)");
			$consultaComentarios->bind_param("siis",$comentario,$user_id,$juego_id,$mostrarFecha);
			$consultaComentarios->execute();

			echo "<p>Nuevo comentario ";
			echo mysqli_insert_id($db);
			echo " añadido</p>";
			
			// Al enviar el comentario te lleva a la siguiente ruta
			echo "<a href = '/detail.php?juego_id=".$juego_id."'>Volver</a>";
			
			$consultaComentarios->close();

			// Cerrar la BBDD
			mysqli_close($db);
		?>
	</body>
</html>
