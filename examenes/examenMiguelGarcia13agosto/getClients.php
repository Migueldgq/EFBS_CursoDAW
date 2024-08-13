<?php

include 'conexion.php';

$getAllClients = "SELECT * FROM clientes";
$ejecutar = $conexion->query($getAllClients);

if ($ejecutar->num_rows > 0) {

    $clients = [];


    foreach ($ejecutar as $cliente) {
        $clients[] = [
            'client_name' => $cliente['client_name'],
            'client_email' => $cliente['client_email'],
            'client_dni' => $cliente['client_dni'],
            'client_id' => $cliente['client_id']
        ];
    }


    echo json_encode($clients);

} else {

    echo 0;
}

