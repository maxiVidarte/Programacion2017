<?php 
include "./clases/Producto.php";
$ArrayDeProductos = Producto::TraerTodosLosProductosGet($_GET["nombre"]);
echo "<table class='table'>
		<thead>
			<tr>
				<th>  NOMBRE </th>
				<th>  CODIGO     </th>
                <th>  PRECIO       </th>
                <th>  FOTO           </th>
			</tr> 
		</thead>";   	
	foreach ($ArrayDeProductos as $prod){
		echo " 	<tr>
					<td>".$prod->GetNombre()."</td>
					<td>".$prod->GetCodigo()."</td>
                    <td>".$prod->GetPrecio()."</td>
                    <td><img src='./FotosProductos/".$prod->GetPathFoto()."' width='100px' height='100px'/></td>
                    </tr>";
	}	
echo "</table>";
?>