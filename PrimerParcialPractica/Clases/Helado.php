<?php 
class Helado{

    public $sabor;
    public $precio;
    public $tipo;
    public $cantidad;

    function Helado($sabor,$precio,$tipo,$cantidad){
        if($sabor != null && $precio != null && $tipo != null && $cantidad != null){
            $this->sabor = $sabor;
            $this->precio = $precio;
            $this->tipo = $tipo;
            $this->cantidad = $cantidad;
        }
    }
    
    public function ToString(){
        return $this->sabor."-".$this->precio."-".$this->tipo."-".$this->cantidad."\n";
    }
    public function HeladoEsta($sabor,$tipo){
        $archivo = fopen("archivos/Helados.txt","r");
        while(!feof($archivo)) {
            $uno = fgets($archivo);
            $helado = explode("-",$uno);
            if($helado[0] == $sabor && $helado[2] == $tipo)
            return true;
        }
        return false;
    }
    public function HaySabor($sabor){
        $archivo = fopen("archivos/Helados.txt","r");
        while(!feof($archivo)){
            $uno = fgets($archivo);
            $helado = explode("-",$uno);
            if($helado[0]==$sabor)
            return true;
        }
        return false;
    }
    public static function Guardar($objeto){
        if(!$objeto->HeladoEsta($this->sabor,$this->tipo)){
        $archivo = fopen("archivos/Helados.txt","a");
        fwrite($archivo,$objeto->ToString());
        fclose($archivo);
        return true;
        }
        return false;
    }
    
}



?>