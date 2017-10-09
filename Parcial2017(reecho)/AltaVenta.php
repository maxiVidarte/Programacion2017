<?php 
include "./Clases/Helado.php";

if(Helado::CargaVenta($_POST["usuario"],$_POST["sabor"],$_POST["tipo"],$_POST["cantidad"])){
    echo "datos guardados exitosamente";
}
else{
    echo "error al cargar la venta";
}


?>