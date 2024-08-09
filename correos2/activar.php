<?php

$id = $_GET["idUsu"];
$uniqid = $_GET["id"];

$conexion = new mysqli("localhost", "root", "", "fichaje2");

$getUuid = "SELECT * FROM usuarios WHERE id_usu = '$id'";

$ejecutar = $conexion->query($getUuid);

if ($ejecutar->num_rows > 0) {
    foreach ($ejecutar as $row) {
        $uuid = $row["uniqueId"];
    }
}

if ($uuid == $uniqid) {
    $checkAccount = "UPDATE usuarios SET isEmailActivated = 1, uniqueId = '' WHERE id_usu = $id";
    $conexion->query($checkAccount);

    include 'sendMail.php';

    $getEmailById = "SELECT * FROM usuarios WHERE id_usu = $id";
    $result = $conexion->query($getEmailById);

    if ($result->num_rows > 0) {
        foreach ($result as $row) {
            $nom = $row["nom_usu"];
            $ema = $row["email_usu"];
        }
    }


    $destino = $ema;
    $asunto = "Cuenta activada correctamente";
    $mensaje = "<h1>Cuenta actividad Bienvenido $nom</h1>" . "\r\n";

    sendmail($destino, $asunto, $mensaje);

    echo "Se ha registrado correctamente";
} else {
    echo "Error al activar la cuenta";
}





