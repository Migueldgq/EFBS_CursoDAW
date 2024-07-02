<?php

$nom = $_POST['nombre'];
$ape = $_POST['apellido'];
$email = $_POST['email'];
$pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

include ('conexion.php');

include ('funciones.php');

$searchDuplicatedEmail = "SELECT * FROM alumnado WHERE email_alu = '$email'";

$ejecutar = $conexion->query($searchDuplicatedEmail);

if ($ejecutar->num_rows > 0) {

    alerta("El correo electronica ya existe", "registroalu.html");
} else {

    $insertAlumnado = "INSERT INTO alumnado (nombre_alu, apellido_alu, email_alu, pass_alu) VALUES ('$nom', '$ape', '$email', '$pass')";

    $conexion->query($insertAlumnado);

    alerta("Registro exitoso", "loginalumnado.html");

}