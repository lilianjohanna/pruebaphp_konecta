<?php
include 'datosconexion.php';
$consultarproductos=mysqli_query($conectar,"SELECT id,id_producto,SUM(cantidad_venta),valor_total FROM venta_productos 
GROUP BY id_producto ORDER BY SUM(cantidad_venta) DESC");
$tablaprod="<table border='1' align='center' style='border-collapse:collapse;'>
<tr><td colspan='8' align='center'>PRODUCTOS MÁS VENDIDOS</td></tr>
<tr><td>ID PRODUCTO</td><td>NOMBRE</td><td>UNIDADES VENDIDAS</td><td>VALOR TOTAL</td></tr>";
while($tabla2=mysqli_fetch_array($consultarproductos))
{
	$id=$tabla2['id'];
	$idproducto=$tabla2['id_producto'];
	$cantidadventa=$tabla2['SUM(cantidad_venta)'];
	$valortotal=$tabla2['valor_total'];
	$consultanomproducto=mysqli_query($conectar,"SELECT nombre_producto FROM productos WHERE id='$idproducto'");
	while($campo=mysqli_fetch_array($consultanomproducto))
	{
		$nomproducto2=$campo['nombre_producto'];
	}
	$tablaprod.="<tr><td>".$idproducto."</td><td>".$nomproducto2."</td><td>".$cantidadventa."</td><td>".$valortotal."</td></tr>";
}
echo $tablaprod."</table>
<form action='index.php'>
<p align='center'><input type='submit' name='volver' value='VOLVER'></input></p>
</form>";
?>