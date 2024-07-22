

<?php
    //vamos a pintar una datos en una tabla y que sea lo que dios quiera // 123 documento uno esta vinculado con el dos. este es el documento 3 y esta vinculado con el 2 tambien. documento 1 envia por este, documento 2 recibe por get.no vamo a recoger por get porque el 2 recibi.
    include("conexion.php");
    $sql = "SELECT * FROM alumnado WHERE id_alu='$id'";         //$id no existe, está en el doc 2
    $ejecutar = $conexion->query($sql);
    foreach($ejecutar as $registro)
    {
        $nom = $registro["nombre_alu"];
        $ape = $registro["apellido_alu"];
        $ema = $registro["email_alu"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>         
        td
        {
            width: 33.3%;
        }
    </style>
</head>
<body>
    <table border=1>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
        </tr>
        <tr>
            <td><?php echo $id ?></td>
            <td><?php echo $nom ?></td>
            <td><?php echo $ape ?></td>
        </tr>
        <tr>
            <th colspan="3">EMAIL</th>
        </tr>
        <tr>
            <td colspan="3"><?php echo $ema ?></td>
        </tr>
    </table>    
</body>
</html>
