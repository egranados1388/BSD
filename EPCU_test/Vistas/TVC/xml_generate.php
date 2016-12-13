<?php
// Verificacion de  sesion
session_start();
if (isset($_SESSION['login_user']))
    {
		$nombre_cliente=$_SESSION['custname'];
	    $numero_cliente= $_SESSION['custnum'];
		include ('/../../Modelos/tvc_procedures.php');
		
	
			
										
					if (isset($_SESSION['order_head']))
    				{
						
						$customer=$_POST['custnum'];
						$oc=$_POST['oc'];
						$ship=$_POST['shipto'];
						$via=$_POST['viacode'];
						$order=$_POST['orderdate2'];
						$request=$_POST['requestdate2'];
						$carro=$_SESSION['carro'];
						
						
						
						 
 $xml="<OrderHed>\n\t\t";

   $xml .= "<PONum>".$oc."</PONum>\n\t\t";
    $xml .= "<ShipToNum>".$customer."</ShipToNum>\n\t\t";
    $xml .= "<ShipTo>".$ship."</ShipTo>\n\t\t";
    $xml .= "<ShipViaCode>".$via."</ShipViaCode>\n\t\t";
	 $xml .= "<Character01>"."TV01"."</Character01>\n\t\t";
$xml .= "<BTCustID>".$customer."</BTCustID>\n\t\t";
$xml .= "<RequestDate>".$request."</RequestDate>\n\t\t";
$xml .= "<ShipNoLater>".$request."</ShipNoLater>\n\t\t";
						
						
	
	
	

$nlinea=0;
$cantidad=0;
$price=0;
foreach ($carro as $articulo => $propiedad)
{
$nlinea=$nlinea + 1 ;	
	
	
	 $xml .= "<OrderDtl>\n\t\t";
	  $xml .= "<NeedByDate>".$request."</NeedByDate>\n\t\t";
	  $xml .= "<OrderDate>".$order."</OrderDate>\n\t\t";
	  $xml .= "<OrderLine>".$nlinea."</OrderLine>\n\t\t";
	  $xml .= "<PartNum>".$articulo."</PartNum>\n\t\t";
	 
	  	foreach ($propiedad as $p => $val)
	{
		
		
		if ($p=='cantidad')
		{
		  $xml .= "<OrderQty>".$val."</OrderQty>\n\t\t";
		  $xml .= "<SellingQuantity>".$val."</SellingQuantity>\n\t\t";
		  $cantidad=$val;
		}
		  if ($p=='precio')
		 {
		  $xml .= "<UnitPrice>".$val."</UnitPrice>\n\t\t";
		  $price=$val;
		 }
	}
	
	$xml .= "<buyerPartNo>".$articulo."</buyerPartNo>\n\t\t";
	$xml .= "<sellinFactor>1</sellinFactor>\n\t\t";
	$xml .= "<sellinFactorDirection>1</sellinFactorDirection>\n\t\t";
	$xml .= "<sellinFactorQty>1</sellinFactorQty>\n\t\t";
	 $xml .= "</OrderDtl>\n\t\t";
	 
	 
	 dtl_insert($oc,$nlinea,$articulo,$cantidad,$price);
	 
}




   
    $xml.="</OrderHed>\n\t";

$hoy = date("Ymd");  
$xmlobj=new SimpleXMLElement($xml);
$xmlobj->asXML("xmlOrders/".$hoy."-".$oc."-".$customer.".xml");
	
	head_insert($oc,$customer,$order,"Enviado","",$request,$via,$ship);
	
	
	
	
	
$variable = $_SESSION['order_head'];
unset( $_SESSION['order_head'], $variable );
$variable2 = $_SESSION['carro'];
unset( $_SESSION['carro'], $variable2 );
	
	
	
	
	
	
	
	
	
	
						

					}
					
					else
					{
						header("location: ../index.php");
	
					}
				
				
		    


// Definimos  categoria  de display para  detalle de  pedido


$categoria='Su compra  se  ha   enviado con exito';


 				
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
         
         
         
         <div id="view_oc_seccion">
         
  <a href="index.php"> Nuevo pedido </a><br>
<a href="../menu_cust.php"> Volver  a  menu </a><br>
<a href="#verped">Mis  pedidos  online</a><br>
         
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