<?php




include "conexion.php";

$nombre = password_hash($_POST["nomani"], PASSWORD_BCRYPT);
$chip = password_hash($_POST["chipani"], PASSWORD_BCRYPT);
$tlfpro = password_hash($_POST["tlfpro"], PASSWORD_BCRYPT);
$email_pro = password_hash($_POST["emailpro"], PASSWORD_BCRYPT);
$raza = password_hash($_POST["razaani"], PASSWORD_BCRYPT);
$nomadm = $_POST["nomadm"];

$insertAni = "INSERT INTO animales (nombre_ani, chip_ani, tlf_pro, email_pro, raza_ani, nombre) VALUES ('$nombre', '$chip', '$tlfpro', '$email_pro', '$raza', '$nomadm')";

if ($conexion->query($insertAni)) {
    echo 1;
} else {
    echo 0;
}
