<?php

include ("conexion.php");

$evento = $_GET["evento"];

$getBackgroundImage = "SELECT * FROM eventos WHERE event_name = '$evento'";

$result = $conexion->query($getBackgroundImage);

if ($result->num_rows > 0) {
    foreach ($result as $evento) {
        $backgroundImage = $evento["event_image"];
        $evento = $evento["event_name"];

    }

    $datos = [$backgroundImage, $evento];

    echo json_encode($datos);
}
