<?php
//$searchedName = $_POST["nombre"];
$searchedAge = $_POST["edad"];

$conexion = new mysqli("10.10.10.160","todos","1234","primerabd");


// $sql = "SELECT * FROM clientes WHERE nom_cli = '$searchedName'";
// $sql = "SELECT * FROM clientes WHERE nom_cli != '$searchedName'";
// $sql = "SELECT * FROM clientes WHERE edad_cli >= $searchedAge";
$sql = "SELECT COUNT(edad_cli) AS cuenta FROM clientes WHERE edad_cli >= $searchedAge";


$ejecutar =  $conexion->query($sql);

if ($ejecutar->num_rows>=0) {
    
    //var_dump($ejecutar);

    

// CONTAR PERSONAS CON CIERTA EDAD

//  foreach ($ejecutar as $cliente) {
//      $cuenta = $cliente["cuenta"];
//      echo"Hay $cuenta personas con $searchedAge o más  años";
    
//     }

 // DEVUELVE PERSONAS CON MAYOR O IGUAL EDAD QUE LA INTRODUCIDA   

/ foreach ($ejecutar as $cliente) {
/     $id = $cliente["id_cli"];
/     $nombre = $cliente["nom_cli"];
/     $edad = $cliente["edad_cli"];
/     $email = $cliente["email_cli"];


//     echo"$id, $nombre, $edad, $email</br>";
//};
echo"<a href='cuatro.html'>Volver</a>";

}}else{
    echo"No mandaste nada burro o la edad $searchedAge no existe en la database<br>
    <a href='cuatro.html'>Volver</a>";

    // echo"No mandaste nada burro o el nombre $searchedName no existe en la database<br>
    // <a href='cuatro.html'>Volver</a>";
};



?>