<?php

$nom = $_POST["nombre"];
$ape = $_POST["apellido"];
$email = $_POST["email"];

$conexion = new mysqli("10.10.10.160","clase","1234","todos");

$insertData = "INSERT INTO clientes (nom_cli, ape_cli, mail_cli) VALUES ('$nom','$ape','$email')";

$conexion->query($insertData);

echo"datos enviados";







