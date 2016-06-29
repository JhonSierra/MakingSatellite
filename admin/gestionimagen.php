<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subir Imagen</title>
</head>

<body>
<center>
<img src="../pictures/making/logo.png" width="500" height="400" />
<?php if ((isset($_POST["enviado"])) && ($_POST["enviado"] == "form1")) {
	$nombre_archivo = $_FILES['userfile']['name'];
	move_uploaded_file($_FILES['userfile']['tmp_name'], "../documentos/productos/".$nombre_archivo);
	
	?>
	<script>
    opener.document.form1.strImagen.value="<?php echo $nombre_archivo;?>";
	self.close();
    </script>
	<?php
}
else
{?>

<form action="gestionimagen.php" method="post" enctype="multipart/form-data" id="form1">

  <p>
    <input name="userfile" title="Examinar en Equipo" type="file" />
  </p>
  <p>
    <input type="submit" name="button" id="button" title="Subir Imagen" value="Subir Imagen" />
  </p>
  <input type="hidden" name="enviado" value="form1" />
</form>
<?php } ?>
</center>
</body>
</html>