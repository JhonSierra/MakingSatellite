<?php require_once('Connections/conexionropa.php'); ?>
<?php 
include ("includes/funciones.php");

?>
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

$varUsuario_DatosCarrito = "0";
if (isset($_SESSION["MM_Username"])) {
  $varUsuario_DatosCarrito = $_SESSION["MM_Username"];
}
mysql_select_db($database_conexionropa, $conexionropa);
$query_DatosCarrito = sprintf("SELECT * FROM tblcarrito WHERE tblcarrito.idUsuario = %s  AND tblcarrito.intTransaccionEfectuada = 0", GetSQLValueString($varUsuario_DatosCarrito, "int"));
$DatosCarrito = mysql_query($query_DatosCarrito, $conexionropa) or die(mysql_error());
$row_DatosCarrito = mysql_fetch_assoc($DatosCarrito);
$totalRows_DatosCarrito = mysql_num_rows($DatosCarrito);
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
			<h2><table width="100%" border="1" bordercolor="#0066CC" >
  <tr>
    <td><h3>Producto</h3></td>
    <td><h3>Unidades</h3></td>
    <td><h3>Precio<h3></td>
    <td><h3>Acciones</h3></td>
  </tr>
  <?php $preciototal = 0; ?>
  <?php do { ?>
    <tr>
      <td><?php echo ObtenerNombreProducto($row_DatosCarrito['idProducto']); ?></td>
      <td><?php echo $row_DatosCarrito['intCantidad']; ?></td>
      <td><?php echo ObtenerPrecioProducto ($row_DatosCarrito['idProducto']); ?> Pesos</td>
      <td>Eliminar</td>
    </tr>
    <?php $preciototal = $preciototal + ObtenerPrecioProducto ($row_DatosCarrito['idProducto']);?>
    <?php } while ($row_DatosCarrito = mysql_fetch_assoc($DatosCarrito));
	 ?>
  <tr>
    <td>&nbsp;</td>
    <td align="right">SubTotal:</td>
    <td><?php echo $preciototal;?> Pesos</td>
    <td>&nbsp;</td>
</tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">IVA:</td>
    <td><?php echo ObtenerIVA();?> %</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">Valor IVA:</td>
    <td><?php
	$multiplicador = ObtenerIVA()/100;
	 $valordelIVA = $preciototal * $multiplicador;
	 echo $valordelIVA;?>Pesos</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">Total:</td>
    <td><?php
	$multiplicador = (100 + ObtenerIVA())/100;
	 $valorconIVA = $preciototal * $multiplicador;
	 echo $valorconIVA;?>Pesos</td>
    <td>&nbsp;</td>
  </tr>
    </table>
    <a href="carrito_forma_pago.php"><button type=""><span class="icon icon-shopping-cart"></span>Pagar</button></a></h2>
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