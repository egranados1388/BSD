<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="refresh" content="10;URL=./index.php" >
<title>Untitled Document</title>
</head>

<body>
<?php

  

function  execute_Qry($sqlstring)
	{
	    $serverName = "SER-SQL"; //serverName\instanceName
		$connectionInfo = array( "Database"=>"Epicor905", "UID"=>"Epicon", "PWD"=>"cart0-7364*");
		$conn = sqlsrv_connect( $serverName, $connectionInfo);
		$valor= "Valores:";
			//Si la conexion fue  exitosa
			if( $conn ) 
			{
    		
			 $sql = $sqlstring ;
			 $params = array();
			 $stmt = sqlsrv_query( 
			 $conn, $sql, $params);
					



while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) )


 {
   
	
$date = new DateTime($row[3]);
$result = $date->format('Y-m-d');
	
	$valor = $valor.$row[1].",".$row[2].",".$result."<br>";
	
	
   
     
}//FIn while


	
						sqlsrv_free_stmt( $stmt);
						sqlsrv_close( $conn );
						//mysql_close($connection); // Closing Connection
					 
				
					 
			 
			 
			}// fin coonn

			
		
		return $valor;
	
	}// Fin function
	




 $val=execute_Qry("select top(3)  SysTasknum,SubmitUser , TaskDescription ,convert(varchar(25),StartDate,120),StartTime,TaskStatus   from SysTask  

where  TaskStatus='ACTIVE'
order  by StartDate desc
");


echo "".$val."";

?>


</body>
</html>
