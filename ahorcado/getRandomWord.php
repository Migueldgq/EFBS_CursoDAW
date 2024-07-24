<?php

include './conexion.php';

$getRandomWord = "SELECT palabra FROM palabras ORDER BY RAND() LIMIT 1";

$result = $conexion->query($getRandomWord);

foreach ($result as $palabra) {
    echo $palabra['palabra'];
}