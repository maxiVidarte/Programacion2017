<?php

class estacionamiento{
    
    public static function guardar($unAuto){
    /*
    toma el vehiculo y lo guarda en un archivo 
    */
    //var_dump($unAuto);
    $archivo = fopen("./archivos/estacionados.txt","a");
    $renglon = $unAuto->patente."-.-".$unAuto->fechIngreso."\n";
    fwrite($archivo,$renglon);
    fclose($archivo);
    }
    
    public static function sacar($unAuto){
    /*1) leer el archivo estacionados
    2) verifica
    3) calcula costo en el caso que este strtotime($unAuto->fechIngreso)strtotime($unAuto->fechEgreso)
    4)sacar del array
    5)guardar en estacionados
    6)guardar facturados
    */
    $archivo = fopen("./archivos/estacionados.txt","r");
    $miArray = array();
    while(!feof($archivo))
    {
     array_push($miArray,fgets($archivo));
    }
    var_dump($miArray);
    //$renglon = explode()

    }
}

?>