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
  <div align="center"><a href="categoria_ver.php?cat=<?php echo $row_Recordset1['idCategoria']; ?>"><button type=""><span class="icon icon-shopping-cart"><?php echo $row_Recordset1['strDescripcion']; ?></a><br>
  </div>
  
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </span></button>
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
  	echo "<h3><marquee align='left' bgcolor='#fff' >Hola Bienvenido!!!</h3></marquee> <br><br>";
	echo $_SESSION['MM_Username'];
	?>
    <a href="carrito_lista.php" class="modificacionusuario">Carrito/  </a><a href="usuario_modificar.php" class="modificacionusuario">Modificar</a>/<br /><br /> <a href="usuario_cerrarsesion.php" class="logout"><span class="icon icon-log-out"></span>Salir</a>
<?php
  }
  else
  {?><br />
  
  <br />
  <a href="alta_usuario.php"></a></p>
<p align="center"><a href="acceso.php"></a></p>
<p align="center">
  <?php } ?>
</p>
<br />
<br />

<link rel="stylesheet" type="text/css" href="../css/botonrojo.css">
