<?php

session_start();

$idCar = $_SESSION["carrito"];

include("../conexion.php");

$productId = $_GET["productId"];

$addProductCar = "INSERT INTO detallecarrito (car_id,product_id) VALUES ('$idCar', '$productId')";

$conexion->query($addProductCar);   


echo"<script>
alert('Haz añadido este producto de nuevo a tu carrito')
window.location.href='./carrito.php'
</script>";


 




