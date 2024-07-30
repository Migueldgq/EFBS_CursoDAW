<?php

include '../../conexion.php';

$getAllHorarios = "SELECT * FROM horarios";

$horarios = $conexion->query($getAllHorarios);

foreach ($horarios as $horario) {
    // Extraer horas y minutos, eliminando los segundos
    $start_time = substr($horario['start_time'], 0, 5);
    $end_time = substr($horario['end_time'], 0, 5);

    echo '<option value="' . $horario['id_horario'] . '">' . $start_time . ' - ' . $end_time . '</option>';
}
;