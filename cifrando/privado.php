<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Hola, estas en privado</p>
    <?php

    session_start();
    if (isset($_SESSION["usuarios"])) {
        $texto1 = $_SESSION["usuarios"];
        echo"$texto1";
    } else {
        echo" Acceso denegado, ve a <a href='login.html'>Login</a> ";
    };
    ?>
</body>
</html>