<?php

include 'conexion.php';

$getFacturas = "SELECT * FROM facturas";
$ejecutar = $conexion->query($getFacturas);

$response = array();

foreach ($ejecutar as $factura) {
    $response[] = array(
        'id' => $factura['factura_id'],
        'fecha' => $factura['factura_date']
    );
}

echo json_encode($response);

