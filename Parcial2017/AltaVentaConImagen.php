<?php 
include "./Clases/Helado.php";

if(Helado::VentaHeladoConFoto($_POST["usuario"],$_POST["sabor"],$_POST["tipo"],$_POST["cantidad"])){
    echo "vendido";
}
else{
    echo "no se efectuo la venta";
}

?>