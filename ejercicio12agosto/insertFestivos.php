<?php

$festivos = json_decode($_POST["festivos"]);
$mes = $_POST["mes"];

// switch ($mes) {
//     case "1":
//         $mes = "Enero";
//         break;
//     case "2":
//         $mes = "Febrero";
//         break;
//     case "3":
//         $mes = "Marzo";
//         break;
//     case "4":
//         $mes = "Abril";
//         break;
//     case "5":
//         $mes = "Mayo";
//         break;
//     case "6":
//         $mes = "Junio";
//         break;
//     case "7":
//         $mes = "Julio";
//         break;
//     case "8":
//         $mes = "Agosto";
//         break;
//     case "9":
//         $mes = "Septiembre";
//         break;
//     case "10":
//         $mes = "Octubre";
//         break;
//     case "11":
//         $mes = "Noviembre";
//         break;
//     case "12":
//         $mes = "Diciembre";
//         break;
// }

$conexion = new mysqli("localhost", "root", "", "almanaque");

foreach ($festivos as $dia) {
    $sql = "INSERT INTO festivos (dia, festivo_mes) VALUES ('$dia', '$mes')";
    $conexion->query($sql);

}
echo "ok";
