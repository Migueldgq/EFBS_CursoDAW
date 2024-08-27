<?php

include 'conexion.php';

$factId = $_POST['factId'];
$nomProd = $_POST['nomProd'];
$precioProd = $_POST['precioProd'];
$precioFinal = $_POST['precioFinal'];
$cantidad = $_POST['cantidad'];



$insertDetails = "INSERT INTO facturasdetalles (fact_id, det_name, det_precio, det_preciofinal, det_cantidad) 
                  VALUES ($factId, '$nomProd', $precioProd, $precioFinal, $cantidad)";

$response = array();

if ($conexion->query($insertDetails)) {
    $response['success'] = true;
} else {
    $response['success'] = false;
    $response['error'] = $conexion->error;
}

echo json_encode($response);
