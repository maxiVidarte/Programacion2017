<?php 
include "./Clases/Helado.php";
$helado = new Helado($_GET["sabor"],$_GET["precio"],$_GET["tipo"],$_GET["cantidad"]);

Helado::Guardar($helado);


?>