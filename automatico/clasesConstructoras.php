<?php

class Ejemplo
{
    private $olor;
    public $precio;
    private $tamano;
    private $marca;
    public $color;
    public $sabor;

    function __construct($o, $t, $m, $c)
    {
        $this->olor = $o;
        $this->tamano = $t;
        $this->marca = $m;
        $this->color = $c;
    }
}

//vamos a ver la llamada a la clase pero con constructor

$objeto = new Ejemplo("vainilla", "grande", "ambipur", "blanco");