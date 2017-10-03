<?php 
include "./clases/Archivo.php";
class Producto{
//---------------------//
//------ATRIBUTOS------//
    private $precio;
    private $codigo;
    private $nombre;
    private $pathFoto;

    function __construct($nombre=NULL, $codigo=NULL,$precio=NULL,$path=NULL){
       if($nombre !== NULL && $codigo !== NULL && $precio!==NULL){
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->codigo = $codigo;
        $this->pathFoto = $path;
       }
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
    public function GetPathFoto()
	{
		return $this->pathFoto;
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
    public function SetPathFoto($valor)
	{
		$this->pathFoto = $valor;
	}
//---------------------------//
//------METODO TOSTRING------//
    public function ToString(){
        return $this->nombre." - ".$this->codigo." - ".$this->precio." - ".$this->pathFoto."\r\n";
    }
//---------------------------//
//------METODO DE CLASE------//
    public static function Guardar($producto){
        $resultado = false;

        $archivo = fopen("archivos/productos.txt","a");

        $cantidad = fwrite($archivo, $producto->ToString());

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
            $archivoAuxiliar = fgets($archivo);
            $productos = explode(" - ",$archivoAuxiliar);
            $productos[0] = trim($productos[0]);
            if($productos[0]!= ""){
                $listadoDeProductos[] = new Producto($productos[0],$productos[1],$productos[2],$productos[3]);
            }
        }
        fclose($archivo);
        return $listadoDeProductos;
    }
    public static function TraerTodosLosProductosGet($objeto){
        $listadoDeProductos = array();
        
                $archivo = fopen("archivos/productos.txt","r"); 
                while(!feof($archivo)){
                    $archivoAuxiliar = fgets($archivo);
                    $productos = explode(" - ",$archivoAuxiliar);
                    $productos[0] = trim($productos[0]);
                    if($productos[0]!= "" && $productos[0]==$objeto){
                        $listadoDeProductos[] = new Producto($productos[0],$productos[1],$productos[2],$productos[3]);
                    }
                }
                fclose($archivo);
                return $listadoDeProductos;
    }
    public static function Modificar($obj){
        $resultado = true;

        $ListaDeProductosLeidos = Producto::TraerTodosLosProductos();
		$ListaDeProductos = array();
		$imagenParaBorrar = NULL;
		for($i=0; $i<count($ListaDeProductosLeidos); $i++){
			if($ListaDeProductosLeidos[$i]->codigo == $obj->codigo){//encontre el modificado, lo excluyo
				$imagenParaBorrar = trim($ListaDeProductosLeidos[$i]->pathFoto);
                continue;
			}
			$ListaDeProductos[$i] = $ListaDeProductosLeidos[$i];
		}
        array_push($ListaDeProductos, $obj);//agrego el producto modificado
        var_dump($ListaDeProductosLeidos);
	
		//ABRO EL ARCHIVO
		$ar = fopen("archivos/productos.txt", "w");
        
		//ESCRIBO EN EL ARCHIVO
		foreach($ListaDeProductos AS $item){
			$cant = fwrite($ar, $item->ToString());
			
			if($cant < 1)
			{
				$resultado = FALSE;
				break;
			}
		}
		
		//CIERRO EL ARCHIVO
		fclose($ar);
		
		return $resultado;
    }
    Public static function CargarVenta($codigo, $nombre){

            //VERIFICO QUE EL PRODUCTO ESTE EN LA LISTA DE PRODUCTOS
            $archivo = fopen("archivos/productos.txt","r"); 
            while(!feof($archivo)){
                $archivoAuxiliar = fgets($archivo);
                $productos = explode(" - ",$archivoAuxiliar);
                    $productos[0] = trim($productos[0]);
                    //si esta el producto lo agrego a ventas.txt
                    if($productos[1]!= "" && $productos[1]==$codigo){
                        $archivo2 = fopen("archivos/ventas.txt","a");
                        $dato = $productos[0]." - ".$productos[1]." - ".$productos[2]." - ".$nombre."\r\n";
                        $cantidad = fwrite($archivo2, $dato);
                
                        if($cantidad > 0){
                            $resultado = true;
                        }
                        fclose($archivo2);
                        continue;
                    }
                }
                fclose($archivo);

    }
    public static function BorrarProducto($codBarra){
            if($codBarra === NULL)
                return FALSE;
                
            $resultado = TRUE;
            
            $ListaDeProductosLeidos = Producto::TraerTodosLosProductos();
            $ListaDeProductos = array();
            $imagenParaBorrar = NULL;
            $existe = false;
            for($i=0; $i<count($ListaDeProductosLeidos); $i++){
                if($ListaDeProductosLeidos[$i]->codigo == $codBarra){//encontre el borrado, lo excluyo
                    $imagenParaBorrar = trim($ListaDeProductosLeidos[$i]->pathFoto);
                    $existe=true;
                    continue;
                }
                $ListaDeProductos[$i] = $ListaDeProductosLeidos[$i];
            }
            if($existe==true){
            //PASO LA FOTO A BORRADOS
            $pathOrigen = "FotosProductos/".$imagenParaBorrar;
            $pathDestino  ="FotosBorrados/".$codBarra."-".date("Ymd_His") . ".jpg";
            Archivo::Mover($pathOrigen,$pathDestino);
            //BORRO LA IMAGEN ANTERIOR
            Archivo::Borrar("FotosProductos/".$imagenParaBorrar);
            }
            else{ $resultado= false;}
            //ABRO EL ARCHIVO
		    $ar = fopen("archivos/productos.txt", "w");
		
		    //ESCRIBO EN EL ARCHIVO
		    foreach($ListaDeProductos AS $item){
			$cant = fwrite($ar, $item->ToString());
			
			if($cant < 1)
			{
				$resultado = FALSE;
				break;
			}   
		    }   
		
		//CIERRO EL ARCHIVO
		fclose($ar);
            return $resultado;
    }
    public static function TraerTodasLasImagenesGet($objeto){
        if($objeto!="vigente" && $objeto!="borrado"){
            return false;
        }
        if($objeto =="vigente"){
            $myArray = scandir("./FotosProductos");
            unset($myArray[0],$myArray[1]);
        }else if($objeto == "borrado"){
            $myArray = scandir("./FotosBorrados");
            unset($myArray[0],$myArray[1]);
        }
        return $myArray;
    }
}

?>