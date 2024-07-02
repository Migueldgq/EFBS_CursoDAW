<?php

$email = $_POST['email'];
$pass = $_POST['password'];

include ('conexion.php');
include ('funciones.php');

$consulta = "SELECT * FROM alumnado WHERE email_alu = '$email'";

$ejecutar = $conexion->query($consulta);

if ($ejecutar->num_rows > 0) {
    foreach ($ejecutar as $alumno) {
        $id = $alumno["id_alu"];
        $passBd = $alumno["pass_alu"];
    }


    if (password_verify($pass, $passBd)) {

        alerta("Login exitoso", "index.html");

        session_start();

        $_SESSION["alumno"] = $id;

    } else {

        alerta("Usuario o contraseña incorrecta", "loginalumnado.html");
    }


} else {
    alerta("Usuario o contraseña incorrecta", "loginalumnado.html");
}

