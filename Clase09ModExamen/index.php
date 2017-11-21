<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './clases/AutentificadorJWT.php';
require_once './composer/vendor/autoload.php';
require_once './clases/AccesoDatos.php';
require_once './clases/Empleado.php';
require_once './clases/Producto.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;


$app = new \Slim\App(["settings" => $config]);

$app->group('/Producto',function(){
    $this->post('/',function(Request $request,Response $response){
        $ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);
        $nombre= $ArrayDeParametros['nombre'];
        $precio= $ArrayDeParametros['precio'];
        $stock= $ArrayDeParametros['stock'];


        $miProducto = new Producto();
        $miProducto->nombre=$nombre;
        $miProducto->precio=$precio;
        $miProducto->stock=$stock;

        $miProducto->InsertarElProductoParametros();
        $response->getBody()->write("se agrego el producto");
        
        return $response;
    });
});

$app->group('/Empleado', function () {
   
    
    $this->get('/', \Empleado::class. ':TraerTodos');

    $this->post('/login/', \Empleado::class . ':traerUno');
   
    $this->post('/', function (Request $request, Response $response) {
        
          
          $ArrayDeParametros = $request->getParsedBody();
          //var_dump($ArrayDeParametros);
          $nombre= $ArrayDeParametros['nombre'];
          $apellido= $ArrayDeParametros['apellido'];
          $email= $ArrayDeParametros['email'];
          $legajo = $ArrayDeParametros['legajo'];
          $clave = $ArrayDeParametros['clave'];
          $perfil  =$ArrayDeParametros['perfil'];
          $foto  = "/fotos/".$email.".jpg";


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
              
          $nombreAnterior=$archivos['foto']->getClientFilename();
          $extension= explode(".", $nombreAnterior)  ;
          
          $extension=array_reverse($extension);
          $foto = $destino.$email;

          $archivos['foto']->moveTo($destino.$email.".jpg");
          $response->getBody()->write("se agrego empleado");
      
          return $response;
      
      });

      
           
      });

      $app->run();