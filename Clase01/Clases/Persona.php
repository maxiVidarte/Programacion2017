<?php 
class Persona
{
    public $nombre;
    public $apellido;
    public $dni;
    
    public function __construct($nombre,$apellido="",$dni=0){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
    }
    function Saludar(){
        echo "hola instancia"."<br>";
    }
    static function Saludar2(){
        echo "hola estatico"."<br>";
    }
    
}


?>