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
	<title>Making Satellite</title> <!--Titulo del sitio-->
	<link rel="shortcut icon" type="image/x-icon" href="pictures/making/icon-2.png"> <!--Icono del sitio-->
	<link rel="stylesheet" type="text/css" href="css/slider.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
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
				<li><img src="pictures/slider/1.jpg" alt="Ropa de Moda"/></li>
				<li><img src="pictures/slider/2.jpg"></li>
				<li><img src="pictures/slider/3.jpg"></li>
				<li><img src="pictures/slider/4.jpg"></li>
			</ul>
		</div>
	</header>

	<div class="contenedor">
	<section>
		<article> <!--Información de la empresa-->
			<h2><center><font color="#186BD0" >Nosotros</font></center></h2>
			<p>Somos una entidad dedicada al diseño y confección de ropa, contamos con una gran experiencia en la parte textil, lo que garantiza la calidad de nuestros productos y la satisfacción de nuestros clientes.</p>
            <br>
            <br>
            <br>
            <br>
            <h2><marquee align="left" bgcolor="#424242">Misión</marquee></h2>
			<p>Ser una empresa dedicada a la innovación en compras online, confección y venta de ropa online, innovando en el área textil y usando nuevas herramientas para garantizar una cómoda forma para realizar los pedidos y compras de los productos textiles.
</p>
<br>
<br>
<br>
<br>
<h2><marquee align="left" bgcolor="#424242">Visión</marquee></h2>
			<p>En el 2021 conseguir que sea una entidad reconocida a nivel nacional, posicionándola en un lugar privilegiado de la industria del desarrollo, para que de esta manera se cuente con una extensa cantidad de clientes fijos y también poder generar oportunidades de trabajo.

Esta es una manera de contribuir al desarrollo del país.

</p>
		</article>
	</section>

	<aside> <!--Formulario de login-->
		<h3>Iniciar sesión</h3>
		<form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
		<table>
			<tr>
				<td align="right"><label for="">Correo electrónico:&nbsp;</label></td>
				<td><input type="text" name="strEmail" id="strEmail" title="Email" placeholder="Ingrese su dirección de correo electrónico"></td>
			</tr>
			<tr><td></td></tr>
			<tr>
				<td align="right"><label for="strPassword">Contraseña:&nbsp;</label></td>
				<td><input type="password" name="strPassword" id="strPassword" title="Contraseña" placeholder="Ingrese su contraseña"></td>
			</tr>
			<tr><td></td></tr>
			<tr>
				<td colspan="2"><center><input type="submit" title="Entrar" name="button" id="button" value="Entrar"/></center></td>
			</tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr>
				<td colspan="2"><center><a title="¿Olvidaste tu contraseña?" href="acceso.php">¿Olvidaste tu contraseña?</a></center></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td colspan="2"><center><font>¿No tienes una cuenta?</font>&nbsp;&nbsp;<a title="¿No tienes una cuenta? - Registrate" href="../Ropa/alta_usuario.php">Regístrate</a></center></td>
				</tr>
			</table>
		</form>
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