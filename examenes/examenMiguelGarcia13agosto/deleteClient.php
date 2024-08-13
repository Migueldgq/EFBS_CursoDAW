<?php

include 'conexion.php';

$id = $_GET['id'];

$deleteClient = "DELETE FROM clientes WHERE client_id = $id";

if ($conexion->query($deleteClient)) {
    echo "<script>alert('Se ha eliminado el cliente');
    window.location.href = 'index.html'</script>";
} else {
    echo "<script>alert('Error');</script>";
}

