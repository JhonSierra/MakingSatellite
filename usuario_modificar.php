<?php require_once('Connections/conexionropa.php'); ?>
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE tblusuario SET strNombre=%s, strEmail=%s, strPassword=%s WHERE idUsuario=%s",
                       GetSQLValueString($_POST['strNombre'], "text"),
                       GetSQLValueString($_POST['strEmail'], "text"),
                       GetSQLValueString($_POST['strPassword'], "text"),
                       GetSQLValueString($_POST['idUsuario'], "int"));

  mysql_select_db($database_conexionropa, $conexionropa);
  $Result1 = mysql_query($updateSQL, $conexionropa) or die(mysql_error());

  $updateGoTo = "usuario_modificacion_ok.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$varUsuario_DatosUsuario = "0";
if (isset($_SESSION["MM_IdUsuario"])) {
  $varUsuario_DatosUsuario = $_SESSION["MM_IdUsuario"];
}
mysql_select_db($database_conexionropa, $conexionropa);
$query_DatosUsuario = sprintf("SELECT * FROM tblusuario WHERE tblusuario.idUsuario = %s", GetSQLValueString($varUsuario_DatosUsuario, "int"));
$DatosUsuario = mysql_query($query_DatosUsuario, $conexionropa) or die(mysql_error());
$row_DatosUsuario = mysql_fetch_assoc($DatosUsuario);
$totalRows_DatosUsuario = mysql_num_rows($DatosUsuario);
?>
<html lang="es">
<head>
	<meta charset="utf-8"> <!--Cotejamiento-->
	<meta name="description" content=""> <!--Descripción del sitio-->
	<meta name="keywords" content=""> <!--Palabras clave-->
	<title>Making Satellite</title> <!--Titulo del sitio-->
	<link rel="shortcut icon" type="image/x-icon" href="pictures/making/icon-2.png"> <!--Icono del sitio-->
	<link rel="stylesheet" type="text/css" href="css/slider.css">
	<link rel="stylesheet" type="text/css" href="css/index2.css">
    <link rel="stylesheet" type="text/css" href="../css/catalogo.css">
	<link rel="stylesheet" type="text/css" href="../css/icons.css">
</head>

<body>
	<header>
		<font>Bienvenido a</font>
		<a title="Logo - Making Satellite" href="index.php"><img src="pictures/making/logo.png"></a> <!--Logo de la empresa-->
		<br>
		<table class="logbar"> <!--Menú de login-->
			<tr>
				<td align="right"><a target="_self" title="Iniciar Sesion" href="acceso.php">Iniciar sesión</a> &nbsp;|&nbsp; <a target="_self" title="Registrarme" href="alta_usuario.php">Registrarme</a></td>
			</tr>
		</table>
		<br>
		<div class="contenedor">
		<nav class="menu-fixed"> <!--Menú de navegación-->
			<ul>
			<center>
				<li><a target="_self" title="Inicio" href="index.php">Inicio</a></li>
				<li><a target="_self" title="Catalogo" href="categoria_ver.php">Catálogo</a></li>
				<li><a target="_self" title="Contacto" href="#info">Contacto</a></li>
                <li><a target="_self" title="Carrito" href="carrito_lista.php">Carrito</a></li>
			</center>
			</ul>
		</nav>
        </div>

		<div class="slider"> <!--Slider-->
			<ul>
				<li><img src="pictures/slider/1.jpg"></li>
				<li><img src="pictures/slider/2.jpg"></li>
				<li><img src="pictures/slider/3.jpg"></li>
				<li><img src="pictures/slider/4.jpg"></li>
			</ul>
		</div>
	</header>

	<div class="contenedor">
	<section>
		<article> <!--Información de la empresa-->
        <center>
        <h2><marquee align="left" bgcolor="#186BD0">Modifica tus datos</marquee></h2>
        <img src="pictures/making/Icon-registro.png" width="200" height="150"><br><br><br>
            <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
                  <table align="center">
                    <tr valign="baseline">
                      <td nowrap="nowrap" align="right">Nombres:</td>
                      <td><input type="text" name="strNombre" value="<?php echo htmlentities($row_DatosUsuario['strNombre'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" /></td>
                    </tr>
                    <tr valign="baseline">
                      <td nowrap="nowrap" align="right">Apellidos:</td>
                      <td><input type="text" name="strApellido" value="<?php echo htmlentities($row_DatosUsuario['strApellido'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" /></td>
                    </tr>
                    <tr valign="baseline">
                      <td nowrap="nowrap" align="right">Documento:</td>
                      <td><input type="text" name="intDocumento" value="<?php echo htmlentities($row_DatosUsuario['intDocumento'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" /></td>
                    </tr>
                    <tr valign="baseline">
                      <td nowrap="nowrap" align="right">Numero de Telefono:</td>
                      <td><input type="text" name="intNumeroTelefono" value="<?php echo htmlentities($row_DatosUsuario['intNumeroTelefono'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" /></td>
                    </tr>
                    <tr valign="baseline">
                      <td nowrap="nowrap" align="right">Dirección:</td>
                      <td><input type="text" name="strDireccion" value="<?php echo htmlentities($row_DatosUsuario['strDireccion'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" /></td>
                    </tr>
                    <tr valign="baseline">
                      <td nowrap="nowrap" align="right">Correo electrónico:</td>
                      <td><input type="text" name="strEmail" value="<?php echo htmlentities($row_DatosUsuario['strEmail'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" /></td>
                    </tr>
                    <tr valign="baseline">
                      <td nowrap="nowrap" align="right">Contraseña:</td>
                      <td><input type="password" name="strPassword" value="<?php echo htmlentities($row_DatosUsuario['strPassword'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" /></td>
                    </tr>
                    <tr valign="baseline">
                      <td nowrap="nowrap" align="right">&nbsp;</td>
                      <td><input type="submit" value="Actualizar Datos de Usuario" /></td>
                    </tr>
                  </table>
                  <input type="hidden" name="MM_update" value="form1" />
                  <input type="hidden" name="idUsuario" value="<?php echo $row_DatosUsuario['idUsuario']; ?>" />
                </form>
            </center>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
		</article>
	</section>

	<aside> <!--Formulario de login-->
		<span class="barra"> <!--Menú de ropa-->
        <h3><marquee align="left" bgcolor="#fff" >Catálogo</marquee></h3>
			<h3><?php include("includes/catalogo.php");?></h3>
            
		</span>
	</aside>
	</div>
	<br>
	<footer> <!--Pie de página-->
		<div id="info"> <!--Datos de contácto-->
			<h3>Contacto</h3>
			<p>Dirección: Carrera 81G N° 73 - 57 Sur | Bogotá</p>
			<br>
			<p class="tel">Teléfono: 302 5171</p>
		</div>
		
		<div class="redes"> <!--Redes sociales-->
			<h3>Redes sociales</h3>
			<a target="_blank" href="https://www.facebook.com/"><img src="pictures/redes sociales/facebook.png" width="22px"></a>
			<a target="_blank" href="https://twitter.com/"><img src="pictures/redes sociales/twitter.png" width="25px"></a>
			<a target="_blank" href="https://www.instagram.com/"><img src="pictures/redes sociales/instagram.png" width="22px"></a>
			<a target="_blank" href="https://www.youtube.com/"><img src="pictures/redes sociales/youtube.png" width="25px" height="22px"></a>
		</div>
		<div class="admin">
		<a href="admin/index.php" title="Ingresar como administrador">Administración</a></div> <!--Login de administrador-->
		<p class="derechos">© Making Satellite - 2016</p> <!--Derechos de autor-->
	</footer>

</body>

</html>
<?php
mysql_free_result($DatosUsuario);
?>