<?php

$dni = $_POST['dni'];

include '../conexion.php';

$getTrabajadorHorario = "SELECT id_horario FROM trabajadores WHERE dni_trab = '$dni'";
$getTrabajadorInfo = "SELECT * FROM trabajadores WHERE dni_trab = '$dni'";

$trabajadorHorario = $conexion->query($getTrabajadorHorario);

//echo $dni;

if ($trabajadorHorario->num_rows <= 0) {
    echo "No existe el trabajador";
} else {
    $trabajadorInfo = $conexion->query($getTrabajadorInfo);

    foreach ($trabajadorInfo as $trabajador) {
        $idTrabajador = $trabajador['id_trabajador'];
        $nom = $trabajador['nom_trab'];
        $ape = $trabajador['ape_trab'];
    }
    $insertFichaje = "INSERT INTO fichajesentrada (id_trabajador) VALUES ('$idTrabajador')";
    $conexion->query($insertFichaje);

    //echo "Fichaje de entrada registrado";


    // Saco el id de horario que tiene el trabajador
    foreach ($trabajadorHorario as $horario) {
        $idHorario = $horario['id_horario'];
        //echo $idHorario . "<br>";
    }
    // Obtengo el horario por el Id de horario que tiene el trabajador
    $getHorario = "SELECT * FROM horarios WHERE id_horario = '$idHorario'";
    $horarios = $conexion->query($getHorario);
    foreach ($horarios as $horario) {
        $entrada = substr($horario['start_time'], 0, 5);
        $salida = substr($horario['end_time'], 0, 5);

        //echo $entrada . " - " . $salida;
    }

    //Obtengo la hora de fichaje

    $getHoraFichaje = "SELECT * FROM fichajesentrada WHERE id_trabajador = '$idTrabajador' ORDER BY id_trabajador DESC LIMIT 1";
    $horaFichaje = $conexion->query($getHoraFichaje);
    foreach ($horaFichaje as $hora) {
        $hora = $hora["hora_fichajeEntrada"];

        //echo $hora;
    }

    // Extraer solo la hora y los minutos de la hora de fichaje
    $horaFichajeHHMM = substr($hora, 11, 5); // HH:MM
    //echo "Hora de fichaje (HH:MM): $horaFichajeHHMM<br>";

    // Comparar la hora de fichaje con la hora de entrada
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
            'horaFichaje' => $horaFichajeHHMM
        ]);


    } else {
        echo json_encode([
            'tarde' => $isTarde,
            'nombre' => $nom,
            'apellido' => $ape,
            'horaFichaje' => $horaFichajeHHMM
        ]);
    }
}