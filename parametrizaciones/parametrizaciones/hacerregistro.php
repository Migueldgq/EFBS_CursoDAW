<?php

$nom = $_POST["nombre"];
$ape = $_POST["apellido"];
$email = $_POST["email"];
$pass = password_hash($_POST["contraseña"], PASSWORD_DEFAULT);

include("conexion.php");

/*

$hoy = date("Y-m-d")



*/

$findRepeatedEmail = "SELECT * FROM usuarios WHERE user_email = '$email'";

$ejecutar= $conexion->query($findRepeatedEmail);


if ($ejecutar->num_rows>0) {
    echo"<script>
        alert('El correo electronico ya existe')
        window.location.href='registro.html'
        </script>";
} else {
    $insertUser = "INSERT INTO usuarios (user_name, user_lastname, user_email, user_password) VALUES ('$nom', '$ape','$email','$pass')";

    if ($conexion->query($insertUser)) {
        echo"<script>
        alert('Registro exitoso, Bienvenid@ $nom $ape a nuestra plataforma')
        window.location.href='login.php'
        </script>";
    } else {
        echo"<script>
        alert('La base de datos es de cartón')
        window.location.href='registro.html'
        </script>";
    }
    
}




?>