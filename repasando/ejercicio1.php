<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav>
        <?php

        $icons = ["fa-solid fa-user", "fa-solid fa-plus", "fa-solid fa-bell", "fa-solid fa-cart-shopping", "fa-solid fa-envelope", "fa-solid fa-phone", "fa-solid fa-upload", "fa-solid fa-right-to-bracket"];

        $colors = ["red", "green", "blue", "yellow", "purple", "cyan", "brown", "orange"];

        $nombres = ["perfil", "registro", "alertas", "carro", "correo", "telefono", "subir", "iniciar sesion"];

        for ($i = 0; $i < count($icons); $i++) {
            echo "<a href='$nombres[$i]'><i class='$icons[$i]' style='color:$colors[$i]; font-size: 120px;'></i></a>";
        }





        ?>
    </nav>
</body>

</html>