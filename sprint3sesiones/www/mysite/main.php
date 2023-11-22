<?php
	// Conexión con la BBDD
	$db = mysqli_connect('172.16.0.2', 'root', '1234', 'mysitedb') or die ('Fail');
?>
<html>
	<head>
		<style>
			/* Ponemos con CSS el tamaño que van a tener las imágenes en la web*/
			img{
				width: 350px;
				height: 200px;
			}

			a {
				text-decoration: none;
				color: blue;
			}

			a:hover {
				color: red;
			}
			
			a {
				transition: color 0.8s linear 0.2s;
			}

			li:hover {
				color: red;
			}

			li > a:hover {
				color: red;
			}

			ul:hover {
				font-size: 30px;
			}
		</style>
	</head>
	<body>
		<h1>Conexión establecida</h1>
		<?php
			// Lanzar query para que nos muestre los juegos que tenemos en nuestra BBDD
			$query = 'SELECT * FROM tJuegos';

			// Mensaje de error
			$result = mysqli_query($db, $query) or die ('Query error');

			// Recorrer el resultado
			while ($row = mysqli_fetch_array($result)){
				echo '<ul>';
				echo '<h1><a href = "/detail.php?juego_id='.$row[0].'">'.$row[0].'. '.$row[1].'</a></h1>';
				echo '<img src ='.$row[2].'></img>';
				echo '<li>Año: '.$row[3].'</li>';
				echo '<li>Compañía: '.$row[4].'</li>';
				echo '</ul>';
				echo '<hr>';
			}

		// Cerrar la BBDD
		mysqli_close($db);
		?>
		<a href="/logout.php">
    		<button>Log out</button>
  		</a>
	</body>
</html>
