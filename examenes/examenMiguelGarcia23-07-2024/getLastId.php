<?php

include 'conexion.php';

$sql = "SELECT client_id FROM `clientes` ORDER BY client_id DESC LIMIT 1";

$result = $conexion->query($sql);

foreach ($result as $client) {
    echo $client['client_id'];
}