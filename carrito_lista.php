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
    <h1><!-- InstanceBeginEditable name="Titulo" -->Carrito<!-- InstanceEndEditable --></h1>
    <p><!-- InstanceBeginEditable name="Contenido" --><table width="100%" border="0">
  <tr>
    <td>Producto</td>
    <td>Unidades</td>
    <td>Precio</td>
    <td>Acciones</td>
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
    <a href="carrito_forma_pago.php">Seleccionar Forma de Pago</a>
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
mysql_free_result($DatosCarrito);
?>
