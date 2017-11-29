<?php 
 include "clases/helado.php";

 $miHelado = new Helado($_GET["sabor"],$_GET["precio"],$_GET["tipo"],$_GET["cantidad"]);

 if(Helado::Guardar($miHelado)){
     echo "guardo";
 }
 else{
     echo "no guardo";
 }




?>