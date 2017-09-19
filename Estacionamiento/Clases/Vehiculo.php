<?php 
class Vehiculo
{
    public $patente;
    public $fechaIngreso;
    public $fechaEgreso;
    public $importe;
    function __construct($patente)
    {
        $this->patente = $patente;
    }
}

?>