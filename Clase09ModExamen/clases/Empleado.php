<?php
class Empleado
{
	public $id;
 	public $nombre;
  	public $apellido;
	public $email;
	public $foto;
	public $legajo;
	public $clave;
	public $perfil;
	  


/* inicio  especiales para slimFramework*/

 	public function TraerUno($request, $response, $args) {
		$ArrayDeParametros = $request->getParsedBody();
		$email=$ArrayDeParametros['email'];
		$clave= $ArrayDeParametros['clave'];
    	$elEmpleado=Empleado::TraerUnEmpleado($email,$clave);
     	$newResponse = $response->withJson($elEmpleado, 200);  
    	return $newResponse;
    }
     public function TraerTodos($request, $response, $args) {
      	$todosLosEmpleados=Empleados::TraerTodoLosEmpleados();
     	$newResponse = $response->withJson($todosLosEmpleados, 200);  
    	return $newResponse;
    }
      public function CargarUno($request, $response, $args) {
     	$response->getBody()->write("<h1>Cargar uno nuevo</h1>");
      	return $response;
    }
	 public function InsertarElEmpleado()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into empleado (nombre,apellido,mail,foto,legajo,clave,perfil)values('$this->nombre','$this->apellido','$this->mail','$this->foto','$this->legajo','$this->clave','$this->perfil')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				

	 }

	 public function InsertarElEmpleadoParametros()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into empleado (nombre,apellido,email,foto,legajo,clave,perfil)values(:nombre,:apellido,:email,:foto,:legajo,:clave,:perfil)");
				$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
				$consulta->bindValue(':email', $this->email, PDO::PARAM_STR);
				$consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
				$consulta->bindValue(':legajo', $this->legajo, PDO::PARAM_INT);
				$consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
				$consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	 public function GuardarEmpleado()
	 {

	 	if($this->id>0)
	 		{
	 			$this->ModificarEmpleadoParametros();
	 		}else {
	 			$this->InsertarElEmpleadoParametros();
	 		}

	 }


  	public static function TraerTodoLosEmpleados()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,titel as titulo, interpret as cantante,jahr as año from cds");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "cd");		
	}

	public static function TraerUnEmpleado($email,$clave) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select nombre,apellido from empleado where email = '$email' AND clave = '$clave' ");
			$consulta->execute();
			$EmpleadoBuscado= $consulta->fetchObject('empleado');
			return $EmpleadoBuscado;			

			
	}

	

	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->titulo."  ".$this->cantante."  ".$this->año;
	}

}