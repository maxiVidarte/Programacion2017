<?php

include_once "./Producto.php";

$nombre = $_POST['nombre'];
$codigoBarra = $_POST['codigoBarra'];
$precio = $_POST['precio'];


$producto = new Producto($nombre,$codigoBarra,$precio);





?>