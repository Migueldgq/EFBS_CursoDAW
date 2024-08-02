<?php
	
	$hora1 = "09:19:00";
	$hora2 = "10:30:00";

	$hora1ob = new DateTime($hora1);
	$hora2ob = new DateTime($hora2);

	$diferencia = $hora1ob->diff($hora2ob);
	
	$resultado = $diferencia->format('%H:%i:%s');

	echo "La diferencia entre las horas va a ser $resultado";



?>