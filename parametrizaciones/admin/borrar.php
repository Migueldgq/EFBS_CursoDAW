<?php


$id = $_GET["productId"];

include("../conexion.php");

$DeleteProductById = "DELETE FROM productos WHERE product_id =$id";


$conexion->query($DeleteProductById);

echo"<script>
        alert('Producto $id eliminado correctamente')
        window.location.href='../productos.php'
        </script>";



?>