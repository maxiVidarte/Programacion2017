<?php 
include "Clases/Helado.php";

$sabor = $_POST["sabor"];
$tipo = $_POST["tipo"];

if(!Helado::HaySabor($sabor)){
    echo "no hay sabor";
}
elseif (Helado::HeladoEsta($sabor,$tipo)) {
    echo "si hay";
}else{
    echo "no hay tipo";
}
?>