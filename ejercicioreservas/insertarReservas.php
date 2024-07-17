<?php

$butacas = $_POST["butacas"];
$evento = $_GET["evento"];

$butacasDJSON = json_decode($butacas);

include ("conexion.php");

foreach ($butacasDJSON as $butaca) {

    $insertReserva = "INSERT INTO reservas (event_name, butaca_number) VALUES ('$evento','$butaca' )";
    $conexion->query($insertReserva);

}



echo "Reserva insertada correctamente";