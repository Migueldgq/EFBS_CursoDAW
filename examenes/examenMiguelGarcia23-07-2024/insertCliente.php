<?php

$nom = $_POST['nombre'];
$ape = $_POST['apellido'];
$pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
$email = $_POST['email'];
$clientId = $_POST['id'];

include 'conexion.php';



$sql = "INSERT INTO `clientes` (`client_id`, `client_name`, `client_lastname`, `client_password`, `client_email`) VALUES ($clientId, '$nom', '$ape', '$pass', '$email');";

$conexion->query($sql);

echo "registrado";

