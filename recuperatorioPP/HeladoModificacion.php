<?php 
include "./Clases/Helado.php";

$saborId = $_POST["saborId"];
$tipoId = $_POST["tipoId"];
$sabor = $_POST["sabor"];
$tipo = $_POST["tipo"];
$cantidad = $_POST["cantidad"];
$precio = $_POST["precio"];
$foto = $_FILES["foto"];

if(Helado::HeladoModificar($saborId,$tipoId,$sabor,$tipo,$precio,$cantidad,$foto)){
    echo "modificado";
}else{
    echo "error";
}

?>