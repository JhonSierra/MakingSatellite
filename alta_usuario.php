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

// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
  $MM_dupKeyRedirect="../Ropa/alta_emailrepetido.php";
  $loginUsername = $_POST['strEmail'];
  $LoginRS__query = sprintf("SELECT strEmail FROM tblusuario WHERE strEmail=%s", GetSQLValueString($loginUsername, "text"));
  mysql_select_db($database_conexionropa, $conexionropa);
  $LoginRS=mysql_query($LoginRS__query, $conexionropa) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
    $MM_qsChar = "?";
    //append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar ."requsername=".$loginUsername;
    header ("Location: $MM_dupKeyRedirect");
    exit;
  }
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tblusuario (strNombre, strApellido, intDocumento, intNumeroTelefono, strDireccion, strEmail, intActivo, strPassword) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['strNombre'], "text"),
                       GetSQLValueString($_POST['strApellido'], "text"),
                       GetSQLValueString($_POST['intDocumento'], "int"),
                       GetSQLValueString($_POST['intNumeroTelefono'], "int"),
                       GetSQLValueString($_POST['strDireccion'], "text"),
                       GetSQLValueString($_POST['strEmail'], "text"),
                       GetSQLValueString($_POST['intActivo'], "int"),
                       GetSQLValueString($_POST['strPassword'], "text"));

  mysql_select_db($database_conexionropa, $conexionropa);
  $Result1 = mysql_query($insertSQL, $conexionropa) or die(mysql_error());

  $insertGoTo = "../Ropa/alta_ok.php";
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
					<td><input type="text" name="strNombre" value="" title="Ingrese sus nombres" placeholder="Ingrese sus nombres"></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><input type="text" name="strApellido" value="" title="Ingrese sus apellidos" placeholder="Ingrese sus apellidos"></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><input type="text" name="intDocumento" value="" title="Ingrese su numero de documento" placeholder="Ingrese su numero de documento"></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><input type="text" name="intNumeroTelefono" value="" tilte="Ingrese su número de télefono" placeholder="Ingrese su número de télefono"></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><input type="text" name="strDireccion" value="" title="Ingrese su dirección" placeholder="Ingrese su dirección"></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><input type="text" name="strEmail" value="" title="Ingrese su direccion de correo electronico" placeholder="Ingrese su direccion de correo electronico"></td>
				</tr>
				<tr><td></td></tr>
				<tr>
                <tr>
					<td><input type="password" name="strPassword" value="" title="Ingrese su nueva contraseña" placeholder="Ingrese su nueva contraseña"><br></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><input type="submit" title="Boton - Registrar" value="Registrar"/></td>
				</tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr>
					<td colspan="2"><center><font>¿Ya tienes una cuenta?</font>&nbsp;&nbsp;<a title="¿Ya tienes una cuenta? - Inicia sesión" href="../Ropa/acceso.php">Inicia sesión</a></center></td>
				</tr>
			</table>
            <input type="hidden" name="intActivo" value="1" />
  <input type="hidden" name="MM_insert" value="form1" />
		</form>
	</section>
	<center><a title="Regresar al inicio de Making Satellite" href="../Ropa/index.php" class="regresar"><span class="icon icon-home"></span>Regresar al inicio</a></center>

</body>

</html>