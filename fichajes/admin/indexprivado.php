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
			<h3>Menú principal</h3>
		</body>
		</html>

		<?php
	}
	else
	{
		header("location:index.html");
	}

?>