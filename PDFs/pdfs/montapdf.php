<?php

    $id = $_GET["i"]; //recibimos del primer documento
    $hoy = date("d-m-Y"); //se colopca y en mayuscula para tener 4 digitos en la fecha
    $nombredoc = "informe_$hoy"; //estamos crando el nombre dle documento
    include("./Dompdf/autoload.inc.php");       //desde donde estoy, la carpeta dompdf, dentro hay un documento que se llama autoload.inc.php
    use Dompdf\Dompdf; //vas a utilizar de este directorio dompdf, estas clases dompdf // que se pas que de todo lo que acabas de cargar voy a usar solo esto y lo de abajo
    use Dompdf\Options;  //
    //vamos acrear un nuevo objeto de la clase  haciendo que los elementos sean descargables yq ue se vea correctamente cuando los descargue, vamos a decirle que tenga 2 partes del html 
    $opciones = new Options(); //no es como mysqli porque no le enviamos datos, sino que vamos a setear, vamos a ir metiendo entre parentesis lo que quiero setear y el valor// voiy a crear clase crear objetos y guardarlos aqui como si fuera un array
    $opciones->set("isHtml5ParserEnabled",true); //va a estar entendiendo cada linea del html y va a ser capaz de codificarlo en pdf
    $opciones->set("isRemoteEnabled", true); //cuando estemos guardando los datos que esten en remoto pueda captarlos. 
    //hacer un nuevo objeto
    $mipdf = new Dompdf($opciones); //al tneer datos dentro de los parentesis es porque tiene un constructor que ejecuta al momento //creo otro objeto, cargar el documento y transformar en pdf
    ob_start(); //comienza el objeto, del documento//estoy haciendo el inicio de un docuemnto
    include("./alumno.php"); //desde donde estoy, el documento que se llama alumno.php //aqui incluyo el documento siempre debe estar entre el star y el clean
    $html = ob_get_clean();  ////  vamos a incluir un documetno que esta en html limpito, html puro
    $mipdf->loadHtml($html); //metodo propio de dompd// estar cargando a quien tendra que cargar(html)
    $mipdf->render(); //llevar cabo el pdf
    $mipdf->stream($nombredoc); //descargalo (con este nombre)
?>