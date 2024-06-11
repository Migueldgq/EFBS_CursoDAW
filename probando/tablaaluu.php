<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tabla alumnos</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <center>
      <h1  class="font-bold m-5">Tabla alumnos</h1>
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">Numero alumno</th>
            <th scope="col" class="px-6 py-3">Nombre alumno</th>
            <th scope="col" class="px-6 py-3">Apellido alumno</th>
          </tr>
        </thead>
        <tbody>
          <?php
    
    //crear conexion DB
    
    $conexion = new mysqli ("localhost","root","","probando");
    
    //tengo que realizar la sentencia SQL para consultar
    
    $sql = ("SELECT * FROM alumnado");
    
    // ejecutar query
    
    $alumnos = $conexion->query($sql); foreach ($alumnos as $alumno) 
    { $id =
          $alumno["cod_alu"]; $nombre = $alumno["nombre_alu"]; $apellido =
          $alumno["apellido_alu"]; 
          echo"

          <tr class='odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700'>
            <td class='px-6 py-4'>$id</td>
            <td class='px-6 py-4'>$nombre</td>
            <td class='px-6 py-4'>$apellido</td>
          </tr>";}
          

          ?>
        </tbody>
      </table>
      <div class="mt-10">
      <a href="./index.html" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Volver</a>
      </div>
    </center>
  </body>
</html>
