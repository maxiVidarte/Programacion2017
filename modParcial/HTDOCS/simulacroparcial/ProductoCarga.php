<?php
include_once "./Producto.php";

$nombre = $_GET['nombre'];
$codigoBarra = $_GET['codigoBarra'];
$precio = $_GET['precio'];

$producto = new Producto($nombre, $codigoBarra, $precio);

$producto->guardar();

//var_dump($_GET);
//var_dump($producto);






?>