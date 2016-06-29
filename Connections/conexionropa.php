<?php
 error_reporting(E_ALL ^ E_DEPRECATED); if (!isset($_SESSION)) {
  session_start();
}
 ?>
 
<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conexionropa = "localhost";
$database_conexionropa = "ropa";
$username_conexionropa = "root";
$password_conexionropa = "";
$conexionropa = mysql_pconnect($hostname_conexionropa, $username_conexionropa, $password_conexionropa) or trigger_error(mysql_error(),E_USER_ERROR); 
?>

<?php 
include ("includes/funciones.php");

?>