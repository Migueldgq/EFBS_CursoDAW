<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    function DecirHola()
    {
        for ($i = 0; $i < 10; $i++) {
            echo "Hola";
        }
    }

    // DecirHola();
    


    function saludo_personalizado($nombre, $apellido)
    {
        echo "Hola $nombre $apellido";
    }



    if (isset($_POST["nombre"]) && isset($_POST["apellido"])) {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        saludo_personalizado($nombre, $apellido);
    }


    ?>

</body>
<form action="1.php" method="POST">
    <input type="text" placeholder="Ingresa tu nombre" name="nombre">
    <input type="text" placeholder="Ingresa tu apellido" name="apellido">
    <button>Enviar</button>
</form>
<button onclick="DecirHola()">F</button>


</html>