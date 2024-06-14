<?php


$id = $_GET["productId"];

include("../conexion.php");

$getProductInfoById = "SELECT * FROM productos WHERE product_id =$id";

$ejecutar = $conexion->query($getProductInfoById)

foreach ($ejecutar as $product) {
    $prodname = $product["product_name"];
    $proddes = $product["product_description"];
    $prodprice = $prodct["product_price"];
}



?>