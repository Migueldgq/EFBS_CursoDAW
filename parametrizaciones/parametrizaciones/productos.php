<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                
                session_start();

                if (isset($_SESSION["usuario"])) {
                  
                  ?>
                <a
                  href="productos.php"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                  >Perfil</a
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
if (isset($_SESSION["usuario-admin"])) {
    ?>
    <section class="w-full flex items-center justify-center py-10 px-10">
        <form class="w-full max-w-lg bg-gray-100 p-5 rounded-md" action="./admin/altaproducto.php" method="POST" enctype="multipart/form-data">
            <h1 class="block uppercase tracking-wide text-gray-700 font-bold mb-2">Subir producto</h1>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">Nombre producto</label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-email" type="text" placeholder="Por ejemplo: Movil usado" required name="nombre"/>
                </div>
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">Descripcion</label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Por ejemplo: Poco uso" required name="descripcion"/>
                </div>
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid">Precio</label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid" type="text" required name="precio" placeholder="Introduce el precio aqui"/>
                </div>
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid">Imagen</label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid" type="file" required name="foto" placeholder="Introduce el precio aqui"/>
                </div>
            </div>
            <div class="flex gap-5 items-center justify-center">
                <button class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded">Subir producto</button>
            </div>
        </form>
    </section>
    <?php
    include("./conexion.php");
    $getAllProducts = "SELECT * FROM productos";
    $ejecutar = $conexion->query($getAllProducts);
    if ($ejecutar->num_rows > 0) {
        foreach ($ejecutar as $product) {
            $productId = $product["product_id"];
            $productName = $product["product_name"];
            $productDesc = $product["product_description"];
            $productPrice = $product["product_price"];
            $getProductsImages = "SELECT * FROM images WHERE product_id = $productId";
            $ejecutar1 = $conexion->query($getProductsImages);
            foreach ($ejecutar1 as $img) {
                $productImg = $img["image_name"];
            }?>
            <section class="text-gray-700 body-font overflow-hidden bg-white">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="lg:w-4/5 mx-auto flex flex-wrap">
                            <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src="./imagenes/product<?php
                            echo $productId?>/<?php echo $productImg; ?>"/>
                            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                                <h1 class=" text-gray-900 text-3xl title-font font-medium mb-1"> <?php echo $productName; ?></h1>
                                <h2 class="text-sm title-font text-gray-500 tracking-widest">ID Producto: <?php echo $productId; ?></h2>
                                <p class="leading-relaxed"><?php echo $productDesc; ?></p>
                                <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
                                    <span class="title-font font-medium text-2xl text-gray-900"><?php echo $productPrice; ?> €</span>
                                </div>
                                <div class="flex">
                                    <a href='editar.php?productId=<?php
                            echo $productId?>' class="flex ml-auto text-white bg-gray-500 border-0 py-2 px-6 focus:outline-none hover:bg-gray-600 rounded">Editar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section><?php
        }
    } else {
      ?>
      <section class="text-gray-700 body-font overflow-hidden bg-white">
        <div class="container px-5 py-24 mx-auto">
          <div class="text-center w-full">
            <h1 class="text-2xl font-medium text-gray-900 mb-4">No hay productos disponibles</h1>
          </div>
        </div>
      </section>
    <?php
  }
}else{
?>
  <?php
    include("./conexion.php");
    $getAllProducts = "SELECT * FROM productos";
    $ejecutar = $conexion->query($getAllProducts);
    if ($ejecutar->num_rows > 0) {
        foreach ($ejecutar as $product) {
            $productId = $product["product_id"];
            $productName = $product["product_name"];
            $productDesc = $product["product_description"];
            $productPrice = $product["product_price"];
            $getProductsImages = "SELECT * FROM images WHERE product_id = $productId";
            $ejecutar1 = $conexion->query($getProductsImages);
            foreach ($ejecutar1 as $img) {
                $productImg = $img["image_name"];
                ?>
                <section class="text-gray-700 body-font overflow-hidden bg-white">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="lg:w-4/5 mx-auto flex flex-wrap">
                            <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src="./imagenes/product<?php
                            echo $productId?>/<?php echo $productImg; ?>"/>
                            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1"> <?php echo $productName; ?></h1>
                                <h2 class="text-sm title-font text-gray-500 tracking-widest">ID Producto: <?php echo $productId; ?></h2>
                                <p class="leading-relaxed"><?php echo $productDesc; ?></p>
                                <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
                                    <span class="title-font font-medium text-2xl text-gray-900"><?php echo $productPrice; ?>€</span>
                                </div>
                                <div class="flex">
                                    <button class="flex ml-auto text-white bg-gray-500 border-0 py-2 px-6 focus:outline-none hover:bg-gray-600 rounded">Comprar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
            }
        }
    } else {
      ?>
      <section class="text-gray-700 body-font overflow-hidden bg-white">
        <div class="container px-5 py-24 mx-auto">
          <div class="text-center w-full">
            <h1 class="text-2xl font-medium text-gray-900 mb-4">No hay productos disponibles</h1>
          </div>
        </div>
      </section>
    <?php
    }}
    ?>
    
   


  </body>
</html>
