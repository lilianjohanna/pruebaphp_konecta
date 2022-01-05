<?php
include 'datosconexion.php';
$nomproducto=$_GET['nomproducto'];
$referencia=$_GET['referencia'];
$precio=$_GET['precio'];
$peso=$_GET['peso'];
$categoria=$_GET['categoria'];
$stock=$_GET['stock'];
date_default_timezone_set('America/Bogota');
$fechacreacion=date('Y-m-d');
if(empty($nomproducto) || empty($referencia) || empty($precio) || empty($peso) || empty($categoria) || empty($stock))
{
	echo "<p align='center'><font color='red'><b>Error: No se pueden dejar campos en blanco</b></font></p>";
}
else
{
	$guardaproducto=mysqli_query($conectar,"INSERT INTO productos(nombre_producto,referencia,precio,peso,categoria,stock,fecha_creacion) 
	VALUES('$nomproducto','$referencia','$precio','$peso','$categoria','$stock','$fechacreacion')");
	echo "<p align='center'><font color='green'><b>Producto guardado correctamente</b></font></p>";
}	
$formulario="</br>
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
<tr><td align='center' colspan='2'>CREAR PRODUCTO</td></tr>
<tr><td>Nombre del producto:</td><td><input type='text' name='nomproducto'></input></td></tr>
<tr><td>Referencia:</td><td><input type='text' name='referencia'></input></td></tr>
<tr><td>Precio:</td><td><input type='number' name='precio'></input></td></tr>
<tr><td>Peso:</td><td><input type='number' name='peso'></input></td></tr>
<tr><td>Categoría:</td><td><select name='categoria'>
<option></option>
<option>Bebidas frías o calientes</option>
<option>Panadería</option>
<option>Dulces</option>
<option>Otros</option>
</select></td></tr>
<tr><td>Stock:</td><td><input type='number' name='stock'></input></td></tr>
</table>
<p align='center'><input type='submit' name='guardar' value='GUARDAR'></input></p>
</form>
<form action='index.php'>
<p align='center'><input type='submit' name='volver' value='VOLVER'></input></p>
</form>
";
echo $formulario;
?>