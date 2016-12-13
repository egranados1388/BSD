<html>
<head>
<meta charset="UTF-8">
<title>Indicadores  BSD</title>
</head>
<body background="bg-blue-white-circle_094402.jpg" >
<?php

include("sql/db_con.inc");

$comodin= $_GET['qry'];
$query="";
$del=$_GET['ini'];
$al=$_GET['fin'];



if ($comodin=="lastregister")
{
	echo " <br> Registrados<br><br>";
	$query="select * from desarrollos where fecha_solicitud between $del and $al";
}


if ($comodin=="lasttesting")
{
	
	echo " <br> A fase  pruebas<br><br>";
	$query="select * from desarrollos  where estatus=3 and  fecha_entrega between $del and $al";
}


if ($comodin=="lastclosed")
{
	
	echo " <br> Cerrados<br><br>";
	$query="select *  from desarrollos  where estatus=6 and  fecha_cierre between $del and $al";
}

echo "Ultimo  mes ( del :".$del." al ".$al.")<br><bR>" ;
 get_sumary_rows($query,$del,$al);



?>
	
	

