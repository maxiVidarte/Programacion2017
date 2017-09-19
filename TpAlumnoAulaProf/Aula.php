<?php 
include_once "./Persona.php";
include_once "./Profesor.php";
include_once "./Alumno.php";
include_once "./miInterfaz.php";

class Aula implements IMostrarPersonas
{
    public $nomAul;
    public $alumnos;
    public $profesores;

    function __construct($nombre)
    {
        $this->nomAul = $nombre;
        $this->alumnos = array();
        $this->profesores = array();
    }
    public function AgregarAlumno($alumno){
        array_push($this->alumnos,$alumno);
    }
    public function AgregarProfesor($profesor){
        array_push($this->profesores,$profesor);
    }
    public function BuscarAlumnoPorNombreYApellido($nombre,$apellido){
        $persona;
        foreach ($this->alumnos as $value) {
            $persona= explode("-",$value->MostrarDatos());
            if($persona[1]=="Nombre: ".$nombre && $persona[2]=="Apellido: ".$apellido){
               return true;
            }
        }
    }
    
    public function BuscarAlumnoPorNumeroLibreta($libreta){
        $persona;
        foreach ($this->alumnos as $value) {
            $persona = explode("-",$value->MostrarDatos());
            if($persona[4]=="Libreta: ".$libreta){
                return true;
            }
        }
    }
    public function BuscarProfesorPorLegajo($legajo){
        $persona;
        foreach ($this->profesores as $value) {
            $persona = explode("-",$value->MostrarDatos());
            if($persona[4]=="Legajo: ".$legajo){
                return true;
            }
        }
    }
    public function BuscarPersonaPorApellido($apellido){
        $persona;
        foreach ($this->profesores as $value) {
            $persona = explode("-",$value->MostrarDatos());
            if($persona[2]=="Apellido: ".$apellido){
                return true;
            }
        }
        foreach ($this->alumnos as $value) {
            $persona = explode("-",$value->MostrarDatos());
            if($persona[2]=="Apellido: ".$apellido){
                return true;
            }
        }
    }
    public function MostrarPersonas(){
        $miString = "" ;
        foreach ($this->alumnos as $key) {
            $miString .= "/n".$key->MostrarDatos();
        }
        foreach ($this->profesores as $key) {
            $miString .= "/n".$key->MostrarDatos();
        }
        return $miString;
    }
    public function BuscaPerPorNomApSex($nombre,$apellido,$sexo){
        $persona;
        foreach ($this->alumnos as $value) {
            $persona = explode("-",$value->MostrarDatos());
            if($persona[1]=="Nombre: ".$nombre && $persona[2]=="Apellido: ".$apellido && $persona[3]=="Sexo: ".$sexo){
                return true;
            }
        }
        foreach ($this->profesores as $value) {
            $persona = explode("-",$value->MostrarDatos());
            if($persona[1]=="Nombre: ".$nombre && $persona[2]=="Apellido: ".$apellido && $persona[3]=="Sexo: ".$sexo){
                return true;
            }
        }
    }
}


?>