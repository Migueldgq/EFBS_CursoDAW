<?php

include("../conexion.php");

$productId = $_GET["productId"];

$findDetailCarByProductId = "SELECT * FROM detallecarrito WHERE product_id = $productId LIMIT 1";

$result = $conexion->query($findDetailCarByProductId); 

if($result->num_rows > 0){
    foreach($result as $CarDetails){
    $carDetailId = $CarDetails["detailcar_id"];
}
};
$deleteProductFromCart = "DELETE FROM detallecarrito WHERE detailcar_id = $carDetailId";

$conexion->query($deleteProductFromCart);

echo "<script>
             alert('Producto eliminado de favoritos')
             window.location.href='./carrito.php'
         </script>";












