<?php

$nom = $_POST['nombre'];
$ape = $_POST['apellido'];
$edad = $_POST['edad'];

$conexion = new mysqli("10.10.10.160", "rapido", "1234", "rapidito");

$sql = "INSERT INTO clientes (nom, ape, age) VALUES ('$nom', '$ape', '$edad')";

if ($conexion->query($sql)) {
    echo "Se inserto correctamente";
    header("Location: index.html");
} else {
    echo "No se inserto";
    header("Location: formulario.html");
}