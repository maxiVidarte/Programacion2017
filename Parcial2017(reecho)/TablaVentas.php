<?php 
include "./Clases/Helado.php";


$myArray = Helado::ListaVentas($_GET["tipo"],$_GET["datos"]);
echo "<table class='table'>
<thead>
    <tr>
        <th>  usuario      </th>
        <th>  sabor </th>
        <th>  tipo     </th>
        <th>  cantidad       </th>
        <th>  foto     </th>
    </tr> 
</thead>"; 
foreach ($myArray as $key) {
    echo " 	<tr>
    <td>".$key[0]."</td>
    <td>".$key[1]."</td>
    <td>".$key[2]."</td>
    <td>".$key[3]."</td>
    <td><img src='".$key[4]."' width='100px' height='100px'/></td>
</tr>";
}	



?>