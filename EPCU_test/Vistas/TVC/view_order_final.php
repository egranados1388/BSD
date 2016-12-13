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
						$OC=$_SESSION['order_head'][0] ;
						$shipto=$_SESSION['order_head'][1] ;
						$custnum=$_SESSION['order_head'][2];
 						$viacode=$_SESSION['order_head'][3];
 						$orderdate=$_SESSION['order_head'][4];
						$requestdate=$_SESSION['order_head'][5];
						$custID=$_SESSION['login_user'];
						$custname=$_SESSION['custname'];
						
						$orderdate2=$_SESSION['order_head'][6];
						$requestdate2=$_SESSION['order_head'][7];

					}
					
					else
					{
						header("location: ../index.php");
	
					}
				
				
		    


// Definimos  categoria  de display para  detalle de  pedido


$categoria='Su  compra';


 				
?>
<?php $lineas=$_SESSION['carro'];    ?>

<input type="hidden"  name="lineas" value="<?php  echo "".$lineas;?>">

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
         <form action="xml_generate.php" method="post"> 
         <table class="oc_section">
<tr><td class="titulo">Cliente:</td><td class="valor" colspan="3"><?php  echo "".$custname;?></td><tr><td class="titulo">OC</td><td class="valor" colspan="3"><?php  echo "".$OC;?></td>
<tr><td class="titulo">Enviar  a</td><td class="valor"><?php  echo "".$shipto;?></td><td class="titulo">Via</td><TD class="valor"><?php  echo "".$viacode;?> </TD></tr>
<tr><td class="titulo">Fecha captura</td><td class="valor"><?php  echo "".$orderdate;?></td><td class="titulo">Fecha  necesidad</td><td class="valor"><?php  echo "".$requestdate;?></td>
</tr></tr>

<input type="hidden"  name="custnum" value="<?php  echo "".$custnum;?>">
<input type="hidden"  name="oc" value="<?php  echo "".$OC;?>">
<input type="hidden"  name="shipto" value="<?php  echo "".$shipto;?>">
<input type="hidden"  name="viacode" value="<?php  echo "".$viacode;?>"> 
<input type="hidden"  name="orderdate" value="<?php  echo "".$orderdate;?>">
<input type="hidden"  name="requestdate" value="<?php  echo "".$requestdate;?>">
        
       <input type="hidden"  name="orderdate2" value="<?php  echo "".$orderdate2;?>">
<input type="hidden"  name="requestdate2" value="<?php  echo "".$requestdate2;?>"> 
      </table>  
     <br /><br /> 
      
  <?php
  
   if (isset($_SESSION['carro']))
 {
echo "<table class='body_80'><tr class='body'><th class='body'>Linea<th class='body'> Parte<th class='body'>Cantidad<th class='body'>Precio Unitario<th class='body'> Importe";
$linea=0;
$neto=0;
foreach ($_SESSION['carro'] as $k => $v)
{
	$linea=$linea+1;
	$importe=0;
	echo "<tr class='body'><td class='body'>$linea";			
    echo "<td class='body'>".$k."</td>";
	foreach($v as $j => $z)
	{
		if ($j == 'cantidad')
		{
		echo "<td class='body'>".$z."</td>";
		$cantidad=$z;
		}
		
		if ($j == 'precio')
		{		
		echo "<td class='body'>$ ".round($z,2)."</td>";
		$precio=round($z,2);
		}
		
		
	}
	$importe = $cantidad * $precio;			
    echo "<td class='body'>$ $importe</tr>";
	$neto=$neto + $importe;
}

echo "<tr class='body'><td colspan=4 align=right class='body'> Total : <td class='body'>$ $neto </tr></table>";
 }


else
 
 {
	 
  echo "</p>Aun no se agregan detalles</p>";
	 
 }


?>
      
      <input type="submit"  value="Confirmar" class="submitbtn">
        </form>
         
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