<?php

$id = $_GET['id'];

$deleteCLiente = "DELETE FROM clientes WHERE codigo = $id";

$conexion = new mysqli("10.10.10.160", "rapido", "1234", "rapidito");

if($conexion->query($deleteCLiente)){
    echo "Se borro correctamente y vuela el archivo";
} else {
    echo "No vuela este archivo";
}