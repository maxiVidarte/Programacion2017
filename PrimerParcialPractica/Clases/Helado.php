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
    public static function TraerTodasLasVentas()
	{
		$ListaDeVentasLeidos = array();
		
		$archivo=fopen("archivos/Ventas.txt", "r");
		
		while(!feof($archivo))
		{
			$archAux = fgets($archivo);
			$helados = explode("-", $archAux);
			$helados[0] = trim($helados[0]);
			if($helados[0] != ""){
				$ListaDeVentasLeidos[] = ($helados[0]."-".$helados[1]."-".$helados[2]."-".$helados[3]);
			}
		}
		fclose($archivo);
		return $ListaDeVentasLeidos;
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
        $archivo = fopen("archivos/Helados.txt","a");
        fwrite($archivo,$objeto->ToString());
        fclose($archivo);
        return true;
    }
    public static function VentaCarga($usuario,$sabor,$tipo,$cantidad){
         $miArray= Helado::TraerTodosLosHelados();
         $cambio = false;
         foreach ($miArray as $key ) {
             if($key->sabor == $sabor && $key->tipo == $tipo)
                if($key->cantidad >= $cantidad){
                    $key->cantidad = $key->cantidad -$cantidad;
                    $cambio  = true;
                }
        }      
        var_dump($cambio);
        var_dump($miArray);
        if($cambio){
        $archivo =fopen("archivos/Helados.txt","w");
            foreach ($miArray as $key) {
                var_dump($key->toString());
            }   
            fclose($archivo);
        }
        return true;

     }
}




?>