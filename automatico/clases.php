<?php

class Ejemplo
{
    private $olor;
    public $precio;
    private $tamano;
    private $marca;
    public $color;
    public $sabor;

    //asignando valores a las propiedades
    //lo que conocemos como setter

    function setValores($o, $t, $m, $c)
    {
        $this->olor = $o;
        $this->tamano = $t;
        $this->marca = $m;
        $this->color = $c;
    }

    //Crear un metodo para sacar valores de las propiedades
    //getter saca de la clase el contenido de una principal

    function getValores()
    {
        echo $this->olor;
    }
}


//Creando un objeto y llamándolo

$objeto = new Ejemplo(); //La variable objeto es un objeto de la clase Ejemplo

//vamos a asignarle valores a través del setter que hemos creaodo

$objeto->setValores("vainilla", "grande", "ambipur", "blanco");

//vamos a sacar los valores, mos
$objeto->getValores();

//Sacar propiedad publica

echo $objeto->color;

//leemos prop privs
//echo $objeto->tamano;

//seteo de un valor a una propiedad pública

$objeto->sabor = "fresa";



