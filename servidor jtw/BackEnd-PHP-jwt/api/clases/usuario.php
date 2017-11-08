<?php
class usuario
{
	public $user;
	public $pass;
	public $perfil;

	 public static function esValido($usuario, $clave) {
      

       if($usuario=="admin@admin.com" && $clave=="1234")
       {
         return true;
       }
       else
       {
          return false;

       }
      
	}
	public function BorrarUsuario()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		   $consulta =$objetoAccesoDato->RetornarConsulta("
			   delete 
			   from usuarios 				
			   WHERE id=:id");	
			   $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
			   $consulta->execute();
			   return $consulta->rowCount();
	}
	public static function BorrarUsuarioPorNombre($nombre)
	{

		   $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		   $consulta =$objetoAccesoDato->RetornarConsulta("
			   delete 
			   from usuarios 				
			   WHERE usuario=:usuario");	
			   $consulta->bindValue(':usuario',$nombre, PDO::PARAM_STR);		
			   $consulta->execute();
			   return $consulta->rowCount();

	}
	public function InsertarElUsuario()
	{
			   $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			   $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuarios (usuario,clave,perfil)values('$this->user','$this->pass','$this->perfil')");
			   $consulta->execute();
			   return $objetoAccesoDato->RetornarUltimoIdInsertado();
			   

	}
	public function ModificarUsuarioParametros()
	{
		   $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		   $consulta =$objetoAccesoDato->RetornarConsulta("
			   update usuarios 
			   set usuario=:usuario,
			   clave=:clave,
			   perfil=:perfil
			   WHERE id=:id");
		   $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
		   $consulta->bindValue(':usuario',$this->user, PDO::PARAM_STR);
		   $consulta->bindValue(':clave', $this->pass, PDO::PARAM_STR);
		   $consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_STR);
		   return $consulta->execute();
	}
	public function InsertarElUsuarioParametros()
	{
			   $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			   $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuarios (usuario,clave,perfil)values(:usuario,:clave,:perfil)");
			   $consulta->bindValue(':usuario',$this->user, PDO::PARAM_STR);
			   $consulta->bindValue(':clave', $this->pass, PDO::PARAM_STR);
			   $consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_STR);
			   $consulta->execute();		
			   return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}
	
	public function GuardarUsuario()
	{

		if($this->id>0)
			{
				$this->ModificarUsuarioParametros();
			}else {
				$this->InsertarElUsuarioParametros();
			}

	}
	public static function TraerTodoLosUsuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,usuario as user, clave as pass, perfil as perfil from usuarios");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "usuarios");		
	}

	public static function TraerUnUsuario($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, usuario as user, clave as pass, perfil as perfil from cds where id = $id");
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('usuarios');
			return $cdBuscado;				

			
	}
	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->user."  ".$this->pass."  ".$this->perfil;
	}

    public static function TraerTodos() {
      
	    $uno= new stdClass();
	    $uno->nombre="jose";
	    $uno->apellido="perez";
	    $dos= new stdClass();
	    $dos->nombre="maria";
	    $dos->apellido="sosa";
	    $tres= new stdClass();
	    $tres->nombre="pablo";
	    $tres->apellido="agua";

	    $retorno=array($uno,$dos,$tres);

     	return $retorno;
      
    }

}