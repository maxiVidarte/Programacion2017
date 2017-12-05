<?php 
class Helado{

    public $sabor;
    public $precio;
    public $tipo;
    public $cantidad;
    public $path;

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
    
    
    //CONSULTA SI HAY HELADO CON SABOR Y TIPO.
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
    //SOLAMENTE CONSULTA SI HAY SABOR
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
    //GUARDA UN HELADO
    public static function Guardar($objeto){
        $archivo = fopen("archivos/Helados.txt","a");
        fwrite($archivo,$objeto->ToString());
        fclose($archivo);
        return true;
    }
    //CARGA TODOS LOS HELADOS Y CREA UN ARRAY DEL CUAL RETORNA
    public static function TraerTodosLosHelados()
	{
		$ListaDeHeladosLeidos = array();
		
		$archivo=fopen("archivos/Helados.txt", "r");
		
		while(!feof($archivo))
		{
			$archAux = fgets($archivo);
			$helados = explode("-", $archAux);
			$helados[0] = trim($helados[0]);
			if($helados[0] != ""){
				$ListaDeHeladosLeidos[] = new Helado($helados[0], $helados[1],$helados[2],$helados[3]);
			}
		}
		fclose($archivo);
		return $ListaDeHeladosLeidos;
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
        }
        if($flag==0){
        $archivo = fopen("archivos/Helados.txt","w");
        foreach ($heladosArray as $key ) {
            fwrite($archivo, $key->ToString());
        }
        fclose($archivo);
        $archivo2 = fopen("archivos/Ventas.txt","a");
        $venta = $usuario."-".$sabor."-".$tipo."-".$cantidad."\n";
        fwrite($archivo2,$venta);
        fclose($archivo2);
        }
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
        if($flag == 0){
           
        $archivo = fopen("archivos/Helados.txt","w");
        foreach ($heladosArray as $key ) {
            fwrite($archivo, $key->ToString());
            }
        fclose($archivo);
        
        $destino = "./ImagenesDeLaVenta/".$sabor.".".date("d.m.y").".jpg";
        
        $archivo2 = fopen("archivos/Ventas.txt","a");
        $venta = $usuario."-".$sabor."-".$tipo."-".$cantidad."-".$destino."\n";
        fwrite($archivo2,$venta);
        fclose($archivo2);
        $resultado = move_uploaded_file($foto["tmp_name"],$destino);
        }   
        return $resultado;
        
        }
        //listado de todads las ventas o segun gusto o usuario
        public static function ListaVentas($tipo,$datos){
            $miArraydeUsuario=array();
            $miArrayGustos = array();
            $miArrayTotal = array();
            
            $archivo=fopen("archivos/Ventas.txt", "r");
            while(!feof($archivo))
            {
                $archAux = fgets($archivo);
                $helados = explode("-", $archAux);
                if($tipo == "email"){
                    if($helados[0]==$datos){
                        array_push($miArraydeUsuario,$helados);
                     
                    }
                }else if($tipo == "sabor"){
                    if($helados[1]==$datos){
                        array_push($miArrayGustos,$helados);
                    }
                }
                else{
                    array_push($miArrayTotal,$helados);
                }
            }
            if($tipo == "email"){
                return $miArraydeUsuario;
            }
            else if($tipo == "sabor"){
                return $miArrayGustos;
            }
            return $miArrayTotal;
        }

        public static function HeladoModificar($saborId,$tipoId,$sabor,$tipo,$precio,$cantidad,$foto){
            $heladosArray = Helado::TraerTodosLosHelados();
            $resultado = false;
            foreach ($heladosArray as $key) {
                if($key->sabor == $saborId && $key->tipo == $tipoId){
                    $key->sabor = $sabor;
                    $key->tipo = $tipo;
                    $key->cantidad = $cantidad;
                    $key->precio = $precio;
                    $key->path= "./ImagenesDeLaVenta/".$key->sabor.".".date("d.m.y").".jpg";                   
                    move_uploaded_file($foto["tmp_name"],$key->path);
                    $resultado = true;
                    }
                }
                $archivo = fopen("archivos/Helados.txt","w");
                foreach ($heladosArray as $key ) {
                    fwrite($archivo, $key->ToString());
                    }
                fclose($archivo);
            return $resultado;
                

        }


}




?>