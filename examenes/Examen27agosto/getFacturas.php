<?php

include 'conexion.php';

$getFacturas = "SELECT * FROM facturas";
$ejecutar = $conexion->query($getFacturas);

$data = array();

foreach ($ejecutar as $factura) {
    $data[] = array(
        'id' => $factura['factura_id'],
        'fecha' => $factura['factura_date']
    );
}

echo json_encode($data);

