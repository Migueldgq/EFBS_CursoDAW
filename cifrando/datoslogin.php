<?php



$email = $_GET["email"];
$contra = $_GET["contraseña"];


$conexion = new mysqli ("localhost","root","","probando");

// Seleccionar datos user por email

$sql = "SELECT * from users where user_email = '$email'";


$ejecutar =  $conexion->query($sql);


if ($ejecutar->num_rows > 0) {
    foreach ($ejecutar as $user) {
        $password = $user['user_password'];
    }

    if (password_verify($contra,$password)) {
        echo"Login exitoso";

        //Inicializar escucha de las sesiones

        session_start();
        $_SESSION["usuarios"] = "acceso permitido";





        header("location:privado.php");
    } else {
        echo"<script>
        alert('Contraseña o email incorrecto')
        window.location.href='login.html'
        </script>";
    }
    
}else{
    echo"<script>
        alert('Contraseña o email incorrecto')
        window.location.href='login.html'
        </script>";
};








/////////////////////////////////////////

// $sql = "INSERT INTO users (user_name, user_lastname, user_email, user_password, user_birthdate, user_province) VALUES ('$nom', '$ape','$email','$hashedpassword','$fecnacimiento','$provincia')";

// $conexion->query($sql);

// echo"Registro exitoso, Bienvenid@ $nom $ape a nuestra plataforma";





?>