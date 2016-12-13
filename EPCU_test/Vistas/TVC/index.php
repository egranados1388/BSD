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

	<link rel="stylesheet" href="../css/general.css"  type="text/css"/>
    <link rel="stylesheet" href="../css/menu.css" type="text/css"/>
    <link rel="stylesheet" href="../css/searchform.css" type="text/css"/>	
    <link rel="stylesheet" href="../css/searchform.min.css" type="text/css"/>
    <script type="text/javascript" src="Scripts/searchform.min.js"></script>    
	<title>EPCU Cartomicro</title>
</head>
<body >


	<div  id="principal_seccion">
 	 	 <div id="encabezado_general"><img src="../../Vistas/images/baner_login_1200-70.png" /></div>
         <div id="menu_seccion"> 
                  <ul>
			    	
                   <li><a  class="barramenu" href="../Menu_cust.php">Menu principal</a></li>
                    <li><a  class="barramenu" href="../../Controladores/sesion_cerrar.php">Iniciar Sesion</a></li>
                    <li><a  class="barramenu" href="../../Vistas/filters.php">Consultar OT's</a></li>
                    <li><a  class="barramenu" href="compras_online.php">Mis Compras  Online</a></li>		
                    <li><a  class="barramenu" href="#">Nueva OC</a></li>	
                    <li><a  class="barramenu" href="http://cm-tarimas.ddns.net/Tarimas.aspx?custnum=<?php  echo $numero_cliente;  ?>"                     >Control de Tarimas</a></li>			
				 </ul>
         </div>
	     <div id="login_seccion"> Bienvenido <p><?php echo $nombre_cliente;?></p> <p> <a href="../../Controladores/sesion_cerrar.php">
         Terminar sesion.</a></p>
         </div>
         
         
         
 <div  id="titulo_seccion"><h3>Nuevo pedido </h3></div>
                 
   

<?php
// Verificando si hay pedido en curso
		if (isset($_SESSION['order_head']))

			{
				//Si habia  pedido en curso pero ya  no se desea continuar se  eliminan variables  de sesion y
				//se direcciona a la  misma  pagina  con formulario limpio
				if (isset($_GET['new']))
				{
					$variable = $_SESSION['order_head'];
					unset( $_SESSION['order_head'], $variable );
					$variable2 = $_SESSION['carro'];
					unset( $_SESSION['carro'], $variable2 );
					header("location: index.php"); // Redirecting To Other Page
				}
	
				// Opciones  para  pedido pendiente
		        echo "Pedido pendiente";
				echo "<br><a href='detalle_pedido.php?cat=recurrente'> Continuar</a> ";
				echo "<br><a href='index.php?new=yes'> Omitir  y realizar  nuevo pedido</a> ";
			}
	
	
			// Si no hay un pedido en memoria  se  despliega formulario 
			else
			{
	
	
				include ('../../Controladores/BOCartomicro.php');
				include ('../../Modelos/procedures.php');
				$fecha_hoy=date('Y-m-d') ; 
				$fecha_nec = strtotime ( '+5 day' , strtotime ( $fecha_hoy ) ) ;
				$fecha_nec= date ( 'Y-m-d' , $fecha_nec );

			
?>
<form name="partes_seleccion" method="POST" enctype="multipart/form-data"  action="detalle_pedido.php">
		<div class="col-2">
			<label>Su OC:</label>
			<input type="text" id="demo" name="OCNumber" required="true" autofocus placeholder="SU OC">
        	<input type="hidden" name="custnum" value="<?php echo $numero_cliente;?>"></div>
			<input type="hidden" name="cat" value="recurrente">
		<div class="col-2">
       		<label>Enviar a:</label>
            <select   id="shipto" name="shipto"><?php   echo "".get_shiptoCust($numero_cliente); ?></select>
         </div>
         <div class="col-2">
         	<label>Via:</label>
            <select name="viacode"  ><?php   echo "".get_shipviacodes();   ?> </select>
         </div>
         <div class="col-2"> 
         <label> Fecha de Captura :</label>
         <input type="date" name="orderdate"  value="<?php echo $fecha_hoy; ?>"  readonly="yes" />
        
         </div>
		 <div class="col-2">
         <label>Fecha  de Necesidad:  </label>
         <input type="date"  name="requestdate" value="<?php echo $fecha_nec; ?>">
         </div>
		 <div class="col-submit">
         <button class="submitbtn" >Siguiente</button>
         </div>
</form>
<?php  } // Fin de  nuevo pedido  ?>


         
         
         
         
         
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
