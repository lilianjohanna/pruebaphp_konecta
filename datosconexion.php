<?php
$conectar=mysqli_connect("localhost","root","12345678")or die("Error de conexión");
mysqli_select_db($conectar,"cafeteria")or die(mysqli_error($conectar));
?>