<?php 
include "./Clases/Helado.php";

$objeto = new Helado($_GET["sabor"],$_GET["precio"],$_GET["tipo"],$_GET["cantidad"]);
if(Helado::Guardar($objeto)){
    echo "ingresado";
}
else{
    echo "Error. verifique";
}

?>