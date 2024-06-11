<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tabla profesores</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <center>
      <h1 class="font-bold m-5">Tabla profesores</h1>
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">Numero profesor</th>
            <th scope="col" class="px-6 py-3">Nombre profesor</th>
            <th scope="col" class="px-6 py-3">email profesor</th>
            </tr>
            </thead>
            <tbody>
              <?php
    
    //crear conexion DB
    
    $conexion = new mysqli ("localhost","root","","probando");
    
    //tengo que realizar la sentencia SQL para consultar
    
    $sql = ("SELECT * FROM profesorado");
    
    // ejecutar query
    
    $profesores = $conexion->query($sql); foreach ($profesores as $profesor) 
    { $id =
      $profesor["cod_profe"]; $nombre = $profesor["nombre_profe"]; $email=
      $profesor["email_profe"]; 
      echo"
      
      <tr class='odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700'>
      <td class='px-6 py-4'>$id</td>
      <td class='px-6 py-4'>$nombre</td>
      <td class='px-6 py-4'>$email</td>
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
        