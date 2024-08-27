<?php

include 'conexion.php';

$createNewFact = "INSERT INTO facturas () VALUES ()";

$response = array();


if ($conexion->query($createNewFact)) {
    $factId = $conexion->insert_id;

    $response = array(
        'success' => true,
        'factId' => $factId
    );

    echo json_encode($response);
} else {
    $response = array(
        'success' => false,
    );

    echo json_encode($response);
}
