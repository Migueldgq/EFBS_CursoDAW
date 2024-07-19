<?php

$event = $_GET["evento"];

include ("conexion.php");

$getAforo = "SELECT * FROM eventos WHERE event_name = $event";

$result = $conexion->query($getAforo);

if ($result->num_rows > 0) {
    foreach ($result as $event) {
        $aforo = $event["event_aforo"];
        echo json_encode($aforo);
    }

}
