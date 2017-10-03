<?php
    require "clases/Producto.php";

    $producto = new Producto($_POST["nombre"],$_POST["codigo"],$_POST["precio"]);
    $array = Producto::Guardar($producto);

?>