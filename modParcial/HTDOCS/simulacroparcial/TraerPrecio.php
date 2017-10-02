<?php

include_once "./Producto.php";

$nombre = $_GET['nombre'];
$codigoBarra = $_GET['codigoBarra'];

$resultado = Producto::traerPrecio($nombre,$codigoBarra);

if ($resultado == "-1")
{
    echo "Producto no encontrado";
}
else
{
    echo $resultado;
}

?>