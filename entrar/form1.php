<?php

$nom = $_POST["nombre"];
$num1 = $_POST["numero1"];
$num2 = $_POST["numero2"];

$suma = $num1+ $num2;

$conexion = new mysqli("10.10.10.160","clase","1234","todos");

$insertData = "INSERT INTO resultados (nom_res, res_res) VALUES ('$nom','$suma')";

$conexion->query($insertData);

echo"datos enviados";







