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
  <body class="bg-gray-100">
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
                  href="../index.php"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                  >Inicio</a
                >
                <a
                  href="../productos.php"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                  >Productos</a
                >
                <?php
                
                session_start();

                if (isset($_SESSION["usuario"])) {
                  
                  ?>
                <a
                  href="../perfil.php"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                  >Perfil</a
                >
                <a
                  href="./carrito.php"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                  >Carrito</a
                >
                <a
                  href="../salir.php"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                  >Salir</a
                >
                <?php
                
                } elseif (isset($_SESSION["usuario-admin"])) {
                  ?>
                  <a
                  href="../salir.php"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                  >Salir</a
                >
                  <a
                  href="../productos.php"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                  >Perfil admin</a
                ><?php
                } else {
                  ?>
                <a
                  href="../login.php"
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
  <!-- component -->
<!-- Create By Joker Banny -->
<style>
    @layer utilities {
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  }
</style>

<body>
  <div class=" pt-20">
    <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
    <div class=" flex flex-col items-center">
      <?php

      include("../conexion.php");
      
      if (isset($_SESSION["carrito"])) {
        $idCar = $_SESSION["carrito"];
    
        $selectCarDetailsByCardId = "SELECT * FROM detallecarrito WHERE car_id = $idCar GROUP BY product_id ";

        
        $ejecutar=$conexion->query($selectCarDetailsByCardId);


    
        if ($ejecutar->num_rows>0) {
            foreach ($ejecutar as $product) {
                $productId = $product["product_id"];
                
                
                $selectProductsInfoById = "SELECT * FROM productos WHERE product_id = $productId";
    
                $ejecutar= $conexion->query($selectProductsInfoById);
        
                foreach ($ejecutar as $product) {
                    $productId = $product["product_id"];
                    $productName = $product["product_name"];
                    $productDesc = $product["product_description"];
                    $ProductPrice = $product["product_price"];
                    $getProductsImages = "SELECT * FROM images WHERE product_id = $productId";
            $ejecutar1 = $conexion->query($getProductsImages);
            foreach ($ejecutar1 as $img) {
                $productImg = $img["image_name"];
                }
                
                $countProductsInCart = "SELECT * FROM detallecarrito WHERE product_id = $productId";

                $result = $conexion->query($countProductsInCart);

      

                $prodTotal = $result->num_rows;

                

                
                
                
                
                ?>


              
                
                <div class="rounded-lg md:w-2/3">
        <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
          <img src="../imagenes/product<?php echo $productId?>/<?php echo $productImg; ?>" alt="product-image" class="w-full rounded-lg sm:w-40" />
          <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
            <div class="mt-5 sm:mt-0">
              <h2 class="text-lg font-bold text-gray-900"><?php echo $productName?></h2>
              <p class="mt-1 text-xs text-gray-700"><?php echo $productDesc ?></p>
            </div>
            <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
              <div class="flex items-center border-gray-100">
                <span onclick="window.location.href='./desgrabarcarrito2.php?productId=<?php echo $productId   ?>'" class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"> - </span>
                <input class="h-8 w-8 border bg-white text-center text-xs outline-none" type="number" value="<?php echo $prodTotal  ?>" min="1" disabled />
                <span onclick="window.location.href='./grabarcarrito2.php?productId=<?php echo $productId   ?>'" class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50"> + </span>
              </div>
              <div class="flex items-center space-x-4">
                <p class="text-sm"><?php    echo $ProductPrice    ?>€</p>
               <a class="w-auto h-auto" href="desgrabarcarrito.php?productId=<?php echo $productId?>"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg></a>
              </div>
            </div>
          </div>

          
        </div>
        

        
        
      </div>
      


               <?php
    
    
            }
    
    
    }}else{
      echo"No tienes productos en favoritos";
    }
    
    } else {
      echo"No tienes productos en favoritos";
    }
    
      
      
      
      
      
      
      
      ?>
      <!-- Sub total -->
      
    </div>
    <div class="w-full flex items-center justify-center">
      <a href="./checkoutpage.php">
              <button type="button" class=" px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-md">Finalizar compra</button>
              </a>
    </div>
    
  </div>
</body>
</body>
</html>