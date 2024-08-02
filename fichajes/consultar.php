<?php
	
	$arrayenviado = array();
	$dni = $_POST["eldni"];
	include("./admin/conexion.php");
	$sql = "SELECT * FROM trabajadores WHERE dni_tra = '$dni'";
	$ejecutar = $conexion->query($sql);
	if($ejecutar->num_rows > 0)
	{
		//el dni existe
		array_push($arrayenviado,1);
		foreach($ejecutar as $registro)
		{
			$idtra = $registro["id_tra"];
			$idhor = $registro["id_hor"];
		}
		$sqlhora = "SELECT * FROM horarios WHERE id_hor = '$idhor'";
		$ejecutarhora = $conexion->query($sqlhora);
		foreach($ejecutarhora as $registrohora)
		{
			$max = $registrohora["max_hor"];
			$entrada = $registrohora["ini_hor"];
			$salida = $registrohora["fin_hor"];
		}

		$anadir = "<input type='text' name='trabajador' value='$idtra'>";
		$anadir .= "<input type='text' name='entrada' value='$entrada'>";
		$anadir .= "<input type='text' name='salida' value='$salida'>"; 

		$ahora = date("H:i:s");
		if($ahora < $max)
		{
			//están en hora
			$anadir .= "<input type='text' name='incidencia' value='0'>";
			
		}
		else
		{
			//está llegando tarde.. tenemos que mostrar incidencia.
			//concateno el select de las incicidencias:
			$anadir .= "<select name='incidencia'>";

			$sqlinci = "SELECT * FROM incidencias ORDER BY descripcion_inc";
			$ejecutarinci = $conexion->query($sqlinci);
			foreach($ejecutarinci as $registroinci)
			{
				$idinc = $registroinci["id_inc"];
				$des = $registroinci["descripcion_inc"];

				$anadir .= "<option value='$idinc'>$des</option>"; 
			}

			$anadir .= "</select>";

		}	
		array_push($arrayenviado,$anadir);
	}
	else
	{
		//el dni no existe. NO ES TRABAJADOR DE AQUÍ
		array_push($arrayenviado,0);
	}

	echo json_encode($arrayenviado);


?>