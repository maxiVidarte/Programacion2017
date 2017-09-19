<?php
//Ejercicio02
/*Obtenga la fecha actual del servidor (función date ) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple.*/
$fecha = date("d/m/y");
$dia = date("d");
$mes = date("m");
switch($mes)
{
    case 12 or 01 or 02: 
                echo "es verano";
                break;

}
var_dump($dia);
?>