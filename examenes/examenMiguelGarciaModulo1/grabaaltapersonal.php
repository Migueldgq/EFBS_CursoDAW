<?php

$nom = $_POST['nombre'];
$ape = $_POST['apellido'];
$edad = $_POST['edad'];
$email = $_POST['email'];
$pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

include ('conexion.php');
include ('funciones.php');

$insertUser = "INSERT INTO personal (Nombre_persona, Apellidos_PERSONA, edad_per, Emayl_per, contrasenha) VALUES ('$nom', '$ape', '$edad', '$email', '$pass')";


if ($conexion->query($insertUser)) {
    alerta("Personal agregado con éxito", "index.php");
} else {
    alerta("Ooooops algo ha salido mal", "altapersonal.php");
}