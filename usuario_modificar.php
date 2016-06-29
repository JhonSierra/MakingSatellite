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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE tblusuario SET strNombre=%s, strApellido=%s, intDocumento=%s, intNumeroTelefono=%s, strDireccion=%s, strEmail=%s, strPassword=%s WHERE idUsuario=%s",
                       GetSQLValueString($_POST['strNombre'], "text"),
                       GetSQLValueString($_POST['strApellido'], "text"),
                       GetSQLValueString($_POST['intDocumento'], "int"),
                       GetSQLValueString($_POST['intNumeroTelefono'], "int"),
                       GetSQLValueString($_POST['strDireccion'], "text"),
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE tblusuario SET strNombre=%s, strApellido=%s, intDocumento=%s, intNumeroTelefono=%s, strDireccion=%s, strEmail=%s, strPassword=%s WHERE idUsuario=%s",
                       GetSQLValueString($_POST['strNombre'], "text"),
                       GetSQLValueString($_POST['strApellido'], "text"),
                       GetSQLValueString($_POST['intDocumento'], "int"),
                       GetSQLValueString($_POST['intNumeroTelefono'], "int"),
                       GetSQLValueString($_POST['strDireccion'], "text"),
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
if (isset($_SESSION["MM_idUsuario"])) {
  $varUsuario_DatosUsuario = $_SESSION["MM_idUsuario"];
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
	<title>Making Satellite - Registro</title> <!--Titulo del sitio-->
	<link rel="shortcut icon" type="image/x-icon" href="../Ropa/pictures/making/icon-2.png"> <!--Icono del sitio-->
	<link rel="stylesheet" type="text/css" href="../Ropa/css/registro.css">
	<link rel="stylesheet" type="text/css" href="../Ropa/css/icons.css">
</head>

<body>
	<header>
		<font>Registro</font>
		<a title="Logo - Making Satellite" href="../Ropa/index.php"><img src="../Ropa/pictures/making/logo.png"></a> <!--Logo de la empresa-->
	</header>

	<section> <!--Formulario de registro-->
		<img src="../Ropa/pictures/making/bienvenida.png">
         <form id="form1"  name="form1" method="POST" action="<?php echo $editFormAction; ?>" >
			<table>
				<tr>
					<td><input type="text" name="strNombre" value="<?php echo htmlentities($row_DatosUsuario['strNombre'], ENT_COMPAT, 'utf-8'); ?>" placeholder="Modifica tus nombres"></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><input type="text" name="strApellido" value="<?php echo htmlentities($row_DatosUsuario['strApellido'], ENT_COMPAT, 'utf-8'); ?>" placeholder="Modifica tus apellidos"></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><input type="text" name="intDocumento" value="<?php echo htmlentities($row_DatosUsuario['intDocumento'], ENT_COMPAT, 'utf-8'); ?>" placeholder="Modifica tu numero de documento"></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><input type="text" name="intNumeroTelefono" value="<?php echo htmlentities($row_DatosUsuario['intNumeroTelefono'], ENT_COMPAT, 'utf-8'); ?>" placeholder="Modifica tu número de télefono"></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><input type="text" name="strDireccion" value="<?php echo htmlentities($row_DatosUsuario['strDireccion'], ENT_COMPAT, 'utf-8'); ?>" placeholder="Modifica tu dirección"></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><input type="text" name="strEmail" value="<?php echo htmlentities($row_DatosUsuario['strEmail'], ENT_COMPAT, 'utf-8'); ?>" placeholder="Modifica tu direccion de correo electronico"></td>
				</tr>
				<tr><td></td></tr>
				<tr>
                <tr>
					<td><input type="password" name="strPassword" value="<?php echo htmlentities($row_DatosUsuario['strPassword'], ENT_COMPAT, 'utf-8'); ?>" placeholder="Modifica tu nueva contraseña"><br></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><input type="submit" value="Actualizar Registro"/></td>
				</tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr>
					<td colspan="2"><center><font>¿Quieres Cancelar?</font>&nbsp;&nbsp;<a href="../Ropa/index.php">Inicio</a></center></td>
				</tr>
			</table>
            <input type="hidden" name="MM_update" value="form1" />
        <input type="hidden" name="idUsuario" value="<?php echo $row_DatosUsuario['idUsuario']; ?>" />
            <input type="hidden" name="intActivo" value="1" />
  <input type="hidden" name="MM_insert" value="form1" />
		</form>
	</section>
    <h3><?php include("Ropa/includes/catalogo.php");?></h3>
</body>

</html>
<?php
mysql_free_result($DatosUsuario);
?>