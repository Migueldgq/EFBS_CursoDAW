<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tienda - Login</title>
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
                
                session_start();

                if (isset($_SESSION["usuario-admin"])) {
                  
                  ?>
                <a
                  href="productos.php"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                  >Perfil admin</a
                >
                <a
                  href="salir.php"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                  >Salir</a
                >
                <?php
                } else {
                  ?>
                <a
                  href="login.php"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                  >Inicia sesión mi pana</a
                >

                <a
                  href="./admin/logadminpage.php"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                  >Inicia sesión mi admin pana</a
                >
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
            href=
            class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"
            >Inicio</a
          >
          <a
            href="productos.p
            class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
            >Productos</a
          >
          <a
            href="registro.ht
            class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
            >Registro</a
          >
          <a
            href="login.p
            class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
            >Login</a
          >
          <a
            href="login.p
            class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
            >Login</a
          >
        </div>
      </div>
    </nav>
  </header>
    <section class="w-full flex items-center justify-center py-10 px-10">
      <form
        class="w-full max-w-lg bg-gray-100 p-5 rounded-md"
        action="hacerlogin.php"
        method="POST"
      >
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
              for="grid-email"
            >
              Email
            </label>
            <input
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-email"
              type="email"
              placeholder="aqui@tucorreoelectronico.es"
              required
              name="email"
            />
          </div>
          <div class="w-full px-3">
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
              for="grid-password"
            >
              Contraseña
            </label>
            <input
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="grid-password"
              type="password"
              placeholder="******************"
              required
              name="contraseña"
            />
          </div>
        </div>

        <div class="flex gap-5 items-center justify-center">
          <button
            class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded"
          >
            Iniciar sesión
          </button>
          <article>
            <a
              href="registro.html"
              class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
            >
              Si no tienes cuenta, regístrate
            </a>
          </article>
        </div>
      </form>
    </section>
  </body>
</html>
