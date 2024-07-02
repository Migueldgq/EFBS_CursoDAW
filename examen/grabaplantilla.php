<?php

$materia = $_POST['materia'];

include ('conexion.php');
include ('funciones.php');

$insertMateria = "INSERT INTO plantillas (materia_pla) VALUES ('$materia')";

if ($conexion->query($insertMateria)) {
    alerta("Materia registrada", "preguntas.html");
    $id = $conexion->insert_id;
} else {
    alerta("Error al registrar materia", "preguntas.html");
}




