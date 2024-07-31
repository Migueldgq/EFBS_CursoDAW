<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incidencias</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../funciones.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header class="w-full h-10 bg-blue-500 flex justify-center items-center">
        <nav>
            <ul class="flex gap-5">
                <li id="entrada" class="font-bold text-white cursor-pointer">Gestionar Incidencias</li>
                <li class="font-bold text-white cursor-pointer"><a href="fichajes.php">Volver a fichajes</a></li>
            </ul>
        </nav>
    </header>
    <main class="w-full h-full flex">
        <section class="w-full h-screen bg-gray-200">
            <div id="buscadorIncidencias" class="w-full h-full flex flex-col justify-center items-center">
                <p class="text-xl font-bold text-gray-700 mb-5">Introduce tu DNI para buscar tus incidencias</p>
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
                <table class="w-[90%] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-5">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">ID incidencia</th>
                            <th scope="col" class="px-6 py-3">Nombre y Apellidos</th>
                            <th scope="col" class="px-6 py-3">Fecha de incidencia</th>
                            <th scope="col" class="px-6 py-3">Motivo</th>
                            <th scope="col" class="px-6 py-3">Justificada</th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tablaIncidencias">

                    </tbody>
                </table>

            </div>

        </section>
    </main>
    <script>
        $("form").on("submit", function (e) {
            e.preventDefault();

            let dni = $("#dni").val();



            $("#tablaIncidencias").empty();


            $.post("./consultas/getUserIncidences.php", { dni: dni }, function (data) {
                if (data == 0) {
                    $("#buscadorIncidencias").append("<p id='error' class='text-large font-bold text-gray-700 mb-2 mt-2'>El DNI que has introducido es incorrecto</p>");
                } else {
                    $("#error").remove();
                    $("#tablaIncidencias").append(data);
                }
            });
        });
    </script>
</body>

</html>