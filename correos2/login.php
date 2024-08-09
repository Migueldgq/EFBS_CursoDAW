<?php

include "checkIfIsAccountActivated.php";

include "sendMail.php";

$ema = $_POST["email"];
$pass = $_POST["password"];

$conexion = new mysqli("localhost", "root", "", "fichaje2");


$sql = "SELECT * FROM usuarios WHERE email_usu = '$ema'";
$ejecutar = $conexion->query($sql);





if ($ejecutar->num_rows > 0) {
    foreach ($ejecutar as $row) {
        $id = $row["id_usu"];
        $passBD = $row["pass_usu"];
    }
    $getTrys = "SELECT loginTrys FROM usuarios WHERE id_usu = $id";

    $result = $conexion->query($getTrys);
    if ($result->num_rows > 0) {
        foreach ($result as $row) {
            $trysBD = $row["loginTrys"];
        }
    }

    if (checkIfIsAccountActivated($id)) {
        if (password_verify($pass, $passBD)) {
            echo "Se ha iniciado sesion correctamente";
        } else {

            if ($trysBD <= 2) {
                $deactivate = "UPDATE usuarios SET isEmailActivated = 0 WHERE id_usu = $id";
                $conexion->query($deactivate);
                $uniqueId = uniqid();
                $setUniqueId = "UPDATE usuarios SET uniqueId = '$uniqueId' WHERE id_usu = $id";
                $conexion->query($setUniqueId);
                echo "Tu cuenta ha sido desactivada debido a muchos intentos de iniciar sesion fallidos, podrás reactivarla a través del correo que acabas de recibir";
                sendMail($ema, "Cuenta desactivada", "Tu cuenta ha sido desactivada debido a muchos intentos de iniciar sesion fallidos, podrás reactivarla a través de este link: http://localhost:8000/reactivar.php?id=" . $uniqueId . "&idUsu=" . $id);

            } else {
                $trysBD++;
                $insertTrys = "UPDATE usuarios SET loginTrys = $trysBD WHERE id_usu = $id";
                $conexion->query($insertTrys);
                echo "Contraseña incorrecta o email incorrectos, te quedan " . (3 - $trysBD) . " intentos" . " si llegas a los 3 intentos tu cuenta será desactivada";


            }






        }
    } else {
        echo "Tu cuenta no ha sido activada";
    }


} else {
    if ($trysBD <= 2) {
        $deactivate = "UPDATE usuarios SET isEmailActivated = 0 WHERE id_usu = $id";
        $conexion->query($deactivate);
        $uniqueId = uniqid();
        $setUniqueId = "UPDATE usuarios SET uniqueId = '$uniqueId' WHERE id_usu = $id";
        $conexion->query($setUniqueId);
        echo "Tu cuenta ha sido desactivada debido a muchos intentos de iniciar sesion fallidos, podrás reactivarla a través del correo que acabas de recibir";
        sendMail($ema, "Cuenta desactivada", "Tu cuenta ha sido desactivada debido a muchos intentos de iniciar sesion fallidos, podrás reactivarla a través de este link: http://localhost:8000/reactivar.php?id=" . $uniqueId . "&idUsu=" . $id);

    } else {
        $trysBD++;
        $insertTrys = "UPDATE usuarios SET loginTrys = $trysBD WHERE id_usu = $id";
        $conexion->query($insertTrys);
        echo "Contraseña incorrecta o email incorrectos, te quedan " . (3 - $trysBD) . " intentos" . " si llegas a los 3 intentos tu cuenta será desactivada";
    }


}