<?php


// EXAMENCITO de MIGUEL GARCIA

// FUNCION GENERICA PARA INSERTAR DATOS EN UNA DB

function insertUsers($table, $field, $values)
{
    // Obviamente hay que hacer la conexion a la BD antes pero
    //como es un ejercicio de solo funcion, no te pongo la conexion
    $insertQuery = "INSERT INTO $table $field VALUES $values";
    return $insertQuery;
}

echo insertUsers("users", "users_name", "Miguel");

echo "<hr>";

//Funcion generica que dando nombre edad y sexo te imprime si eres mayor de edad o no

function ageChecker($name, $sex, $age)
{
    if ($age >= 18) {
        echo "Hola $name, eres mayor de edad tas viejo mi pana y eres $sex";
    } else {
        echo "Hola $name, eres menor de edad osea que no tas viejo y eres $sex";
    }
}

ageChecker("Miguel", "hombre", 19);

echo "<hr>";

//Funcion que itera array de dos dimensiones

$dosdimensiones = [["carne", "pollo", "pescado"]];
function iterateArray($array)
{
    foreach ($array as $primeradimension) {
        foreach ($primeradimension as $segundadimension) {
            echo $segundadimension . " ";
        }
    }
}

iterateArray($dosdimensiones);