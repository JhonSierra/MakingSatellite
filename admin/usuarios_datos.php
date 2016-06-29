<?php
//creamos la sesion
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresará a login.php
if(!isset($_SESSION['usuario'])||($_SESSION['seguridad']!="1")) 
{
  header('Location: login.php'); 
  exit();
}
?>
<?php require_once('../Connections/conexionropa.php'); ?><?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_DetailRS1 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS1 = $_GET['recordID'];
}
mysql_select_db($database_conexionropa, $conexionropa);
$query_DetailRS1 = sprintf("SELECT * FROM tblusuario WHERE idUsuario = %s ORDER BY tblusuario.strNombre ASC", GetSQLValueString($colname_DetailRS1, "int"));
$DetailRS1 = mysql_query($query_DetailRS1, $conexionropa) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);
$totalRows_DetailRS1 = mysql_num_rows($DetailRS1);
?>
<html lang="es">
<head>
	<meta charset="utf-8"> <!--Cotejamiento-->
	<meta name="description" content=""> <!--Descripción del sitio-->
	<meta name="keywords" content=""> <!--Palabras clave-->
	<title>Making Satellite</title> <!--Titulo del sitio-->
	<link rel="shortcut icon" type="image/x-icon" href="../pictures/making/icon-2.png"> 
	<link rel="stylesheet" type="text/css" href="../css/index3.css">
</head>

<body>
<a title="Cerrar sesión" href="logout.php" class="logout"><span class="icon icon-log-out"></span>Cerrar sesión</a> <!--Botón de logout-->
        <br>
		<br>
	<header><font>Administración</font><a title="Logo - Making Satellite" href="../index.html"><img src="../pictures/making/logo.png"></a> <!--Logo de la empresa--> 		
	</header>

	<div class="contenedor">
	<section>
		<article> <!--Información de la empresa-->
        <center>
        <h1><marquee align="left" bgcolor="#0099FF">Datos Completos de Usuarios</marquee></h1>
          <br><br>
          <img src="../pictures/making/Icon-usuario.png" width="200" height="150"><br><br>
<p><table border="1" align="center" bordercolor="#0099FF" bgcolor="#FFFFFF">
  <tr>
    <td>Usuario:</td>
    <td><?php echo $row_DetailRS1['idUsuario']; ?></td>
  </tr>
  <tr>
    <td>Nombre:</td>
    <td><?php echo $row_DetailRS1['strNombre']; ?></td>
  </tr>
  <tr>
    <td>Apellido:</td>
    <td><?php echo $row_DetailRS1['strApellido']; ?></td>
  </tr>
  <tr>
    <td>Documento:</td>
    <td><?php echo $row_DetailRS1['intDocumento']; ?></td>
  </tr>
  <tr>
    <td>NumeroTelefono:</td>
    <td><?php echo $row_DetailRS1['intNumeroTelefono']; ?></td>
  </tr>
  <tr>
    <td>Direccion:</td>
    <td><?php echo $row_DetailRS1['strDireccion']; ?></td>
  </tr>
  <tr>
    <td>Email:</td>
    <td><?php echo $row_DetailRS1['strEmail']; ?></td>
  </tr>
  <tr>
    <td>Activo:</td>
    <td><?php echo $row_DetailRS1['intActivo']; ?></td>
  </tr>
</table></center></p>
		</article>
	</section>

	<section1> <!--Formulario de login-->
		<span class="barra"> <!--Menú lateral-->
			<ul>
            <li><a title="Usuarios" href="../admin/usuarios_lista.php">Usuarios</a></li>
				<li><a title="Productos" href="../admin/productos_lista.php">Productos</a></li>
				<li><a title="Categorias" href="../admin/categorias_lista.php">Categorías</a></li>
				
			</ul>
		</span>
	</section1>
	</div>
	<br>
    
	<footer> <!--Pie de página-->
		<p class="derechos">© Making Satellite - 2016</p> <!--Derechos de autor-->
	</footer>

</body>

</html>
<?php
mysql_free_result($DetailRS1);
?>