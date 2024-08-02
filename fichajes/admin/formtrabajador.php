<?php

	session_start();
	if(isset($_SESSION['administrador']))
	{
		?>

		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title></title>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
		</head>
		<body>
			<?php
				include("menu.php");
			?>
			<h3>Formulario de trabajadores</h3>
			<form action="hacer.php?op=t" method="POST">
				<input type="text" name="nombre">
				<input type="text" name="apellidos">
				<input type="text" name="dni">
				<select name="horario">
					
				</select>
				<input type="submit" value="Grabar">
			</form>

			<script>
				$.get(
						"hacer.php",
						{op:"dh"},
						function(loqueelphpmuestraenpantalla)
						{
							$("select").html(loqueelphpmuestraenpantalla)
						}
					);
			</script>
		</body>
		</html>

		<?php
	}
	else
	{
		header("location:index.html");
	}
?>