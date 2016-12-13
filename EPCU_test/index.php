<?php
include('controladores/login_val.php'); // Includes Login  controlador
?>


<!---- CABEZA  DE  PAGINA --->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />

	<!--Anexos-->
	<link rel="stylesheet" href="Vistas/css/login_form.css" type="text/css"/>	
	<link rel="stylesheet" href="Vistas/css/general.css"  type="text/css"/>
	<title>EPCU Cartomicro</title>
</head>
<body >

	
	<div  id="principal_seccion">
 	 	 <div id="encabezado_general"><img src="Vistas/images/baner_login_1200-70.png" /></div>
	     <div id="login_seccion"><br /> Bienvenido </div>
	     <div class="container">
    	   		<form id="signup" action="" method="post" enctype="multipart/form-data" name="login" >
               <div class="header" ><h3>Iniciar Sesi&oacute;n </h3>
       		 	<p> Por favor  escriba  su nombre de  usuario y contraseña</p>
      			</div>
      			<div class="sep"></div>
     			 <div class="inputs">
      				<input type="text" placeholder="Usuario" name="usuario" autofocus />
       				 <input type="password" placeholder="Password" name="clave" />  
       			 <div class="checkboxy">
      				 <input name="cecky" id="checky" value="1" type="checkbox" checked="checked" />
                	 <label class="terms">Recordar  mis 							datos</label>
       			 </div>
       				 <input name="submit" type="submit" value="Aceptar"  id="submit"/>
            	 <div   align="center" id="error"> <?php echo "".$error; ?></div>             
     			 </div>
 				</form>   
    	</div>

    	<div id="piedepagina">
				<div id="sepadador_general"></div>
     			<p> Cartones  Microcorrugados  S.A  de  C.V              Copyright © 2015</p>
      			<p>Encuartadores #304 Col. Industrial (Abastos), C.P. 37490, León, Gto., México.</p>
     			 <p>Fax: 01 (477) 763 5098, Tels: 01 (477) 763 5070 y 72; 01 (477) 763 5700 y 01. </p>
       </div>

	</div>
</body>
</html>
