<?php
    require "clases/Producto.php";

    $producto = new Producto($_POST["nombre"],$_POST["precio"],$_POST["codigo"]);
    $array = Producto::TraerTodosLosProductos();
    $i = 0;
    $existeProducto = 0;

    foreach ($array as $key) {
        if($_POST["nombre"]==$key->GetNombre()||
            $_POST["codigo"]==$key->GetCodigo()){
                $existeProducto = 1;
                break;
            }
            $i++;
    }
    if($existeProducto == 1){
       echo "Producto Cargado";
        // echo '<script type="text/javascript">alert("Ese producto ya esta ingresado")</script>';
      //  echo '<meta http-equiv="refresh" content="0; url='.METER LA DIRECCION.'"/>';
    }
    else 
    {
        if(!file_exists("archivos/productos.txt"))
        {
          //  echo'<script type="text/javascript">alert('.$producto.')</script>';
            $archivo= fopen("archivos/productos.txt","w");
            fwrite($archivo, $producto->ToString());
            //echo '<meta http-equiv="refresh" content="0; url='.METER LA DIRECCION.'" />';
        }
        else 
        {
            $archivo= fopen("archivos/productos.txt","a");
            fwrite($archivo, $producto->ToString()."\n");
            //echo '<meta http-equiv="refresh" content="0; url='.METER LA DIRECCION.'" />';
        }
        fclose($archivo);
    }

?>