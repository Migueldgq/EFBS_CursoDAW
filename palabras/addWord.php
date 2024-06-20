<?php

$pal = $_GET["palabra"];

$conexion = new mysqli("localhost","root","","mibd");

$addWord = "INSERT INTO palabras (pal_pal) VALUES ('$pal') ";

$conexion->query($addWord);

echo "<script>
             alert('Palabra añadida exitosamente')
             window.location.href='./index.php'
         </script>";

