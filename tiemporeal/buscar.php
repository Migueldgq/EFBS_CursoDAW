<?php

$conexion = new mysqli("10.10.10.160", "clase", "1234", "todos");

$texto = $_POST["comanda"];

$search = "SELECT * FROM `clientes` WHERE `nom_cli` LIKE '%$texto%'";

$ejecutar = $conexion->query($search);

if ($ejecutar->num_rows > 0) {
    foreach ($ejecutar as $comanda) {
        $nom = $comanda["nom_cli"];
        echo "$nom <br>";

    }
} else {
    echo "No hay registros";
}

