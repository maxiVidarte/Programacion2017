<?php
include_once "./Persona.php";
 class Profesor extends Persona
 {
     private $legajo;
     
     function __construct($nombre, $apellido,$sexo, $legajo)
     {
         parent::__construct($nombre, $apellido,$sexo);
         $this->legajo = $legajo;
     }
     public function MostrarDatos()
     {
          /*$myArray = array("nombre"=>$this->nombre,"apellido"=>$this->apellido,"sexo"=>$this->sexo,"libreta"=>$this->legajo);
        
         return $myArray;*/
         $datos = "Profesor: ."."nombre".$this->nombre."apellido".$this->apellido."sexo".$this->sexo."libreta".$this->legajo;
         return $datos;
     }
 }
 
?>