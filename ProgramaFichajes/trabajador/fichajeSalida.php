<?php

$dni = $_POST['dni'];

include '../conexion.php';

// Obtiene el horario y la información del trabajador
$getTrabajadorHorario = "SELECT id_horario FROM trabajadores WHERE dni_trab = '$dni'";
$getTrabajadorInfo = "SELECT * FROM trabajadores WHERE dni_trab = '$dni'";

$trabajadorHorario = $conexion->query($getTrabajadorHorario);

if ($trabajadorHorario->num_rows <= 0) {
    echo "No existe el trabajador";
} else {
    $trabajadorInfo = $conexion->query($getTrabajadorInfo);

    // Obtener la información del trabajador
    $trabajador = $trabajadorInfo->fetch_assoc();
    $idTrabajador = $trabajador['id_trabajador'];
    $nom = $trabajador['nom_trab'];
    $ape = $trabajador['ape_trab'];

    // Verifica si ya existe un fichaje de salida para el trabajador en la fecha actual
    $fechaActual = date("Y-m-d");
    $checkFichajeSalida = "SELECT * FROM fichajessalida WHERE id_trabajador = '$idTrabajador' AND DATE(hora_fichajeSalida) = '$fechaActual'";
    $resultadoFichajeSalida = $conexion->query($checkFichajeSalida);

    // Inicializa la variable de hora de fichaje
    $horaa = null;

    // Obtengo la última hora de fichaje de salida
    $getHoraFichajeSalida = "SELECT * FROM fichajessalida WHERE id_trabajador = '$idTrabajador' ORDER BY id_trabajador DESC LIMIT 1";
    $horaFichajeSalida = $conexion->query($getHoraFichajeSalida);

    if ($horaFichajeSalida->num_rows > 0) {
        $hora = $horaFichajeSalida->fetch_assoc();
        $horaa = $hora["hora_fichajeSalida"];
    }

    if ($horaa) {
        $horaFichajeHHMM = substr($horaa, 11, 5);
    } else {
        $horaFichajeHHMM = null;
    }

    if ($resultadoFichajeSalida->num_rows > 0) {
        echo json_encode([
            'nombre' => $nom,
            'apellido' => $ape,
            'horaFichaje' => $horaFichajeHHMM,
            'fichadoHoy' => true
        ]);
    } else {
        $insertFichajeSalida = "INSERT INTO fichajessalida (id_trabajador) VALUES ('$idTrabajador')";
        $conexion->query($insertFichajeSalida);

        // Obtengo el horario del trabajador
        $horario = $trabajadorHorario->fetch_assoc();
        $idHorario = $horario['id_horario'];

        // Obtengo el horario por el Id de horario que tiene el trabajador
        $getHorario = "SELECT * FROM horarios WHERE id_horario = '$idHorario'";
        $horarios = $conexion->query($getHorario);
        $horario = $horarios->fetch_assoc();
        $entrada = substr($horario['start_time'], 0, 5);
        $salida = substr($horario['end_time'], 0, 5);

        // Obtengo la última hora de fichaje de salida
        $getHoraFichajeSalida = "SELECT * FROM fichajessalida WHERE id_trabajador = '$idTrabajador' ORDER BY id_trabajador DESC LIMIT 1";
        $horaFichajeSalida = $conexion->query($getHoraFichajeSalida);
        $hora = $horaFichajeSalida->fetch_assoc();
        $hora = $hora["hora_fichajeSalida"];
        $horaFichajeHHMM = substr($hora, 11, 5);

        $horaSalida = strtotime($salida);
        $horaFichajeTime = strtotime($horaFichajeHHMM);

        $isTemprano = $horaFichajeTime < strtotime('-30 minutes', $horaSalida);

        if ($isTemprano) {
            $createIncidencia = "INSERT INTO incidencias (id_trabajador) VALUES ('$idTrabajador')";
            $conexion->query($createIncidencia);

            echo json_encode([
                'temprano' => $isTemprano,
                'nombre' => $nom,
                'apellido' => $ape,
                'horaFichaje' => $horaFichajeHHMM,
                'fichadoHoy' => false
            ]);
        } else {
            echo json_encode([
                'temprano' => $isTemprano,
                'nombre' => $nom,
                'apellido' => $ape,
                'horaFichaje' => $horaFichajeHHMM,
                'fichadoHoy' => false
            ]);
        }
    }
}
