<?php

$evento = $_GET["evento"];

include ("conexion.php");

$getReservas = "SELECT * FROM reservas WHERE event_name = '$evento'";

$result = $conexion->query($getReservas);

$butacaArray = [];

foreach ($result as $reserva) {
    $butacaNumber = $reserva["butaca_number"];

    array_push($butacaArray, $butacaNumber);

}

echo json_encode($butacaArray);