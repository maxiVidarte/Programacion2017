<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response; //es inmutable. por mas que lo modifique va a ser el mismo

require '../composer/vendor/autoload.php';
require '/clases/AccesoDatos.php';
require '/clases/cdApi.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

/*

¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/





$app = new \Slim\App(["settings" => $config]);

/* FUNCION MIDDELWARE*/
$VerificadorDeCredenciales = function ($request, $response, $next) {

  if($request->isGet())//quiere decir si el request es get o post, en este caso es get
  {
     $response->getBody()->write('<p>NO necesita credenciales para los get</p>');
     $response = $next($request, $response);//este next hace un callback
  }
  else
  {
    $response->getBody()->write('<p>verifico credenciales</p>');
    $ArrayDeParametros = $request->getParsedBody();
    $nombre=$ArrayDeParametros['nombre'];
    $tipo=$ArrayDeParametros['tipo'];
    if($tipo=="administrador")
    {
      $response->getBody()->write("<h3>Bienvenido $nombre </h3>");
      $response = $next($request, $response);
    }
    else
    {
      $response->getBody()->write('<p>no tenes habilitado el ingreso</p>');
    }  
  }  
  $response->getBody()->write('<p>vuelvo del verificador de credenciales</p>');
  return $response;  
};


/*LLAMADA A METODOS DE INSTANCIA DE UNA CLASE*/
  
$app->post('/chat/', function($request, $response){
  //tomamos un parametro
  $parametros = $request->getParsedBody();
  echo $parametros['mensaje'];
  $ip = $_SERVER["REMOTE_ADDR"];
  echo $ip;
  $miArchivo = fopen("chat.txt","a");
  fwrite($miArchivo,$_SERVER["REMOTE_ADDR"]."\r\t");
});
$app->get('/usuario/',function($request,$response){
   $ip = $_SERVER["REMOTE_ADDR"];
   echo $ip;
   $miArchivo = fopen("ipUsuarios.txt","a");
   fwrite($miArchivo,$_SERVER["REMOTE_ADDR"]."\r\t");
});

$app->group('/cd', function () {
 
  $this->get('/', \cdApi::class . ':traerTodos');
 
  $this->get('/{id}', \cdApi::class . ':traerUno');

  $this->post('/', \cdApi::class . ':CargarUno');

  $this->delete('/', \cdApi::class . ':BorrarUno');

  $this->put('/', \cdApi::class . ':ModificarUno');
  
})->add($VerificadorDeCredenciales);

/* codifgo que se ejecuta antes que los llamados por la ruta*/
$app->add(function ($request, $response, $next) {
  $response->getBody()->write('<p>Antes de ejecutar UNO </p>');
  $response = $next($request, $response);
  //comente el response de arriba para que no traiga los cds
  //$response->getBody()->write("<p>Traer Todos</p>");
  $response->getBody()->write('<p>Despues de ejecutar UNO</p>');

  return $response;
});

$app->add(function ($request, $response, $next) {
  $response->getBody()->write('<p>Antes de ejecutar DOS </p>');
  $response = $next($request, $response);
  $response->getBody()->write('<p>Despues de ejecutar DOS</p>');

  return $response;
});
// despues de esto y llamando a la ruta cd/, el resultaso es este :
/*
Antes de ejecutar Dos ***
Antes de ejecutar UNO ***
TrearTodos
***Despues de ejecutar UNO
***Despues de ejecutar Dos
*/
/*habilito el CORS para todos*/
$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});


$app->run();