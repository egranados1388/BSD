<?php
include('login_val.php'); // Includes Login Script
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--
Sproing! - Make An Elastic Thumbnail Menu
By Sam Dunn
2009 Build Internet!
-->

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>Sproing! - Make An Elastic Thumbnail Menu | Build Internet!</title>	
	
	<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.menuitem img').animate({width: 100}, 0);
			$('.menuitem').mouseover(function(){
					gridimage = $(this).find('img');
					gridimage.stop().animate({width: 200}, 150);
				}).mouseout(function(){
					gridimage.stop().animate({width: 100}, 150);
			});
		}); 
	</script>
	
	<style type="text/css">
		*{ padding:0px; margin:0px; }
		img{ border: none; -ms-interpolation-mode: bicubic; }
		body{ padding:10px; text-align:center; background:#fafafa; }
		
		#wrapper{ position:absolute; left:40%; padding-top:100px; width:450px;}
		
		#menuwrapper{ position:relative; height:210px;}
			#menu{position:absolute; bottom:0; left:0;}
				.menuitem{ position:fixed relative; bottom:0px; display:inline-block; }
				
		
	</style>
	
</head>

<body>


<div align="center"><img src="Images/cabecera.jpg" width="80%" height="70" >
</div>
<div align="center">
 <?php
 
 function  get_nombrecliente($cliente)
	{
	    $serverName = "SER-SQL"; //serverName\instanceName
		$connectionInfo = array( "Database"=>"Epicor905", "UID"=>"Epicon", "PWD"=>"cart0-7364*");
		$conn = sqlsrv_connect( $serverName, $connectionInfo);

		$valor= "";
			//Si la conexion fue  exitosa
			if( $conn ) 
			{
    		 //echo "Conexión establecida. funct<br />";
			 
			 // Ejecutar consulta de  busqueda  de  usuario y clave
			 
			 $sql = "select Name from Customer where  Customer.CustID='$cliente'";
			 $params = array();

			 $stmt = sqlsrv_query( $conn, $sql, $params);
					
					
					
					if( $stmt === false ) // Si no se  ejecuto correctamente
					 {
     					die( print_r( sqlsrv_errors(), true));
					 }
					 
					 
					 
					 
					 // Make the first (and in this case, only) row of the result set available for reading.
if( sqlsrv_fetch( $stmt ) === false) {
     die( print_r( sqlsrv_errors(), true));
}


 $valor = sqlsrv_get_field( $stmt,0);
	




// Get the row fields. Field indeces start at 0 and must be retrieved in order.
// Retrieving row fields by name is not supported by sqlsrv_get_field.








					
					 
	
	
	
	
	
					 
					 
       					
						
						sqlsrv_close( $conn );
						//mysql_close($connection); // Closing Connection
					 
				
					 
			 
			 
			}// fin coonn

			
		
		return $valor;
	
	}// Fin function
	
 
 ?> 
  
  
  
 <br /> Bienvenido  
  <?php echo " ".get_nombrecliente($_SESSION['login_user']);  echo " ID:".$_SESSION["login_user"]; ?>
  
</div>
<div align="center">
  <h2><span class="style1">EPC  </span>(Estado de Pedido) </h2>
</div>



	<div id="wrapper" align="center">
<div id="menuwrapper" align="center">
  <div id="menu" align="center"> <a href="http://buildinternet.com/2009/08/a-bundle-of-free-icons/" class="menuitem"><img src="Images/Agenda_Book_Schedule-512.png" /></a> <a href="http://buildinternet.com/2009/07/a-collection-of-some-pretty-neat-text-artwork/" class="menuitem"><img src="Images/4637-200.png" /></a> <a href="http://officeal.com" class="menuitem"><img src="Images/indice.png" /></a> </div>
</div>
	
	</div>
	
</body>
</html>