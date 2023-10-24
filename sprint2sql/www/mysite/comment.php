<?php
	$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die ('Fail');
?>
<html>
	<body>
		<?php
			// Cargamos las variables
			$juego_id = $_POST['juego_id'];
			$comentario = $_POST['new_comment'];

			// Query para añadir el comentario del juego
			$query = "INSERT INTO tComentarios (comentario, usuario_id, juego_id, fecha) VALUES ('".$comentario."', NULL, ".$juego_id.",now())";

			// Mensaje de error por si falla
			mysqli_query($db, $query) or die ('Error');

			// Creamos lo que nos muestra la pantalla
			echo "<p>Nuevo comentario ";
			echo mysqli_insert_id($db);
			echo " añadido</p>";

			// Al enviar el comentario te lleva a la siguiente ruta
			echo "<a href = '/detail.php?juego_id=".$juego_id."'>Volver</a>";
			mysqli_close($db);
		?>
	</body>
</html>
