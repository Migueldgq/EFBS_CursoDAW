<?php

//crear conexion DB

$conexion = new mysqli(
    "10.10.10.160","todos","1234","primerabd"
);

//tengo que realizar la sentencia SQL para consultar

$sql = ("SELECT * FROM alumnado");

// ejecutar query

$alumnos = $conexion->query($sql);

foreach ($alumnos as $alumno) {
    $id = $alumno["id_alu"];
    $nombre = $alumno["nom_alu"];
    $apellido = $alumno["ap_alu"];
    echo"<b>Alumno</b> $id, <b>Nombre completo</b> $nombre $apellido<br>";
};








?>