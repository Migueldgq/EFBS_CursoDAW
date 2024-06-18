<?php

include("../conexion.php");

$productId = $_GET["productId"];

$deleteProductFromCart = "DELETE FROM detallecarrito WHERE product_id = $productId";

$conexion->query($deleteProductFromCart);

echo "<script>
             alert('Producto eliminado de favoritos')
             window.location.href='./carrito.php'
         </script>";












?>