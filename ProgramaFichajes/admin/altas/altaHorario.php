<?php

$entrada = $_POST['entrada'];
$salida = $_POST['salida'];

include '../../conexion.php';


$sql = "INSERT INTO horarios (start_time, end_time) VALUES ('$entrada', '$salida')";

if ($conexion->query($sql)) {
    echo "<script>
    alert('Horario dado de alta');
    window.location.href = '../admin.php';
    </script>";
} else {
    echo "Ha ocurrido un error";
}

