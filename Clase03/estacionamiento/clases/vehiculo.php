<?php 

class vehiculo 
{
    public $patente;
    public $fechIngreso;
    public $fechEgreso;
    public $importe;
    function __construct($patente)
    {
        $this->patente = $patente;
        
    }
}

?>