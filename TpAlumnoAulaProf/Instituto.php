<?php 
include_once "./Aula.php";
class Instituto 
{
    public $nombre;
    public $arrayAulas;

    function __construct($nombre)
    {
        $this->nombre = $nombre;
        $this->arrayAulas = array();
    }
    public function AgregarAula($aulaNueva){
        array_push($this->arrayAulas,$aulaNueva);
    }
    public function MostrarAulas(){
        foreach ($this->arrayAulas as $value) {
            echo $value->MostrarPersonas();
        }
    }
    public function AlumnoEnAulaNyA($nombre,$apellido){
        echo "El alumno: ".$nombre." ".$apellido." se encuentra en las siguientes aulas: "."</br>";
        foreach ($this->arrayAulas as $value) {
           if($value->BuscarAlumnoPorNombreYApellido($nombre,$apellido)){
            echo $value->nomAul."</br>";   
           }
        }
    }
    public function AlumnoPorLibreta($libreta){
        echo "El alumno: ".$libreta." se encuentra en las siguientes aulas:"."</br>";
        foreach ($this->arrayAulas as $value) {
            if($value->BuscarAlumnoPorNumeroLibreta($libreta)){
                echo $value->nomAul."</br>";
            }
        }
    }
    public function AlumnoCantidadPorLibreta($libreta){
        echo "El alumno: ".$libreta." se encuentra en las siguientes aulas:"."</br>";
        $veces=0;
        foreach ($this->arrayAulas as $value) {
           if($value->BuscarAlumnoPorNumeroLibreta($libreta)){
                $veces++;
            }
        }
        echo $veces."</br>";
     }
     public function PersonaPorApellidoEnAulas($apellido){
        echo "La persona ".$apellido." se encuentra en las siguientes aulas: "."</br>";
        foreach ($this->arrayAulas as $value) {
            if($value->BuscarPersonaPorApellido($apellido)){
                echo $value->nomAul."</br>";
            }
        }
        }
        public function CantidadYListadoConMismoApNomSex($nombre, $apellido,$sexo){
            echo "La persona ".$nombre." ".$apellido." se encuentra en las siguientes aulas: "."</br>";
            $veces = 0;
            foreach ($this->arrayAulas as $value) {
                if($value->BuscaPerPorNomApSex($nombre,$apellido,$sexo)){
                    $veces++;
                    echo $value->nomAul."</br>";
                }
            }
            echo $veces."</br>";
        }
    
     public function ProfesoresPorLegajo($legajo){
        echo "El Profesor: ".$legajo." se encuentra en las siguientes aulas: "."</br>";
        foreach ($this->arrayAulas as $value) {
            if($value->BuscarProfesorPorLegajo($legajo)){
                echo $value->nomAul."</br>";
            }
        }        
    }
    
}


?>