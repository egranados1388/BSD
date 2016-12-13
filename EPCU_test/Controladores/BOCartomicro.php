<?php

// Objetos  de  negocio cartomicro








function  get_nombrecliente($cliente)
	{
		//include('/../Modelos/procedures.php');
		if ($cliente=="general")
			{
			
			$valor="Cartomicro";
			
			}
			else
			{
		
		
		
	   
		$conn = abrir_conexion_EpicorDB();
		$valor= "";
			//Si la conexion fue  exitosa
			if( $conn ) 
			{
    		 //echo "Conexión establecida. funct<br />";
			 
			 // Ejecutar consulta de  busqueda  de  usuario y clave
			 
			 $sql = "select Name from Customer where  Customer.CustID='$cliente' and  Company='01' ";
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
	     					
						
						cerrar_conexion($conn);
						
										 
			}// fin coonn

			}
		
		return $valor;
	
	}// Fin function
    
   
   
        

// FUNCIONES GRIDLAYER-------------------------


	
function  get_camposQry($cliente)
	{
		
		include('/../Modelos/procedures.php');
	   	$conn = abrir_conexion_sistemasDB();
		$valor= " select ";
			//Si la conexion fue  exitosa
			if( $conn ) 
			{
    		 //echo "Conexión establecida. funct<br />";
			 
			 // Ejecutar consulta de  busqueda  de  usuario y clave
			 
			 $sql = "select * from setup_EPCLI where  userID='$cliente'";
			 $params = array();
			 $stmt = sqlsrv_query( $conn, $sql, $params);
															
					if( $stmt === false ) // Si no se  ejecuto correctamente
					 {
     					die( print_r( sqlsrv_errors(), true));
					 }
					
						
					 if( sqlsrv_fetch( $stmt ) === false) 
					 {
     				 die( print_r( sqlsrv_errors(), true));
					 }



										for ($x = 1; $x <= 50; $x++) 
										{
    										$campo = sqlsrv_get_field($stmt,$x);
											if ( $x == 1)
											$valor=$campo;
											else
											if (strlen($campo) > 1 )
											$valor=$valor.",".$campo;
										} 
    				
			 			 			 
			}// fin coonn

			 cerrar_conexion($conn);
		     return $valor;
	
	}// Fin function
	
	 
	 
	 
	
	
 


function get_tables_sqlstr()
{
$complemento_str="";
$complemento_str= " from  OrderHed, Customer, OrderDtl, part, ((OrderRel      LEFT OUTER JOIN  Jobprod  on  (OrderRel.OrderNum = Jobprod .OrderNum and OrderRel.OrderLine = Jobprod .OrderLine and OrderRel.OrderRelNum = Jobprod .OrderRelNum))  left  outer join  JobHead  on   (Jobprod .JobNum = JobHead.JobNum   ))  left  outer join  PartBin  on   (JobHead.PartNum = PartBin.PartNum and  JobHead.JobNum = PartBin.LotNum)   ";   

return $complemento_str;

}
	
	
function get_joins_sqlstr()
{
  $joins_sqlstr= " ";
  $joins_sqlstr= " Where OrderHed.OrderNum = 	 OrderDtl.OrderNum  and ( OrderHed.CustNum = Customer.CustNum and                 					                 OrderHed.Company = 
   				 Customer.Company)  and ( OrderDtl.OrderNum = OrderRel.OrderNum   and  OrderDtl.OrderLine = OrderRel.OrderLine)  
    			 and  (OrderDtl.PartNum = Part.PartNum )     and  OrderHed.OrderNum >= 22720 "	;
   return $joins_sqlstr;
}
	
	
function get_comodines_sqlstr()
{
		
$comodines_sqlstr="  and  JobProd.JobNum <> '' GROUP BY    JobProd.JobNum Order By MAX(OrderDtl.NeedByDate) Desc";
return $comodines_sqlstr;	
}
	
	
	
	
	
	
	
function  execute_Qry($sqlstring , $modo)
	{
		include('../Modelos/vars.inc');
	    
		$conn = abrir_conexion_EpicorDB();
		$valor= "";
			if( $conn ) 
			{
    		 $sql = $sqlstring ;
			 $params = array();
			 $stmt = sqlsrv_query( $conn, $sql, $params);

			// Generales  de  la tabla;
			 echo "<table class='body' id='rowstable' >";


				// Acomodo segun  cliente interno - externo
				if ($modo == "general")
				{
					//Encabezados
					echo "".$general_headers;
					//Imprimiendo registros
					while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) 
					{
					 echo "<tr class='body'>"; 
					 		 //Formato a  columnas
							 for ($x = 0; $x <= 24; $x++)
					    	{
								if (($x == 7)  || ($x == 11) || ($x == 12)|| ($x == 14)  || ($x == 15) || ($x == 16) || ($x == 13) || 									($x == 18)  || ($x == 23) )
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
 	   
 									 echo "<td class=body>".$rowformat."</td>";
								 } //Fin if
								else
								{
										if (($x == 17)  || ($x == 21))
										{
											if($row[$x]==1)
											{
											echo "<td class=body>"."SI"."</td>";	
											}
											else
											{
											echo "<td class=body>"."NO"."</td>";	
											}
 										}
										else
	   						   		    {
											if ( ($x == 19) || ($x == 20))		
											{	
												if($row[$x]==1)
												{
												echo "<td class=body>"."Abierta"."</td>";	
												}
												else
												{
												echo "<td class=body>"."Cerrada"."</td>";	
												}
 		 									}
											else
											{  
					 						echo "<td class=body>".$row[$x]."</td>";
					 						}
					 		  		     }

								}// fIN ELSE


						   } // Fin for

						echo "</tr>";
     
					}//FIn while


				}// Fin general-----------------------------------------------------------------------------------------


				else
				{


echo "".$especific_cust_headers;


while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {

//echo "<br> Mostrando ".count($row)." resultados <br>";
echo "<tr class='body'>";

for ($x = 0; $x <= 22; $x++) {


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
 
 
 
 
   echo "<td class=body>".$rowformat."</td>";

}
else
{

		if (($x == 15)  || ($x == 19))
		{
				if($row[$x]==1)
				{
				echo "<td class=body>"."SI"."</td>";	
				}
				
				else
				{
				echo "<td class=body>"."NO"."</td>";	
				}
 		 
		}
		
		else
	    {
				if ( ($x == 17) || ($x == 18))		
					{	
								if($row[$x]==1)
								{
								echo "<td class=body>"."Abierta"."</td>";	
								}
				
								else
								{
								echo "<td class=body>"."Cerrada"."</td>";	
								}
 		 
					}
					
					else
					{  
					 echo "<td class=body>".$row[$x]."</td>";
					 }
						
					
		}

}


}

echo "</tr>";



     
}


}





echo "</table>";

		 
       					
						sqlsrv_free_stmt( $stmt);
						cerrar_conexion($conn);
						
					 
				
					 
			 
			 
			}// fin coonn

			
		
		return $valor;
	
	}// Fin function
	
	 
	 
	 
	 

function  count_Qry($sqlstring)
	{
	    
		$conn = abrir_conexion_EpicorDB();
		$valor=0;
			//Si la conexion fue  exitosa
			if( $conn ) 
			{
     		
   			 $sql = $sqlstring ;
			 $params = array();
			 $stmt = sqlsrv_query( $conn, $sql, $params);
					while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) 

					{
				      $valor = $valor+1;
     				}

				      					
				sqlsrv_free_stmt( $stmt);
				cerrar_conexion($conn);
			 			 
			}// fin coonn

			
		return $valor;
	
	}// Fin function
	
	
	
	//---------------------------------------------------------TVC
	
	function  get_numerocliente($cliente)
	{
		//include('/../Modelos/procedures.php');
		if ($cliente=="general")
			{
			
			$valor="Cartomicro";
			
			}
			else
			{
		
		
		
	   
		$conn = abrir_conexion_EpicorDB();
		$valor= "";
			//Si la conexion fue  exitosa
			if( $conn ) 
			{
    		 //echo "Conexión establecida. funct<br />";
			 
			 // Ejecutar consulta de  busqueda  de  usuario y clave
			 
			 $sql = "select CustNum from Customer where  Customer.CustID='$cliente'";
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
	     					
						
						cerrar_conexion($conn);
						
										 
			}// fin coonn

			}
		
		return $valor;
	
	}// Fin function
	
	
	
	
	
	function  get_shiptoCust($nocliente)
	{
		//include('/../Modelos/procedures.php');
		if ($cliente=="general")
			{
			
			$valor="Cartomicro";
			
			}
			else
			{
		
		
		
	   
		$conn = abrir_conexion_EpicorDB();
		$valor= "";
			//Si la conexion fue  exitosa
			if( $conn ) 
			{
    		 //echo "Conexión establecida. funct<br />";
			 
			 // Ejecutar consulta de  busqueda  de  usuario y clave
			 
			 $sql = "select  CustNum , ShipToNum , Name  from ShipTo where  CustNum ='$nocliente'";
			 $params = array();

			 $stmt = sqlsrv_query( $conn, $sql, $params);
					
				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) 
					{	
					
						$valor=$valor."<option value='$row[1]'>".$row[1]."-".$row[2]."</option>";
					
					}


 						
	     					
						
						cerrar_conexion($conn);
						
										 
			}// fin coonn

			}
		
		return $valor;
	
	}// Fin function
	
	
	
	
	
	
	
	function  get_shipviacodes()
	{
		//include('/../Modelos/procedures.php');
		
		
		
		
	   
		$conn = abrir_conexion_EpicorDB();
		$valor= "";
			//Si la conexion fue  exitosa
			if( $conn ) 
			{
    		 //echo "Conexión establecida. funct<br />";
			 
			 // Ejecutar consulta de  busqueda  de  usuario y clave
			 
			 $sql = "select shipviacode,description from ShipVia order by shipviacode";
			 $params = array();

			 $stmt = sqlsrv_query( $conn, $sql, $params);
					
				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) 
					{	
					
						$valor=$valor."<option value='$row[0]'>".$row[1]."</option>";
					
					}
 					
						
						cerrar_conexion($conn);
						
										 
			}// fin coonn

			
		
		return $valor;
	
	}// Fin function
	
	
	
?>
   
   
   
   
   
   
   