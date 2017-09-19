<?php 

class Estacionamiento{
    
    public static function guardar($unAuto){
        $archivo = fopen("./Archivos/estacionados.txt","a");
        $unAuto->fechaIngreso = date("Y-m-d H:i:s");
        $renglon = $unAuto->patente."-.-".$unAuto->fechaIngreso."\n";
        fwrite($archivo,$renglon);*/
        fclose($archivo);
    }

    public static function sacar($unAuto){

    }
}
?>