<?php
session_start();

$newname = $_POST["name"];
$newlocation = $_POST["location"];
$newBirthdate = $_POST["birthdate"];
$newEmail = $_POST["email"];
$id = $_SESSION["usuario"];

include("conexion.php");

$searchUserInfo = "SELECT * FROM usuarios WHERE user_id = $id";

$ejecutar = $conexion->query($searchUserInfo);

foreach ($ejecutar as $usuario) {
    $oldName = $usuario["user_name"];
    $oldLocation = $usuario["user_location"];
    $oldBirthdate = $usuario["user_birthdate"];
    $oldEmail = $usuario["user_email"];
}

$mensaje = "";
$contador = 0;

if (isset($newname) && $newname!=$oldName) {
    $updateName = "UPDATE usuarios SET user_name = '$newname' WHERE user_id = $id";
    $conexion->query($updateName);
    $mensaje.="Tu Nombre actualizado es $newname\\n";
    $contador = 1;    

}

if (isset($newEmail) && $newEmail!=$oldEmail) {
    $updateEmail = "UPDATE usuarios SET user_email = '$newEmail' WHERE user_id = $id";
    $conexion->query($updateEmail);
    $mensaje.="Tu Correo actualizado es $newEmail\\n";
    $contador = 1;    

} 

 if (isset($newlocation) && $newlocation!=$oldLocation) {
    $updateLocation = "UPDATE usuarios SET user_location = '$newlocation' WHERE user_id = $id";
    $conexion->query($updateLocation);
    $mensaje.="Tu Localidad actualizada es $newlocation\\n";
    $contador = 1; 

} if (isset($newBirthdate) && $newBirthdate!=$oldBirthdate) {
    $updateBirthdate = "UPDATE usuarios SET user_birthdate = '$newBirthdate' WHERE user_id = $id";
    $conexion->query($updateBirthdate);
    $mensaje.="Tu Fecha de nacimiento actualizada es $newBirthdate\\n";
    $contador = 1; 
} 

if($contador==0 ){
    echo "<script>
        alert('No haz realizado ningún cambio');
        window.location.href='perfil.php';
    </script>";
}else{ echo "<script>
    alert('$mensaje');
    window.location.href='perfil.php';
</script>";
}
?>
