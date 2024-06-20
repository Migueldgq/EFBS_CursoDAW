<?php

$pal = $_GET["palabra"];

$conexion = new mysqli("localhost", "root", "", "mibd");

$deleteWord = "DELETE FROM palabras WHERE pal_pal = ('$pal') ";

$conexion->query($deleteWord);

echo "<script>
             alert('Palabra eliminada sastifactoriamente')
             window.location.href='./index.php'
         </script>";