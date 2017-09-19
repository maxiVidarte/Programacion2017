<?php 
abstract class Persona
{
    protected $nombre; 
    protected $apellido; 
    protected $sexo;

    function __construct($nombre, $apellido, $sexo)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->sexo = $sexo;
    }
    public abstract function MostrarDatos();
}

?>