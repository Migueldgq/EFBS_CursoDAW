<?php

session_start();

$id = $_SESSION['alumno'][0];
$nom = $_SESSION['alumno'][1];

include ('conexion.php');
include ('funciones.php');

$sql = "SELECT * FROM examenes 

INNER JOIN plantillas USING(id_pla)

WHERE id_alu = '$id'";

$ejecutar = $conexion->query($sql);

if ($ejecutar->num_rows > 0) {

    foreach ($ejecutar as $regisro) {
        $nombremat = $regisro['materia_pla'];
        $nota = $registro["nota_exa"];
        $fecha = explode('-', $regisro['fecha_exa']);
        $fecha = $fecha[2] . '/' . $fecha[1] . '/' . $fecha[0];

        echo '<tr>
        <td>' . $nombremat . '</td>
        <td>' . nota($nota) . '</td>
        <td>' . $fecha . '</td>
        </tr>';


    }


} else {
    echo 'No hay notas';
}