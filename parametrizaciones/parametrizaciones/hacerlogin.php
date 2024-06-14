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