<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Documento sin título</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<link href="estilo/principal.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container">
  <div class="header">
    <div class="headerinterior"><img src="imagenes/logotrans.png" width="500" height="300" alt="Tienda Ropa" /></div></div>
  <div class="subcontenedor">
  <div class="slider">
  <br />
  <br />
  <br />
  <br />
  <br />
  </div>
  <div class="sidebar1">
    <?php include("includes/catalogo.php");?>
  <!-- end .sidebar1 --> </div>
  <div class="content">
    <h1><!-- InstanceBeginEditable name="Titulo" --><center>Forma de Pago</center><!-- InstanceEndEditable --></h1>
    <p><!-- InstanceBeginEditable name="Contenido" -->
    <form id="form1" name="form1" method="post" action="carrito_finalizacion.php">
    <p>
      <input type="radio" name="radio" id="radio" value="1" />
      <label for="radio">PayPal</label><br />
      <input type="radio" name="radio" id="radio" value="2" />
      <label for="radio">Transferencia</label>
      <br />
      <input type="radio" name="radio" id="radio" value="3" />
      <label for="radio">Visa/Mastercad<br />
        <br />
        <input type="submit" name="button" id="button" value="Pagar" />
      </label>
      <br />
    <!-- InstanceEndEditable --><!-- end .content --></p>
    <p><p><a href="index.php">Atras</a></p></p>
  </div>
    <!-- end .subcontenedor --></div>
    <br />
  <div class="footer">
  <div class="header">
    <p>&nbsp;</p></div>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
