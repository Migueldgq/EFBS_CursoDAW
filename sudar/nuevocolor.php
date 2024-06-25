<?php

$color = $_POST['color'];

$conexion = new mysqli('localhost', 'root', '', 'colorcitoes');

$insertColor = "INSERT INTO colores (color_name) VALUES ('$color')";

$conexion->query($insertColor);