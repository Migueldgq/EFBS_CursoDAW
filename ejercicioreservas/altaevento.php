<?php

$name = $_POST["nombre"];
$desc = $_POST["desc"];
$img = $_FILES["image"]["name"];
$tempIMG = $_FILES["image"]["tmp_name"];
$author = $_POST["author"];
$date = $_POST["date"];

include "funciones.php";

mkdir("./eventos/$name", 0777);
$ruta = "./eventos/$name/$img";
move_uploaded_file($tempIMG, $ruta);


InsertEvent($name, $desc, $img, $author, $date);


