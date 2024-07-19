<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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


<body class="bg-white-900 ">
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
        <section class="flex items-center justify-center ">
            <article>
                <?php

                $evento = $_GET["evento"];

                echo " <h1 class='text-center font-bold'> Reserva de butacas para $evento</h1> "

                    ?>
            </article>
        </section>
        <section class="flex items-center justify-center flex-col">
            <div class="butaca-table w-[25rem] h-[25rem] grid grid-cols-5 ">

            </div>
            <button id="reservationButton"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Reservar
            </button>
            <article class="flex items-center justify-center gap-5 mt-5">
                <div class="flex items-center justify-center gap-2">
                    <i class="fas fa-couch text-2xl text-green-800"></i>
                    <p id="butacasAvailable" class="text-center font-bold">Butacas disponibles: </p>
                </div>
                <div class="flex items-center justify-center gap-2">
                    <i class="fas fa-couch text-2xl text-red-600"></i>
                    <p id="butacasReserved" class="text-center font-bold">Butacas Reservadas: 0</p>
                </div>
                <div class="flex items-center justify-center gap-2">
                    <i class="fas fa-couch text-2xl text-blue-600"></i>
                    <p id="butacasSelected" class="text-center font-bold">Butacas Seleccionadas: 0 </p>
                </div>
            </article>
        </section>
    </main>
</body>


<script>


    let butacasReservadas = []

    <?php

    $evento = $_GET["evento"];


    ?>

    function refresh() {
        window.location.reload();
    }

    function pintaButacas(aforo) {
        console.log("Aforo en pintabutacas", aforo);

        for (let i = 1; i <= aforo; i++) {
            $(".butaca-table").append(`<div id="${i}" class="flex flex-col text-green-800 items-center justify-center"><i class="fas fa-couch text-2xl hover:text-slate-900"></i>
        <p>Butaca ${i}</p></div>`);
        }
        pintarReservadas();
        selectButaca();
    }

    function selectButaca() {
        $(".butaca-table div").on("click", function () {


            //console.log($(this).attr("id"));


            let IdButacadaSelected = $(this).attr("id");



            if ($.inArray(IdButacadaSelected, butacasReservadas) != -1) {
                $(this).removeClass("text-blue-600").addClass("text-green-800");
                butacasReservadas.splice(butacasReservadas.indexOf(IdButacadaSelected), 1);
            } else {
                $(this).removeClass("text-green-800").addClass("text-blue-600");
                butacasReservadas.push(IdButacadaSelected);
            }




            console.log(butacasReservadas);

            let butacasSeleccionadasCantidad = butacasReservadas.length

            console.log("Cantidad de butacas seleccionadas", butacasSeleccionadasCantidad);



            $("#butacasSelected").text("Butacas seleccionadas: " + butacasSeleccionadasCantidad);


        });
    }



    $("#reservationButton").on("click", function () {
        let butacasReservadasJSONEADAS = JSON.stringify(butacasReservadas);
        if (butacasReservadas.length == 0) {
            alert("No has seleccionado ninguna butaca");
            return;
        }
        if (confirm("¿Deseas realizar la reserva?")) {
            window.location.href = "confirmarReservaPage.php?evento=<?php echo $evento ?>&butacas=" + butacasReservadasJSONEADAS;
        } else {
            // Si el usuario selecciona "Cancelar", no hacemos nada y permanecemos en la misma página.
        }
    });

    function pintarReservadas() {
        $.post("obtenerReservas.php?evento=<?php echo $evento ?>", {}, function (butacas) {

            let butacasDB = JSON.parse(butacas)
            console.log("ButacasDB", butacasDB);
            console.log(butacasReservadas);

            let butacasDBCantidad = butacasDB.length;

            console.log("Cantidad de butacas no disponibles", butacasDBCantidad);

            $("#butacasReserved").text("Butacas reservadas: " + butacasDBCantidad);

            $("#butacasAvailable").text("Butacas disponibles: " + (25 - butacasDBCantidad));


            for (let i = 0; i < butacasDB.length; i++) {
                $(`#${butacasDB[i]}`).addClass("text-red-600");
                $(`#${butacasDB[i]}`).css("pointer-events", "none"); // Deshabilito los eventos de raton y no me deja clickarlo
            }

        });

    }

    $.post("getEventBackgroundImage.php?evento=<?php echo $evento ?>", {}, function (data) {
        let datos = JSON.parse(data);
        let ruta = `./eventos/${datos[1]}/${datos[0]}`;
        $(".background-overlay").css("background-image", `url("${ruta}")`);


    })

    $.post("getEventAforo.php?evento='<?php echo $evento ?>'", {}, function (data) {

        console.log("Aforo", JSON.parse(data));

        aforoDB = JSON.parse(data);

        pintaButacas(aforoDB);
    });



</script>

</html>