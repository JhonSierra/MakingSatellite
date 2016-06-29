<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
 <?php
$idclientes=$_POST['idclientes'];
$nombre=$_POST['nombre'];
$primerapellido=$_POST['primerapellido'];
$segundoapellido=$_POST['segundoapellido'];
$documentoidentidad=$_POST['documentoidentidad'];
$fechanacimiento=$_POST['fechanacimineto'];
$direccion=$_POST['direccion'];
$correo=$_POST['correo'];
$telefonos=$_POST['telefonos'];
$link=mysql_connect("localhost","root","");
mysql_select_db("satelite",$link) or die ("error de conexion");
$sql="INSERT INTO clientes VALUES 
('$idclientes','$nombre','$primerapellido','$segundoapellido','$documentoidentidad','$fechanacimiento','$direccion','$correo','$telefonos')";
$result=mysql_query($sql) or die (mysql_error());
mysql_close($link);
echo '<img src="chulo.png" width="200" height="200" />'
?>
</body>
</html>