<?php

$pal = $_POST["palabra"];

$conexion = new mysqli("10.10.10.160", "todos", "1234", "mibd");

$insert = "INSERT INTO palabras (pal_pal) VALUES ('$pal')";

$conexion->query($insert);

echo "palabra recibida" . $pal;