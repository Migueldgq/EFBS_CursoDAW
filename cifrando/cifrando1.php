<?php


//Cifrando en una via

$cadena = "Miguelonsio";

echo"Mi nombre es $cadena <br>";


// Con md5

$cadenamd5 = md5($cadena);

echo"Mi nombre con md5 es $cadenamd5 <br>";

// Bcrypt

$bcrypthash = password_hash($cadena, PASSWORD_BCRYPT);

echo"Mi nombre con bcrypt hash es $bcrypthash <br>";

if (password_verify("Miguelonsio",$bcrypthash)) {
    echo"Contraseña o email es correcta";
} else {
    echo"Contraaseña o email invalidos";
};

// DOBLE VIA

$b64 = base64_encode($cadena);

echo"El nombre en b64 es $b64";











?>