<?php 
class Profesor extends Persona
{
    public $legajo;
    
    function __construct($nombre,$apellido,$sexo,$legajo)
    {
        parent::__construct($nombre,$apellido,$sexo);
        $this->legajo = $legajo;
    }

    public function MostrarDatos(){
        $datos = "Profesor  "."-"."Nombre: ".$this->nombre."-"."Apellido: ".$this->apellido."-"."Sexo: ".$this->sexo."-"."Legajo: ".$this->legajo;
        return $datos;
    }
}


?>