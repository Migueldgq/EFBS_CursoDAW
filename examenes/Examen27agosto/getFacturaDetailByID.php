<?php

$factId = $_POST['factId'];

include 'conexion.php';

$getDetails = "SELECT * FROM facturasdetalles WHERE fact_id = $factId";
$ejecutar = $conexion->query($getDetails);

$data = array();
$total = 0; 


foreach ($ejecutar as $detail) {

    $priceFinal = $detail['det_preciofinal'];
    $total += $priceFinal;

    $data[] = array(
        'id' => $detail['det_id'],
        'name' => $detail['det_name'],
        'price' => $detail['det_precio'],
        'priceFinal' => $priceFinal,
        'quantity' => $detail['det_cantidad']
    );
}


$response = array(
    'details' => $data,
    'total' => $total
);


echo json_encode($response);
