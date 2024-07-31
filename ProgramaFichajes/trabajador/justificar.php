<!DOCTYPE html>
<html lang="en">

<?php

$IdIncidencia = $_GET['idIncidencia'];
$justificada = $_GET['justificada'];

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Justificar Incidencias</title>
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
                <li id="entrada" class="font-bold text-white  cursor-pointer">Justificar Incidencia
                </li>

            </ul>
        </nav>
    </header>
    <main>
        <section class="w-full h-screen bg-gray-200 overflow-hidden">
            <div id="justificarIncidencia" class="w-full h-full hidden flex-col justify-center items-center">
                <p class="text-xl font-bold text-gray-700 mb-5">Justifique su incidencia</p>
                <form class="max-w-md mx-auto">
                    <div class="relative z-0 w-full mb-5 group">
                        <select name="motivo" id="">
                            <option value="" disabled selected>Seleccione un motivo</option>
                            <option value="Atasco">Atasco</option>
                            <option value="Personal">Personal</option>
                            <option value="Médico">Médico</option>
                        </select>
                    </div>


                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Justificar</button>
                </form>

            </div>
        </section>
    </main>
    <script>


        let justificada = "<?php echo $justificada; ?>";
        let idIncidencia = "<?php echo $IdIncidencia; ?>";

        console.log("justificada:", justificada);
        console.log("idIncidencia:", idIncidencia);

        if (justificada == "Si") {
            alert("Ya has justificado esta incidencia");
            window.history.back();
        } else {
            $("#justificarIncidencia").css("display", "flex");
        }

        $("form").on("submit", function (event) {
            event.preventDefault();
            let motivo = $('select[name="motivo"]').val();
            console.log(motivo);


            $.post("./justificarIncidencia.php", {
                idIncidencia: idIncidencia, motivo: motivo
            }, function (data) {
                if (data == 1) {
                    alert("Incidencia justificada correctamente");
                    window.history.back();
                }
            })
        })






    </script>

</body>

</html>