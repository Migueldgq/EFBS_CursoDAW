<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Palabras</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 m-4">
  <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="addWord.php?palabra=Sol">Sol</a>
  <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="addWord.php?palabra=Nube">Nube</a>
  <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="addWord.php?palabra=Smint">Smint</a>
  <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
    href="addWord.php?palabra=Churrasco">Churrasco</a>
  <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="addWord.php?palabra=Café">Café</a>
  <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="addWord.php?palabra=Té">Té</a>
  <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="addWord.php?palabra=Sueño">Sueño</a>
  <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="addWord.php?palabra=Para">Para...</a>
  <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="addWord.php?palabra=Inda">Inda</a>
  <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="addWord.php?palabra=Lluvia">Lluvia</a>
  <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="addWord.php?palabra=Cantar">Cantar</a>
  <hr />
  <h1> PALABRITAS AÑADIDITAS </h1>
  <ul>
    <?php

    $conexion = new mysqli("localhost", "root", "", "mibd");

    $searchWords = "SELECT * FROM palabras";

    $result = $conexion->query($searchWords);

    foreach ($result as $palabras) {

      $palabras = $palabras["pal_pal"];
      ?>

      <div class="flex items-center space-x-4 p-4">
        <li><?php echo $palabras ?></li>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" onclick="window.location.href='./deleteWord.php?palabra=<?php
        echo $palabras
          ?>'">Eliminar</button>
      </div>



      <?php


    }

    ?>
  </ul>
  <h2>
    Busca ploductos
  </h2>

  <form class="max-w-md mx-auto" action="index.php" method="POST">
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
          fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
        </svg>
      </div>
      <input type="search" id="default-search"
        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Buscadol de palabras" required name="palabra" />
      <button type="submit"
        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
  </form>
  <button onclick="window.location.href='./index.php'" type="submit"
    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Limpiar</button>

  <?php


  if (isset($_POST["palabra"])) {
    $palabra = $_POST["palabra"];

    $conexion = new mysqli("localhost", "root", "", "mibd");

    $sql = "SELECT * FROM palabras WHERE pal_pal LIKE '%$palabra%' ";


    $result = $conexion->query($sql);


    if ($result->num_rows > 0) {

      foreach ($result as $words) {

        $words = $words["pal_pal"];

        echo "<li style='list-style: none'>$words</li>";

      }
    } else {
      echo "No se encontraron resultados";
    }

  }


  ?>

</body>

</html>