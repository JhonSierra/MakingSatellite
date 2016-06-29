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

$maxRows_Recordset1 = 50;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_conexionropa, $conexionropa);
$query_Recordset1 = "SELECT * FROM tblproducto ORDER BY tblproducto.strNombre ASC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $conexionropa) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
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
			
          <h1><marquee align="left" bgcolor="#0099FF">Lista de Productos</marquee></h1>
          <br><br>
          <p><a title="Añadir Producto" href="productos_add.php"><img src="../pictures/making/Icon-editar.png" width="100" height="80"><br>A&ntilde;adir Producto</a></p><br><br>
    <table width="800" border="0" cellpadding="0" cellspacing="0">
      <tr class="tablaprincipal">
        <td width="304" bgcolor="#0099FF">Nombre Producto</td>
        <td width="341" bgcolor="#0099FF">Estado</td>
        <td width="155" bgcolor="#0099FF">Acciones</td>
      </tr>
      <?php do { ?>
        <tr class="brillo">
          <td><?php echo $row_Recordset1['strNombre']; ?></td>
          <td><?php echo $row_Recordset1['intEstado']; ?></td>
          <td><a title="Editar Producto" href="productos_edit.php?recordID=<?php echo $row_Recordset1['idProductos']; ?>">Editar</a> - <a href="productos_delete.php?recordID=<?php echo $row_Recordset1['idProductos']; ?>">Eliminar</a></td>
        </tr>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    </table>
          
			
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
mysql_free_result($Recordset1);
?>