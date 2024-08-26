<?php




include "conexion.php";

$nompro = password_hash($_POST["nompro"], PASSWORD_BCRYPT);
$passpro = password_hash($_POST["passpro"], PASSWORD_BCRYPT);
$nomadm = $_POST["nomadm"];


$insertProp = "INSERT INTO propietarios (nombre_pro, pass_pro,nombre) VALUES ('$nompro', '$passpro', '$nomadm')";

if ($conexion->query($insertProp)) {
    echo 1;
} else {
    echo 0;
}
