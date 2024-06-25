<?php

$color = strtolower($_POST['color']);

$conexion = new mysqli('localhost', 'root', '', 'colorcitoes');

$searchColor = "SELECT * FROM `colores` WHERE LOWER(`color_name`) LIKE '%$color%'";

$ejecutar = $conexion->query($searchColor);

if ($ejecutar->num_rows > 0) {
    foreach ($ejecutar as $color) {

        $nom = $color["color_name"];

        switch (strtolower($nom)) {
            case 'amarillo':
                $color = 'yellow';
                break;
            case 'rojo':
                $color = 'red';
                break;
            case 'azul':
                $color = 'blue';
                break;
            case 'verde':
                $color = 'green';
                break;
            case 'negro':
                $color = 'black';
                break;
            case 'marrón':
                $color = 'brown';
                break;
            case 'morado':
                $color = 'purple';
                break;
            default:
                $color = 'white';
                break;
        }

        echo "<button class='py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700' onclick='changeColor(`$color`)'>$nom</button><br>";
    }
}
