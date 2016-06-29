<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php

#mysql_connect('mysql.hostinger.es','u910220138_root','Making2016')or die ('Ha fallado la conexión: '.mysql_error());

mysql_connect('localhost','root','')or die ('Ha fallado la conexión: '.mysql_error());


#mysql_select_db('u910220138_ropa')or die ('Error al seleccionar la Base de Datos: '.mysql_error());

mysql_select_db('ropa')or die ('Error al seleccionar la Base de Datos: '.mysql_error());
 
$usuario = $_POST["admin"];   
$password = $_POST["password_usuario"];

$result = mysql_query("SELECT * FROM tbladministracion WHERE NombreAdministrador = '$usuario'" );

if($row = mysql_fetch_array($result))
{     
 if($row["Password"] == $password)
 {
 
  session_start();  
  $_SESSION['usuario'] = $usuario;
  $_SESSION['seguridad']="1";
    
  header("Location: index.php");  
 }
 else
 {
  ?>
   <script languaje="javascript">
    alert("Contraseña Incorrecta");
    location.href = "login.php";
   </script>
  <?php
            
 }
}
else
{
 
?>
 <script languaje="javascript">
  alert("El nombre de usuario es incorrecto!");
  location.href = "login.php";
 </script>
<?php   
        
}
mysql_free_result($result);

mysql_close();
?>
</body>
</html>