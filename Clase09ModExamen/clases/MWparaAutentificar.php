<?php


class MWparaAutentificar
{
	public function VerificarUsuario($request, $response, $next) {
         

		  if($request->isGet())
		  {
		     $response->getBody()->write('<p>NO necesita credenciales para los get </p>');
		     $response = $next($request, $response);
		  }
		  else
		  {

		    $response->getBody()->write('<p>verifico credenciales</p>');
		    $ArrayDeParametros = $request->getParsedBody();
		    $email=$ArrayDeParametros['email'];
            $clave=$ArrayDeParametros['clave'];
            $nombre = $ArrayDeParametros['nombre'];
		    if($clave=="1234")
		    {
		      $response->getBody()->write("<h3>Bienvenido $nombre </h3>");
		      $response = $next($request, $response);
		    }
		    else
		    {
		      $response->getBody()->write('<p>no tenes habilitado el ingreso</p>');
		    }  
		  }
		  $objRespuesta = new stdClass();
		  $objRespuesta->datos="algo";
		  $response->getBody()->write('<p>vuelvo del verificador de credenciales</p>');
		  return $response;   
	}
}