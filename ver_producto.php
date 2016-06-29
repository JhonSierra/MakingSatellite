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

$varProducto_DatosProducto = "0";
if (isset($_GET["recordID"])) {
  $varProducto_DatosProducto = $_GET["recordID"];
}
mysql_select_db($database_conexionropa, $conexionropa);
$query_DatosProducto = sprintf("SELECT * FROM tblproducto WHERE tblproducto.idProductos = %s", GetSQLValueString($varProducto_DatosProducto, "int"));
$DatosProducto = mysql_query($query_DatosProducto, $conexionropa) or die(mysql_error());
$row_DatosProducto = mysql_fetch_assoc($DatosProducto);
$totalRows_DatosProducto = mysql_num_rows($DatosProducto);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Documento sin título</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<link href="estilo/principal.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container">
  <div class="header">
    <div class="headerinterior"><img src="imagenes/logotrans.png" width="500" height="300" alt="Tienda Ropa" /></div></div>
  <div class="subcontenedor">
  <div class="slider">
  <br />
  <br />
  <br />
  <br />
  <br />
  </div>
  <div class="sidebar1">
    <?php include("includes/catalogo.php");?>
  <!-- end .sidebar1 --> </div>
  <div class="content">
    <h1><!-- InstanceBeginEditable name="Titulo" --><?php echo $row_DatosProducto['strNombre']; ?><!-- InstanceEndEditable --></h1>
    <p><!-- InstanceBeginEditable name="Contenido" --><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="450"><img src="documentos/productos/<?php echo $row_DatosProducto['strImagen']; ?>" width="450" height="450" /></td>
    <td width="263" valign="top"><p><?php echo $row_DatosProducto['strNombre']; ?></p>
      <p><?php echo $row_DatosProducto['dblPrecio']; ?></p>
      <?php if ((isset ($_SESSION['MM_Username'])) && ($_SESSION['MM_Username']!="")){?>
      <p><a href="carrito_add.php?recordID=<?php echo $row_DatosProducto['idProductos']; ?>">Comprar Producto</a></p>
      <?php } 
	  else 
	  {?>
      Para comprar nuestros productos debes <a href="alta_usuario.php">Registrarte!!!</a><?php } ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<!-- InstanceEndEditable --><!-- end .content --></p>
    <p><p><a href="index.php">Atras</a></p></p>
  </div>
    <!-- end .subcontenedor --></div>
    <br />
  <div class="footer">
  <div class="header">
    <p>&nbsp;</p></div>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($DatosProducto);
?>
