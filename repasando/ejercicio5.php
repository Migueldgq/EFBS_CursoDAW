<?php

$conexion = new mysqli("10.10.10.160", "todos", "1234", "mibd");

$consulta = "SELECT * FROM palabras";

$ejecutar = $conexion->query("$consulta");

foreach ($ejecutar as $palabrasresult) {
    $palabras_id = $palabrasresult["id_pal"];
    $palabras = $palabrasresult["pal_pal"];

    echo " " . $palabras_id . " " . $palabras . "<br>";
    
}