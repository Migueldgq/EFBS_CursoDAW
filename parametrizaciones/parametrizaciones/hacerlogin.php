<?php


$usermail = $_POST["email"];
$userpass = $_POST["contraseña"];

include('conexion.php');

$sql = "SELECT * FROM usuarios WHERE user_email = '$usermail'";

$ejecutar = $conexion->query($sql);

if($ejecutar->num_rows > 0){
    foreach ($ejecutar as $user) {
        $id = $user["user_id"];
        $passBd = $user["user_password"];
    }

    if(password_verify($userpass,$passBd)){
        echo"Login exitoso";
        session_start();
        $_SESSION["usuario"] = $id;
        if(isset($_SESSION["carrito"])){
            $carId = $_SESSION["carrito"];
            $sql = "UPDATE carrito SET user_id  = $id WHERE car_id = $carId";
            $conexion->query($sql);
        }
        //redireccionar

     header("location:index.php");
    }else {
         echo"<script>
         alert('Contraseña o email incorrecto')
         window.location.href='login.php'
         </script>";
    }
}else{
     echo"<script>
         alert('Contraseña o email incorrecto')
         window.location.href='login.php'
         </script>";
};







?>