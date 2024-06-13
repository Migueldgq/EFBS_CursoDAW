<?php

$nom = $_POST["nombre"];
$desc = $_POST["descripcion"];
$img = $_FILES["foto"]["name"];
$imgtemp = $_FILES["foto"]["tmp_name"];
$precio = $_POST["precio"];



include("../conexion.php");

$insertProductInfo = "INSERT INTO productos (product_name,product_description,product_price) VALUES ('$nom','$desc','$precio')";





if($conexion->query($insertProductInfo)){   
    //Vamos a concoer la id de esta grabacion, el ultimo registro
    $id = $conexion->insert_id;
    
    $insertProductPhoto = "INSERT INTO images (image_name , product_id) VALUES ('$img','$id')";
//Vamos a crear una carpeta en un lugar especifico del server
    mkdir("../imagenes/product$id",0777);

    $ruta = "../imagenes/product$id/$img";

    //Movemos img a la ruva
    move_uploaded_file($imgtemp,"$ruta");

    $conexion->query($insertProductPhoto);

    echo"<script>
    alert('Tu articulo $nom se ha subido correctamente')
    </script>";
}else{
    echo"<script>
    alert('Base datos de carton')
    </script>";
};
















?>