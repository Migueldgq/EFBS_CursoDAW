<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color:grey">
    <?php

    // Crear tablero de ajedrez
    
    $colors = ["white", "black"];

    echo "<div style='width:480px'>";

    for ($i = 0; $i < 8; $i++) {
        for ($j = 0; $j < 8; $j++) {


            $colorsIndex = ($i + $j) % 2;

            echo "<div style='height:60px; width:60px; background-color:$colors[$colorsIndex]; float:left'></div>";

            echo "<script>console.log(`$i $j`)</script>";
        }



    }

    echo "</div>";

    ?>
</body>

</html>