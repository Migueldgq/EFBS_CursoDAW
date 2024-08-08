<?php

function checkIfIsAccountActivated($id)
{
    $conexion = new mysqli("localhost", "root", "", "fichaje2");

    $activated = "SELECT * FROM usuarios WHERE id_usu = $id";
    $ejecutar = $conexion->query($activated);
    if ($ejecutar->num_rows > 0) {
        foreach ($ejecutar as $row) {
            $isActivated = $row["isEmailActivated"];
        }

        if ($isActivated == 1) {
            return true;
        } else {
            return false;
        }
    }
}