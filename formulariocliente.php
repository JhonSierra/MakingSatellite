<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Making Satellite</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/droid_sans_400-droid_sans_700.font.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="menu_nav">
        <ul>
          <li class="active"><a href="index.php"><span>Inicio</span></a></li>
          <li><a href="quienessomos.php"><span>¿Quienes Somos?</span></a></li>
          <li><a href="contacto.php"><span>Contacto</span></a></li>
          <li><a href="Carrito.php"><span>Carrito</span></a></li>
        </ul>
      </div>
      <div class="logo">
        <h1><a href="index.html">Making Satellite<small>Company Slogan Here</small></a></h1>
      </div>
      <div class="clr"></div>
      <div class="slider">
        <div id="coin-slider"> <a href="#"><img src="images/slide1.jpg" width="940" height="336" alt="" /> </a> <a href="#"><img src="images/slide2.jpg" width="940" height="336" alt="" /> </a> <a href="#"><img src="images/slide3.jpg" width="940" height="336" alt="" /> </a> </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <h2>Bienvenid@!!!</h2>
          <p>&nbsp;</p>
          <h2><head><marquee bgcolor="black" behavior="alternate"><font size="5" color="white"><b>Registrar </b></font></marquee></h2>
          <br />
          <br />
          <div>
          <form method="post" action="NuevoCliente.php">
      <table width="493" border="1">
              <tr>
                <td width="137"><font face="georgian" font size="4" color="white">Id:</font></td>
                <td width="188"><span id="sprytextfield10">
                <label for="idclientes"></label>
                <center><input type="text" name="idclientes" id="idclientes" /></center>
                <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span></td>
              </tr>
              <tr>
                <td><font face="georgian" font size="4" color="white">Nombre:</font></td>
                <td><span id="sprytextfield11">
                  <label for="nombre"></label>
                  <center><input type="text" name="nombre" id="nombre" /></center>
                <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
              </tr>
              <tr>
                <td><font face="georgian" font size="4" color="white">Primer Apellido:</font></td>
                <td><span id="sprytextfield12">
                  <label for="primerapellido"></label>
                  <center><input type="text" name="primerapellido" id="primerapellido" /></center>
                <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
              </tr>
              <tr>
                <td><font face="georgian" font size="4" color="white">Segundo Apellido:</font></td>
                <td><span id="sprytextfield13">
                  <label for="segundoapellido"></label>
                  <center><input type="text" name="segundoapellido" id="segundoapellido" /></center>
                <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
              </tr>
              <tr>
                <td><font face="georgian" font size="4" color="white">Documento de Identidad:</font></td>
                <td><span id="sprytextfield14">
                <label for="documentoidentidad"></label>
                <center><input type="text" name="documentoidentidad" id="documentoidentidad" /></center>
                <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span></td>
              </tr>
              <tr>
                <td><font face="georgian" font size="4" color="white">Fecha de Nacimiento:</font></td>
                <td><span id="sprytextfield15">
                  <label for="fechanacimiento"></label>
                  <center><input type="text" name="fechanacimiento" id="fechanacimiento" /></center>
                <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
              </tr>
              <tr>
                <td><font face="georgian" font size="4" color="white">Direccion</font></td>
                <td><span id="sprytextfield16">
                  <label for="direccion"></label>
                  <center><input type="text" name="direccion" id="direccion" /></center>
                <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
              </tr>
              <tr>
                <td><font face="georgian" font size="4" color="white">Correo</font></td>
                <td><span id="sprytextfield17">
                  <label for="correo"></label>
                  <center><input type="text" name="correo" id="correo" /></center>
                <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
              </tr>
              <tr>
                <td><font face="georgian" font size="4" color="white">Telefonos</font></td>
                <td><span id="sprytextfield18">
                  <label for="telefonos"></label>
                  <center><input type="text" name="telefonos" id="telefonos" /></center>
                <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
              </tr>
              <tr>
                <td><img src="registro.png" width="100" height="100" /></td>
                <td><center><input type="submit" name="enviar" value="Insertar">
                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Borrar"></center></td>
              </tr>
            </table>
          </div>
      <div class="img"></div>
          
          <div class="post_content">
            <p></div>
      <div class="clr"></div>
        </div>
        <div class="article">
          <h2><span>We'll Make Sure Template</span> Works For You</h2>
          <p class="infopost">Posted on <span class="date">29 aug 2016</span> by <a href="#">Admin</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under <a href="#">templates</a>, <a href="#">internet</a></p>
          <div class="clr"></div>
          <div class="img"><img src="images/img2.jpg" width="162" height="192" alt="" class="fl" /></div>
          <div class="post_content">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. <a href="#">Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo.</a> Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam. Cras fringilla magna. Phasellus suscipit, leo a pharetra condimentum, lorem tellus eleifend magna, eget fringilla velit magna id neque. Curabitur vel urna. In tristique orci porttitor ipsum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam.</p>
            <p><strong>Aenean consequat porttitor adipiscing. Nam pellentesque justo ut tortor congue lobortis. Donec venenatis sagittis fringilla.</strong> Etiam nec libero magna, et dictum velit. Proin mauris mauris, mattis eu elementum eget, commodo in nulla. Mauris posuere venenatis pretium. Maecenas a dui sed lorem aliquam dictum. Nunc urna leo, imperdiet eu bibendum ac, pretium ac massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi. Quisque condimentum luctus ullamcorper.</p>
            <p class="spec"><a href="#" class="rm">Read more</a> <a href="#" class="com"><span>7</span> Com</a></p>
          </div>
          <div class="clr"></div>
        </div>
        <p class="pages"><small>Page 1 of 2</small> <span>1</span> <a href="#">2</a> <a href="#">&raquo;</a></p>
      </div>
      <div class="sidebar">
        <div class="searchform">
          <form id="formsearch" name="formsearch" method="post" action="#">
            <span>
            <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search our ste:" type="text" />
            </span>
            <input name="button_search" src="images/search.jpg" class="button_search" type="image" />
          </form>
    </div>
        <div class="clr"></div>
        <div class="gadget">
          <h2 class="star">Menu</h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            <li><a href="formulariocliente.php">Registrar</a></li>
            <li><a href="buscarcliente.php">Buscar</a></li>
            <li><a href="modificarcli.php">Modificar</a></li>
            <li><a href="eliminarcli.php">Eliminar</a></li>
            
          </ul>
        </div>
        <div class="gadget">
          <h2 class="star"><span>Redes Sociales</span></h2>
          <div class="clr"></div>
          <ul class="ex_menu">
            <li>
              <div align="center"><a href="http://www.facebook.com"><img src="facebook.png" alt="map" width="74" height="68" /></a><br />
              <h2>Facebook</h2>
              </div>
            </li>
            <li>
              <div align="center"><a href="http://www.twitter.com"><img src="twitter.png" alt="map" width="74" height="68" /></a>
              <br />
              <h2>Twitter</h2>
              </div>
            </li>
            <li>
              <div align="center"><a href="http://www.youtube.com"><img src="youtube.png" alt="map" width="74" height="68" /></a><br />
              <h2>Youtube</h2>
              </div>
            </li>
            <li>
              <div align="center"><a href="http://www.instagram.com"><img src="instagram.png" alt="map" width="74" height="68" /></a><br />
              <h2>Instagram</h2>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image</span> Gallery</h2>
        <a href="#"><img src="images/gal1.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal2.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal3.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal4.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal5.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal6.jpg" width="75" height="75" alt="" class="gal" /></a> </div>
      <div class="col c2">
        <h2><span>Services</span> Overview</h2>
        <p>Curabitur sed urna id nunc pulvinar semper. Nunc sit amet tortor sit amet lacus sagittis posuere cursus vitae nunc.Etiam venenatis, turpis at eleifend porta, nisl nulla bibendum justo.</p>
        <ul class="fbg_ul">
          <li><a href="#">Lorem ipsum dolor labore et dolore.</a></li>
          <li><a href="#">Excepteur officia deserunt.</a></li>
          <li><a href="#">Integer tellus ipsum tempor sed.</a></li>
        </ul>
      </div>
      <div class="col c3">
        <h2><span>Contacto</span></h2>
        <p>Aqui podras dejar tus dudas e inquietudes, no dudes en escribirnos nosotros te responderemos y te ayudaremos a darle solucion.</p>
        <p><span>Direccion:</span> Cra 81 G #73-57sur, Bogota D.c<br />
          <span>Telefono:</span> 3134830894<br />
          <span>FAX:</span> +458-4578<br />
          <span>Otros:</span>3132820179<br />
          <span>E-mail:</span> <a href="#">jcmoreno007@misena.edu.co</a></p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">&copy; Copyright <a href="#">MyWebSite</a>.</p>
      <p class="rf">Design by Dream <a href="http://www.dreamtemplate.com/">Web Templates</a></p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "integer", {validateOn:["blur"]});
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11", "none", {validateOn:["blur"]});
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12", "none", {validateOn:["blur"]});
var sprytextfield13 = new Spry.Widget.ValidationTextField("sprytextfield13", "none", {validateOn:["blur"]});
var sprytextfield14 = new Spry.Widget.ValidationTextField("sprytextfield14", "integer", {validateOn:["blur"]});
var sprytextfield15 = new Spry.Widget.ValidationTextField("sprytextfield15", "none", {validateOn:["blur"]});
var sprytextfield16 = new Spry.Widget.ValidationTextField("sprytextfield16", "none", {validateOn:["blur"]});
var sprytextfield17 = new Spry.Widget.ValidationTextField("sprytextfield17", "none", {validateOn:["blur", "change"]});
var sprytextfield18 = new Spry.Widget.ValidationTextField("sprytextfield18", "none", {validateOn:["blur"]});
</script>
</body>
</html>