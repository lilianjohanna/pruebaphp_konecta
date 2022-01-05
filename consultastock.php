<?php
include 'datosconexion.php';
$consultarproductos=mysqli_query($conectar,"SELECT id,nombre_producto,referencia,precio,peso,categoria,stock,fecha_creacion FROM productos 
ORDER BY stock DESC");
$tablaprod="<table border='1' align='center' style='border-collapse:collapse;'>
<tr><td colspan='8' align='center'>PRODUCTOS</td></tr>
<tr><td>ID</td><td>NOMBRE</td><td>REFERENCIA</td><td>PRECIO</td><td>PESO</td><td>CATEGORÍA</td><td>STOCK</td><td>FECHA CREACIÓN</td></tr>";
while($tabla=mysqli_fetch_array($consultarproductos))
{
	$tablaprod.="<tr><td>".$tabla['id']."</td><td>".$tabla['nombre_producto']."</td><td>".$tabla['referencia']."</td><td>".$tabla['precio']."</td>
	<td>".$tabla['peso']."</td><td>".$tabla['categoria']."</td><td>".$tabla['stock']."</td><td>".$tabla['fecha_creacion']."</td></tr>";
}
echo $tablaprod."</table>
<form action='index.php'>
<p align='center'><input type='submit' name='volver' value='VOLVER'></input></p>
</form>";
?>