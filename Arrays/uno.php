<?php

// Creando un array

$colores = ["rojo", "azul", "verde", "amarillo", "blanco", "negro"];

echo "$colores[2] <br>";
echo "<hr>";

$coloreslenght = count($colores);

echo "$coloreslenght <br>";
echo "<hr>";

for ($i = 0; $i < $coloreslenght; $i++) {
    echo $colores[$i] . "<br>";
}
echo "<hr>";
echo "<br>";
for ($i = $coloreslenght - 1; $i >= 0; $i--) {
    echo $colores[$i] . "<br>";
}

// segunda dimensión

$persona = [
    ["Juan", "Perez"],
    ["Ana", "Gimenez"],
    ["Alfonso", "Carro Moris"]
];

//Accediendo a un array de segunda dimensión

// Forma tradicional
echo "<hr>";
echo "<br>";

//echo $persona[1][0] . "<br>";

// recorriendo el array en bucle anidado

$personalenght = count($persona);

for ($i = 0; $i < $personalenght; $i++) {
    for ($j = 0; $j < count($persona[$i]); $j++) {
        echo $persona[$i][$j] . " ";

    }
    echo "<br>";
}

echo "<br>";
echo "<hr>";

// con foreach

foreach ($persona as $persona1) {
    foreach ($persona1 as $persona2) {
        echo $persona2 . " ";
    }
    echo "<br>";
}


echo "<hr>";

$colors = ["red", "blue", "green", "yellow", "white", "black"];

for ($i = 0; $i < count($persona); $i++) {
    for ($j = 0; $j < count($persona[$i]); $j++) {
        echo "<font color=" . $colors[$i] . ">" . $persona[$i][$j] . "</font>" . " ";
    }
    echo "<br>";
}