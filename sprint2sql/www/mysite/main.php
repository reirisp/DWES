<?php
	$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die ('Fail');
?>
<html>
	<head>
		<style>
			img{
				width: 350px;
				height: 200px;
			}
		</style>
	</head>
	<body>
		<h1>Conexión establecida</h1>
		<?php
			// Lanzar una query
			$query = 'SELECT * FROM tJuegos';
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
		mysqli_close($db);
		?>
	</body>
</html>
