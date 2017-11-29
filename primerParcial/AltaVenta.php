<?php 
include "clases/helado.php";

if(Helado::AltaVenta($_POST["usuario"],$_POST["sabor"],$_POST["tipo"],$_POST["cantidad"]))
    echo "venta realizada";
else
    echo "no se puede realizar la venta";

?>