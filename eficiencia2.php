<?php

function get_ticket($folio)
{

$con=mysql_connect("172.16.1.249:3306","root","");
mysql_select_db("desarrollo");
$qry="select * from desarrollos where int_num = '".$folio."'";
$resul=mysql_query($qry);
$fecha_r="";
	
	
	while($row=mysql_fetch_row($resul)) 
	{
	$row[1];
	}
		
  	mysql_close($con);
	return $fecha_r;

}




?>
