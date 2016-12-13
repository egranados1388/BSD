<?php
// Verificacion de  sesion
session_start();
if (isset($_SESSION['login_user']))
    {
		$nombre_cliente=$_SESSION['custname'];
	    $numero_cliente= $_SESSION['custnum'];
		include ('/../../Modelos/tvc_procedures.php');
		include ('/../../Modelos/procedures.php');
	
			// Si hay datos  para  encabezado nuevo
			if (isset($_POST['OCNumber']) &&  isset($_POST['shipto']) && isset($_POST['custnum']) && isset($_POST['viacode']) && 		             isset($_POST['orderdate']) && isset($_POST['requestdate'])) 
     		{
				
				//Guardamos o sobreescribimos en variables  de  sesion dentro de  orderhed los valores  recibidos  de  index.php para                encabezado
				$_SESSION['order_head'][0]=$_POST['OCNumber'];
				$_SESSION['order_head'][1]=$_POST['shipto'];
				$_SESSION['order_head'][2]=$_POST['custnum'];
				$_SESSION['order_head'][3]= $_POST['viacode'];
				$_SESSION['order_head'][4]=$_POST['orderdate'];
				$_SESSION['order_head'][5]=$_POST['requestdate'];
				    $_SESSION['order_head'][6]=   str_replace("-","",$_POST['orderdate']);
					$_SESSION['order_head'][7]=    str_replace("-","",$_POST['requestdate']);
				
				// Transformamos  variables  de  encabezado a  locales
				$oc=$_SESSION['order_head'][0];
				$shipto=$_SESSION['order_head'][1];
				$custnum=$_SESSION['order_head'][2];
				$viacode=$_SESSION['order_head'][3];
				$orderdate=$_SESSION['order_head'][4];
				$requestdate=$_SESSION['order_head'][5];
				$categoria_id=$_POST['cat'];
			}
				
				
			// Si no hay datos  recibidos  de  nuevo encabezado verificamos  existencia  de  encabezado previo o en su defecto
			// redireccionamos  para  ingresar  un encabezado primero
			else
			{
				
					if (isset($_SESSION['order_head']))
    				{
						
						// Transformamos  variables  de  encabezado a  locales
						$oc=$_SESSION['order_head'][0];
						$shipto=$_SESSION['order_head'][1];
						$custnum=$_SESSION['order_head'][2];
						$viacode=$_SESSION['order_head'][3];
						$orderdate=$_SESSION['order_head'][4];
						$requestdate=$_SESSION['order_head'][5];
						$categoria_id=$_GET['cat'];
					}
					
					else
					{
						header("location: ../index.php");
	
					}
				
				
		    } 


// Definimos  categoria  de display para  detalle de  pedido
if (isset($_POST['OCNumber']))
{
		if ($categoria_id=='recurrente')
$categoria='Sus  compras  comunes...';
		
if ($categoria_id=='ultimos')
$categoria='Sus ultimas  compras...';

if ($categoria_id=='catalogo')
$categoria='Nuestros  productos...';

if ($categoria_id=='manual')
$categoria='Buscar  parte...';	
}
else
{
	
if ($categoria_id=='recurrente')
$categoria='Sus  compras  comunes...';
		
if ($categoria_id=='ultimos')
$categoria='Sus ultimas  compras...';

if ($categoria_id=='catalogo')
$categoria='Nuestros  productos...';

if ($categoria_id=='manual')
$categoria='Buscar  parte...';	

}
 				
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
    
    		
<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "partes_sug.php?parte=" + str, true);
        xmlhttp.send();
    }
}
</script>
		
    
	<title>EPCU Cartomicro</title>
</head>
<body >
	<div  id="principal_seccion">
 	 	 <div id="encabezado_general"><img src="../../Vistas/images/baner_login_1200-70.png" /></div>
         <div id="menu_seccion"> 
                  <ul>
			    	
                   <li><a  class="barramenu" href="../Menu_cust.php">Menu </a></li>
                    <li><a  class="barramenu" href="../../Controladores/sesion_cerrar.php">Iniciar Sesion</a></li>
                    <li><a  class="barramenu" href="../../Vistas/filters.php">Consultar OT's</a></li>
                    <li><a  class="barramenu" href="compras_online.php">Mis Compras  Online</a></li>		
                    <li><a  class="barramenu" href="index.php">Nueva OC</a></li>	
                    <li><a  class="barramenu" href="http://cm-tarimas.ddns.net/Tarimas.aspx?custnum=<?php  echo $numero_cliente;  ?>"                     > Tarimas</a></li>			
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
			 <a  href="detalle_pedido.php?cat=manual"><img src="../images/captura_manual.png" alt="Parte Individual" title="Parte Individual" ></a> 
			<a  href="detalle_pedido.php?cat=ultimos"><img src="../images/ultimas_compras.png"  alt="Ultimas  compras" title="Ultimas  compras"></a>
			<a  href="detalle_pedido.php?cat=recurrente"> <img src="../images/compras_comunes.png" alt="Compras  comunes" title="Compras  comunes"></a>
			<a  href="detalle_pedido.php?cat=catalogo"><img src="../images/catalogo.png"  alt="Ver catalogo" title="Ver catalogo"> </a>
           
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
                
         	  <div  id="lineas_seccion" >
  				  <form name="partes_seleccion" method="POST" enctype="multipart/form-data"  action="detalle_pedido_cuantificar.php"  >
				  
					 <?php
					 
					 
					 
if ($categoria_id=='recurrente')

{
echo "<table class=body_80 >
				 	 <tr class=body><th class=body>Parte</th><th class=body>Ventas</th><th class=body>Seleccionar</th><th                     class=body>
                     </tr>";
get_topHistorico($custnum);


}
		
if ($categoria_id=='ultimos')
{
	echo "<table class=body_80 >
				 	 <tr class=body><th class=body>Parte</th><th class=body>Ventas</th><th class=body>Seleccionar</th><th                     class=body>
                     </tr>";
					 
					 
	$fecha_hoy=date('Y-m-d') ; 
	$fecha_nec = strtotime ( '-30 day' , strtotime ( $fecha_hoy ) ) ;
	$fecha_nec= date ( 'Y-m-d' , $fecha_nec );
			 
					 
get_toplast($custnum ,$fecha_nec,$fecha_hoy);



	
}

if ($categoria_id=='catalogo')
{
	
	echo "<table class=body_80 >
				 	 <tr class=body><th class=body>Parte</th><th class=body>Desc.</th><th class=body>Seleccion</th><th                     class=body>
                     </tr>";
get_catalogo();


	
}

if ($categoria_id=='manual')
{
	?>
    
   
  &nbsp; <input type="text" id="searchpart" name="searchpart" value="" placeholder="Ingrese  numero de parte" onkeyup="showHint(this.value)"/>
   <button type="button" onclick="loadDoc()">Buscar</button>
    
    <div id="search_result" style="width:435px;height:250px; margin-top:15px; margin-left:5px; overflow:auto;">
    
    <p><span id="txtHint">
    
        
    
    
    </span></p>
    </div>
    
    
    
    <?php
}
					 
					 
					 ?>
                     <input type="hidden" name="cat" value="cuantificar" />
				 </table>
				 </form>
  			  
              
              
              
              </div>
              
              
              
              <div  id="parteview_seccion" >
              <div style="width:290px; height:20px; background-color:#D8D8D8; margin-top:2px;   padding:5px ; position:relative; font:12px Arial, Helvetica, sans-serif; color:#555;
	letter-spacing:0px;
	text-align:left;  font-weight:bold">Detalle  de  Parte</div>
               <iframe  width="100%" height="91%" style="border:none; " name="detalle_parte_frame" src="detalle_parte.php" > </iframe>
               
           </div>
              
              
           <div id="botonera_pedidos" align="center">
				<a href="javascript:document.partes_seleccion.submit();"><img src="../images/1447289134_shopping-add.png" title="Agregar a  pedido" alt="Agregar a compra"  /></a>
	  			<a href="view_order_final.php"><img src="../images/rpocesarped.png" title="Enviar Compra" alt="Agregar a                pedido" /></a>
	<a href="view_order.php" target="_blank" onClick="window.open(this.href, this.target,'width=700,height=500,top=120,left=50'); return false;"><img src="../images/verpediso.png" alt="Mi compra actual"  title="Ver Compra" /></a>
			         
             
             
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
