<?php


$adminEmail = $_POST["email"];
$adminPass = $_POST["contraseña"];

include("../conexion.php");

$sql = "SELECT * FROM administradores WHERE admin_email = '$adminEmail'";

$ejecutar = $conexion->query($sql);

if($ejecutar->num_rows > 0){
    foreach ($ejecutar as $admin) {
        $id = $admin["admin_id"];
        $passBd = $admin["admin_password"];
    }

    if(password_verify($adminPass,$passBd)){
        echo"Login exitoso";
        session_start();
        $_SESSION["usuario-admin"] = $id;
        //redireccionar

     header("location:../index.php");
    }else {
         echo"<script>
         alert('Contraseña o email incorrecto')
         window.location.href='loginadminpage.php'
         </script>";
    }
}else{
     echo"<script>
         alert('Contraseña o email incorrecto')
         window.location.href='loginadminpage.php'
         </script>";
};










?>