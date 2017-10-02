<?php 

class Producto{
//---------------------//
//------ATRIBUTOS------//
    private $precio;
    private $codigo;
    private $nombre;

    function __construct($nombre, $precio,$codigo){
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->codigo = $codigo;
    }
//-----------------------------//
//------GETTERS Y SETTERS------//
    public function GetNombre(){
        return $this->nombre;
    }
    public function GetCodigo(){
        return $this->codigo;
    }
    public function GetPrecio(){
        return $this->precio;
    }
    public function SetNombre($valor){
        $this->nombre = $valor;
    }
    public function SetCodigo($valor){
        $this->codigo = $valor;
    }
    public function SetPrecio($valor){
        $this->precio = $valor;
    }
//---------------------------//
//------METODO TOSTRING------//
    public function ToString(){
        return $this->nombre." - ".$this->precio." - ".$this->codigo."\r\n";
    }
//---------------------------//
//------METODO DE CLASE------//
    public static function Guardar($producto){
        $resultado = false;

        $archivo = fopen("archivos/productos.txt","a");

        $cantidad = fwrite($ar, $producto->ToString());

        if($cantidad > 0){
            $resultado = true;
        }

        fclose($archivo);

        return $resultado;
    }
    public static function TraerTodosLosProductos(){
        $listadoDeProductos = array();

        $archivo = fopen("archivos/productos.txt","r"); 
        while(!feof($archivo)){
            $archivoAuxiliar = fget($archivo);
            $productos = explode(" - ",$archivoAuxiliar);
            $productos[0] = trim($productos[0]);
            if($productos[0]!= ""){
                $listadoDeProductos[] = new Producto($productos[0],$productos[1],$productos[2]);
            }
        }
        fclose($archivo);
        return $listadoDeProductos;
    }
}

?>