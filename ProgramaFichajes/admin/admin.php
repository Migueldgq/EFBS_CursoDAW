<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../funciones.js"></script>
</head>

<body class="overflow-hidden">
    <header class="w-full h-10 bg-blue-500 flex justify-center items-center">
        <nav>
            <ul class="flex gap-5">
                <li id="trabajadores" class="font-bold text-white hover:text-gray-200 cursor-pointer">Trabajadores</li>
                <li class="font-bold text-white hover:text-gray-200 cursor-pointer">Incidencias</li>
                <li id="horarios" class="font-bold text-white hover:text-gray-200 cursor-pointer" onclick="">Horarios
                </li>
            </ul>
        </nav>
    </header>
    <main class="w-full h-full flex">
        <aside class="w-1/5 h-screen bg-gray-200 overflow-hidden">
            <section id="asideTrabajadores">
                <ul class="flex flex-col gap-5 p-5">
                    <li class="font-bold text-blue-500 hover:text-blue-800 cursor-pointer">
                        Trabajadores
                    </li>
                    <li class="font-bold text-blue-500 hover:text-blue-800 cursor-pointer">
                        Añadir nuevo trabajador
                    </li>
                </ul>
            </section>
            <section id="asideHorarios" class="hidden">
                <ul class="flex flex-col gap-5 p-5">
                    <li class="font-bold text-blue-500 hover:text-blue-800 cursor-pointer">
                        Horarios
                    </li>
                    <li id="gestionarHorarios" class="font-bold text-blue-500 hover:text-blue-800 cursor-pointer">
                        Gestionar Horarios
                    </li>
                </ul>
            </section>
            <section id="asideIncidencias" class="hidden">
                <ul class="flex flex-col gap-5 p-5">
                    <li class="font-bold text-blue-500 hover:text-blue-800 cursor-pointer">
                        Incidencias
                    </li>
                    <li class="font-bold text-blue-500 hover:text-blue-800 cursor-pointer">
                        Gestionar Incidencias
                    </li>
                </ul>
            </section>
        </aside>
        <section class="w-4/5 h-screen bg-gray-100">
            <div id="altaTrabajadores" class="w-full h-full flex flex-col justify-center items-center">
                <p class="text-xl font-bold text-gray-700 mb-5">Dar alta trabajador</p>
                <form class="max-w-md mx-auto" action="./altas/altaTrabajadores.php" method="POST">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="dni" id="floating_email"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="floating_email"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DNI</label>
                    </div>

                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="nombre" id="floating_first_name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_first_name"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First
                                name</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="apellido" id="floating_last_name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_last_name"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last
                                name</label>
                        </div>
                    </div>

                    <div class="relative z-0 w-full mb-5 group">
                        <select name="horario" id="horarioSelect">
                            <option disabled selected>Seleccione Horario</option>
                        </select>
                    </div>

                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>

            </div>
            <div id="altaHorarios" class="w-full h-full hidden flex-col justify-center items-center">
                <p class="text-xl font-bold text-gray-700">Alta horarios</p>
                <form class="min-w-md mx-auto" action="./altas/altaHorario.php" method="POST">

                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full m-5 group">
                            <input type="time" name="entrada" id="floating_first_name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_first_name"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Entrada</label>
                        </div>
                        <div class="relative z-0 w-full m-5 group">
                            <input type="time" name="salida" id="floating_last_name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_last_name"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Salida</label>
                        </div>
                    </div>



                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
            <div id="gestionHorarios" class="w-full h-full hidden flex-col justify-center items-center">

            </div>
        </section>
    </main>

    <script>
        $.post('./consultas/getHorarios.php', function (data) {
            $("#gestionHorarios").html(data);
            $("#horarioSelect").append(data);
        })
        $("#gestionarHorarios").on("click", function () {
            $("#altaTrabajadores").css("display", "none");
            $("#asideTrabajadores").css("display", "none");
            $("#asideHorarios").css("display", "flex");
            $("#altaHorarios").css("display", "none");
            $("#gestionHorarios").css("display", "flex");
        });
        $("#horarios").on("click", function () {
            $("#altaTrabajadores").css("display", "none");
            $("#asideTrabajadores").css("display", "none");
            $("#asideHorarios").css("display", "flex");
            $("#altaHorarios").css("display", "flex");
        });

        $("#trabajadores").on("click", function () {
            $("#altaTrabajadores").css("display", "flex");
            $("#asideTrabajadores").css("display", "flex");
            $("#asideHorarios").css("display", "none");
            $("#altaHorarios").css("display", "none");
        });
    </script>
</body>

</html>