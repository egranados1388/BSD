<?php
// Verificacion de  sesion
session_start();
if (isset($_SESSION['login_user']))
    {
		include ('/../Controladores/BOCartomicro.php');
		include ('/../Modelos/procedures.php');
		$nombre_cliente=$_SESSION['custname'];
	    $numero_cliente= $_SESSION['custnum'];
		
		
		
		$custID= $_SESSION['login_user'];
		$sqlstr=$_GET['sqlqrystr'];
		
		 
					if ($custID != 'general')
					{
					
					$nregistros=count_Qry($sqlstr);
		
					$categoria=" Se  encontraron ".$nregistros. " registros";
					}
					
					else
					$categoria="";


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
     <link rel="stylesheet" href="css/table_horizontal.css" type="text/css"/>
    <link rel="stylesheet" href="css/table.css" type="text/css"/>
    <script type="text/javascript" src="Scripts/searchform.min.js"></script> 
    <script type="text/javascript" src="Scripts/table.js"></script>   
	<title>EPCU Cartomicro</title>
</head>
<body >


	<div  id="principal_seccion">
 	 	 <div id="encabezado_general"><img src="images/baner_login_1200-70.png" /></div>
         <div id="menu_seccion"> 
         
         <?php 
					if ($custID != 'general')
					{
					?>
                  <ul>
			    	
                   <li><a  class="barramenu" href="Menu_cust.php">Menu </a></li>
                    <li><a  class="barramenu" href="../Controladores/sesion_cerrar.php">Iniciar Sesion</a></li>
                    <li><a  class="barramenu" href="filters.php">Consultar OT's</a></li>
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
                 
  <div  id="subtitulos_seccion">
         
         <h4><?php  echo $categoria; ?></h4>
         
         	<div  id="menu_tienda" style="margin-right:30px">
			 <a  href="../Modelos/phpexcel/phpexcel/excel_epcu.php?qry=<?php echo "".$sqlstr; ?>&modo=<?php echo "".$custID; ?>&cliente=<?php echo "".$nombre_cliente; ?>"><img src="images/1446677645_Excel.png"  width="35"  height="38"  alt="Exportar" title="Exportar"></a> 
			<a  href="filters.php"><img src="images/1446677558_system-search.png"  width="35"  height="38"  alt="Otra consulta" title="Otra consulta"></a>
			
           
 			</div>

         
         
         </div>    
  		 <div  id="lineas_container" >
         <div  id="table_results_qry">
         <?php 
// Mostrar   registros  de  consulta
set_time_limit(60);
execute_Qry($sqlstr,$custID);

//include("../Modelos/contador.php");

?>
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
