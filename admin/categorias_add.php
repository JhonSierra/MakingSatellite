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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tblcategoria (strDescripcion) VALUES (%s)",
                       GetSQLValueString($_POST['strDescripcion'], "text"));

  mysql_select_db($database_conexionropa, $conexionropa);
  $Result1 = mysql_query($insertSQL, $conexionropa) or die(mysql_error());

  $insertGoTo = "categorias_lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
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
<a title="Cerrar Sesion" href="logout.php" class="logout"><span class="icon icon-log-out"></span>Cerrar sesión</a> <!--Botón de logout-->
        <br>
		<br>
	<header>
		<font>Administración</font>
		<a title="Logo - Making Satellite" href="../index.html"><img src="../pictures/making/logo.png"></a> <!--Logo de la empresa--> 		
	</header>

	<div class="contenedor">
	<section>
		<article> <!--Información de la empresa-->
			<center>
          <h2>Añadir Categoría</h2>
          <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <table align="center">
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Descripcion:</td>
          <td><input type="text" title="Descripcion Categoria" name="strDescripcion" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input type="submit" title="Insertar Categoría" value="Insertar Categoría" /></td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form1" />
    </form>
          </center>
			
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