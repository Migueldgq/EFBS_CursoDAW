<?php

$n1 = 6;

$n2 = 8;

if($n2 > $n1){

echo("$n2 es mayor que $n1");

}else{
    echo("aprende los numeros");
}


echo"<br><hr>";
echo"<h2>Segundo condicional</h2>";


$n3 = 10;
$n4 = 4;

if ($n3 < $n4) {
   echo"$n3 es menor que $n4";
} else {
    if ($n3 == $n4) {
        echo"Son iguales";
    } else {
        echo"$n3 es mayor que $n4";
    }
    
}


echo"<br><hr>";
echo"<h2>Ejercicio</h2>";

$num = $_POST["num"];

echo($num);

if ($num < 10) {
    echo"<p style='color: blue;'>Mensaje azul</p>";
} else {
    if ($num == 10) {
        echo"<p style='color: green;'>Mensaje verde</p>";
    } else {
        if ($num > 10) {
            echo"<p style='color: orange;
            font-size: xx-large;'>Texto en grande en naranja</p>";
        } else {
            echo"<p> Buenos dias </p>";
        }
        
    }
    
}


?>