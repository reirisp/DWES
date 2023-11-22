<html>
	<body>
		<h1>Jubilación</h1>
		<?php
			function edad_en_10_años($edad){
				return $edad + 10;
			}

			$numero = $_GET["edad"];
			if (edad_en_10_años($numero) > 65) {
				echo "En " .  65-$numero .  "  años tendrás edad de jubilación";
			}else{
				echo "Disfruta de tu tiempo!";
			}
		?>
	</body>
</html>
