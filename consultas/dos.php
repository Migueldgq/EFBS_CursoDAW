<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<center>
    <h1>Tabla alumnos</h1>
    <table border=1><thead>
    <tr>
      <th>Numero alumno</th>
      <th>Nombre alumno</th>
      <th>Apellido alumno</th>
    </tr>
  </thead><tbody>
    <?php

//crear conexion DB

$conexion = new mysqli(
    "10.10.10.160","todos","1234","primerabd"
);

//tengo que realizar la sentencia SQL para consultar

$sql = ("SELECT * FROM alumnado");

// ejecutar query

$alumnos = $conexion->query($sql);

foreach ($alumnos as $alumno) {
    $id = $alumno["id_alu"];
    $nombre = $alumno["nom_alu"];
    $apellido = $alumno["ap_alu"];
    echo"
  
    <tr>
      <td>$id</td>
      <td>$nombre</td>
      <td>$apellido</td>
    </tr>
";
};








?>  </tbody>
    </table>
</center>



</body>
</html>