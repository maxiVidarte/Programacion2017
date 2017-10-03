<?php
     require_once "clases/Producto.php";
     $arrayArchivo = Producto::TraerTodosLosProductos();
     var_dump($arrayArchivo);
     $existeProducto = 0;
     foreach ($arrayArchivo as $key ) {
         if($_POST["codigo"] == $key->GetCodigo() &&
             $_POST["nombre"] == $key->GetNombre())
         {
            echo "EL precio es: ".$key->GetPrecio();
            $existeProducto=1;
        }   
     }
     if($existeProducto == 0){
         echo "Error el producto no existe";
     }
?>