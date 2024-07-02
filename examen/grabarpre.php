<?php

//Necesito ID de la plantilla

session_start();

$id = $_SESSION['materia'][0];


//vamos a recibir por post el texto de la pregunta 

$pre = $_POST['pregunta'];

include ('conexion.php');
include ('funciones.php');

$insertPregunta = "INSERT INTO preguntas (id_pla, pregunta_pre) VALUES ('$id', '$pre')";



if ($conexion->query($insertPregunta)) {

    $idPre = $conexion->insert_id;
    // Vamos a divertirnos un poco recordando los loops PERO para recoger por post

    for ($i = 1; $i < 4; $i++) {
        $resp = $_POST["respuesta$i"];
        $insertRespuesta = "INSERT INTO respuestas (id_pre, respuesta_res) VALUES ('$idPre', '$resp')";
        $conexion->query($insertRespuesta);


        if ($i == 1) {
            $idRes = $conexion->insert_id;
            $insertCorrecta = "INSERT INTO correctas (id_res) VALUES ('$idRes')";
        }
    }

} else {

    alerta("Algo salió mal", "registrarpreguntas.php");
}

