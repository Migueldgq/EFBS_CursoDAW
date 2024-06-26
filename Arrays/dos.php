<?php

$prendas = ["pantalon", "camisa", "zapatos", "gorro"];

// añadiendo elementos a un array

array_push($prendas, "bufanda");

array_push($prendas, "shoes");

foreach ($prendas as $prenda) {
    echo $prenda . " ";
}

echo "<hr>";

//creamos array vacio para meter los datos dentro de una tabla en un DB

$datos = [];

$conexion = new mysqli("10.10.10.160", "clase", "1234", "todos");

$sql = "SELECT * FROM clientes";

$ejecutar = $conexion->query($sql);

if ($ejecutar->num_rows > 0) {

    foreach ($ejecutar as $registro) {
        $nom = $registro["nom_cli"];
        $ape = $registro["ape_cli"];
        $mail = $registro["mail_cli"];
        $persona = array($nom, $ape, $mail);
        array_push($datos, $persona);
    }


}

$conexion->close();


echo "<table border='1'>

<tr>
<th>Nombre</th>
<th>Apellidos</th>
<th>Mail</th>
</tr>
";

// foreach ($datos as $users) {
//     echo "<tr>";
//     foreach ($users as $user) {
//         echo "<td>$user</td>";
//     }
//     echo "</tr>";
// }
// ;

// foreach ($datos as $users){
//     echo "<tr> 
//     <td>$users[0]</td>
//     <td>$users[1]</td>
//     <td>$users[2]</td>
//     </tr>";    
// };

echo "<hr>";

function convertToCapitalsAndLower($dato1, $dato2)
{
    echo strtoupper($dato1);
    echo strtolower($dato2);

}

echo convertToCapitalsAndLower("hola", "MUNDO");