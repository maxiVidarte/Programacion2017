<?php
//Ejercicio 01
/*Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron.*/
$j = 0;
$count=0;
for ($i=1; $j<1000; $i++) {
   $j+=$i;
   $count++;
   if($j>1000)
   {  
       $count--;
       $j-=$i;
       break;
   }
   echo $i."<br>";
}
 echo "el resultado es: ".$j."<br>";
 echo "se sumaron: ".$count." numeros";

?>