<?php


$adminName = $_POST["nombre"];
$adminLastName = $_POST["apellido"];
$adminEmail = $_POST["email"];
$adminPass = password_hash($_POST["contraseña"], PASSWORD_BCRYPT);

include("../conexion.php");



$findRepeatedAdmin = "SELECT * FROM administradores WHERE admin_email = '$adminEmail'";

$ejecutar= $conexion->query($findRepeatedAdmin);

if ($ejecutar->num_rows>0) {
    echo"<script>
        alert('El correo electrónico con el que estás intentando registrarte ya existe')
        window.location.href='registeradmin.php'
        </script>";
} else {
    $insertAdmin = "INSERT INTO administradores (admin_name , admin_lastname , admin_email, admin_password) VALUES ('$adminName','$adminLastName','$adminEmail', '$adminPass')";

    if ($conexion->query($insertAdmin)) {
        echo"<script>
        alert('Registro exitoso, Bienvenid@ $adminName $adminLastName a nuestra plataforma, ahora formas parte del equipo de administradores')
        window.location.href='logadminpage.php'
        </script>";
    } else {
        echo"<script>
        alert('La base de datos es de cartón')
        window.location.href='registeradmin.php'
        </script>";
    }
}











?>