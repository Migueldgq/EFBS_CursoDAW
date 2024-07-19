<?php



function InsertEvent($name, $desc, $image, $autor, $date, $aforo)
{
    $sql = "INSERT INTO eventos (event_name, event_desc, event_image, event_author, event_date, event_aforo) VALUES ('$name', '$desc','$image', '$autor', '$date','$aforo')";
    include "conexion.php";
    if ($conexion) {
        $conexion->query($sql);
        echo "Agregado correctamente";
    }
}