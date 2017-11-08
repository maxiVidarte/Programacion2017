<?php
require_once 'usuario.php';
require_once 'IApiUsable.php';

class usuarioApi extends usuario implements IApiUsable
{
    public function TraerUno($request, $response, $args) {
        $id=$args['id'];
       $elUsuario=usuario::TraerUnUsuario($id);
       if(!$elUsuario)
       {
           $objDelaRespuesta= new stdclass();
           $objDelaRespuesta->error="No esta El USUARIO";
           $NuevaRespuesta = $response->withJson($objDelaRespuesta, 500); 
       }else
       {
           $NuevaRespuesta = $response->withJson($elUsuario, 200); 
       }     
       return $NuevaRespuesta;
   }

   public function TraerTodos($request, $response, $args) {
        $todosLosUsuarios=usuarios::TraerTodoLosUsuarios();
        $newresponse = $response->withJson($todosLosUsuarios, 200);  
        return $newresponse;
    }

    public function CargarUno($request, $response, $args) {
        
       $objDelaRespuesta= new stdclass();
       
       $ArrayDeParametros = $request->getParsedBody();
       //var_dump($ArrayDeParametros);
       $usuario= $ArrayDeParametros['usuario'];
       $clave= $ArrayDeParametros['clave'];
       $perfil= $ArrayDeParametros['pefil'];
       
       $miUsuario = new usuario();
       $miUsuario->usuario=$usuario;
       $miUsuario->clave=$clave;
       $miUsuario->perfil=$perfil;
       $miUsuario->InsertarElUsuarioParametros();
       $archivos = $request->getUploadedFiles();
       $destino="./fotos/";
       //var_dump($archivos);
       //var_dump($archivos['foto']);
       if(isset($archivos['foto']))
       {
           $nombreAnterior=$archivos['foto']->getClientFilename();
           $extension= explode(".", $nombreAnterior)  ;
           //var_dump($nombreAnterior);
           $extension=array_reverse($extension);
           $archivos['foto']->moveTo($destino.$titulo.".".$extension[0]);
       }       
       //$response->getBody()->write("se guardo el cd");
       $objDelaRespuesta->respuesta="Se guardo el USUARIO.";   
       return $response->withJson($objDelaRespuesta, 200);
   }
   public function BorrarUno($request, $response, $args) {
    $ArrayDeParametros = $request->getParsedBody();
    $id=$ArrayDeParametros['id'];
    $Usuario= new usuario();
    $Usuario->id=$id;
    $cantidadDeBorrados=$Usuario->BorrarUsuario();

    $objDelaRespuesta= new stdclass();
   $objDelaRespuesta->cantidad=$cantidadDeBorrados;
   if($cantidadDeBorrados>0)
       {
            $objDelaRespuesta->resultado="algo borro!!!";
       }
       else
       {
           $objDelaRespuesta->resultado="no Borro nada!!!";
       }
   $newResponse = $response->withJson($objDelaRespuesta, 200);  
     return $newResponse;
}
public function ModificarUno($request, $response, $args) {
    //$response->getBody()->write("<h1>Modificar  uno</h1>");
    $ArrayDeParametros = $request->getParsedBody();
   //var_dump($ArrayDeParametros);    	
   $miUsuario = new usuario();
   $miUsuario->id=$ArrayDeParametros['id'];
   $miUsuario->titulo=$ArrayDeParametros['usuario'];
   $miUsuario->cantante=$ArrayDeParametros['clave'];
   $miUsuario->año=$ArrayDeParametros['perfil'];

      $resultado =$miUsuario->ModificarUsuarioParametros();
      $objDelaRespuesta= new stdclass();
   //var_dump($resultado);
   $objDelaRespuesta->resultado=$resultado;
   $objDelaRespuesta->tarea="modificar";
   return $response->withJson($objDelaRespuesta, 200);		
}


}