<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once '/composer/vendor/autoload.php';
require_once '/clases/AccesoDatos.php';
require_once '/clases/Empleado.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;


$app = new \Slim\App(["settings" => $config]);

$app->group('/Empleado', function () {
   
    $this->post('/login/', \Empleado::class . ':traerUno');
    /*,function (Request $request, Response $response){
        $ArrayDeParametros = $request->getParsedBody();

        $email = $ArrayDeParametros['email'];
        $clave = $ArrayDeParametros['clave'];

        $miEmpleado =new Empleado();
        $miEmpleado->TraerUnEmpleado($email,$clave);
        return $response;*/
    


    $this->post('/', function (Request $request, Response $response) {
        
          
          $ArrayDeParametros = $request->getParsedBody();
          //var_dump($ArrayDeParametros);
          $nombre= $ArrayDeParametros['nombre'];
          $apellido= $ArrayDeParametros['apellido'];
          $email= $ArrayDeParametros['email'];
          $legajo = $ArrayDeParametros['legajo'];
          $clave = $ArrayDeParametros['clave'];
          $perfil  =$ArrayDeParametros['perfil'];
          $foto  = "/fotos/".$email;


          $miEmpleado = new Empleado();
          $miEmpleado->nombre=$nombre;
          $miEmpleado->apellido=$apellido;
          $miEmpleado->email=$email;
          $miEmpleado->legajo=$legajo;
          $miEmpleado->clave=$clave;
          $miEmpleado->perfil=$perfil;
          $miEmpleado->foto = $foto;
          
          
          $miEmpleado->InsertarElEmpleadoParametros();
      
          $archivos = $request->getUploadedFiles();
          $destino="./fotos/";
          //var_dump($archivos);
          //var_dump($archivos['foto']);
      
          $nombreAnterior=$archivos['foto']->getClientFilename();
          $extension= explode(".", $nombreAnterior)  ;
          //var_dump($nombreAnterior);
          $extension=array_reverse($extension);
          $foto = $destino.$email;

          $archivos['foto']->moveTo($destino.$email.".".$extension[0]);
          $response->getBody()->write("empleado");
      
          return $response;
      
      });

      
           
      });

      $app->run();