<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Edad</td>
            </tr>
        </thead>
        <tbody>
            <?php


            $conexion = new mysqli("10.10.10.160", "rapido", "1234", "rapidito");

            $getCLientes = "SELECT * FROM clientes";

            $result = $conexion->query($getCLientes);

            foreach ($result as $cliente) {
                $nom = $cliente["nom"];
                $ape = $cliente["ape"];
                $age = $cliente["age"];

                echo "<tr><td>$nom</td><td>$ape</td><td>$age</td></tr>";


            }


            ?>



        </tbody>
    </table>
</body>

</html>