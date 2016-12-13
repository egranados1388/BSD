<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<?php 


function get_andres_seg()
{
 	
	
$con=mysql_connect("localhost","root","");
mysql_select_db("desarrollo");
$qry="select * from desarrollos where estatus=2 and asignado like '%Andres%'";
$resul=mysql_query($qry);
$fecha_r="";
	
	
	while($row=mysql_fetch_row($resul)) 
	{
	$fecha_r=$fecha_r."<br><a href='' title='".$row[1]."' >".$row[0]."</a>";
	}
		
  	mysql_close($con);
	return $fecha_r;
}




function get_enrique_seg()
{
 	
	
$con=mysql_connect("localhost","root","");
mysql_select_db("desarrollo");
$qry="select * from desarrollos where estatus=2 and asignado like '%Enrique%'";
$resul=mysql_query($qry);
$fecha_r="";
	
	
	while($row=mysql_fetch_row($resul)) 
	{
	$fecha_r=$fecha_r."<br><a href='' title='".$row[1]."' >".$row[0]."</a>";
	}
		
  	mysql_close($con);
	return $fecha_r;
}






function get_sumary_rows($consulta,$del,$al)
{
 	
//$consulta="select * from desarrollos where estatus=2 and asignado like '%Andres%'"	;
//$consulta="select * from desarrollos where fecha_solicitud between ".$del." and ".$al."";

$con=mysql_connect("localhost","root","");
mysql_select_db("desarrollo");
$qry=$consulta;
$resul=mysql_query($qry);
$fecha_r="";
	
	 
while($row=mysql_fetch_row($resul))

 {
	
	echo " <br>".$row[0]."-";
	echo "".$row[1]."-";
	echo "".$row[2]."";
	
	
}

mysql_close($con);
	
}


function month_to_word($m)
{
 $mes="";	
if ($m==1)
{
 $mes="Enero";
}

if ($m==2)
{
$mes="Febrero";
}

if ($m==3)
{
$mes="Marzo";
}

if ($m==4)
{

$mes="Abril";

}

if ($m==5)
{
$mes="Mayo";
}

if ($m==6)
{
$mes="Junio";
}

if ($m==7)
{
$mes="Julio";
}

if ($m==8)
{
$mes="Agosto";
}

if ($m==9)
{
$mes="Septiembre";
}

if ($m==10)
{
$mes="Octubre";
}

if ($m==11)
{
$mes="Noviembre";
}

if ($m==12)
{
$mes="Diciembre";
}


return $mes;


}



function get_registrados_total()
{
 $link = mysql_connect("localhost","root","");
    mysql_select_db("desarrollo", $link);
	
   
    $myusuario = mysql_query("select count(int_num) from desarrollos");
	
$row = mysql_fetch_array($myusuario);

$last_id = $row[0];//en este ciclo lo que hago es llegar al último registro y leer su id que es el auto_increment que estás buscando

  mysql_close($link);
return $last_id;
}




function get_registrados_fecha($del,$al)
{
 $link = mysql_connect("localhost","root","");
    mysql_select_db("desarrollo", $link);
	
   
    $myusuario = mysql_query("select count(int_num) from desarrollos where fecha_solicitud between '$del' and '$al'");
	
$row = mysql_fetch_array($myusuario);

$last_id = $row[0];//en este ciclo lo que hago es llegar al último registro y leer su id que es el auto_increment que estás buscando

  mysql_close($link);
return $last_id;
}



function get_total_x_estatus($ex)
{
 $link = mysql_connect("localhost","root","");
    mysql_select_db("desarrollo", $link);
	
    //echo "<br> inic:".$fini."    fin:".$ffin;
    $myusuario = mysql_query("select count(int_num) from desarrollos  where estatus=$ex");
	
$row = mysql_fetch_array($myusuario);

$last_id = $row[0];//en este ciclo lo que hago es llegar al último registro y leer su id que es el auto_increment que estás buscando

  mysql_close($link);
return $last_id;
}




function get_pruebas_fecha($del,$al)
{
 $link = mysql_connect("172.16.1.249:3306","root","");
    mysql_select_db("desarrollo", $link);
	
    //echo "<br> inic:".$fini."    fin:".$ffin;
    $myusuario = mysql_query("select count(int_num) from desarrollos  where estatus=3 and  (fecha_entrega between '$del' and '$al')");
	
$row = mysql_fetch_array($myusuario);

$last_id = $row[0];//en este ciclo lo que hago es llegar al último registro y leer su id que es el auto_increment que estás buscando

  mysql_close($link);
return $last_id;
}




function get_cerrados_fecha($del,$al)
{
 $link = mysql_connect("172.16.1.249:3306","root","");
    mysql_select_db("desarrollo", $link);
	
    //echo "<br> inic:".$fini."    fin:".$ffin;
    $myusuario = mysql_query("select count(int_num) from desarrollos  where estatus=6 and  (fecha_cierre between '$del' and '$al')");
	
$row = mysql_fetch_array($myusuario);

$last_id = $row[0];//en este ciclo lo que hago es llegar al último registro y leer su id que es el auto_increment que estás buscando

  mysql_close($link);
return $last_id;
}



function get_registrados($fini,$ffin)
{
 $link = mysql_connect("172.16.1.249:3306","root","");
    mysql_select_db("desarrollo", $link);
	
    //echo "<br> inic:".$fini."    fin:".$ffin;
    $myusuario = mysql_query("select count(int_num) from desarrollos  where fecha_solicitud between '$fini' and '$ffin'");
	
$row = mysql_fetch_array($myusuario);

$last_id = $row[0];//en este ciclo lo que hago es llegar al último registro y leer su id que es el auto_increment que estás buscando

  mysql_close($link);
return $last_id;
}







function get_liberados($fini,$ffin)
{
 $link = mysql_connect("localhost","root","");
    mysql_select_db("desarrollo", $link);
	
    //echo "<br> inic:".$fini."    fin:".$ffin;
    $myusuario = mysql_query("select count(int_num) from desarrollos  where fecha_entrega between '$fini' and '$ffin'");
	
$row = mysql_fetch_array($myusuario);

$last_id = $row[0];//en este ciclo lo que hago es llegar al último registro y leer su id que es el auto_increment que estás buscando

  mysql_close($link);
return $last_id;
}





function get_t_pruebas()
{
 $link = mysql_connect("localhost","root","");
    mysql_select_db("desarrollo", $link);
	
    //echo "<br> inic:".$fini."    fin:".$ffin;
    $myusuario = mysql_query("select count(int_num) from desarrollos  where estatus=3");
	
$row = mysql_fetch_array($myusuario);

$last_id = $row[0];//en este ciclo lo que hago es llegar al último registro y leer su id que es el auto_increment que estás buscando

  mysql_close($link);
return $last_id;
}



function get_t_sinseguimento()
{
 $link = mysql_connect("localhost","root","");
    mysql_select_db("desarrollo", $link);
	
    //echo "<br> inic:".$fini."    fin:".$ffin;
    $myusuario = mysql_query("select count(int_num) from desarrollos  where estatus=0");
	
$row = mysql_fetch_array($myusuario);

$last_id = $row[0];//en este ciclo lo que hago es llegar al último registro y leer su id que es el auto_increment que estás buscando

  mysql_close($link);
return $last_id;
}





function get_t_enproceso()
{
 $link = mysql_connect("localhost","root","");
    mysql_select_db("desarrollo", $link);
	
    //echo "<br> inic:".$fini."    fin:".$ffin;
    $myusuario = mysql_query("select count(int_num) from desarrollos  where estatus=1 or estatus=2");
	
$row = mysql_fetch_array($myusuario);

$last_id = $row[0];//en este ciclo lo que hago es llegar al último registro y leer su id que es el auto_increment que estás buscando

  mysql_close($link);
return $last_id;
}



function get_t_pendiente()
{
 $link = mysql_connect("localhost","root","");
    mysql_select_db("desarrollo", $link);
	
    //echo "<br> inic:".$fini."    fin:".$ffin;
    $myusuario = mysql_query("select count(int_num) from desarrollos  where estatus=4 ");
	
$row = mysql_fetch_array($myusuario);

$last_id = $row[0];//en este ciclo lo que hago es llegar al último registro y leer su id que es el auto_increment que estás buscando

  mysql_close($link);
return $last_id;
}



?>

</body>
</html>
