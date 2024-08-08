<?php

$para = "migui@acm.ef";

$asunto = "Alfonso se caga en la mar salada";

$cuerpo = "
<h1>Hola</h1>
<font color='red'>Alfonso se caga en la mar salada</font>

";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8";

//$headers .= 'From: administracion@amc.ef' . "\r\n" .
// 'Reply-To: administracion@amc.ef' . "\r\n" .
// 'X-Mailer: PHP/' . phpversion();


if (mail($para, $asunto, $cuerpo, $headers)) {
    echo "Enviado";
} else {
    echo "Fallo";
}