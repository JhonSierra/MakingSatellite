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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_DatosProductos = 6;
$pageNum_DatosProductos = 0;
if (isset($_GET['pageNum_DatosProductos'])) {
  $pageNum_DatosProductos = $_GET['pageNum_DatosProductos'];
}
$startRow_DatosProductos = $pageNum_DatosProductos * $maxRows_DatosProductos;

$varCategoria_DatosProductos = "0";
if (isset($_GET["cat"])) {
  $varCategoria_DatosProductos = $_GET["cat"];
}
mysql_select_db($database_conexionropa, $conexionropa);
$query_DatosProductos = sprintf("SELECT * FROM tblproducto WHERE tblproducto.intCategoria = %s", GetSQLValueString($varCategoria_DatosProductos, "int"));
$query_limit_DatosProductos = sprintf("%s LIMIT %d, %d", $query_DatosProductos, $startRow_DatosProductos, $maxRows_DatosProductos);
$DatosProductos = mysql_query($query_limit_DatosProductos, $conexionropa) or die(mysql_error());
$row_DatosProductos = mysql_fetch_assoc($DatosProductos);

if (isset($_GET['totalRows_DatosProductos'])) {
  $totalRows_DatosProductos = $_GET['totalRows_DatosProductos'];
} else {
  $all_DatosProductos = mysql_query($query_DatosProductos);
  $totalRows_DatosProductos = mysql_num_rows($all_DatosProductos);
}
$totalPages_DatosProductos = ceil($totalRows_DatosProductos/$maxRows_DatosProductos)-1;

$queryString_DatosProductos = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_DatosProductos") == false && 
        stristr($param, "totalRows_DatosProductos") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_DatosProductos = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_DatosProductos = sprintf("&totalRows_DatosProductos=%d%s", $totalRows_DatosProductos, $queryString_DatosProductos);
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
        <h2><marquee align="left" bgcolor="#186BD0">Productos</marquee></h2>
			<h3><div class="resultadoproductos">
	<?php if ($totalRows_DatosProductos > 0) { // Show if recordset not empty ?>
    <?php do { ?>
        <div class="producto"><div class="fotoproducto"><img src="pictures/productos/<?php echo $row_DatosProductos['strImagen']; ?>" width="120" height="120" /></div><div class="textoproducto">
    <a href="ver_producto.php?recordID=<?php echo $row_DatosProductos['idProductos']; ?>"><?php echo $row_DatosProductos['strNombre']; ?></a>. Precio: <?php echo $row_DatosProductos['dblPrecio']; ?></div></div>
        <?php } while ($row_DatosProductos = mysql_fetch_assoc($DatosProductos)); ?>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_DatosProductos == 0) { // Show if recordset empty ?>
        Bienvenido...  a la izquierda encontraras nuestros Productos 
        <br>
            <img src="pictures/making/logo.png" width="757" height="566">
<?php } // Show if recordset empty ?>
  </div>
    <table border="0">
      <tr>
        <td><?php if ($pageNum_DatosProductos > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_DatosProductos=%d%s", $currentPage, 0, $queryString_DatosProductos); ?>" class="logout"><span class="icon icon-log-out"></span>Primero</a>
            <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_DatosProductos > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_DatosProductos=%d%s", $currentPage, max(0, $pageNum_DatosProductos - 1), $queryString_DatosProductos); ?>" class="logout"><span class="icon icon-log-out"></span>Anterior</a>
            <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_DatosProductos < $totalPages_DatosProductos) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_DatosProductos=%d%s", $currentPage, min($totalPages_DatosProductos, $pageNum_DatosProductos + 1), $queryString_DatosProductos); ?>" class="logout"><span class="icon icon-log-out"></span>Siguiente</a>
            <?php } // Show if not last page ?></td>
        <td><?php if ($pageNum_DatosProductos < $totalPages_DatosProductos) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_DatosProductos=%d%s", $currentPage, $totalPages_DatosProductos, $queryString_DatosProductos); ?>" class="logout"><span class="icon icon-log-out"></span>Ultimo</a>
            <?php } // Show if not last page ?></td>
      </tr>
    </table></h3>
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
mysql_free_result($DatosProductos);
?>