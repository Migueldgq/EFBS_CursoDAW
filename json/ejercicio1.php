<?php

$recibo = $_POST["datos"];

$decodificandoRecibo = json_decode($recibo);

foreach ($decodificandoRecibo as $datos) {
    echo "<p> $datos </p>" . "<br>";
}


