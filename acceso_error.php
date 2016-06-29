<html lang="es">
<head>
	<meta charset="utf-8"> <!--Cotejamiento-->
	<meta name="description" content=""> <!--Descripción del sitio-->
	<meta name="keywords" content=""> <!--Palabras clave-->
	<title>Making Satellite</title> <!--Titulo del sitio-->
	<link rel="shortcut icon" type="image/x-icon" href="pictures/making/icon-2.png"> <!--Icono del sitio-->
	<link rel="stylesheet" type="text/css" href="css/slider.css">
	<link rel="stylesheet" type="text/css" href="css/index2.css">
    <link rel="stylesheet" type="text/css" href="../css/catalogo.css">
	<link rel="stylesheet" type="text/css" href="../css/icons.css">
</head>

<body>
	<header>
		<font>Bienvenido a</font>
		<a title="Logo - Making Satellite" href="index.html"><img src="pictures/making/logo.png"></a> <!--Logo de la empresa-->
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
			<center><h2><marquee align="left" bgcolor="#424242">Ha ocurrido un error.</marquee></h2><p><img src="pictures/making/Icono-advertencia.png"></p>
            <a href="acceso.php">Inténtalo de nuevo</a></center>
			<br>
            <br>
            <br>
            <br>
            <br>
            <br>
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