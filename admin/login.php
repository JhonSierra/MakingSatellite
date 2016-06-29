<html lang="es">
<head>
	<meta charset="utf-8"> <!--Cotejamiento-->
	<meta name="description" content=""> <!--Descripción del sitio-->
	<meta name="keywords" content=""> <!--Palabras clave-->
	<title>Making Satellite - Iniciar sesión</title> <!--Titulo del sitio-->
	<link rel="shortcut icon" type="image/x-icon" href="../pictures/making/icon-2.png"> <!--Icono del sitio-->
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<link rel="stylesheet" type="text/css" href="../Ropa/css/icons.css">
</head>

<body>
	<header>
    
		 
         <font>Iniciar sesión</font>
		<a title="Logo - Making Satellite" href="../Ropa/index.php"><img src="../pictures/making/logo.png"></a> <!--Logo de la empresa-->
	</header>

	<section> <!--Formulario de login-->
    
		<img src="../pictures/making/bienvenida-admin.png">
        <form method="POST" action="../admin/validar_usuario.php">
			<table>
				<tr>
					<td><input name="admin" type="text" title="Ingrese su usuario" required placeholder="Ingrese su Usuario"></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><input name="password_usuario"  type="password" required title="Ingrese su contraseña" placeholder="Ingrese su contraseña"></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><input type="submit" name="button" id="button" title="Ingresar a Administrador" value="Enviar"/></td>
				</tr>
			</table>
		</form>
	</section>
   
	<center><a title="Regresar a Making Satellite" href="../index.php" class="regresar"><span class="icon icon-home"></span>Regresar al inicio</a></center>

</body>

</html>