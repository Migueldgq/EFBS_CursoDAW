<?php

$pal = strtoupper($_POST['palabra']);

include '../conexion.php';

$insertWord = "INSERT INTO palabras (palabra) VALUES ('$pal')";

$conexion->query($insertWord);

echo "Palabra insertada";