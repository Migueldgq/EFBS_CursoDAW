<?php


$nom = $_POST["nombre"];
$ape = $_POST["apellido"];
$contra = $_POST["contraseña"];
$email = $_POST["email"];
$fecnacimiento = $_POST["fechanacimiento"];
$provincia = $_POST["provincia"];
$postalcode = $_POST["postalcode"];

$hashedpassword = password_hash($contra, PASSWORD_BCRYPT);

// echo "Datos recibidos ma frien $nom $ape $contra $email $fecnacimiento $provincia ";


$conexion = new mysqli ("localhost","root","","probando");

$sql1 = "SELECT * from users where user_email = '$email'";

$ejecutar = $conexion->query($sql1);

if($ejecutar->num_rows > 0){
    echo"<script>
        alert('El correo electronico ya existe')
        window.location.href='index.html'
        </script>";
}else{
    $sql = "INSERT INTO users (user_name, user_lastname, user_email, user_password, user_birthdate, user_province, user_postalcode) VALUES ('$nom', '$ape','$email','$hashedpassword','$fecnacimiento','$provincia','$postalcode')";

    $conexion->query($sql);

echo"Registro exitoso, Bienvenid@ $nom $ape a nuestra plataforma";
}








?>