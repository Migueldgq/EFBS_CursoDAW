<?php

$para = "migui@acm.ef";

$asunto = "Alfonso se caga en la mar salada";

$mensaje = "

 <h1>Hola</h1>

 <p>Alfonso se caga en la mar salada</p>
    <p>Esto es otra etiqueta</p>
    <font color='red'>A coruña</font>
 <p>Saludos</p>
 

";

if (mail($para, $asunto, $mensaje)) {
    echo "Enviado";
} else {
    echo "Fallo";
}