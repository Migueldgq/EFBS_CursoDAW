<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar reservas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <style>
        #title {
            font-family: 'Bebas Neue', cursive;
        }

        #backgroundImage {
            position: relative;
            overflow: hidden;
        }

        #backgroundImage .background-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            opacity: 0.2;
            /* Ajusta la opacidad aquí */
            z-index: -1;
        }

        #backgroundImage>* {
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body>
    <header>
        <nav class="bg-black">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                        <!-- Mobile menu button-->
                        <button id="menu-button" type="button"
                            class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <svg class="block h-6 w-6" id="icon-menu" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <svg class="hidden h-6 w-6" id="icon-close" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-1 items-center justify-center sm:items-stretch">
                        <div class="flex flex-shrink-0 items-center">
                            <p id="title" class="text-white text-xl">Eventos Miguelonsio</p>
                        </div>
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                <a href="index.php"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Ver
                                    eventos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sm:hidden hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2">
                    <a href="index.php"
                        class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium">Crear Evento</a>
                    <a href="productos.php"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Eventos</a>
                </div>
            </div>
        </nav>
    </header>
    <main id="backgroundImage" class="flex items-center justify-center h-[100vh] flex-col">
        <div class="background-overlay"></div>
        <section class="flex flex-col items-center justify-center gap-5 ">
            <article class="flex flex-col gap-5">
                <?php

                $evento = $_GET["evento"];
                $butacas = json_decode($_GET["butacas"]);
                $buta = $_GET["butacas"];

                echo $buta;
                $Numbutacas = count($butacas);

                if ($Numbutacas == 1) {
                    echo " <h1 class='text-center font-bold'> Confirmar reserva de $Numbutacas butaca para $evento</h1> ";
                } else

                    echo " <h1 class='text-center font-bold'> Confirmar reserva de $Numbutacas butacas para $evento</h1> ";

                echo "<div class='flex items-center justify-center gap-5'>";

                foreach ($butacas as $butaca) {

                    echo "<div id='$butaca' class='flex flex-col text-green-800 items-center justify-center'><i class='fas fa-couch text-2xl'></i>
        <p>Butaca $butaca</p></div>";
                }

                echo "</div>";

                ?>


            </article>
            <form action="confirmarReserva.php?evento=<?php echo $evento ?>&butacas=<?php echo  $buta ?>" method="POST"
                class=" w-full flex flex-col items-center justify-center">
                <section class="flex flex-col items-center justify-center gap-5 w-full">
                    <article class="flex flex-col w-full">
                        <label for="">Nombre y Apellidos</label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            name="nombre" />
                    </article>
                    <article class="flex flex-col w-full">
                        <label for="">Correo Electronico</label>
                        <input type="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            name="email" />
                    </article>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        Confirmar Reserva
                    </button>
                </section>
            </form>
        </section>

    </main>
    <script>
        $.post("getEventBackgroundImage.php?evento=<?php echo $evento ?>", {}, function (data) {
            let datos = JSON.parse(data);
            let ruta = `./eventos/${datos[1]}/${datos[0]}`;
            $(".background-overlay").css("background-image", `url("${ruta}")`);


        })
    </script>
</body>

</html>