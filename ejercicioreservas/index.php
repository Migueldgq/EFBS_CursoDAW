<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Events</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="bg-gray-300">
  <header>
    <nav class="bg-gray-800">
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
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              <svg class="hidden h-6 w-6" id="icon-close" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <div class="flex flex-1 items-center justify-center sm:items-stretch">
            <div class="flex flex-shrink-0 items-center">
              <img class="h-8 w-auto" src="https://i.pinimg.com/originals/93/d8/3f/93d83fd82b108656864a97259a29d8f9.jpg"
                alt="Your Company" />
            </div>
            <div class="hidden sm:ml-6 sm:block">
              <div class="flex space-x-4">
                <a href="index.php"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Eventos</a>
                <a href="altapersonal.php"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Ver
                  eventos</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="sm:hidden hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
          <a href="index.php" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium">Crear
            Evento</a>
          <a href="productos.php"
            class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Eventos</a>
        </div>
      </div>
    </nav>
  </header>
  <div class="m-16">


    <div
      class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 auto-cols-max justify-items-center gap-10  w-full pt-[15px]">



      <?php

      include ("conexion.php");

      $selectAllEvents = "SELECT * FROM eventos";
      $result = $conexion->query($selectAllEvents);
      foreach ($result as $event) {
        $name = $event["event_name"];
        $desc = $event["event_desc"];
        $image = $event["event_image"];
        $autor = $event["event_author"];
        $date = $event["event_date"];

        $ruta = "./eventos/$name/$image";


        ?>

        <div class='flex items-center justify-center'>
          <div class=' mx-auto bg-white rounded-3xl shadow-xl'>
            <div class="grid rounded-3xl max-w-[370px] shadow-sm bg-slate-100  flex-col">
              <img src="<?php echo $ruta ?>" width="375" height="200"
                class="rounded-t-3xl justify-center grid h-80 object-cover" alt="movie.title" />

              <div class="group p-6 grid z-10">
                <a href=# class="group-hover:text-cyan-700 font-bold sm:text-2xl line-clamp-2">
                  <?php echo $name ?>
                </a>
                <span class="text-slate-400 pt-2 font-semibold">

                  <?php echo $date ?>
                </span>
                <div class="h-28">
                  <span class="line-clamp-4 py-2 text-sm font-light leading-relaxed">
                    <?php echo $desc ?>
                  </span>
                </div>

              </div>
            </div>
          </div>


        </div>
        <?php
      }



      ?>
    </div>
    <script>


      document.addEventListener("DOMContentLoaded", () => {
        const menuButton = document.getElementById("menu-button");
        const mobileMenu = document.getElementById("mobile-menu");
        const iconMenu = document.getElementById("icon-menu");
        const iconClose = document.getElementById("icon-close");

        menuButton.addEventListener("click", () => {
          const isExpanded =
            menuButton.getAttribute("aria-expanded") === "true";
          menuButton.setAttribute("aria-expanded", !isExpanded);
          mobileMenu.classList.toggle("hidden");
          iconMenu.classList.toggle("hidden");
          iconClose.classList.toggle("hidden");
        });
      });
    </script>
</body>

</html>