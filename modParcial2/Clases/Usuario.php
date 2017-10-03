<?php 
class Usuario  
{
//---------------------//
//------ATRIBUTOS------//
    private $nombre;
    private $email;
    private $perfil;
    private $edad;
    private $clave;

    function __Construct($nombre=null,$email=null,$perfil=null,$edad=null,$clave=null){
        if($nombre !== NULL && $email !== NULL && $perfil!==NULL && $edad!==NULL&& $clave!==NULL){
        $this->nombre = $nombre;
        $this->email = $email;
        $this->perfil = $perfil;
        $this->edad = $edad;
        $this->clave = $clave;
        }
    }
//-----------------------------//
//------GETTERS Y SETTERS------//
public function GetNombre(){
    return $this->nombre;
}
public function GetEmail(){
    return $this->email;
}
public function GetPerfil(){
    return $this->perfil;
}
public function GetEdad()
{
    return $this->edad;
}
public function GetClave()
{
    return $this->clave;
}
public function SetNombre($valor){
    $this->nombre = $valor;
}
public function SetEmail($valor){
    $this->email = $valor;
}
public function SetPerfil($valor){
    $this->perfil = $valor;
}
public function SetEdad($valor)
{
    $this->edad = $valor;
}
public function SetClave($valor)
{
    $this->clave = $valor;
}
//---------------------------//
//------METODO TOSTRING------//
public function ToString(){
    return $this->email." - ".$this->nombre." - ".$this->perfil." - ".$this->edad." - ".$this->clave."\r\n";
}
//--------------------------//
//-----METODOS DE CLASE-----//
public static function Guardar($usuario){
    $resultado = false;
    if(! self::EstaUsuario($usuario)){
    $archivo = fopen("archivos/usuarios.txt","a");
    $cantidad = fwrite($archivo, $usuario->ToString());

    if($cantidad > 0){
        $resultado = true;
    }

    fclose($archivo);
    }
    return $resultado;
}
public static function EstaUsuario($usuario){
            $archivo = fopen("archivos/usuarios.txt","r"); 
            while(!feof($archivo)){
                $archivoAuxiliar = fgets($archivo);
                $usuarios = explode(" - ",$archivoAuxiliar);
                $usuarios[0] = trim($usuarios[0]);
                if($usuarios[0]== $usuario->GetEmail()){
                    return true;
                }
            }
            fclose($archivo);
            return false;
}
public static function Verifica($email,$clave){
            $archivo = fopen("archivos/usuarios.txt","r"); 
            while(!feof($archivo)){
                $archivoAuxiliar = fgets($archivo);
                $usuarios = explode(" - ",$archivoAuxiliar);
                $usuarios[0] = trim($usuarios[0]);
                if($usuarios[0]== $email && $usuarios[4]==$clave){
                    return true;
                }
            }
            fclose($archivo);
            return false;
}



}




?>