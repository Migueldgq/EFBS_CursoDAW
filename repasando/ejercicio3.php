<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
    <div style="width: 50%; float: left;">

        <h1>Formulario para recibir</h1>
        <form action="recibir.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="apellidos" placeholder="Apellidos">
            <input type="text" name="email" placeholder="Escribe tu correo">
            <input type="submit" value="Enviar">
        </form>
    </div>


    <div style="width: 50%; float: left;">

        <h1>Formulario para grabar</h1>
        <form action="grabar.php" method="POST">
            <input type="text" name="brand" placeholder="Marca">
            <input type="text" name="car_number_plate" placeholder="Matricula">
            <input type="text" name="color" placeholder="color">
            <input type="number" name="num_puertas" placeholder="numero de puertas">
            <input type="submit" value="Enviar">

        </form>
    </div>
    <div style="width: 50%; float: left;">

        <h1>Formulario para grabar palabrita</h1>
        <form action="grabar2.php" method="POST">
            <input type="text" name="palabra" placeholder="Marca">
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>

</html>