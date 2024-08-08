<?php

$nom = $_POST["nombre"];
$ema = $_POST["email"];
$pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);

$conexion = new mysqli("localhost", "root", "", "fichaje2");

$uniqid = uniqid();




$sql = "INSERT INTO usuarios (nom_usu, email_usu, pass_usu, uniqueId) VALUES ('$nom', '$ema', '$pass', '$uniqid')";

$conexion->query($sql);

$id = $conexion->insert_id;

include 'sendMail.php';

$destino = $ema;
$asunto = "Registro exitoso";
$mensaje = "<h1>Registro exitoso, ahora te toca activar tu cuenta</h1>" . "\r\n";
$mensaje .= "<a href='http://localhost:8000/activar.php?id=" . $uniqid . "&idUsu=" . $id . "'>Activar cuenta</a>";

sendmail($destino, $asunto, $mensaje);

echo "Se ha registrado correctamente";