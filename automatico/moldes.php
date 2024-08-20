<?php

include 'conexion.php';

class crud
{
    private $tabla;
    private $conexion;
    private $camposstr;
    public $camposarr;

    function __construct($t)
    {
        $this->conexion = new mysqli("localhost", "root", "", "automatico");
        $this->tabla = $t;
        $this->dameCampos();


    }
    public function dameCampos()
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

    public function insertar($valores)
    {
        $sql = "INSERT INTO $this->tabla ($this->camposstr) VALUES (null, $valores)";
        return $this->conexion->query($sql);
    }

    public function consultar()
    {
        $sql = "SELECT * FROM $this->tabla";
        return $this->conexion->query($sql);
    }

    public function pinta_cabtabla()
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

    public function pinta_cuertabla()
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

    public function borrar($idVal)
    {
        $id = $this->camposarr[0];
        $sql = "DELETE FROM $this->tabla WHERE $id = $idVal";
        return $this->conexion->query($sql);
    }

    public function get_campos()
    {
        return $this->camposarr;
    }

    public function get_valores()
    {

        $valores = "";
        for ($i = 1; $i < count($this->camposarr); $i++) {
            $partes = explode("_", $this->camposarr[$i]);
            $valores .= $_POST[$partes[$i]] . ",";
        }

        return substr($valores, 0, -1);
    }

}

function pinta_form($campos)
{

    echo "<form action='grabarcrud.php' method='POST'>";
    for ($i = 1; $i < count($campos); $i++) {
        $partes = explode("_", $campos[$i]);
        echo "<input type='text' name='$partes[0]' placeholder='" . ucfirst($partes[0]) . " '>";
    }


    echo "<input type='hidden' name='tabla' value=''>";
    echo "<input type='submit' value='Grabar'>";
    echo "</form>";

    echo '<script> getTablaTitle() </script>';
}
;

function getTablaTitle()
{
    return "<script>
    $('input[type=hidden]').val('$(h1).text()');
    </script>";
}



$algo = new crud("clientes");
$valores = $algo->get_valores();
$algo->consultar();
$algo->insertar($valores);
$algo->pinta_cabtabla();
$algo->pinta_cuertabla();
$campos = $algo->get_campos();

//Si esta fuera de la clase no se pone $algo->pinta_form($campos);
pinta_form($campos);