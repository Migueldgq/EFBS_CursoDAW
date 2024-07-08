<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <div>
            <h1>Ver notas</h1>
            <button onclick="window.location.href='privado.php'"></button>
        </div>
        <div id="informacion">

        </div>
    </div>

    <script>
        $.get(
            "damenotas.php", {}, function ((echosdelphp){
            $("#informacion").html(echosdelphp)
        })
        )
    </script>
</body>

</html>