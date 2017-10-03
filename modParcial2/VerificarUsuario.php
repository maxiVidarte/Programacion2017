<?php 
include "./Clases/Usuario.php";

if(Usuario::Verifica($_POST["email"],$_POST["clave"])){
    echo "bienvenido";
}
else{
    echo "ingrese el usuario o contraseña correcta";
}
?>