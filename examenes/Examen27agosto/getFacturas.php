<?php

include 'conexion.php';

// Establecer la localización en español
setlocale(LC_TIME, 'spanish');

$getFacturas = "SELECT * FROM facturas";
$ejecutar = $conexion->query($getFacturas);

$response = array();

foreach ($ejecutar as $factura) {
    // Convertir la fecha a un timestamp
    $timestamp = strtotime($factura['factura_date']);

    // Formatear la fecha a 'd de F de Y' en español
    $fechaFormateada = strftime('%d de %B de %Y', $timestamp);

    $response[] = array(
        'id' => $factura['factura_id'],
        'fecha' => $fechaFormateada
    );
}

echo json_encode($response);
