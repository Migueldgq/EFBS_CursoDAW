<?php

$dni = $_POST['dni'];

include '../../conexion.php';

//echo $dni;

$selectIdTrabajador = "SELECT id_trabajador FROM trabajadores WHERE dni_trab = '$dni'";

$ejecutar = $conexion->query($selectIdTrabajador);

if ($ejecutar->num_rows > 0) {
    foreach ($ejecutar as $id) {
        $idTrabajador = $id['id_trabajador'];
        //echo $idTrabajador;
    }

    $selectNameTrabajador = "SELECT nom_trab, ape_trab FROM trabajadores WHERE dni_trab = '$dni'";

    $ejecutar = $conexion->query($selectNameTrabajador);

    foreach ($ejecutar as $datos) {
        $nom = $datos['nom_trab'];
        $ape = $datos['ape_trab'];
    }


    $sql = "SELECT * FROM incidencias WHERE id_trabajador = '$idTrabajador'";

    $incidencias = $conexion->query($sql);

    foreach ($incidencias as $incidencia) {

        $IdIncidencia = $incidencia['id_incidencia'];
        $justificada = $incidencia['justificada'];
        $fechIncidencia = $incidencia['fecha_incidencia'];
        $motivoJustificacion = $incidencia['motivo_justificaciones'];



        if ($justificada == 0) {
            $justificada = "No";
        } else {
            $justificada = "Si";

        }

        $botonJustificar = '<td class="px-6 py-4 text-right">
                    <a href="justificar.php?idIncidencia=' . $IdIncidencia . '&justificada=' . $justificada . '" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Justificar</a>
                </td>';

        if ($motivoJustificacion == null) {
            $motivoJustificacion = "No se ha justificado";
        }


        echo '<tr class="bg-white border-b hover:bg-gray-50">
    <td class="px-6 py-4">' . $IdIncidencia . '</td>
    <th  scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">' . $nom . $ape . '</th>
    <td class="px-6 py-4">' . $fechIncidencia . '</td>
    <td class="px-6 py-4">' . $motivoJustificacion . '</td>
    <td class="px-6 py-4">' . $justificada . '</td> 
    ' . $botonJustificar . '
    </tr>';

    }
} else {
    echo "0";
}



