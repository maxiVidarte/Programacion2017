<?php 
include "clases/helado.php";

echo Helado::Verificar($_POST["sabor"],$_POST["tipo"]);


?>