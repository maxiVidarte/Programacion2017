<?php 
include_once "Clases/Helado.php";

$usuario = $_POST["usuario"];
$sabor = $_POST["sabor"];
$tipo = $_POST["tipo"];
$cantidad = $_POST["cantidad"];

if(Helado::VentaCarga($usuario,$sabor,$tipo,$cantidad)){
    echo "cargo";
}
else{
    echo "no cargo";
}

?>