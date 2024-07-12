<?php

$colores = array("rojo", "azul", "verde", "amarillo", "naranja", "rosa", "violeta", "blanco", "negro");

$coloresjson = json_encode($colores);

echo $coloresjson;

$coloresdesjson = json_decode($coloresjson);

var_dump($coloresdesjson);