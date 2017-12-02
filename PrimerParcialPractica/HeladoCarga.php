<?php 
include "Clases/Helado.php";

$sabor = $_GET["sabor"];
$tipo  = $_GET["tipo"];
$cantidad = $_GET["cantidad"];
$precio = $_GET["precio"];
if($sabor != null && $precio != null && $tipo != null && $cantidad != null){
    $objetoNuevo = new Helado($sabor,$precio,$tipo,$cantidad);
    if(Helado::Guardar($objetoNuevo)){
        echo "se guardo el helado";
    }else{
        echo "no se guardo el helado"; 
    }
}
else{
    echo "faltan datos";
}

?>