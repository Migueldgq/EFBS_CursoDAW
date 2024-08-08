<?php

include "checkIfIsAccountActivated.php";

$ema = $_POST["email"];
$pass = $_POST["password"];

$conexion = new mysqli("localhost", "root", "", "fichaje2");


$sql = "SELECT * FROM usuarios WHERE email_usu = '$ema'";
$ejecutar = $conexion->query($sql);

if ($ejecutar->num_rows > 0) {
    foreach ($ejecutar as $row) {
        $id = $row["id_usu"];
        $passBD = $row["pass_usu"];
    }

    if (checkIfIsAccountActivated($id)) {
        if (password_verify($pass, $passBD)) {
            echo "Se ha iniciado sesion correctamente";
        } else {
            echo "Contraseña incorrecta o email incorrectos";
        }
    } else {
        echo "Tu cuenta no ha sido activada";
    }


} else {
    echo "Contraseña incorrecta o email incorrectos";
}