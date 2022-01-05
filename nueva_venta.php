<?php
include 'datosconexion.php';
$traeproductos=mysqli_query($conectar,"SELECT id,nombre_producto,precio FROM productos");
$selectivo="";
while($fila=mysqli_fetch_array($traeproductos))
{
	$selectivo.="<option>".$fila['id']."-".$fila['nombre_producto']."-".$fila['precio']."</option>";	
}
//////////////////////////
$producto=$_GET['producto'];
$cantidadprod=$_GET['cantidad'];
if(empty($producto) || empty($cantidadprod))
{
	echo "<p align='center'><font color='red'><b>Error: No se pueden dejar campos en blanco</b></font></p>";
}
else
{
	$consultastockproducto=mysqli_query($conectar,"SELECT stock,precio FROM productos WHERE id='$producto'");
	while($fila2=mysqli_fetch_array($consultastockproducto))
	{
		$stockprod=$fila2['stock'];
		$precioproducto=$fila2['precio'];
	}
	////////////////////////////////////////////////////
	if(($cantidadprod>$stockprod) || $stockprod==0)
	{
		echo "<p align='center'><font color='red'><b>Error: No se puede realizar esta venta porque el producto no cuenta con unidades disponibles 
		o la cantidad ingresada es mayor al stock disponible del producto</b></font></p>";
	}
	else
	{
		$valortotal=$cantidadprod*$precioproducto;
		$guardaventa=mysqli_query($conectar,"INSERT INTO venta_productos(id_producto,cantidad_venta,valor_total) VALUES('$producto','$cantidadprod',
		'$valortotal')");
		$nuevostock=$stockprod-$cantidadprod;
		$actualizastockproducto=mysqli_query($conectar,"UPDATE productos SET stock='$nuevostock' WHERE id='$producto'");
		echo "<p align='center'><font color='green'><b>Venta realizada correctamente</b></font></p>";
	}
	////////////////////////////////////////////////////
}
//////////////////////////
$formularioventa="</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
<form action='#'>
<table border='1' style='border-collapse:collapse;' align='center'>
<tr><td align='center' colspan='2'>VENTA DE PRODUCTO</td></tr>
<tr><td>Producto:</td><td><select name='producto'>
<option></option>".$selectivo."</select></td></tr>
<tr><td>Cantidad:</td><td><input type='number' name='cantidad'></input></td></tr>
</table>
<p align='center'><input type='submit' name='guardar' value='GUARDAR'></input></p>
</form>
<form action='index.php'>
<p align='center'><input type='submit' name='volver' value='VOLVER'></input></p>
</form>
";
echo $formularioventa;
?>