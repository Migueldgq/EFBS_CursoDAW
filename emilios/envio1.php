<?php

$destino = $_POST["destino"];
$asunto = $_POST["asunto"];
$mensaje = $_POST["mensaje"];
$headers = 'From: miguelonsio@mdgq.ef' . "\r\n" .
    'Reply-To: miguelonsio@mdgq.ef' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($destino, $asunto, $mensaje, $headers);
