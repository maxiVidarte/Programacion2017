<?php 
include "./clases/Producto.php";
$ArrayDeProductos = Producto::TraerTodosLosProductos();
echo "<table class='table'>
		<thead>
			<tr>
				<th>  NOMBRE </th>
				<th>  CODIGO     </th>
				<th>  PRECIO       </th>
			</tr> 
		</thead>";   	
	foreach ($ArrayDeProductos as $prod){
		echo " 	<tr>
					<td>".$prod->GetNombre()."</td>
					<td>".$prod->GetCodigo()."</td>
                    <td>".$prod->GetPrecio()."</td>
				</tr>";
                
	}	
echo "</table>";		
?>