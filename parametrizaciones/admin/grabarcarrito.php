<?php


$id = $_GET["productId"];

include('../conexion.php');

session_start();


if (!isset($_SESSION["carrito"])) {

    if(isset($_SESSION["usuario"])){
        $userId = $_SESSION["usuario"];
        //Creo un carrito

    $getUserInfo = "SELECT * FROM usuarios WHERE user_id = $userId";

    $ejecutar = $conexion->query($getUserInfo);

    foreach ($ejecutar as $user) {
        $nom = $user["user_name"];
    }

    $sql = "INSERT INTO carrito (user_id) VALUES ('$userId') ";
    $ejecutar=$conexion->query($sql);
    $idCar = $conexion->insert_id;

     //Inserto el producto en el carrito
    
    
     $addProductCar = "INSERT INTO detallecarrito (car_id,product_id) VALUES ('$idCar', '$id')";

     $_SESSION["carrito"]=$idCar;
 
     $conexion->query($addProductCar);
     echo"<script>
         alert('Producto añadido a favoritos correctamente')
         window.location.href='../productos.php'
         </script>";

    }

    //Creo un carrito (Sin estar logeado)

    $sql = "INSERT INTO carrito (user_id) VALUES ('0') ";
    $ejecutar=$conexion->query($sql);
    $idCar = $conexion->insert_id;

    //Inserto el producto en el carrito
     $_SESSION["carrito"] = $idCar;

     // Obtengo el ID del carrito de la sesión
    $idCar = $_SESSION["carrito"];

    // Verifico si el producto ya está en el carrito
    $checkProduct = "SELECT * FROM detallecarrito WHERE car_id = '$idCar' AND product_id = '$id'";
    $result = $conexion->query($checkProduct);

    if ($result->num_rows > 0) {
    // El producto ya está en el carrito
    echo "<script>
             alert('El producto ya está en tus favoritos')
             window.location.href='../productos.php'
         </script>";
} else{
    $addProductCar = "INSERT INTO detallecarrito (car_id,product_id) VALUES ('$idCar', '$id')";

   

    $conexion->query($addProductCar);
    echo"<script>
         alert('Producto añadido a favoritos correctamente')
         window.location.href='../productos.php'
         </script>";
}

         } else {


    
// Obtengo el ID del carrito de la sesión
    $idCar = $_SESSION["carrito"];


    // Verifico si el producto ya está en el carrito
    $checkProduct = "SELECT * FROM detallecarrito WHERE car_id = '$idCar' AND product_id = '$id'";
    $result = $conexion->query($checkProduct);

    if ($result->num_rows > 0) {
    // El producto ya está en el carrito
    echo "<script>
             alert('El producto ya está en tus favoritos')
             window.location.href='../productos.php'
         </script>";
} else{
     $addProductCar = "INSERT INTO detallecarrito (car_id,product_id) VALUES ('$idCar', '$id')";

    

    $conexion->query($addProductCar);
    echo"<script>
         alert('Producto añadido a favoritos correctamente')
         window.location.href='../productos.php'
         </script>";
    
}

   
};













?>