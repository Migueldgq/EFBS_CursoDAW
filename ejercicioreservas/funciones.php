<?php



function InsertEvent($name, $desc, $image, $autor, $date)
{
    $sql = "INSERT INTO eventos (event_name, event_desc, event_image, event_author, event_date) VALUES ('$name', '$desc','$image', '$autor', '$date')";
    include "conexion.php";
    if ($conexion) {
        $conexion->query($sql);
        echo "Agregado correctamente";
    }
}