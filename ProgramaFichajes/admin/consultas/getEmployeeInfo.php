<?php

include '../../conexion.php';

$getAllEmployees = "SELECT * FROM `trabajadores`";

$ejecutar = $conexion->query($getAllEmployees);


foreach ($ejecutar as $empleado) {

    $id = $empleado['id_trabajador'];
    $nom = $empleado['nom_trab'];
    $ape = $empleado['ape_trab'];
    $dni = $empleado['dni_trab'];
    $idHorario = $empleado['id_horario'];

    $getHorario = "SELECT * FROM `horarios` WHERE `id_horario` = $idHorario";

    $horario = $conexion->query($getHorario);

    foreach ($horario as $hor) {
        $start_time = substr($hor['start_time'], 0, 5);
        $end_time = substr($hor['end_time'], 0, 5);
    }

    $botonEditar = '<td class="px-6 py-4 text-right">
                    <a href="editarTrabajador.php?Trabajador=' . $id . '" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                </td>';

    echo '<tr class="bg-white border-b hover:bg-gray-50">
    <th  scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">' . $nom . " " . $ape . '</th>
    <td class="px-6 py-4">' . $dni . '</td>
    <td class="px-6 py-4">' . $start_time . ' - ' . $end_time . '</td>
    ' . $botonEditar . '
    </tr>';

}
