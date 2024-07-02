<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Seleccionar materias
                    </h1>

                    <form action="puente.php" method="POST">

                        <select name="materia" id="" class="w-full">
                            <?php

                            include ('conexion.php');

                            $searchMaterias = "SELECT * FROM plantillas ORDER BY materia_pla ASC";

                            $ejecutar = $conexion->query($searchMaterias);

                            if ($ejecutar->num_rows > 0) {
                                foreach ($ejecutar as $materia) {
                                    $id = $materia["id_pla"];
                                    $materia = $materia["materia_pla"];

                                    echo "<option value='$id%$materia'>$materia</option>";
                                }
                            }


                            ?></select>
                        <input type="submit" value="Seleccionar"
                            class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-blue-700 dark:focus:ring-primary-800 mt-10">
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>