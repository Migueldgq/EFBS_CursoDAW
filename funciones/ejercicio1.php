<?php

$num1 = $_POST['num1'];
$num2 = $_POST['num2'];

$operacion = $_POST['operacion'];

function sumar($num1, $num2)
{
    return $num1 + $num2;
}
;

function restar($num1, $num2)
{
    return $num1 - $num2;
}
;

function multiplicar($num1, $num2)
{
    return $num1 * $num2;
}
;

function dividir($num1, $num2)
{
    return $num1 / $num2;
}
;


if ($operacion == 'sumar') {
    echo sumar($num1, $num2);
} elseif ($operacion == 'restar') {
    echo restar($num1, $num2);
} elseif ($operacion == 'multiplicar') {
    echo multiplicar($num1, $num2);
} elseif ($operacion == 'dividir') {
    echo dividir($num1, $num2);

}