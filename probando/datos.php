<?php

$nom = $_POST["nombre"];

$value = $_POST["value"];



//Vamos a crear nuestra primera conexion a una DB


// SERVER , USER , PASSWORD, DBNAME
$conexion = new mysqli ("localhost","root","","probando");


if ($value == 0) {
    $ape = $_POST["apellido"];
    $sql = "INSERT INTO alumnado (nombre_alu, apellido_alu) VALUES ('$nom', '$ape')";
    $conexion->query($sql);
    echo"Registro exitoso, Bienvenido Estudiante $nom $ape ahora tenemos tus datos";
} else {
    $email = $_POST["email"];
    $pass = $_POST["contraseña"];
    $sql = "INSERT INTO profesorado (nombre_profe, email_profe, pass_pro) VALUES ('$nom','$email', '$pass')";
    $conexion->query($sql);
    echo"Registro exitoso, Bienvenido Profesor $nom ahora tenemos tus datos";
}

//VAMOS A HACER NUESTRO PRIMER SQL



// ejecutar sencuencia









?>