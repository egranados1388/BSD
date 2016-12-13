
<?php
// Verificacion de  sesion
session_start();
if (isset($_SESSION['login_user']))
    {
	
	$nombre_cliente=$_SESSION['custname'];
	$numero_cliente= $_SESSION['custnum'];
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
    <link rel="stylesheet" href="css/navegador.css" type="text/css"/>  
    <script type="text/javascript" src="Scripts/jquery-1.3.2.js.txt"></script>
	<script type="text/javascript"  src="Scripts/menu_principal.js"></script>
    
	<title>EPCU Cartomicro</title>
</head>
<body >


	<div  id="principal_seccion">
 	 	 <div id="encabezado_general"><img src="../Vistas/images/baner_login_1200-70.png" /></div>
         <div id="menu_seccion"> 
                  <ul>
			    	
                    <li><a  class="barramenu" href="#">Menu</a></li>
                    <li><a  class="barramenu" href="../Controladores/sesion_cerrar.php">Iniciar Sesion</a></li>
                    <li><a  class="barramenu" href="../Vistas/filters.php">Consulta  Pedidos</a></li>
                    <li><a  class="barramenu" href="TVC/compras_online.php">Mis Compras  Online</a></li>		
                    <li><a  class="barramenu" href="TVC/index.php">Nueva OC</a></li>	
                    <li><a  class="barramenu" href="http://cm-tarimas.ddns.net/Tarimas.aspx?custnum=<?php  echo $numero_cliente;  ?>"> Tarimas</a></li>			
				 </ul>
         </div>
	     <div id="login_seccion"> <p><img src="images/user.jpg" width="35" height="35" /></p>Bienvenido <p><?php echo $nombre_cliente;?></p> <p> <a href="../Controladores/sesion_cerrar.php">
         Terminar sesion.</a></p>
         </div>
         
         
         
 
                 
         
<!--Menu-->
<div id="wrapper" align="center" >
	<div id="menuwrapper" align="center" >
  		<div id="menu" align="center""> 
        	<a href="filters.php" class="menuitem"><img src="images/Agenda_Book_Schedule-512.png" /></a>
            <a href="http://cm-tarimas.ddns.net/Tarimas.aspx?custnum=<?php  echo "".$_SESSION['custnum'];  ?>" class="menuitem"><img 					             src="images/4637-200.png" /></a> 
            <a  href="TVC/index.php" class="menuitem"><img src="images/indice.png" /></a>
        </div>
	</div>
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




<?php

// Fin de verificacion de  sesion valida   
   	}
	else  
	{
	header("location: ../index.php");
	}	
   ?>





