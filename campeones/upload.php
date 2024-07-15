<?php

$cont = $_POST["contador"];


for ($i = 1; $i <= $cont; $i++) {
    $img = $_FILES["imagen-$i"]["name"];
    $tempIMG = $_FILES["imagen-$i"]["tmp_name"];
    echo "<br>";
    echo $i;
    echo "$img $tempIMG";
}

