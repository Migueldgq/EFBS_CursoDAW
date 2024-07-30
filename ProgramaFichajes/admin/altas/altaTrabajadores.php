<?php

$dni = $_POST['dni'];
$nom = $_POST['nombre'];
$ape = $_POST['apellido'];
$horario = $_POST['horario'];

include '../../conexion.php';


$sql = "INSERT INTO trabajadores (nom_trab, ape_trab, dni_trab, id_horario) VALUES ('$nom','$ape','$dni','$horario')";

if ($conexion->query($sql)) {
    echo "<script>
    alert('Trabajador dado de alta');
    window.location.href = '../admin.php';
    </script>";
} else {
    echo "Ha ocurrido un error";
}