<?php

class Helado
{
//---------------------//
//------ATRIBUTOS------//
    private $sabor;
    private $precio;
    private $tipo;
    private $cantidad;

    function __construct($sabor=NULL, $precio=NULL,$tipo=NULL,$cantidad=NULL){
        if($sabor !== NULL && $precio !== NULL && $tipo!==NULL && $cantidad!==NULL){
         $this->sabor = $sabor;
         $this->precio = $precio;
         $this->tipo = $tipo;
         $this->cantidad = $cantidad;
        }
     }
//-----------------------------//
//------GETTERS Y SETTERS------//
public function GetSabor(){
    return $this->sabor;
}
public function GetTipo(){
    return $this->tipo;
}
public function GetPrecio(){
    return $this->precio;
}
public function GetCantidad()
{
    return $this->cantidad;
}
public function SetSabor($valor){
    $this->sabor = $valor;
}
public function SetTipo($valor){
    $this->tipo = $valor;
}
public function SetPrecio($valor){
    $this->precio = $valor;
}
public function SetCantidad($valor)
{
    $this->cantida = $valor;
}
//---------------------------//
//------METODO TOSTRING------//
public function ToString(){
    return $this->sabor." - ".$this->precio." - ".$this->tipo." - ".$this->cantidad."\r\n";
}
//---------------------------//
//------METODO DE CLASE------//
public static function Guardar($helado){
    $resultado = false;
    if(self::ValidaTipo($helado->GetTipo())){
        if(!self::HeladoEsta($helado->GetSabor(),$helado->GetTipo())){
        $archivo = fopen("archivos/Helados.txt","a");

        $cantidad = fwrite($archivo, $helado->ToString());

        if($cantidad > 0){
            $resultado = true;
        }   

        fclose($archivo);
    }
}
        return $resultado;
}
public static function TraerHelados(){
    $listadoDeProductos = array();
    
            $archivo = fopen("archivos/Helados.txt","r"); 
            while(!feof($archivo)){
                $archivoAuxiliar = fgets($archivo);
                $helados = explode(" - ",$archivoAuxiliar);
                $helados[0] = trim($helados[0]);
                if($helados[0]!= ""){
                    $listadoDehelados[] = new Helado($helados[0],$helados[1],$helados[2],$helados[3]);
                }
            }
            fclose($archivo);
            return $listadoDehelados;
}
public static function ValidaTipo($tipo){
    if($tipo =="crema" || $tipo == "agua"){
        return true;
    }
    else{
        return false;
    }
}
public static function VerificarSabor($sab){
    $archivo = fopen("archivos/Helados.txt","r"); 
    while(!feof($archivo)){
        $archivoAuxiliar = fgets($archivo);
        $helados = explode(" - ",$archivoAuxiliar);
        $helados[0] = trim($helados[0]);
        if($helados[0]== $sab){
        return true;
        }
    }
    fclose($archivo);
    return false;
}
public static function Verificartipo($tipo){
    $archivo = fopen("archivos/Helados.txt","r"); 
    while(!feof($archivo)){
        $archivoAuxiliar = fgets($archivo);
        $helados = explode(" - ",$archivoAuxiliar);
        $helados[0] = trim($helados[0]);
        if($helados[2]==$tipo){
        return true;
        }
    }
    fclose($archivo);
    return false;
}
public static function VerificarSaborYTipo($sab,$tipo){
    $archivo = fopen("archivos/Helados.txt","r"); 
    while(!feof($archivo)){
        $archivoAuxiliar = fgets($archivo);
        $helados = explode(" - ",$archivoAuxiliar);
        $helados[0] = trim($helados[0]);
        if($helados[0]==$sab && $helados[2]==$tipo){
        return true;
        }
    }
    fclose($archivo);
    return false;
}
public static function HeladoEsta($sab,$tipo){
    $archivo = fopen("archivos/Helados.txt","r"); 
    while(!feof($archivo)){
        $archivoAuxiliar = fgets($archivo);
        $helados = explode(" - ",$archivoAuxiliar);
        $helados[0] = trim($helados[0]);
        if($helados[0]== $sab && $helados[2]==$tipo){
        return true;
        }
    }
    fclose($archivo);
    return false;
}
public static function VentaHelado($usuario,$sabor,$tipo,$cantidad){
    $respuesta = false;
    $misHelados = Helado::TraerHelados();
    $nuevaCantidad;
    $index= 0;
    foreach ($misHelados as $key) {
        if($key->GetSabor()==$sabor && $key->GetTipo() == $tipo){
            if($key->GetCantidad()>=$cantidad){
                $nuevaCantidad= $key->GetCantidad()-$cantidad;
                $key->SetCantidad($nuevaCantidad);
                $archivo = fopen("archivos/Ventas.txt","a");
                $micantidad = fwrite($archivo, $usuario." - ".$sabor." - ".$tipo." - ".$cantidad."\r\n");
                    if($micantidad > 0){
                        $resultado = true;
                    }   
                fclose($archivo);
                $respuesta = true;
                break;
            }
        }
    }
    return $respuesta;
}
public static function VentaHeladoConFoto($usuario, $sabor, $tipo, $cantidad){
    $respuesta = false;
    $misHelados = Helado::TraerHelados();
    $nuevaCantidad;
    foreach ($misHelados as $key) {
        if($key->GetSabor()==$sabor && $key->GetTipo() == $tipo){
            if($key->GetCantidad()>=$cantidad){
                $nuevaCantidad= $key->GetCantidad()-$cantidad;
                $key->SetCantidad($nuevaCantidad);
                $archivo = fopen("archivos/Ventas.txt","a");
                $micantidad = fwrite($archivo, $usuario." - ".$sabor." - ".$tipo." - ".$cantidad."\r\n");
                    if($micantidad > 0){
                        $resultado = true;
                    }   
                fclose($archivo);
                $archivoTmp = date("y-m-d")." - ".$_POST["sabor"]. ".jpg";
                $destino = "ImagenesDeLaVenta/" . $archivoTmp;
                
                $tipoArchivo = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
                if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $destino)) 
                echo "Ocurrio un error al subir el archivo. No pudo guardarse.";
                else
                echo "exitosamente se guardo la foto";
                $respuesta=true;
            }
        }
    }
    return $respuesta;
}

}