<?php

$datos = $_POST['materia'];
$datos = explode("%", $datos);
$id = $datos[0];
$nommat = $datos[1];

//Vamos a crear una sesion para saber que materia ha seleccionado

session_start();

$_SESSION["materia"] = array($id, $nommat);

//redireccionamos a las preguntas

header("location: registrarpreguntas.php");