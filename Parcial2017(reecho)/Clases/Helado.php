<?php 

class Helado 
{
    private $sabor;
    private $precio;
    private $tipo;
    private $cantidad;
    private $path;

    function Helado($sabor=null, $precio=null, $tipo=null, $cantidad=null){
        if($sabor!=null && $precio!=null && $tipo!=null && $cantidad!=null ){
            $this->sabor = $sabor;
            $this->precio = $precio;
            $this->tipo = $tipo;
            $this->cantidad = $cantidad;
        }
    }

    public function GetSabor(){
        return $this->sabor;
    }
    public function GetPrecio(){
        return $this->precio;
    }
    public function GetTipo(){
        return $this->tipo;
    }
    public function GetCantidad(){
        return $this->cantidad;
    }
    public function GetPath(){
        return $this->path;
    }
    public function SetSabor($value){
        $this->sabor = $value;
    }
    public function SetPrecio($value){
        $this->precio = $value;
    }
    public function SetTipo($value){
        $this->tipo =  $value;
    }
    public function SetCantidad($value){
        $this->cantidad = $value;
    }
    public function SetPath($value){
        $this->path = $value;
    }
    public function ToString(){
        return $this->sabor." - ".$this->precio." - ".$this->tipo." - ".$this->cantidad."\r\n";
    }

    public static function Guardar($helado){
        $resultado = false;
        $archivo = fopen("archivos/Helados.txt","a");
        $cantidad = fwrite($archivo, $helado->ToString());
    
        if($cantidad > 0){
            $resultado = true;
        }
    
        fclose($archivo);
        return $resultado;
    }
    public static function HaySaborYTipo($sabor,$tipo){
        $heladoArray = Helado::TraerTodosLosHelados();
        //no hay nada
        $valor = 0;
        foreach ($heladoArray as $key) {
            if($key->sabor == $sabor){
                if($key->tipo == $tipo){
                    //hay los dos
                    $valor = 1;                    
                }else{
                    //no hay tipo 
                    $valor = 2;
                }
            }
       }
       return $valor;
    }
    public static function TraerTodosLosHelados()
	{
		$ListaDeHeladosLeidos = array();
		
		$archivo=fopen("archivos/Helados.txt", "r");
		
		while(!feof($archivo))
		{
			$archAux = fgets($archivo);
			$helados = explode(" - ", $archAux);
			$helados[0] = trim($helados[0]);
			if($helados[0] != ""){
				$ListaDeHeladosLeidos[] = new Helado($helados[0], $helados[1],$helados[2],$helados[3]);
			}
		}
		fclose($archivo);
		return $ListaDeHeladosLeidos;
    }
    public static function TraerTodasLasVentas()
	{
		$ListaDeVentasLeidos = array();
		
		$archivo=fopen("archivos/Ventas.txt", "r");
		
		while(!feof($archivo))
		{
			$archAux = fgets($archivo);
			$helados = explode(" - ", $archAux);
			$helados[0] = trim($helados[0]);
			if($helados[0] != ""){
				$ListaDeVentasLeidos[] = ($helados[0]."-".$helados[1]."-".$helados[2]."-".$helados[3]);
			}
		}
		fclose($archivo);
		return $ListaDeVentasLeidos;
    }
    public static function CargaVenta($usuario,$sabor,$tipo,$cantidad){
        $heladosArray = Helado::TraerTodosLosHelados();
        $resultado = false;
        $indice = 0;
        $flag=1;
        foreach ($heladosArray as $key) {
          if($key->sabor == $sabor && $key->tipo == $tipo){
             $resta = (int)$key->cantidad -(int)$cantidad;
             $key->cantidad = (string)$resta;
             $flag=0;
             $resultado = true;
            }
        if($flag == 1){
            $indice++;}
        }

        $archivo = fopen("archivos/Helados.txt","w");
        foreach ($heladosArray as $key ) {
            fwrite($archivo, $key->ToString());
        }
        fclose($archivo);
        $archivo2 = fopen("archivos/Ventas.txt","a");
        $venta = $usuario." - ".$sabor." - ".$tipo." - ".$cantidad."\r\n";
        fwrite($archivo2,$venta);
        fclose($archivo2);
        return $resultado;

    }

    public static function CargarVentaConImagen($usuario,$sabor,$tipo,$cantidad,$foto){
        $heladosArray = Helado::TraerTodosLosHelados();
        $resultado = false;
        $indice = 0;
        $flag=1;
        foreach ($heladosArray as $key) {
          if($key->sabor == $sabor && $key->tipo == $tipo){
             $resta = (int)$key->cantidad -(int)$cantidad;
             $key->cantidad = (string)$resta;
             $flag=0;
            }
        }
        if($flag == 1){

        $archivo = fopen("archivos/Helados.txt","w");
        foreach ($heladosArray as $key ) {
            fwrite($archivo, $key->ToString());
        }
        fclose($archivo);
        
        $destino = "ImagenesDeLaVenta/".$sabor."-".date("d/m/y").".jpg";
        
        $archivo2 = fopen("archivos/Ventas.txt","a");
        $venta = $usuario." - ".$sabor." - ".$tipo." - ".$cantidad." - ".$destino."\r\n";
        fwrite($archivo2,$venta);
        fclose($archivo2);
        
                
        $resultado = move_uploaded_file($foto["tmp_name"],$destino);
        }
        return $resultado;
    }

    public static function ListaVentas($tipo,$datos){
        $miArraydeUsuario=array();
        $miArrayGustos = array();
        $miArrayTotal = array();
        
        $archivo=fopen("archivos/Ventas.txt", "r");
		while(!feof($archivo))
		{
			$archAux = fgets($archivo);
			$helados = explode(" - ", $archAux);
            $helados[0] = trim($helados[0]);
            if($helados[0]==$datos){
                array_push($miArraydeUsuario,$helados);
            }    
            if($helados[1]==$datos){
                array_push($miArrayGustos,$helados);
            }
            array_push($miArrayTotal,$helados);
        }
        if($tipo == "email"){
            return $miArraydeUsuario;
        }
        else if($tipo == "sabor"){
            return $miArrayGustos;
        }
        return $miArrayTotal;
    }
}

?> 
