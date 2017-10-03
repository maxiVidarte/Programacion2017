<?php 
include "./clases/Producto.php";

Producto::CargarVenta($_GET["codigo"],$_GET["nombre"]);


?>