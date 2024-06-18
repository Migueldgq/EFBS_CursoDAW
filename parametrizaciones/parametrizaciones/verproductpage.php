<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
     function confirmDelete(event, productId) {
        if (!window.confirm('¿Estás seguro de eliminar el producto?')) {
          event.preventDefault();
        }
      }
    </script>
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

                if (isset($_SESSION["usuario"])) {
                  
                  ?>
                <a
                  href="productos.php"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                  >Perfil</a
                >
                <a
                  href="./admin/carrito.php"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                  >Carrito</a
                >
                <a
                  href="salir.php"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                  >Salir</a
                >
                <?php
                
                } elseif (isset($_SESSION["usuario-admin"])) {
                  ?>
                  <a
                  href="salir.php"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                  >Salir</a
                >
                  <a
                  href="productos.php"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                  >Perfil admin</a
                ><?php
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
                <a
                  href="./admin/carrito.php"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                  >Carrito</a
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
  
  <?php
  
  include("./conexion.php");
  
  $productId = $_GET["productId"];

  $getInfoProductById = "SELECT * FROM productos WHERE product_id = $productId";

  $result=$conexion->query($getInfoProductById);

  foreach ($result as $product) {
    $productId = $product["product_id"];
    $productName = $product["product_name"];
    $productDescription = $product["product_description"];
    $productPrice = $product["product_price"];
    $getProductsImages = "SELECT * FROM images WHERE product_id = $productId";
            $ejecutar1 = $conexion->query($getProductsImages);
            foreach ($ejecutar1 as $img) {
                $productImg = $img["image_name"];
  }

  ?>

  <div class="font-sans bg-white ">
  <div class="p-4 lg:max-w-5xl max-w-lg mx-auto">
      <div class="h-screen content-center grid items-start grid-cols-1 lg:grid-cols-2 gap-6 max-lg:gap-12">

          <div class="w-full h-full flex items-center justify-center lg:sticky top-0 sm:flex gap-2">
             
              <img src="./imagenes/product<?php
                                          echo $productId?>/<?php echo $productImg; ?>" alt="Product" class="w-4/5 rounded-md object-cover" />
          </div>

          <div>
              <h2 class="text-2xl font-bold text-gray-800"><?php echo $productName ?></h2>
              <div class="flex flex-wrap gap-4 mt-4">
                  <p class="text-gray-800 text-xl font-bold"><?php echo $productPrice   ?>€</p>

              </div>

              <div class="flex space-x-2 mt-4">
                  <svg class="w-5 fill-blue-600" viewBox="0 0 14 13" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                          d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                  </svg>
                  <svg class="w-5 fill-blue-600" viewBox="0 0 14 13" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                          d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                  </svg>
                  <svg class="w-5 fill-blue-600" viewBox="0 0 14 13" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                          d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                  </svg>
                  <svg class="w-5 fill-blue-600" viewBox="0 0 14 13" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                          d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                  </svg>
                  <svg class="w-5 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                          d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                  </svg>
              </div>

          

              <a href="./admin/grabarcarrito.php?productId=<?php echo $productId?>">
              <button type="button" class="w-full mt-8 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-md">Add to cart</button>
              </a>

              <div class="mt-8">
                  <h3 class="text-xl font-bold text-gray-800">About the item</h3>
                  <ul class="space-y-3 list-disc mt-4 pl-4 text-sm text-gray-800">
                      <li><?php echo $productDescription  ?></li>
                  </ul>
              </div>

             
          </div>
      </div>
  </div>
</div>

<?php

}



  




  
  
  
  
  
  
  
  
  
  
  ?>
    
  </body>
  </html>