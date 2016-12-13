<?php
// Verificacion de  sesion
session_start();
if (isset($_SESSION['login_user']))
    {
		$nombre_cliente=$_SESSION['custname'];
	    $numero_cliente= $_SESSION['custnum'];
		$idcliente=$_SESSION['login_user']
		
	
?>


<!---- CABEZA  DE  PAGINA --->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />

	<!--Anexos-->

	<link rel="stylesheet" href="css/general.css"  type="text/css"/>
    <link rel="stylesheet" href="css/menu.css" type="text/css"/>
    <link rel="stylesheet" href="css/searchform.css" type="text/css"/>	
    <link rel="stylesheet" href="css/searchform.min.css" type="text/css"/>
    <script type="text/javascript" src="Scripts/searchform.min.js"></script>    
	<title>EPCU Cartomicro</title>
</head>
<body >


	<div  id="principal_seccion">
 	 	 <div id="encabezado_general"><img src="images/baner_login_1200-70.png" /></div>
         <div id="menu_seccion"> 
                 
                 <?php 
					if ($idcliente != 'general')
					{
					?>
                    
                  <ul>
			    	
                    
					
                   <li><a  class="barramenu" href="Menu_cust.php">Menu </a></li>
                    <li><a  class="barramenu" href="../Controladores/sesion_cerrar.php">Iniciar Sesion</a></li>
                    <li><a  class="barramenu" href="#">Consultar Pedidos</a></li>
                    <li><a  class="barramenu" href="TVC/compras_online.php">Mis Compras  Online</a></li>		
                    <li><a  class="barramenu" href="TVC/index.php">Nueva OC</a></li>	
                    <li><a  class="barramenu" href="http://cm-tarimas.ddns.net/Tarimas.aspx?custnum=<?php  echo $numero_cliente;  ?>"                     > Tarimas</a></li>			
				 </ul>
                 <?php 
					}
					?>
         </div>
	     <div id="login_seccion"> <p><img src="images/user.jpg" width="35" height="35" /></p>Bienvenido <p><?php echo $nombre_cliente;?></p> <p> <a href="../Controladores/sesion_cerrar.php">
         Terminar sesion.</a></p>
         </div>
         
         
         
 <div  id="titulo_seccion"><h3>Consulta  de  Pedidos </h3></div>
                 
  

<form  method="GET" action="../Controladores/logica_consulta_pedidos.php" enctype="multipart/form-data">
  <div class="col-4">
    <label>
      Incluir
      
      <select   multiple='multiple' name="estados[]" >
                <option value='abiertos' selected="selected">Abiertos</option>
                <option value='cerrados'>Cerrados</option>
                <option value='cancelaciones'>Cancelados</option>
              </select>
    </label>
  </div>
  <div class="col-4">
    <label>
     Lamina
      
     </label> <center style="position:relative; margin-bottom:8px;"> <input  class="js-switch" type='checkbox' value='LAMINA' checked="checked" name="tipo[]" tabindex="2"></center>
    
  </div>
 
  <div class="col-4">
    <label>
      Caja
     </label>
      <center style="position:relative; margin-bottom:8px;"> <input  class="js-switch" type='checkbox' value='CAJA' name="tipo[]" tabindex="3"></center>
    
  </div>
  <div class="col-4">
    <label>
      Fecha necesidad >=
      
      <input   type="date"  name='fecha_nec2' placeholder="DD/MM/AAAA" tabindex="4">
    </label>
  </div>
  <div class="col-4">
    <label>
     Fecha  Orden >=
      <input   type="date" name='fecha_rec2' placeholder="DD/MM/AAAA" tabindex="5">
    </label>
  </div>
 
  <div class="col-4">
    <label>
      OT
   
      <input  placeholder='OT Number' type='text' name='ot'  tabindex="6">
    </label>
  </div>
  <div class="col-4">
    <label>
      OC
     
      <input  placeholder='Identificador oc' type='text' name='oc' tabindex="7">
    </label>
  </div>
  <div class="col-4">
    <label>Incluir  sin existencia</label>
    <center style="position:relative; margin-bottom:8px;"><input  type='checkbox' value='1' name='siexis'  class="js-switch"></center>
  </div>
  
 <SCRIPT>
 var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
 
elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
 
 </script>
 
  <div class="col-submit">
    <button class="submitbtn">Buscar</button>
  </div>
 
</form>
         
         
         
         
         
	    <div id="piedepagina">
				<div id="sepadador_general"></div>
     			<p> Cartones  Microcorrugados  S.A  de  C.V              Copyright © 2015</p>
      			<p>Encuartadores #304 Col. Industrial (Abastos), C.P. 37490, León, Gto., México.</p>
     			 <p>Fax: 01 (477) 763 5098, Tels: 01 (477) 763 5070 y 72; 01 (477) 763 5700 y 01. </p>
       </div>

	</div>
</body>
</html>




<?php

// Fin de verificacion de  sesion valida   
   	}
	else  
	{
	header("location: ../../index.php");
	}	
   ?>
