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

mysql_select_db($database_conexionropa, $conexionropa);
$query_Recordset1 = "SELECT * FROM tblcategoria ORDER BY tblcategoria.strDescripcion";
$Recordset1 = mysql_query($query_Recordset1, $conexionropa) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php do { ?>
  <div align="center"><a href="categoria_ver.php?cat=<?php echo $row_Recordset1['idCategoria']; ?>"><?php echo $row_Recordset1['strDescripcion']; ?></a><br>
  </div>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
<p align="center">
  <?php
mysql_free_result($Recordset1);
?>
    
<br />
<br />
<br />
  <?php
  if((isset($_SESSION['MM_Username'])) && ($_SESSION['MM_Username']!=""))
  {
  	echo "Hola ";
	echo $_SESSION['MM_Username'];
	?>
    <a href="carrito_lista.php" class="modificacionusuario">Carrito de la compra</a>
    <a href="usuario_modificar.php" class="modificacionusuario">Modificar</a> - <a href="usuario_cerrarsesion.php" class="modificacionusuario">Salir</a>
<?php
  }
  else
  {?><br />
  <br />
  <br />
  <br />
  <br />
  <br />
<a href="alta_usuario.php">Registrar</a></p>
<p align="center"><a href="acceso.php">Acceder</a></p>
<p align="center">
  <?php } ?>
</p>
<br />
<br />
