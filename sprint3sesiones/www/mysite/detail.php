<?php
	$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail');
?>
<html>
	<head>
		<style>
			/*CSS para redimensionar las imágenes*/
			img{
				width: 350px;
				height: 200px;
			}
		</style>
	</head>
	<body>
		<?php
			// Si no recibe ningún parámetro se termina la ejecución
			if(!isset($_GET['juego_id'])){
				die('No se ha especificado un juego');
			}

			// Buscamos los juegos que tenemos en la BBDD y que se muestre en la web
			$juego_id = $_GET['juego_id'];
			$query = 'SELECT * FROM tJuegos WHERE id = '.$juego_id;
			$result = mysqli_query($db, $query) or die ('Query error');
			$only_row = mysqli_fetch_array($result);
			echo '<h1>Título: '.$only_row['nombre'].'</h1>';
			echo '<img src ='.$only_row['url_imagen'].'></img>';
			echo '<h2>Año: '.$only_row['año'].'</h2>';
			echo '<h2>Compañía: '.$only_row['compañia'].'</h2>'
		?>
		<h3>Comentarios:</h3>
		<ul>
			<?php
				// Lanzamos otra consulta por clave foránea juego_id a la tComentarios
				$query2 = 'SELECT * FROM tComentarios WHERE juego_id='.$juego_id;
				$result2 = mysqli_query($db, $query2) or die ('Query error');

				// Recorre las filas y se accede a la columna de cada una
				while ($row = mysqli_fetch_array($result2)) {
					echo '<li>'.$row['comentario']."<br>".$row['fecha'].'</li>';
				}
				// Cerrar la BBDD
				mysqli_close($db);
			?>
		</ul>
		<p>Deja un comentario:</p>
		<form action ="/comment.php" method = "post">
			<textarea rows = "4" cols = "50" name = "new_comment"></textarea><br>
			<input type = "hidden" name = "juego_id" value ="<?php echo $juego_id; ?>">
			<input type = "submit" value = "Comentar">
		</form>
		<a href="/logout.php">
    		<button>Log out</button>
  		</a>
	</body>
</html>
