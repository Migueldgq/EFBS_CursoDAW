<?php

	function conexion()
	{
		$con = new mysqli("localhost","root","","automatico");
		return $con;
	}

	function insertar($tabla, $valores)
	{
		$connect = conexion();
		$campos = campos_en_string($tabla);
		$sql = "INSERT INTO $tabla ($campos) VALUES (null, $valores)";
		return $connect->query($sql);
	}

	function consultar($tabla)
	{
		$connect = conexion();
		$sql = "SELECT * FROM $tabla";
		return conexion()->query($sql);
	}

	function dame_campos($tabla)
	{
		$con = conexion();
		$sql = "SHOW COLUMNS FROM $tabla";
		return $con->query($sql);
		//los campos se sacan así:
		//$ejecutar = $con->query($sql)
		//foreach($ejecutar as $registro)
		//{
			// $campo = $registro["Field"];
		//}
	}

	function campos_en_string($tabla)
	{
		$cadena = "";
		$ejecutar = dame_campos($tabla);
		foreach($ejecutar as $registro)
		{
			$cadena .= $registro["Field"].",";
		}

		$cadena = substr($cadena, 0, -1);
		return $cadena;
	}

	function campos_en_array($tabla)
	{
		$cadena = array();
		$ejecutar = dame_campos($tabla);
		foreach($ejecutar as $registro)
		{
			array_push($cadena, $registro["Field"]);
		}
		return $cadena;
	}

	function haz_formulario($tabla)
	{
		echo "<form action='grabar.php' method='POST'>";

		$campos = campos_en_array($tabla);
		for($i=1;$i<count($campos);$i++)
		{
			$partes = explode("_", $campos[$i]);

			echo "<input type='text' name='$campos[$i]' placeholder='$partes[0]'>
			<br>";			
		}	

		echo "<input type='hidden' name='tabla' value='$tabla'>";
		echo "<input type='submit' value='Grabar'>";
		echo "</form>";
	}

	function recoger_post($tabla)
	{
		$valores = "";
		$campos = campos_en_array($tabla);
		for($i=1;$i < count($campos); $i++)
		{
			$dato = $_POST[$campos[$i]];
			$valores .= "'$dato',";
		}
		$valores = substr($valores, 0, -1);
		return $valores;
	}

	function haz_tabla($tabla)
	{
		$campos = campos_en_array($tabla);
		//pintamos la tabla:
		echo "<table border=1>";
		//pintamos el encabezado:
		echo "<thead>
				<tr>";
		foreach($campos as $campo)
		{
			$parte = explode("_",$campo);
			echo "<th>$parte[0]</th>";
		}
		echo "	</tr>
			  </thead>";

		//pintamos el encabezado:
		echo "<tbody>";
		$ejecutar = consultar($tabla);
		foreach($ejecutar as $registro)
		{
			echo "<tr>";
			foreach($campos as $campo)
			{
				echo "<td>$registro[$campo]</td>";
			}
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}

?>