<?php

$dni = $_POST['dni'];

include '../../conexion.php';

echo $dni;

$selectIdTrabajador = "SELECT id_trabajador FROM trabajadores WHERE dni_trab = '$dni'";

$idTrabajador = $conexion->query($selectIdTrabajador);

foreach ($idTrabajador as $id) {
    $idTrabajador = $id['id_trabajador'];
}

echo $idTrabajador;


$sql = "SELECT * FROM incidencias WHERE id_trabajador = '$idTrabajador'";

$incidencias = $conexion->query($sql);

foreach ($incidencias as $incidencia) {
    echo '<tr>
    <td>' . $incidencia['id_incidencia'] . '</td>
    <td>' . $incidencia['id_trabajador'] . '</td>
    <td>' . $incidencia['fecha_incidencia'] . '</td>
    <td>' . $incidencia['motivo_justificaciones'] . '</td>
    <td>' . $incidencia['justificada'] . '</td>
    </tr>';
}