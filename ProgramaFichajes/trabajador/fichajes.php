<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichajes</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../funciones.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="">
    <header class="w-full h-10 bg-blue-500 flex justify-center items-center">
        <nav>
            <ul class="flex gap-5">
                <li id="entrada" class="font-bold text-gray-900  cursor-pointer">Fichaje entrada
                </li>
                <li id="salida" class="font-bold text-white hover:text-gray-200 cursor-pointer">Fichaje salida</li>
                <li id="salida" class="font-bold text-white hover:text-gray-200 cursor-pointer"><a
                        href="incidencias.php">Ver incidencias</a></li>
            </ul>
        </nav>
    </header>
    <main class="w-full h-full flex">
        <section class="w-full h-screen bg-gray-200 overflow-hidden">
            <div id="fichajeEntrada" class="w-full h-full flex flex-col justify-center items-center">
                <p class="text-xl font-bold text-gray-700 mb-5">Fichaje Entrada</p>
                <form class="max-w-md mx-auto">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="dni" id="dni"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="dni"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DNI</label>
                    </div>


                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

            </div>
            <div id="fichajeSalida" class="w-full h-full hidden flex-col justify-center items-center">
                <p class="text-xl font-bold text-gray-700 mb-5">Fichaje Salida</p>
                <form class="max-w-md mx-auto" action="./fichajeSalida.php" method="POST">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="dni" id="floating_email"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="floating_email"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DNI</label>
                    </div>


                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

            </div>
            <div id="tarde" class="w-full h-full hidden flex-col justify-center items-center gap-5">
                <i class="fa-solid fa-circle-exclamation text-3xl"></i>
                <p class="text-xl font-bold text-gray-700">Whooooooooppsss haz llegado tarde así que se te ha abierto
                    una incidencia</p>
                <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="./incidencias.php">Haz
                    click aquí para gestionar la
                    incidencia</a>
                <div class=" flex flex-col justify-center items-center gap-2">
                    <h1 class="text-xl font-bold text-gray-700">Datos del empleado</h1>
                    <p class="text-medium font-medium text-gray-700" id="nombreTrabajador"></p>
                    <p class="text-medium font-medium text-gray-700" id="dni"></p>
                    <p class="text-medium font-medium text-gray-700" id="horaFichaje"></p>
                </div>


            </div>
            <div id="temprano" class=" hidden flex-col justify-center items-center">
                <p class="text-xl font-medium text-gray-700">Fichaje de entrada realizado con exito</p>
                <p class="text-medium font-medium text-gray-700" id="nombreTrabajador"></p>
                <p class="text-medium font-medium text-gray-700" id="dni"></p>
                <p class="text-medium font-medium text-gray-700" id="horaFichaje"></p>
            </div>
        </section>
    </main>
    <script>
        $("#salida").on("click", function () {
            $("#fichajeEntrada").css("display", "none");
            $("#fichajeSalida").css("display", "flex");
            $("#salida").removeClass("text-white").addClass("text-gray-900").removeClass("hover:text-gray-200");
            $("#entrada").removeClass("text-gray-900").addClass("text-white").addClass("hover:text-gray-200");
        })

        $("#entrada").on("click", function () {
            $("#fichajeEntrada").css("display", "flex");
            $("#fichajeSalida").css("display", "none");
            $("#entrada").removeClass("text-white").addClass("text-gray-900").removeClass("hover:text-gray-200");
            $("#salida").removeClass("text-gray-900").addClass("text-white").addClass("hover:text-gray-200");
        })

        //let dni = $("#dni").val();

        //console.log(dni);

        $("form").on("submit", function (e) {
            e.preventDefault();
            let dni = $("#dni").val();

            $.post("./fichajeEntrada.php", { dni: dni }, function (data) {
                console.log(data);
                let datosEmpleado = JSON.parse(data);

                console.log(datosEmpleado.nombre + " " + datosEmpleado.apellido);

                if (datosEmpleado.tarde == true) {
                    $("#tarde").css("display", "flex");
                    $("#fichajeEntrada").css("display", "none");
                    $("#nombreTrabajador").html(datosEmpleado.nombre + " " + datosEmpleado.apellido);
                    $("#dni").html(datosEmpleado.dni);
                    $("#horaFichaje").html("Hora fichaje" + " " + datosEmpleado.horaFichaje);

                } else {
                    $("#temprano").css("display", "flex");
                    $("#nombreTrabajador").html(datosEmpleado.nombre + " " + datosEmpleado.apellido);
                    $("#dni").html(datosEmpleado.dni);
                    $("#horaFichaje").html(datosEmpleado.horaFichaje);
                }

            });
        })


    </script>
</body>

</html>