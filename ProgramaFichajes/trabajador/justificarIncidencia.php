<?php

include '../conexion.php';

$id = $_POST['idIncidencia'];
$motivo = $_POST['motivo'];
$justificanteTEMP = isset($_FILES['justificante']['tmp_name']) ? $_FILES['justificante']['tmp_name'] : null;
$justificante = isset($_FILES['justificante']['name']) ? $_FILES['justificante']['name'] : null;



// Corregir la consulta SQL para actualizar ambos campos correctamente

if (isset($justificante)) {
    mkdir("../justificantes/incidencia$id", 0777);

    $ruta = "../justificantes/incidencia$id/$justificante";

    //Movemos img a la ruva
    move_uploaded_file($justificanteTEMP, "$ruta");

    $updateIncidence = "UPDATE incidencias SET justificada = 1, motivo_justificaciones = '$motivo', archivoJustificante = '$justificante' WHERE id_incidencia = '$id'";
} else {
    $updateIncidence = "UPDATE incidencias SET justificada = 1, motivo_justificaciones = '$motivo' WHERE id_incidencia = '$id'";
}

if ($conexion->query($updateIncidence)) {
    echo "1";
} else {
    echo "Error: " . $conexion->error;
}
