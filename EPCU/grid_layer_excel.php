<?php
include('model.inc'); // Includes Login Script
include('login_val.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

		<link rel="stylesheet" href="css/table.css" type="text/css"/>	

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


<title>EPC Cartomicro Bienvenido...</title>

<link rel="stylesheet" type="text/css" media="all" href="Plugins/jsdatepick-calendar/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="Plugins/jsdatepick-calendar/jsDatePick.min.1.3.js"></script>
<!-- 
	After you copied those 2 lines of code , make sure you take also the files into the same folder :-)
    Next step will be to set the appropriate statement to "start-up" the calendar on the needed HTML element.
    
    The first example of Javascript snippet is for the most basic use , as a popup calendar
    for a text field input.
-->
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"fecha_rec",
			dateFormat:"%d-%m-%Y"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});
		
		
		
		new JsDatePick({
			useMode:2,
			target:"fecha_nec",
			dateFormat:"%d-%m-%Y"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});
		
		
	};
</script>






<script type="text/javascript">
function activar(l_str_input) {
alert('OK')
//document.getElementById(l_str_input).disabled = false;
}

</script> 





<style type="text/css">
<!--
.style1 {font-family: Georgia, "Times New Roman", Times, serif}
.style2 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style3 {font-family: Geneva, Arial, Helvetica, sans-serif}
-->
</style></head>

<body>
<?PHP

// FUNCIONES

function  get_nombrecliente($cliente)
	{
	
			if ($cliente=="general")
			{
			
			$valor="Cartomicro";
			
			}
		else 
		{
	    $serverName = "SER-SQL"; //serverName\instanceName
		$connectionInfo = array( "Database"=>"Epicor905", "UID"=>"Epicon", "PWD"=>"cart0-7364*");
		$conn = sqlsrv_connect( $serverName, $connectionInfo);

		$valor= "";
			//Si la conexion fue  exitosa
			if( $conn ) 
			{
    		 //echo "Conexi&oacute;n establecida. funct<br />";
			 
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
								
						sqlsrv_close( $conn );
						//mysql_close($connection); // Closing Connection
								 
			}// fin coonn

		}	
		
		return $valor;
	
	}// Fin function
	
	
function  get_camposQry($cliente)
	{
	    $serverName = "SER-SQL"; //serverName\instanceName
		$connectionInfo = array( "Database"=>"SISTEMAS", "UID"=>"Epicon", "PWD"=>"cart0-7364*");
		$conn = sqlsrv_connect( $serverName, $connectionInfo);

		$valor= " select ";
			//Si la conexion fue  exitosa
			if( $conn ) 
			{
    		 //echo "Conexi�n establecida. funct<br />";
			 
			 // Ejecutar consulta de  busqueda  de  usuario y clave
			 
			 $sql = "select * from setup_EPCLI where  userID='$cliente'";
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

for ($x = 1; $x <= 50; $x++) {
    $campo = sqlsrv_get_field( $stmt, $x);
	
	if ( $x == 1)
	$valor=$campo;
	else
		if (  strlen($campo) > 1   )
		$valor=$valor.",".$campo;
} 






					
					 
	
	
	
	
	
					 
					 
       					
						
						sqlsrv_close( $conn );
						//mysql_close($connection); // Closing Connection
					 
				
					 
			 
			 
			}// fin coonn

			
		
		return $valor;
	
	}// Fin function
	
	 	
	
	
?>

<div align="center"><img src="Images/cartomicro_logo.jpg" alt="cart" width="134" height="70" /><img src="Images/cabecera.jpg" width="967" height="70" ></div>
<br />
<table border=0 width="100%">
<tr><td width="6%"></td>
<td width="80%" align="right">Exportar</td>
<td width="9%" align="right"><a href="filters.php"> Nueva  consulta</a>  </td>
<td width="5%" align="right"><a href="index.php"> Salir</a></td>
</tr>
</table>
<div align="center">
  <h2>   EPC  (Estado de Pedido)1.0   </h2>
  <p align="left"> Bienvenido <?php echo " ".get_nombrecliente($_SESSION['login_user']);  echo " ID:".$_SESSION['login_user']; ?></p>
</div>


<?php     

 
function  execute_Qry($sqlstring , $modo)
	{
	    $serverName = "SER-SQL"; //serverName\instanceName
		$connectionInfo = array( "Database"=>"Epicor905", "UID"=>"Epicon", "PWD"=>"cart0-7364*");
		$conn = sqlsrv_connect( $serverName, $connectionInfo);

		$valor= " ";
			//Si la conexion fue  exitosa
			if( $conn ) 
			{
    		
			 
			 $sql = $sqlstring ;
			 $params = array();

			 $stmt = sqlsrv_query( $conn, $sql, $params);


?>

<div class="CSS_Table_Example"  align="center">


<?php

echo "<font  size=3> <table border=1   cellspacing=0>";


if ($modo == "general")
{

echo "<tr><td>Cliente</td><td>ID</td><td> OV</td><td>Lin</td><td>OT </td><td> Parte</td><td>Descrip </td><td> Anch. Cobro</td><td> OC</td><td> Fecha Rec.</td><td>Fecha Nec </td><td>Cant.OV </td><td>Cant. Emb </td><td>Cant.Exist </td><td>ML </td><td>M2 </td><td> M3</td><td> Complemento</td><td>M3  Exist </td><td> Est. OV </td><td>Est.Lin </td><td> Cancelacion</td> <td>  Clase </td><td>  Costo Unit.  </td>  </tr>";



while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {

//echo "<br> Mostrando ".count($row)." resultados <br>";
echo "<tr>";

for ($x = 0; $x <= 23; $x++) {


if (($x == 7)  || ($x == 11) || ($x == 12)|| ($x == 14)  || ($x == 15) || ($x == 16) || ($x == 13) || ($x == 18)  || ($x == 23) )
{


	if (($x == 18))
	{
	   $rowformat = substr($row[$x],0,-11);
	}
	
	else
	{
	
			if (($x == 23))
			{
	
	        $rowformat = "$"."".substr($row[$x],0,-4);
			
			}
				else
			{
   			$rowformat = substr($row[$x],0,-7);
 			}
     }
 	


   
   
   
   
 echo "<td>".$rowformat."</td>";

}
else
{

		if (($x == 17)  || ($x == 21))
		{
				if($row[$x]==1)
				{
				echo "<td>"."SI"."</td>";	
				}
				
				else
				{
				echo "<td>"."NO"."</td>";	
				}
 		 
		}
		
		else
	    {
				if ( ($x == 19) || ($x == 20))		
					{	
								if($row[$x]==1)
								{
								echo "<td>"."Abierta"."</td>";	
								}
				
								else
								{
								echo "<td>"."Cerrada"."</td>";	
								}
 		 
					}
					
					else
					{  
					 echo "<td>".$row[$x]."</td>";
					 }
						
					
		}

}


}

echo "</tr>";



     
}//FIn while


}


else
{


echo "<tr><td> OV</td><td>Lin</td><td>OT </td><td> Parte</td><td>Descrip </td><td> Anch. Cobro</td><td> OC</td><td> Fecha Rec.</td><td>Fecha Nec </td><td>Cant.OV </td><td>Cant. Emb </td><td>Cant.Exist </td><td>ML </td><td>M2 </td><td> M3</td><td> Complemento</td><td>M3  Exist </td><td> Est. OV </td><td>Est.Lin </td><td> Cancelacion</td> <td>  Clase  </td> <td>  Costo Unit.  </td> </tr>";



while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {

//echo "<br> Mostrando ".count($row)." resultados <br>";
echo "<tr>";

for ($x = 0; $x <= 21; $x++) {


if (($x == 5)  || ($x == 9) || ($x == 10)|| ($x == 12)  || ($x == 13) || ($x == 14) || ($x == 11) || ($x == 16) || ($x == 21)  )
{


	if (($x == 16))
	{
	   $rowformat = substr($row[$x],0,-11);
	}
	
	else
	{
	
			if (($x == 21))
			{
	
	        $rowformat = "$"."".substr($row[$x],0,-4);}
				else
			{
   			$rowformat = substr($row[$x],0,-7);
 			}
     }
 
 
 
 
   echo "<td>".$rowformat."</td>";

}
else
{

		if (($x == 15)  || ($x == 19))
		{
				if($row[$x]==1)
				{
				echo "<td>"."SI"."</td>";	
				}
				
				else
				{
				echo "<td>"."NO"."</td>";	
				}
 		 
		}
		
		else
	    {
				if ( ($x == 17) || ($x == 18))		
					{	
								if($row[$x]==1)
								{
								echo "<td>"."Abierta"."</td>";	
								}
				
								else
								{
								echo "<td>"."Cerrada"."</td>";	
								}
 		 
					}
					
					else
					{  
					 echo "<td>".$row[$x]."</td>";
					 }
						
					
		}

}


}

echo "</tr>";



     
}


}





echo "</table></font></div>";
//echo "<br>".$contador." Registros  encontrados";
 //   $campo = sqlsrv_get_field( $stmt, $x);
	
		 
       					
						sqlsrv_free_stmt( $stmt);
						sqlsrv_close( $conn );
						//mysql_close($connection); // Closing Connection
					 
				
					 
			 
			 
			}// fin coonn

			
		
		return $valor;
	
	}// Fin function
	
	 
	 
	 
	 




	 

function  count_Qry($sqlstring)
	{
	    $serverName = "SER-SQL"; //serverName\instanceName
		$connectionInfo = array( "Database"=>"Epicor905", "UID"=>"Epicon", "PWD"=>"cart0-7364*");
		$conn = sqlsrv_connect( $serverName, $connectionInfo);

		$valor= " ";
			//Si la conexion fue  exitosa
			if( $conn ) 
			{
    		
			 
			 $sql = $sqlstring ;
			 $params = array();

			 $stmt = sqlsrv_query( $conn, $sql, $params);
					
				
				
				
				


				
				
					
				
?>









<?php
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) 

{



//echo "<br>SI ENTRAMOS  AL WHILE<br>";
$valor = $valor+1;

     
}

				 
       					
						sqlsrv_free_stmt( $stmt);
						sqlsrv_close( $conn );
						//mysql_close($connection); // Closing Connection
					 
				
					 
			 
			 
			}// fin coonn

			
		
		return $valor;
	
	}// Fin function
	







if ($_SERVER["REQUEST_METHOD"] == "GET")

 { 
// echo "entra  get <br>";
 		if (isset($_GET["estados"]))
    	{
		$numero=$_GET["estados"];
		//echo "estados  define<br>";
		}
		else
		{
		$numero=null;
			//echo "estados  null<br>";		
		}
		
	$tipo=$_GET["tipo"];
	$fecha_rec=$_GET["fecha_rec2"];
	$fecha_nec=$_GET["fecha_nec2"];
	$ot=$_GET["ot"];
	$oc=$_GET["oc"];
	$fs=" ";
	
		
	
	
	
	
	
	$cliente_userid=$_SESSION['login_user'];
	$campos_qry_byID=get_camposQry($cliente_userid);
	
	
	$modelo = new modelo_epc();
	$complemento_qry= $modelo->get_complemento(); 
	
	$implicito_custID="";
		
		
		
		
	 
		
		
	$Abi="False";
	$cerr="False";
	$cancel="False";	
		
	//echo "definidos  estados<br>";
	
	if (isset($numero[0]))
	{
	
	
	$Abi="True" ;
	//echo "Abi defines <br>";
	
	}
	
if (isset($numero[1]))
	{
	
	
	$cerr="True" ;
	//echo "cerr defined<br>";
	
	}

if (isset($numero[2]))
	{
	
	
	$cancel="True" ;
	//echo "cancel  def<br>";
	
	}



$tipo_str="";
	
if (  ($Abi == "False") && ($cerr == "False")  && ($cancel == "False" )) 
{

echo "<br> Al menos  un tipo de  pedido debe ser seleccionado <br>";

}

else
{

//echo "al menos  un estado hay";
	// Solo abiertos
if (  ($Abi == "True") && ($cerr == "False")  && ($cancel == "False" )) 
{
//echo "<br>solo abiertos<br>";
$tipo_str = $tipo_str." and  OrderDtl.OpenLine = 1";

//parametros_msg = parametros_msg + " Pedidos  Abiertos "
}

// Abiertos + cerrados sin cancelaciones

if (  ($Abi == "True") && ($cerr == "True")  && ($cancel == "False" )) 
{

//echo "<br>entra  if abiertos  + cerrados  sin cancelar";
$tipo_str = $tipo_str." and OrderDtl.CheckBox12 = 0";
//parametros_msg = parametros_msg + " Pedidos  Abiertos y Cerrados "
}


// Abiertos - cerrados con cancelaciones


if (  ($Abi == "True") && ($cerr == "False")  && ($cancel == "True" )) 
{
$tipo_str = $tipo_str . "and (OrderDtl.OpenLine = 1 or  OrderDtl.CheckBox12 = 1)";
//parametros_msg = parametros_msg + " Pedidos  Abiertos y Cancelaciones "
}





// Solo cerrados



if (  ($Abi == "False") && ($cerr == "True")  && ($cancel == "False" )) 
{
$tipo_str = $tipo_str . "and (OrderDtl.OpenLine = 0 and OrderDtl.CheckBox12 = 0)";
//parametros_msg = parametros_msg + "  Pedidos  Cerrados "
}





// cerrados + cancelaciones

if (  ($Abi == "False") && ($cerr == "True")  && ($cancel == "True" )) 
{
$tipo_str = $tipo_str . "and  (OrderDtl.OpenLine = 0 or  OrderDtl.CheckBox12 = 1)";
//parametros_msg = parametros_msg + "  Pedidos  Cerrados  y Cancelados "
}




// solo cancelaciones


if (  ($Abi == "False") && ($cerr == "False")  && ($cancel == "True" )) 
{
$tipo_str = $tipo_str . "and OrderDtl.CheckBox12 = 1";
//parametros_msg = parametros_msg + "  Pedidos  Cancelados "
}



// todos los resultados
if (  ($Abi == "False") && ($cerr == "False")  && ($cancel == "True" )) 
{
$tipo_str = $tipo_str . "";
//parametros_msg = parametros_msg + "  Pedidos  Abiertos,Cerrados  y Cancelados "
}


}// fin else

//-------------------------------------


	



$fechasstr="";



$otstr=" ";
$ocstr=" ";


if (strlen($ot) > 2 or  strlen($oc) > 2) 

{

$fechasstr= " ";
$fs=$fechasstr;




if (strlen($ot) > 2)
{
$otstr=" and (JobProd.Jobnum='".$ot."' )";
//$otstr=" ";

}

if (strlen($oc) > 2)
{

$ocstr=" and  OrderHed.PONum='".$oc."'";
}



}


else
{

if (strlen($fecha_nec) > 1)
{

 $fechasstr="and OrderDtl.NeedByDate >='".$fecha_nec."'";
 $date2 = new DateTime($fecha_nec);
$fstr=substr($fechasstr,0,-11);
$fs=$fstr.$date2->format('Y-m-d')."' ";
}

if (strlen($fecha_rec) > 1)
{
$fechasstr="and OrderHed.OrderDate >='".$fecha_rec."'";
$date2 = new DateTime($fecha_rec);
$fstr=substr($fechasstr,0,-11);
$fs=$fstr.$date2->format('Y-m-d')."' ";

}


}		
	
	
	
	
	
	
	$lam="False";
	$caj="False";
	//echo "<br>  0:".$tipo[0]."<br>";
	//echo "<br>  1:".$tipo[1]."<br>";
	
	if ((isset($tipo[0]))  && (isset($tipo[1])))
	{
	
	
	$lam="True" ;
	$caj="True" ;
	
	

	
	}
	
	else
	{
	
	//echo "<br>else tipo 0 :".$tipo[0]."<br>";
			if ($tipo[0]=="CAJA")
			{    
			$caj="True";
			}
			
			
			else 
			{ 
			    $lam="True";  
			} 
	
	}
	
	
	

	
$tipo_prod ="";	


if (  ($lam == "False") && ($caj == "False") ) 
{
 echo "Debe  Seleccionar  al menos  un tipo de  producto";
}
else
{

		if ( ($lam == "True") && ($caj == "True") ) 
		{
		
				
				$tipo_prod=" ";
				//echo "1";
		
		}
			

			if ( ($lam == "True") && ($caj == "False") ) 
		{
		
				
				$tipo_prod=" and Part.ClassID ='LAM'";
					//echo "2";
		
		}
		

			if ( ($lam == "False") && ($caj == "True") ) 
		{
		
				
				$tipo_prod=" and Part.ClassID ='BOX'";
					//echo "3";
		
		}



}
	
	
	
	
	
	
	
	
	
	
	$tipo_pedido_str="";
	
	
	$exis="   ";
	
	if (isset($_GET["siexis"]))
	{
		$exis="  ";
	
	}
	else
	
	{
			$exis=" and PartBin.OnhandQty > 0 ";
	
	}
	
	
	
	
	
	if (strlen($ot) > 2 or  strlen($oc) > 2) 
	{
	$tipo_str=" ";
	$tipo_prod=" ";
	$exis=" ";
	}
	
	
	
	
	
	
$cliente_str=" ";

if ($cliente_userid == "general")
{
$cliente_str=" ";
$sqlstr= "Select  MAX(Customer.Name) as Cliente,MAX(Customer.CustID) as ID ,".$campos_qry_byID." ".$complemento_qry." Where OrderHed.OrderNum = OrderDtl.OrderNum  and ( OrderHed.CustNum = Customer.CustNum and OrderHed.Company = 
      Customer.Company)  and ( OrderDtl.OrderNum = OrderRel.OrderNum   and  OrderDtl.OrderLine = OrderRel.OrderLine)  
      and  (OrderDtl.PartNum = Part.PartNum )     and  OrderHed.OrderNum >= 22720 ".$cliente_str." ".$tipo_str." ".$fs.$tipo_prod.$exis.$otstr.$ocstr." GROUP BY JobProd.JobNum Order By MAX(OrderDtl.NeedByDate) Desc";

}

else

{

$cliente_str = "and  Customer.CustID='".$cliente_userid."' ";

$sqlstr= "Select ".$campos_qry_byID." ".$complemento_qry." Where OrderHed.OrderNum = OrderDtl.OrderNum  and ( OrderHed.CustNum = Customer.CustNum and OrderHed.Company = 
      Customer.Company)  and ( OrderDtl.OrderNum = OrderRel.OrderNum   and  OrderDtl.OrderLine = OrderRel.OrderLine)  
      and  (OrderDtl.PartNum = Part.PartNum )     and  OrderHed.OrderNum >= 22720 ".$cliente_str." ".$tipo_str." ".$fs.$tipo_prod.$exis.$otstr.$ocstr." GROUP BY JobProd.JobNum Order By MAX(OrderDtl.NeedByDate) Desc";

}
	
	
	
	
	
	
//echo " <br>sqltr:".$sqlstr."<br>";
	
	$regis=count_Qry($sqlstr);
	echo " Mostrando ".$regis." registros";
	 execute_Qry($sqlstr,$cliente_userid);
		

	
	}
	


  ?>
</body>
</html>
