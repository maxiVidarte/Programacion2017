<?php 
 include "./clases/Producto.php";
 include "./clases/Archivo.php";

 Archivo::Subir();
 $producto = new Producto($_POST["nombre"],$_POST["codigo"],$_POST["precio"],$_POST["codigo"]. ".jpg");
 
 $ArrayProductos = Producto::Modificar($producto);
 


?>
