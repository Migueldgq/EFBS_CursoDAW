<?php

$palabra = $_POST["palabra"];

$conexion = new mysqli("localhost", "root", "", "mibd");

$sql = "SELECT * FROM palabras WHERE pal_pal LIKE '%$palabra%' ";


$result = $conexion->query($sql);


if ($result->num_rows > 0) {

    foreach ($result as $words) {

        $words = $words["pal_pal"];

        echo "<li></li>" . $words;

    }
} else {
    echo "No se encontraron resultados";
}
