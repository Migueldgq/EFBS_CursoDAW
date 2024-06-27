<?php

// Funcion 1 - Funcion que pinte un input

function pintaInput()
{
    echo '<input type="text" name="num1" id="num1">';
}

pintaInput();

// Funcion 2 - Funcion que calcule el IVA de un precio

echo '<hr>';

function calculaIVA($precio)
{
    $iva = $precio * 0.21;
    return $iva;
}

echo calculaIVA(150);

echo '<hr>';

// Funcion 3 - Funcion que le envíe dos números pero si le digo que quiero sumar o restar me devuelva el resultado de la operacion

function calculaOperacion($num1, $num2, $operacion)
{
    if ($operacion == 'sumar') {
        return $num1 + $num2;
    } elseif ($operacion == 'restar') {
        return $num1 - $num2;
    }
}

echo calculaOperacion(5, 5, 'sumar');

// Funcion 4 - Funcion le paso 5 variables y me devuelve un jarray

echo '<hr>';

function createArray($num1, $num2, $num3, $num4, $num5)
{
    $array = [$num1, $num2, $num3, $num4, $num5];
    return $array;
}

echo implode(', ', createArray(1, 2, 3, 4, 5));

// Funcion 5 - Funcion que yo le paso el array que cree antes y que me imprima todos los datos que hay dentro del array

function imprimeArray($array)
{
    foreach ($array as $value) {
        echo $value . '<br>';
    }
}

echo '<hr>';

imprimeArray(createArray(1, 2, 3, 4, 5));

//Funcion 6 - Funcion para llevar a cabo una consulta en una base de datos

function consulta($tabla, $condicion, $campo, $valor)
{
    if ($condicion && $valor && $campo) {
        $sql = "SELECT * FROM $tabla $condicion $campo  = $valor";
        // $conexion = new mysqli('localhost', 'root', '', 'proyectos');
        // $ejecutar = $conexion->query($sql);
        return $sql;
    } elseif (!$condicion && !$valor && !$campo) {
        $sql = "SELECT * FROM $tabla";
        // $conexion = new mysqli('localhost', 'root', '', 'proyectos');
        // $ejecutar = $conexion->query($sql);
        return $sql;
    }
}
;

echo consulta('proyectos', 'WHERE', 'id', 1);

echo "<br>";

echo consulta('proyectos', '', '', '');