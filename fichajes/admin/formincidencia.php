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
		</head>
		<body>
			<?php
				include("menu.php");
			?>
			<h3>Alta incidencias</h3>
			<form action="hacer.php?op=i" method="POST">
				<textarea name="descripcion" placeholder="Descripción" maxlength="50" style="resize: none;" rows="4"></textarea>
				<input type="submit" value="Grabar">
			</form>
		</body>
		</html>

		<?php
	}
	else
	{
		header("location:index.html");
	}


?>