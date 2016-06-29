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
$query_Recordset1 = "SELECT * FROM tblproducto ORDER BY tblproducto.strNombre ASC";
$Recordset1 = mysql_query($query_Recordset1, $conexionropa) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/BaseAdmin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Administracion</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<link href="../estilo/twoColFixLtHdr.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container">
  <div class="header"><img src="../imagenes/logotrans.png" width="469" height="226" alt="Administracion" />
    <!-- end .header --></div>
  <div class="sidebar1">
  
  <?php
   include ("../includes/cabeceraadmin.php") 
   ?>
    
    <!-- end .sidebar1 --></div>
  <div class="content">
    
    <!-- end .content -->
    <!-- InstanceBeginEditable name="Contenido" --><h1>Lista de Productos</h1>
    <p><a href="productos_add.php">A&ntilde;adir Producto</a></p>
    <table width="763" border="0" cellpadding="0" cellspacing="0">
      <tr class="tablaprincipal">
        <td>Nombre Producto</td>
        <td>Estado</td>
        <td>Acciones</td>
      </tr>
      <?php do { ?>
        <tr class="brillo">
          <td><?php echo $row_Recordset1['strNombre']; ?></td>
          <td><?php echo $row_Recordset1['intEstado']; ?></td>
          <td><a href="productos_edit.php?recordID=<?php echo $row_Recordset1['idProductos']; ?>">Editar</a></td>
        </tr>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    </table>
    <p>&nbsp;</p>
	<!-- InstanceEndEditable -->
    <p>&nbsp;</p>
    <p><p><a href="index.php">Atras</a></p></p>
  </div>
  <div class="footer">
    <p>&nbsp;</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($Recordset1);
?>
