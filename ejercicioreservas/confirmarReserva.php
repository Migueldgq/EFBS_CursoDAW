<?php

$butacas = $_GET["butacas"];
$evento = $_GET["evento"];
$nom = $_POST["nombre"];
$email = $_POST["email"];

$butacasDJSON = json_decode($butacas);

include ("conexion.php");

foreach ($butacasDJSON as $butaca) {

    $insertReserva = "INSERT INTO reservas (event_name, butaca_number, person_name, person_email) VALUES ('$evento','$butaca','$nom','$email')";
    $conexion->query($insertReserva);

}



echo "<script>
 alert('Reserva insertada correctamente')
 window.location.href='descargarentradas.php';
 </script>";