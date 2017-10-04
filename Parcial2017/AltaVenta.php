<?php 
/*3- (2 pts.) AltaVenta.php: (por POST) se recibe el email del usuario, el sabor, tipo y cantidad, si el helado existe en
Helados.txt, y hay stock guardar en el archivo de texto Venta.txt todos los datos y descontar la cantidad vendida.*/
include "./Clases/Helado.php";
if(Helado::VentaHelado($_POST["usuario"],$_POST["sabor"],$_POST["tipo"],$_POST["cantidad"])){
    echo "vendido";
}
else{
    echo "no se efectuo la venta";
}


?>