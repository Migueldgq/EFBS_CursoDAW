<?php

include '../conexion.php';

$id = $_POST['idIncidencia'];
$motivo = $_POST['motivo'];

// Corregir la consulta SQL para actualizar ambos campos correctamente
$updateIncidence = "UPDATE incidencias SET justificada = 1, motivo_justificaciones = '$motivo' WHERE id_incidencia = '$id'";

if ($conexion->query($updateIncidence)) {
    echo "1";
} else {
    echo "Error: " . $conexion->error;
}
