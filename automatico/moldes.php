<?php

include 'conexion.php';

class crud
{
    private $tabla;
    private $conexion;
    private $camposstr;
    private $camposarr;

    function __construct($t)
    {
        $this->conexion = new mysqli("localhost", "root", "", "automatico");
        $this->tabla = $t;
        $this->dameCampos();


    }
    function dameCampos()
    {
        $cadena = "";
        $cadenaarr = [];
        $sql = "SHOW COLUMNS FROM $this->tabla";
        $ejecutar = $this->conexion->query($sql);
        foreach ($ejecutar as $registro) {
            $cadena .= $registro["Field"] . ",";
            array_push($cadenaarr, $registro["Field"]);
        }
        $cadena = substr($cadena, 0, -1);
        $this->camposstr = $cadena;
        $this->camposarr = $cadenaarr;
    }

    function insertar($valores)
    {
        $sql = "INSERT INTO $this->tabla ($this->camposstr) VALUES ($valores)";
        return $this->conexion->query($sql);
    }

    function consultar()
    {
        $sql = "SELECT * FROM $this->tabla";
        return $this->conexion->query($sql);
    }

    function pinta_cabtabla()
    {
        echo "<table border='1'>
            <thead>
            <tr>";

        foreach ($this->camposarr as $campo) {
            echo "<th>$campo</th>";
        }

        echo "</tr>
            </thead>
            <tbody>";
    }

    function pinta_cuertabla()
    {

        echo "<tbody>";
        foreach ($this->consultar() as $registro) {
            echo "<tr>";
            foreach ($this->camposarr as $campo) {
                echo "<td>$registro[$campo]</td>";
            }
            echo "</tr>";
        }
        echo "</tbody>
            </table>";
    }

    function borrar($idVal)
    {
        $id = $this->camposarr[0];
        $sql = "DELETE FROM $this->tabla WHERE $id = $idVal";
        return $this->conexion->query($sql);
    }


}

$algo = new crud("clientes");
$algo->insertar();
$algo->pinta_cabtabla();
$algo->pinta_cuertabla();