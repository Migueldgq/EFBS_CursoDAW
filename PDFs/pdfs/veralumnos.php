<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ALUMNADO</h1>
    <?php
        include("conexion.php");
        $sql = "SELECT nombre_alu, id_alu FROM alumnado";                           //solo pedimos 2 campos, consulta eficiente
        foreach($conexion->query($sql) as $registro)
        {
            $id = $registro["id_alu"];
            $nom = $registro["nombre_alu"];
            echo "$nom <button onclick='window.location.href=`montapdf.php?i=$id`'>Descargar</button> <br>";      //tenemos que saber en que alumno hemos clicado, por eso vamos a enviar auna mochilita
        }
    ?>
</body>
</html>