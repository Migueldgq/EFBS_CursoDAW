<?php

$brand = $_POST["brand"];
$carnumberplate = $_POST["car_number_plate"];
$color = $_POST["color"];
$numpuertas = $_POST["num_puertas"];

// $conexion = new mysqli("localhost", "root", "", "vehiculos");

// $insertar = "INSERT INTO vehiculos (marca_veh,matricula_veh,color_veh,npuertas_veh) VALUES ('$brand','$carnumberplate','$color','$numpuertas')";

// $conexion->query($insertar);

echo " " . $brand . " " . $carnumberplate . " " . $color . " " . $numpuertas . " ";