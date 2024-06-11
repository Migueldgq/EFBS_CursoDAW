<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>
<body>
    
<center>
    <h1>Tabla alumnos</h1>
    <table border=1 class="table table-striped"><thead class="">
    <tr>
      <th>Numero cliente</th>
      <th>Nombre cliente</th>
      <th>Apellido cliente</th>
      <th>Email cliente</th>
    </tr>
  </thead><tbody>
    <?php

//crear conexion DB

$conexion = new mysqli(
    "10.10.10.160","todos","1234","primerabd"
);

//tengo que realizar la sentencia SQL para consultar

$sql = ("SELECT * FROM clientes");

// ejecutar query

$clientes = $conexion->query($sql);

foreach ($clientes as $cliente) {
    $id = $cliente["id_cli"];
    $nombre = $cliente["nom_cli"];
    $apellido = $cliente["edad_cli"];
    $email = $cliente["email_cli"];
    echo"
  
    <tr>
      <td>$id</td>
      <td>$nombre</td>
      <td>$apellido</td>
      <td>$email</td>
    </tr>
";
};

?>  </tbody>
    </table>
</center>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>