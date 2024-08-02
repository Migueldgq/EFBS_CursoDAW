<?php

	session_start();
	if(isset($_SESSION["administrador"]))
	{
		//como hay sesión aquí va el formulari buitonni
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
			<h3>Formulario de horarios</h3>
			<form action="hacer.php?op=h" method="POST">
				<h3>Hora inicio</h3>
				<label>Hora</label><input type="number" name="hor" max="23" min="0">
				<label>Minutos</label><input type="number" name="min" max="59" min="0">
				<hr>
				<h3>Hora fin</h3>
				<input type="time" name="horaf" placeholder="hh:mm">
				<hr>
				<h3>Máxima hora de entrada</h3>
				<input type="time" name="horam">
				<input type="submit" value="Grabar">
			</form>
		</body>
		</html>

		<?php
	}
	else
	{
		//no hay sesión lo mando para el index
		header("location:index.html");
	}
?>