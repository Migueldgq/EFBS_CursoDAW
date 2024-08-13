<?php

include 'conexion.php';

$nom = $_POST['nom'];
$ema = $_POST['email'];
$dni = $_POST['dni'];

$insertClient = "INSERT INTO clientes (client_name, client_email, client_dni) VALUES ('$nom', '$ema', '$dni')";

if ($conexion->query($insertClient)) {
    echo "1";
} else {
    echo "0";
}