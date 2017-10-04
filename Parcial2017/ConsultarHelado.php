<?php 
include "./Clases/Helado.php";

if(Helado::VerificarSaborYTipo($_POST["sabor"],$_POST["tipo"])){
    echo "si hay";
}
else if(!Helado::VerificarSabor($_POST["sabor"]))
{
    echo "no hay sabor";
}
else if(Helado::VerificarTipo($_POST["tipo"])){
    echo "no hay tipo";
}

?>