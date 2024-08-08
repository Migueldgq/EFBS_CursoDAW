<?php

function sendMail($destino, $asunto, $mensaje)
{
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8";
    $headers .= 'From: administracion@amc.ef' . "\r\n" .
        'Reply-To: administracion@amc.ef' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($destino, $asunto, $mensaje, $headers);
}