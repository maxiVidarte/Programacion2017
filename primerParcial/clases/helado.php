<?php 
class Helado 
{
    public $sabor;
    public $precio;
    public $tipo;
    public $cantidad;

    function Helado($sabor,$precio,$tipo,$cantidad){
        $this->sabor = $sabor;
        $this->precio = $precio;
        $this->tipo = $tipo;
        $this->cantidad = $cantidad;
    }
    public static function Guardar($objeto){
        $resultado = false;
        if(!Helado::Validar($objeto->sabor,$objeto->tipo)){
        $archivo = fopen("archivos/helados.txt","a");
        $cantidad = fwrite($archivo,$objeto->toString());
        if($cantidad > 0 )
            $resultado = true;
        fclose($archivo);
        }
        return $resultado;
    }
    public static function Validar($sabor,$tipo){
        $resultado = false;
        $archivo = fopen("archivos/helados.txt","r");
        while(!feof($archivo))
		{
			$archAux = fgets($archivo);
            $helados = explode("-", $archAux);
			if($helados[0] == $sabor && $helados[2] == $tipo){
                $resultado = true;
            }
		}
        fclose($archivo);
        return $resultado;
    }
    public static function Verificar($sabor, $tipo){
        $hayTipo = false;
        $haySabor = false;
        $archivo = fopen("archivos/helados.txt","r");
        while(!feof($archivo)){
            $archAux = fgets($archivo);
            $helados = explode("-",$archAux);
            if($helados[0] == $sabor){
                $haySabor = true;
                if($helados[2] == $tipo){
                    $hayTipo = true;
                }
            }   
        }
        if($haySabor){
            if($hayTipo)
                return "Si Hay";
            else
                return "no existe el tipo";
        }else{
            return "no existe el sabor";
        }
    }
    public function toString(){
        return $this->sabor."-".$this->precio."-".$this->tipo."-".(int)$this->cantidad."\n";
    }
    public static function TraerTodosLosHelados()
	{
		$ListaDeHeladosLeidos = array();
		
		$archivo=fopen("archivos/helados.txt", "r");
		
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
    public function AltaVenta($usuario,$sabor,$tipo,$cantidad){
        $resultado = false;
        $misHelados = Helado::TraerTodosLosHelados();
        foreach ($misHelados as $helado) {
            if($helado->sabor == $sabor && $helado->tipo == $tipo){
                if((int)$helado->cantidad >= (int)$cantidad){
                    $helado->cantidad = (string)((int)$helado->cantidad - (int)$cantidad);
                    $resultado = true;
                }  
            }
        }
        $archivo = fopen("archivos/helados.txt","w");
        foreach ($misHelados as $key) {
            if((int)$key->cantidad >0)
                fwrite($archivo,$key->toString());
        }
        fclose($archivo);
        $archivo2 = fopen("archivos/Ventas.txt","a");
        $venta = $usuario."-".$sabor."-".$tipo."-".(int)$cantidad."\n";
        fwrite($archivo2,$venta);
        fclose($archivo2);
        return $resultado;
    }
    public function AltaVentaImagen($usuario,$sabor,$tipo,$cantidad,$imagen){
        $resultado = false;
        $misHelados = Helado::TraerTodosLosHelados();
        foreach ($misHelados as $helado) {
            if($helado->sabor == $sabor && $helado->tipo == $tipo){
                if((int)$helado->cantidad >= (int)$cantidad){
                    $helado->cantidad = (string)((int)$helado->cantidad - (int)$cantidad);
                    $resultado = true;
                }  
            }
        }
        $archivo = fopen("archivos/helados.txt","w");
        foreach ($misHelados as $key) {
            if((int)$key->cantidad >0)
                fwrite($archivo,$key->toString());
        }
        fclose($archivo);
        $archivo2 = fopen("archivos/Ventas.txt","a");
        $venta = $usuario."-".$sabor."-".$tipo."-".(int)$cantidad."\n";
        fwrite($archivo2,$venta);
        fclose($archivo2);
        $destino = "ImagenesDeLaVenta/".$sabor." ".date("d-m-y")."(".date("H-i-s").").jpg";
        if($resultado)
            move_uploaded_file($imagen["tmp_name"],$destino);

        return $resultado;
    }

}



?>