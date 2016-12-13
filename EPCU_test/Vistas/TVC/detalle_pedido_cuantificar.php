<?php
// Verificacion de  sesion
session_start();
if (isset($_SESSION['login_user']))
    {
		$nombre_cliente=$_SESSION['custname'];
	    $numero_cliente= $_SESSION['custnum'];
		include ('/../../Modelos/tvc_procedures.php');
		include ('/../../Modelos/procedures.php');
	
			
				
							
					if (isset($_SESSION['order_head']))
    				{
						
						// Transformamos  variables  de  encabezado a  locales
						$oc=$_SESSION['order_head'][0];
						$shipto=$_SESSION['order_head'][1];
						$custnum=$_SESSION['order_head'][2];
						$viacode=$_SESSION['order_head'][3];
						$orderdate=$_SESSION['order_head'][4];
						$requestdate=$_SESSION['order_head'][5];
						$categoria_id=$_POST['cat'];
					}
					
					else
					{
						header("location: ../index.php");
	
					}
				
				
		    


// Definimos  categoria  de display para  detalle de  pedido

if ($categoria_id=='cuantificar')
$categoria='Defina  cantidad';


 				
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
    <link rel="stylesheet" href="../css/table_horizontal.css" type="text/css"/>
    <link rel="stylesheet" href="../css/table.css" type="text/css"/>
    <link href="../css/iconos_pedido.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../Scripts/table.js"></script>
    
    		

		
    
	<title>EPCU Cartomicro</title>
</head>
<body >
	<div  id="principal_seccion">
 	 	 <div id="encabezado_general"><img src="../../Vistas/images/baner_login_1200-70.png" /></div>
         <div id="menu_seccion"> 
                  <ul>
			    	
                   <li><a  class="barramenu" href="../Menu_cust.php">Menu principal</a></li>
                    <li><a  class="barramenu" href="../../Controladores/sesion_cerrar.php">Iniciar Sesion</a></li>
                    <li><a  class="barramenu" href="../filters.php">Consultar OT's</a></li>
                    <li><a  class="barramenu" href="compras_online.php">Mis Compras  Online</a></li>		
                    <li><a  class="barramenu" href="index.php">Nueva OC</a></li>	
                    <li><a  class="barramenu" href="http://cm-tarimas.ddns.net/Tarimas.aspx?custnum=<?php  echo $numero_cliente;  ?>"                     >Control de Tarimas</a></li>			
				 </ul>
         </div>
	     <div id="login_seccion"> Bienvenido <p><?php echo $nombre_cliente;?></p><p><a href="../../Controladores/sesion_cerrar.php">
         Terminar sesion.</a></p>    	
         </div>                        
 		 <div  id="titulo_seccion" ><h3>Nuevo pedido </h3>
         </div>
         <div  id="subtitulos_seccion">
         
         <h4><?php  echo $categoria; ?></h4>
         
         	<div  id="menu_tienda">
			 <a  href="#"><img src="../images/captura_manual.png" alt="Parte Individual" title="Parte Individual"></a> 
			<a  href="#"><img src="../images/ultimas_compras.png"  alt="Ultimas  compras" title="Ultimas  compras"></a>
			<a  href="#"> <img src="../images/compras_comunes.png" alt="Compras  comunes" title="Compras  comunes"></a>
			<a  href="#"><img src="../images/catalogo.png"  alt="Ver catalogo" title="Ver catalogo"> </a>
           
 			</div>

         
         
         </div>    
  		 <div  id="lineas_container"  >
  			
          		<div   id="horizontal_table_titulo"  style="background-color:#BCBCBA"><h5>Informacion general</h5></div>  	
          		<div   id="horizontal_table_container"  >
          
           			<table  class="horizontal" >
						<tr class="fila">
						<td class="titulo" >Su OC:</td>
						<td class="valor" colspan="3"> <?php echo "".$oc;?></td>
						<tr class="fila">
						<td class="titulo">Enviar a:</td>
						<td class="valor"><?php echo "".get_shiptoName($shipto);?></td>
						<tr class="fila">
						<td class="titulo">Via:</td>
						<td class="valor"><?php echo "".get_shipviaDescription($viacode);?></td>

						<tr class="fila">
						<td class="titulo"> Fecha de Captura :</Td>
						<td class="valor"><?php echo "".$orderdate;?></td>
						<tr class="fila">
						<td class="titulo"> Fecha  de Necesidad:</td>
						<td class="valor"><?php echo "".$requestdate;?></td>
						</tr>
				</table>
              </div>   
                
         	 
              <div id='content_small' align='center' > 
              
              <form name="partes_cantidad" method="POST" enctype="multipart/form-data"  action="detalle_pedido_procesar.php">
 
 <table  class='body_cantidades'  >
<tr class="body">
<th class="body" >Parte</th>
<th class="body">Descripcion</th>

<th  class="body">Combinacion</th>
<th class="body">Ancho</th>
<th class="body">Largo</th>

<th class="body">A. Cobro</th>
<th class="body">Desc</th>
<th class="body">Precio Unit.</th>
<th class="body">Cantidad</th>
   </tr>            
           
           
           
           <?php
		   
		   
$partes=$_POST['partes'];

foreach($partes as $parte)
{

get_detalle_parte_small($parte);

}

?>   
      <input type="hidden" name="cat" value="cuantificar"   />        
     <tr><td><button class="submitbtn" >Siguiente</button></td></tr></table></form>  
     
     </div>       
              
              
              
  				  
  			 
              
              
              
              
              
              
              <div id="botonera_pedidos" align="center">
				<a href="javascript:document.partes_seleccion.submit();"><img src="../images/1446156931_sign-add.png" title="Agregar a  pedido" alt="Agregar a compra"  width="40" height="40"/></a>
	  			<a href="view_order_final.php"><img src="../images/1446156886_email.png" title="Enviar Compra" alt="Agregar a                pedido"  width="40" height="40"/></a>
	<a href="view_order.php" target="_blank" onClick="window.open(this.href, this.target,'width=700,height=500,top=120,left=50'); return false;"><img src="../images/1446156911_5.png" alt="Mi compra actual"  title="Ver Compra" width="40" height="40"/></a>
			         
             
             
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
	header("location: ../../index.php");
	}	
   ?>