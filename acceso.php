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
?>

<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['strEmail'])) {
  $loginUsername=$_POST['strEmail'];
  
  $password=$_POST['strPassword'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "../Ropa/acceso_ok.php";
  $MM_redirectLoginFailed = "../Ropa/acceso_error.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_conexionropa, $conexionropa);
  
  $LoginRS__query=sprintf("SELECT idUsuario, strEmail, strPassword FROM tblusuario WHERE strEmail=%s AND strPassword=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $conexionropa) or die(mysql_error());
  $row_LoginRS = mysql_fetch_assoc($LoginRS);
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
	$_SESSION['MM_IdUsuario'] = $row_LoginRS["idUsuario"];	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>

<html lang="es">
<head>
	<meta charset="utf-8"> <!--Cotejamiento-->
	<meta name="description" content=""> <!--Descripción del sitio-->
	<meta name="keywords" content=""> <!--Palabras clave-->
	<title>Making Satellite - Iniciar sesión</title> <!--Titulo del sitio-->
	<link rel="shortcut icon" type="image/x-icon" href="../Ropa/pictures/making/icon-2.png"> <!--Icono del sitio-->
	<link rel="stylesheet" type="text/css" href="../Ropa/css/login.css">
	<link rel="stylesheet" type="text/css" href="Ropa/css/icons.css">
</head>

<body>
	<header>
    
		<font>Iniciar sesión</font>
		<a title="Logo - Making Satellite" href="index.php"><img src="../Ropa/pictures/making/logo.png"></a> <!--Logo de la empresa-->
	</header>

	<section> <!--Formulario de login-->
    
		<img src="../Ropa/pictures/making/bienvenida.png">
        <form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
			<table>
				<tr>
					<td><input type="text" title="Ingrese su dirección de correo electrónico" name="strEmail" id="strEmail" placeholder="Ingrese su dirección de correo electrónico"></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><label for="strPassword"></label><input type="password" name="strPassword" id="strPassword" title="Ingrese su contraseña" placeholder="Ingrese su contraseña"></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><input type="submit" title="Entrar" name="button" id="button" value="Entrar"/></td>
				</tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr>
					<td colspan="2"><center><a title="¿Olvidaste tu contraseña?" href="Ropa/verificar-correo.php">¿Olvidaste tu contraseña?</a></center></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td colspan="2"><center><font>¿No tienes una cuenta?</font>&nbsp;&nbsp;<a title="¿No tienes una cuenta? - Registrate" href="../Ropa/alta_usuario.php">Regístrate</a></center></td>
				</tr>
			</table>
		</form>
	</section>
   
	<center><a title="Regresa a Inicio de Making Satellite" href="../Ropa/index.php" class="regresar"><span class="icon icon-home"></span>Regresar al inicio</a></center>

</body>

</html>