<?php 
include "./interfaces.php";
include_once "./Profesor.php";
include_once "./Persona.php";
include_once "./Alumno.php";

class Aula implements IMostrarPersonas
{
    protected $nombreAula; 
    protected $alumnos ;
    protected $profesor ;
   
   function __construct($nombreAula)
   {
       $this->nombreAula = $nombreAula;
       $this->alumnos = array();
       
   }
  public function AgregarAlumno($alumno)
   {
       array_push($this->alumnos,$alumno);
   }
   public function AgregarProfesor($profe)
   {
       $this->profesor = $profe;
   }
   public function MostrarAula()
   {
       $this->profesor->MostrarDatos(); 
   }
    public function MostrarPersonas()
    {
        echo "hola mundo";
    }
}

?>