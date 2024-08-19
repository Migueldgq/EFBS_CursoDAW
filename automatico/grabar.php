<?php

	include("funciones.php");
	$tabla = $_POST["tabla"];
	$valores = recoger_post($tabla);
	if(insertar($tabla,$valores))
	{
		echo "grabado <br>";
		haz_tabla($tabla);
	}
	else
	{
		echo "error";
	}

?>