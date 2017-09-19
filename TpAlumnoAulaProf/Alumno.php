<?php 
 include_once "./Persona.php";
class Alumno extends Persona
{
    public $libreta;
    function __construct($nombre, $apellido, $sexo, $libreta)
    {
        parent::__construct($nombre, $apellido,$sexo);
        $this->libreta = $libreta;
    }
    public function MostrarDatos(){
        $datos = "Alumno  "."-"."Nombre: ".$this->nombre."-"."Apellido: ".$this->apellido."-"."Sexo: ".$this->sexo."-"."Libreta: ".$this->libreta;
        return $datos;
    }
}

?>