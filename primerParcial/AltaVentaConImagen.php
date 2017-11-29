<?php 
include "clases/helado.php";

if(Helado::AltaVentaImagen($_POST["usuario"],$_POST["sabor"],$_POST["tipo"],$_POST["cantidad"],$_FILES['foto'])){
    echo "venta realizada";
}else{
    echo "no se realizo la venta";
}


?>