<?php 
include "./clases/Producto.php";
$myArray = Producto::TraerTodasLasImagenesGet($_GET["tipo"]);
if($myArray != false){
echo "<table class='table'>
<thead>
    <tr>
        <th>  FOTO           </th>
    </tr> 
</thead>";   	
foreach ($myArray as $prod){
    if($_GET["tipo"] =="vigente"){
        echo " 	<tr>
            <td><img src='./FotosProductos/".$prod."' width='100px' height='100px'/></td>
            </tr>";
        }
        else if ($_GET["tipo"]=="borrado"){
            echo " 	<tr>
            <td><img src='./FotosBorrados/".$prod."' width='100px' height='100px'/></td>
            </tr>";
        }
}	
echo "</table>";
}
else{
    echo "error";
}
?>
