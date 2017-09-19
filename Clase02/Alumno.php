<?php
include_once "./Persona.php";
class Alumno extends Persona
{
    private $libreta;
    function __construct($nombre, $apellido, $sexo, $libreta)
    {
        parent::__construct($nombre, $apellido, $sexo);
        $this->libreta = $libreta;
    }
    public function MostrarDatos()
    {
        /*$myArray = array("nombre"=>$this->nombre,"apellido"=>$this->apellido,"sexo"=>$this->sexo,"libreta"=>$this->libreta);
        return $myArray;*/
        $datos = "Alumno: "."Nombre: ".$this->nombre.". Apellido: ".$this->apellido.". Sexo: ".$this->sexo.". Libreta: ".$this->libreta;
         return $datos;
    }
}
?>