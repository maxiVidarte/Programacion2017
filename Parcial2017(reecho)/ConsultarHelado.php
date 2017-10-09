<?php 
include "./Clases/Helado.php";

if(Helado::HaySaborYTipo($_POST["sabor"],$_POST["tipo"])==1){
    echo "si hay";
}
else if (Helado::HaySaborYTipo($_POST["sabor"],$_POST["tipo"])==2){
    echo "no hay tipo";
}
else{
    echo "no hay nada";
}



?>