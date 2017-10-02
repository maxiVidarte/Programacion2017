<?php

class Producto{
public $nombre;
public $codigoBarra;
public $precio;

function __Construct($nombre, $codigoBarra, $precio){
    $this->nombre = $nombre;
    $this->codigoBarra = $codigoBarra;
    $this->precio = $precio;
}

public function guardar(){
    
        $archivo = fopen("./productos.txt","a");
        $renglon = $this->nombre.",".$this->codigoBarra.",".$this->precio."\r\n";
        fwrite($archivo,$renglon);
        fclose($archivo);
        //var_dump($unAuto);
    
        }


public static function traerPrecio($filtroNombre, $filtroCodigoBarra)
{
    $archivo = fopen("./productos.txt","r");
    $result = "-1";
    while (feof($archivo) == false)
    {
        
        $line = fgets($archivo);

        $auxProducto = explode(",", $line);
        if (count($auxProducto) == 3){
            $auxNombre = $auxProducto[0];
            $auxCodigoBarra = $auxProducto[1];
            $auxPrecio = $auxProducto[2];

            //var_dump($auxProducto);
            //var_dump($auxNombre);
            //var_dump($auxCodigoBarra);
            //var_dump($auxPrecio);

            if ($auxNombre == $filtroNombre && $auxCodigoBarra == $filtroCodigoBarra)
            {
                $result = $auxPrecio;
                break;
            }
        }
    }

    fclose($archivo);

    return $result;
}

public static function listarProductos(){

    $archivo = fopen("./productos.txt","r");

    $listaProductos;
    while (feof($archivo) == false)
    {
        
        $line = fgets($archivo);

        $auxProducto = explode(",", $line);
        if (count($auxProducto) == 3){
            $auxNombre = $auxProducto[0];
            $auxCodigoBarra = $auxProducto[1];
            $auxPrecio = $auxProducto[2];

            array_push($lista)
            //var_dump($auxProducto);
            //var_dump($auxNombre);
            //var_dump($auxCodigoBarra);
            //var_dump($auxPrecio);

           
        }
    }


    fclose($archivo);

}

}

?>