<?php

$nom = $_POST["nombre"];

// aquí estamos recepcionando el input que tiene un name
// nombre y viene por el método POST$_POST

$ape = $_POST["apellido"];

echo "He recibido los datos: $nom $ape";

//Vamos a crear nuestra primera conexion a una DB


// SERVER , USER , PASSWORD, DBNAME
$conexion = new mysqli ("10.10.10.160","todos","1234","primerabd");


//VAMOS A HACER NUESTRO PRIMER SQL

$sql = "INSERT INTO alumnado (nom_alu, ap_alu) VALUES ('$nom', '$ape')";

// ejecutar sencuencia

$conexion->query($sql);


?>