<?php

session_start();



if(isset($_SESSION["usuario"])){

    $id = $_SESSION["usuario"];
    //
    include("conexion.php");

    $searchLoggedUserInfo = "SELECT * FROM usuarios WHERE user_id = $id ";

    $ejecutar = $conexion->query($searchLoggedUserInfo);

    
      foreach ($ejecutar as $userLoggedInfo) {
        $name = $userLoggedInfo["user_name"];
        $lastname = $userLoggedInfo["user_lastname"];
        $regdate = $userLoggedInfo["user_registerdate"];
        $email = $userLoggedInfo["user_email"];
        $location = $userLoggedInfo["user_location"];
        $birthdate = $userLoggedInfo["user_birthdate"];
      };

      // $trozos = explode("-",$regdate)
      // $dia = $trozos[2];
      // $mes = $trozos[1];
      // $ano = $trozos[0];
      // $fecharegistrobien = $dia/$mes/$ano

      // Fecha en español
    setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain.1252');

    // Convertimos a una manera mas legible "10 de junio de 2024"
    $date = new DateTime($regdate);
    $formattedRegDate = strftime('%d de %B de %Y', $date->getTimestamp());

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-600">
    <header>
      <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
          <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
              <!-- Mobile menu button-->
              <button
                id="menu-button"
                type="button"
                class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                aria-controls="mobile-menu"
                aria-expanded="false"
              >
                <span class="absolute -inset-0.5"></span>
                <span class="sr-only">Open main menu</span>
                <svg
                  class="block h-6 w-6"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  aria-hidden="true"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                  />
                </svg>
                <svg
                  class="hidden h-6 w-6"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  aria-hidden="true"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 18L18 6M6 6l12 12"
                  />
                </svg>
              </button>
            </div>
            <div
              class="flex flex-1 items-center justify-center sm:items-stretch"
            >
              <div class="flex flex-shrink-0 items-center">
                <img
                  class="h-8 w-auto"
                  src="https://i.pinimg.com/originals/93/d8/3f/93d83fd82b108656864a97259a29d8f9.jpg"
                  alt="Your Company"
                />
              </div>
              <div class="hidden sm:ml-6 sm:block">
                <div class="flex space-x-4">
                  <a
                    href="index.php"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                    >Inicio</a
                  >
                  <a
                    href="productos.php"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                    >Productos</a
                  >
                  <?php
                  
                 
                 

                  if (isset($_SESSION["usuario"])) {

                    include("conexion.php");

                    $id = $_SESSION["usuario"];

                    $searchLoggedUserInfo = "SELECT * FROM usuarios WHERE user_id = $id ";

                    $ejecutar = $conexion->query($searchLoggedUserInfo);

                    
                      foreach ($ejecutar as $userLoggedInfo) {
                        $name = $userLoggedInfo["user_name"];
                        $lastname = $userLoggedInfo["user_lastname"];
                      };
                    
                    ?>
                        <a
                    href="perfil.php"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                    ><?php
                    $nom = $name." ".$lastname;
                    echo
                    strtoupper($nom)
                    ?></a>
                    <a
                    href="salir.php"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                    >Salir</a>
                    <?php
                  }
                   else {
                    ?>
                    <a
                    href="login.php"
                     " "
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                    >Inicia sesión mi pana</a>
                    <?php
                  }
                  
                  
                  
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="sm:hidden hidden" id="mobile-menu">
          <div class="space-y-1 px-2 pb-3 pt-2">
            <a
              href="/"
               " "
              class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"
              >Inicio</a
            >
            <a
              href="productos.php"
               " "
              class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
              >Productos</a
            >
            <a
              href="registro.html"
               " "
              class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
              >Registro</a
            >
            <a
              href="login.php"
               " "
              class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
              >Login</a
            >
            <a
              href="login.php"
               " "
              class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
              >Login</a
            >
          </div>
        </div>
      </nav>
    </header>

    <section class="h-full w-full flex items-center justify-center ">
          <article class="w-96 h-auto bg-gray-200 rounded-xl flex flex-col items-center justify-center mt-10 p-5">
                  <h1><?php   echo strtoupper("$name $lastname")   ?></h1>
                  <p>Registrado desde <?php   echo"$formattedRegDate"  ?> </p>



            <form class="" method="POST" action="actualizar.php">
              <label for="name">Nombre</label>
            <input type="text" name="name" id="name" placeholder="Nombre" value="<?php  echo $name;  ?>" class="appearance-none block w-full bg-gray-500 text-gray-200 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-800">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Email" value="<?php  echo $email;  ?>" class="appearance-none block w-full bg-gray-500 text-gray-200 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-800">
            <label for="location">Localidad</label>
            <input type="text" name="location" id="location" placeholder="Localidad" value="<?php  echo $location;?>" class="appearance-none block w-full bg-gray-500 text-gray-200 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-800">
            <label for="birthdate">Nacimiento</label>
            <input type="date" name="birthdate" id="birthdate" placeholder="YYYY-MM-DD" value="<?php  echo $birthdate;?>" class="appearance-none block w-full bg-gray-500 text-gray-200 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-800">
            <div class="flex gap-5 items-center justify-center">
            <input type="submit" value="Actualizar" class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded">
            </div>
            </form>
        </article>
            
        </section>
        
    </body>
    </html>
<?php

}else{

header("location:index.php");

};


?>



