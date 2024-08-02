<?php

	$dni = $_POST["dni"];
	$idtra  = $_POST["trabajador"];
	$hen = $_POST["entrada"]; //hora de entrada del horario
	$hsa = $_POST["salida"]; //hora de salida del horario
	$idinc = $_POST["incidencia"];

	include("./admin/conexion.php");

	$hoy = date("Y-m-d");
	$ahora = date("H:i:s");

	//tiene fichaje hoy???????????
	$sql = "SELECT * FROM fichajes WHERE id_tra = '$idtra' AND fecha_fic = '$hoy' ORDER BY hora_fic DESC LIMIT 1";
	$ejecutar = $conexion->query($sql);
	if($ejecutar->num_rows > 0)
	{
		///////// tiene un fichaje hoy
		foreach($ejecutar as $registro)
		{
			$tipo = $registro["tipo_fic"];
		}
		if($tipo == "Entrada")
		{
			$tipograbar = "Salida";
			$horagrabar = $hsa;
		}
		else
		{
			$tipograbar = "Entrada";
			$horagrabar = $hen;
		}
	}
	else
	{
		$tipograbar = "Entrada";
		$horagrabar = $hen;
	}

	$sqlgrabar = "INSERT INTO fichajes 
			(id_tra, id_inc, fecha_fic, hora_fic, horareal_fic, tipo_fic) VALUES 
			('$idtra', '$idinc', '$hoy', '$ahora', '$horagrabar', '$tipograbar')";
	
	if($conexion->query($sqlgrabar))
	{
		echo "<script>
				alert('$tipograbar registrada para $dni');
				window.location.href='index.html';
		</script>";
	}
	else
	{
		echo "<script>
				alert('Ocurrió un error');
				window.location.href='index.html';
			</script>";
	}		



?>