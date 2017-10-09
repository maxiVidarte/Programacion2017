<?php 
include "./Clases/Helado.php";
if(Helado::CargarVentaConImagen($_POST["usuario"],$_POST["sabor"],$_POST["tipo"],$_POST["cantidad"],$_FILES["foto"])){
echo "archivos cargados con exito";
}
else{
    echo "error al cargar los archivos, verifique";
}



?>