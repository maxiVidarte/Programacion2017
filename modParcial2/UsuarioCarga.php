<?php 
include "./Clases/Usuario.php";
$miUsuarioNuevo = new Usuario($_GET["email"],$_GET["nombre"],$_GET["perfil"],$_GET["edad"],$_GET["clave"]);
if(Usuario::Guardar($miUsuarioNuevo)){
    echo "se ingreso correctamente";
}
else
{
    echo "error al ingresar";
}


?>