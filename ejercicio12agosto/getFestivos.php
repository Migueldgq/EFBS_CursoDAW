<?php

$conexion = new mysqli("localhost", "root", "", "almanaque");

$mes = $_POST["mes"];

$getFestivos = "SELECT * FROM festivos WHERE festivo_mes = '$mes'";
$festivos = $conexion->query($getFestivos);

$diasFestivos = [];

foreach ($festivos as $festivo) {
    array_push($diasFestivos, $festivo["dia"]);

}

echo json_encode($diasFestivos);