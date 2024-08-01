<?php

$dni = $_POST['dni'];

include '../conexion.php';

$getTrabajadorHorario = "SELECT id_horario FROM trabajadores WHERE dni_trab = '$dni'";
$getTrabajadorInfo = "SELECT * FROM trabajadores WHERE dni_trab = '$dni'";

$trabajadorHorario = $conexion->query($getTrabajadorHorario);

if ($trabajadorHorario->num_rows <= 0) {
    echo "No existe el trabajador";
} else {
    $trabajadorInfo = $conexion->query($getTrabajadorInfo);

    foreach ($trabajadorInfo as $trabajador) {
        $idTrabajador = $trabajador['id_trabajador'];
        $nom = $trabajador['nom_trab'];
        $ape = $trabajador['ape_trab'];
    }

    // Verificar si ya existe un fichaje de entrada para el trabajador en la fecha actual
    $fechaActual = date("Y-m-d");
    $checkFichaje = "SELECT * FROM fichajesentrada WHERE id_trabajador = '$idTrabajador' AND DATE(hora_fichajeEntrada) = '$fechaActual'";
    $resultadoFichaje = $conexion->query($checkFichaje);

    //Obtengo la hora de fichaje
    $getHoraFichaje = "SELECT * FROM fichajesentrada WHERE id_trabajador = '$idTrabajador' ORDER BY id_trabajador DESC LIMIT 1";
    $horaFichaje = $conexion->query($getHoraFichaje);
    foreach ($horaFichaje as $hora) {
        $horaa = $hora["hora_fichajeEntrada"];
    }

    $horaFichajeHHMM = substr($horaa, 11, 5);

    if ($resultadoFichaje->num_rows > 0) {
        echo json_encode([

            'nombre' => $nom,
            'apellido' => $ape,
            'horaFichaje' => $horaFichajeHHMM,
            'fichadoHoy' => true
        ]);

    } else {
        $insertFichaje = "INSERT INTO fichajesentrada (id_trabajador) VALUES ('$idTrabajador')";
        $conexion->query($insertFichaje);

        // Saco el id de horario que tiene el trabajador
        foreach ($trabajadorHorario as $horario) {
            $idHorario = $horario['id_horario'];
        }

        // Obtengo el horario por el Id de horario que tiene el trabajador
        $getHorario = "SELECT * FROM horarios WHERE id_horario = '$idHorario'";
        $horarios = $conexion->query($getHorario);
        foreach ($horarios as $horario) {
            $entrada = substr($horario['start_time'], 0, 5);
            $salida = substr($horario['end_time'], 0, 5);
        }

        //Obtengo la hora de fichaje
        $getHoraFichaje = "SELECT * FROM fichajesentrada WHERE id_trabajador = '$idTrabajador' ORDER BY id_trabajador DESC LIMIT 1";
        $horaFichaje = $conexion->query($getHoraFichaje);
        foreach ($horaFichaje as $hora) {
            $hora = $hora["hora_fichajeEntrada"];
        }

        $horaFichajeHHMM = substr($hora, 11, 5);

        $horaEntrada = strtotime($entrada);
        $horaFichajeTime = strtotime($horaFichajeHHMM);

        $isTarde = $horaFichajeTime > strtotime('+30 minutes', $horaEntrada);

        if ($isTarde) {
            $createIncidencia = "INSERT INTO incidencias (id_trabajador) VALUES ('$idTrabajador')";
            $conexion->query($createIncidencia);


            echo json_encode([
                'tarde' => $isTarde,
                'nombre' => $nom,
                'apellido' => $ape,
                'horaFichaje' => $horaFichajeHHMM,
                'fichadoHoy' => false
            ]);
        } else {
            echo json_encode([
                'tarde' => $isTarde,
                'nombre' => $nom,
                'apellido' => $ape,
                'horaFichaje' => $horaFichajeHHMM,
                'fichadoHoy' => false
            ]);
        }
    }
}
