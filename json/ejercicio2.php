<?php

$conexion = new mysqli("10.10.10.160", "tutores", "1234", "evaluaciones"); // Conectamos a la DB

$getAllAlumnos = "SELECT * FROM alumnado ORDER BY RAND() LIMIT 1"; // Consulta para obtener 1 alumno de la database de manera aleatoria

$ejecutar = $conexion->query($getAllAlumnos); // Ejecutamos la consulta

$datos = []; // Creamos array vacio

if ($ejecutar->num_rows > 0) {
    foreach ($ejecutar as $alumno) {
        $nomalu = $alumno["nombre_alu"];
        $apealu = $alumno["apellido_alu"];
        $emailalu = $alumno["email_alu"];

        array_push($datos, $nomalu, $apealu, $emailalu); // Pusheamos al array vacio

        echo json_encode($datos); // Codificamos el array y lo mandamos como JSON (texto plano)

    }
}