<?php require_once('../Connections/conexionropa.php'); ?>
<?php
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

mysql_select_db($database_conexionropa, $conexionropa);
$query_DatosUsuarios = "SELECT * FROM tblusuario ORDER BY tblusuario.strNombre ASC";
$DatosUsuarios = mysql_query($query_DatosUsuarios, $conexionropa) or die(mysql_error());
$row_DatosUsuarios = mysql_fetch_assoc($DatosUsuarios);
$totalRows_DatosUsuarios = mysql_num_rows($DatosUsuarios);
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
<a href="logout.php" class="logout"><span class="icon icon-log-out"></span>Cerrar sesión</a> <!--Botón de logout-->
        <br>
		<br>
	<header>
		<font>Administracion</font>
		<a href="../index.html"><img src="../pictures/making/logo.png"></a> <!--Logo de la empresa--> 		
	</header>

	<div class="contenedor">
	<section>
		<article> <!--Información de la empresa-->
			
          <h2>Lista de Usuarios</h2>
          <table width="850" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr class="tablaprincipal">
	    <td width="139">id</td>
	    <td width="152"><h1>Nombre</h1></td>
	    <td width="152"><h1>Apellido</h1></td>
	    <td width="152"><h1>Documento</h1></td>
	    <td width="361"><h1>Telefono</h1></td>
        <td width="361"><h1>Direccion</h1></td>
        <td width="361"><h1>Email</h1></td>
      </tr>
	  <?php do { ?>
	    <trs>
	      <tr class="brillo">
	        <td height="40"><a href="usuarios_datos.php?recordID=<?php echo $row_DatosUsuarios['idUsuario']; ?>"> <?php echo $row_DatosUsuarios['idUsuario']; ?>&nbsp; </a></td>
	      <td><?php echo $row_DatosUsuarios['strNombre']; ?>&nbsp; </td>
	      <td><?php echo $row_DatosUsuarios['strApellido']; ?></td>
	      <td><?php echo $row_DatosUsuarios['intDocumento']; ?></td>
	      <td><?php echo $row_DatosUsuarios['intNumeroTelefono']; ?></td>
          <td><?php echo $row_DatosUsuarios['strDireccion']; ?></td>
          <td><?php echo $row_DatosUsuarios['strEmail']; ?></td>
        </tr>
	    <?php } while ($row_DatosUsuarios = mysql_fetch_assoc($DatosUsuarios)); ?>
    </table>
	<p><br />
	  <?php echo $totalRows_DatosUsuarios ?> Registros Total
    </p>
	</p>
          
			
		</article>
	</section>

	<section1> <!--Formulario de login-->
		<span class="barra"> <!--Menú lateral-->
			<ul>
            <li><a href="../admin/usuarios_lista.php">Usuarios</a></li>
				<li><a href="../admin/productos_lista.php">Productos</a></li>
				<li><a href="../admin/categorias_lista.php">Categorías</a></li>
				
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
mysql_free_result($DatosUsuarios);
?>