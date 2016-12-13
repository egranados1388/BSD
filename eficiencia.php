<html>
<head>
<meta charset="UTF-8">
<title>Indicadores  BSD</title>
</head>
<body background="bg-blue-white-circle_094402.jpg" >
<?php
include("class/pData.class.php");
include("class/pDraw.class.php");
include("class/pPie.class.php");
include("class/pImage.class.php");
include("sql/db_con.inc");





$con=mysql_connect("172.16.1.249:3306","root","");
mysql_select_db("desarrollo");
$qry="SELECT  * FROM DESARROLLOS    WHERE   `prioridad` <> '0' AND  `estatus` <> '6'  AND  `estatus` <> '5' ORDER BY `prioridad`,`fecha_solicitud` ";
$resul=mysql_query($qry);
$resul2=mysql_query($qry);
$c=0;

echo("<table border=0 cellspacing=5 cellpadding=0  bordercolor=gray width=80% align=center>");
echo ("<tr><td width=30%><img src=images/cartomicro_logo.png width=100 height=70> <td Align=right><H1>Tablero  de Indicadores BSD Cartomicro</h1></tr></td></table>");

echo("<table border=0 cellspacing=1 cellpadding=0  bgcolor=white  bordercolor=gray width=80% align=center>

<td align=right><img src=images/Estados/cero_nvo.png width=10 height=10>Nuevo <img src=images/Estados/uno_nvodoc.png width=10 height=10>En Seguimiento<img src=images/Estados/dos_desa.png width=10 height=10>En Desarrollo<img src=images/Estados/tres_prueba.png width=10 height=10>Fase de prueba<img src=images/Estados/cuatro_pendiente.png width=10 height=10>Pendiente<img src=images/Estados/cinco_cancelado.png width=10 height=10>Cancelado<img src=images/Estados/seis_concluido.png width=10 height=10>Concluido </td></font>");

echo ("</table>");

echo("<table border=0 cellspacing=1 cellpadding=0  bgcolor=#949BA2 bordercolor=gray width=80% align=center>");

echo ("<tr ><td colspan=5><font size=4 color=white  > Pendientes prioritarios <td> </td></font><td rowspan=5 width=30% align=right valign ='top' ><font size=2  >

<table  border=0 cellspacing=1 cellpadding=0  bgcolor=#949BA2 bordercolor=gray width=80%><tr bgcolor=#949BA2><td colspan=2 align=center ><font size=4 color=white>  <img src=images/Estados/dos_desa.png width=10 height=10>En Desarrollo*</td></tr><tr bgcolor=#5B5D5F><td><font color=white   size=2>Andres</td> <TD><font  color=white  size=2>Enrique</Td></tr>

</td></tr></td>");

echo("<tr bgcolor=white>");
 $andres=get_andres_seg();
echo("<td>$andres</td>");

$enrique=get_enrique_seg();
echo("<td>$enrique</td></table>");

echo ("<tr bgcolor=#5B5D5F><td ><font size=2 color=white >  No.<td><font size=2 color=white > Nombre <td><font size=2  color=white>Estatus<td> <font size=2 color=white >Solicita <td> <font size=2  color=white>Fecha Registro <td> <font size=2 color=white>Prioridad   </tr></td></font>");
while($row3=mysql_fetch_row($resul)) 
{
if($c <= 2)
{
echo("<tr bgcolor=white>");
echo("<td>$row3[0]</td>");
echo("<td>".htmlspecialchars($row3[1])."</td>");


$value = $row3[2] ;




						
						
						if($value == 0)
						{
						  $imagen = 'cero_nvo.png';
						  $alter = 'Nuevo';
						}
						
						if($value == 1)
						{
						  $imagen = 'uno_nvodoc.png';
						  $alter = 'Con Seguimiento';
						}
						if($value == 2)
						{
						  $imagen = 'dos_desa.png';
						  $alter = 'En desarrollo';
						}
						if($value == 3)
						{
						  $imagen = 'tres_prueba.png';
						  $alter = 'Puesto a Prueba';
						}
						if($value == 4)
						{
						  $imagen = 'cuatro_pendiente.png';
						  $alter = 'Pendiente';
						}
						
						if($value == 5)
						{
						  $imagen = 'cinco_cancelado.png';
						  $alter = 'Cancelado';
						}
						if($value == 6)
						{
						  $imagen = 'seis_concluido.png';
						  $alter = 'Concluido';
						}
						
						
							$html = '<img src=images/Estados/'.$imagen.' alt="ok"  height="22" width="22"  >';
					
						
						












echo("<td>".$html."</td>");
$parlineas = explode("/",$row3[3]);
echo("<td>$parlineas[0]</td>");
$fecha_r=$row3[4];


$fecha_r = strtotime($fecha_r) ;
$fr = date('d-m-Y',$fecha_r);
echo("<td>$fr</td>");
echo("<td>$row3[7]</td>");
echo("</tr>");
}
$c=$c+1;
}


echo("</table>");

//mysql_close();






echo("<table border=0 cellspacing=1 cellpadding=0  bgcolor=#949BA2 bordercolor=gray width=80% align=center>");
echo ("<tr><td colspan=2><font size=4 color=white  >  Resumen Historico<br> </font>");
echo ("<tr bgcolor=white><td bgcolor=#5B5D5F width=10%><font size=2  color=white> Registrados: <td width=10%>".get_registrados_total())."<td rowspan=4>";


$al = date('d-m-Y');
$del = strtotime ( '-30 day' , strtotime ( $al ) ) ;
$del = date ( 'd-m-Y' , $del );
$al2 = date('Y-m-d');
$del2 = strtotime ( '-30 day' , strtotime ( $al2 ) ) ;
$del2= date ( 'Y-m-d' , $del2 );
echo("<table border=0 cellspacing=1 cellpadding=0  bgcolor=#949BA2 bordercolor=gray width=100%>");
echo ("<tr><td colspan=2><font size=4 color=white  > Ultimos 30 Dias (Del ".$del." Al ".$al.")<br> </font>");
echo "<tr bgcolor=white><td bgcolor=#5B5D5F width=20%><font size=2  color=white> Registrados:"; ?> <td><a href="sumary.php?qry=lastregister&ini='<?php echo $del2;?>'&fin='<?php echo $al2;?>'"  onClick="window.open(this.href, this.target,'width=1000,height=600,top=120,left=50'); return false;">
<?php echo "".get_registrados_fecha($del2,$al2) ; echo "</a>";


echo "<tr bgcolor=white><td bgcolor=#5B5D5F width=20%><font size=2  color=white> En prueba: <td>"; ?>


<a href="sumary.php?qry=lasttesting&ini='<?php echo $del2;?>'&fin='<?php echo $al2;?>'"  onClick="window.open(this.href, this.target,'width=1000,height=600,top=120,left=50'); return false;"><?php echo "".get_pruebas_fecha($del2,$al2); echo "</a>";
echo "<tr bgcolor=white><td bgcolor=#5B5D5F width=20%><font size=2  color=white> Cerrados: <td> "; ?>

<a href="sumary.php?qry=lastclosed&ini='<?php echo $del2;?>'&fin='<?php echo $al2;?>'"  onClick="window.open(this.href, this.target,'width=1000,height=600,top=120,left=50'); return false;"> <?php echo "".get_cerrados_fecha($del2,$al2);
echo("</a></table>");

echo ("<td width='40%' height='100%'>Sin seguimiento");






echo ("</td>");

echo ("<tr bgcolor=white><td bgcolor=#5B5D5F width=10%><font size=2  color=white> En proceso: <td width=10%>".get_total_x_estatus(2))."";
echo ("<tr bgcolor=white><td bgcolor=#5B5D5F width=10%><font size=2  color=white> En prueba: <td width=10%>".get_total_x_estatus(3))."";
echo ("<tr bgcolor=white><td bgcolor=#5B5D5F width=10%><font size=2  color=white> Nuevos: <td width=10%> ".get_total_x_estatus(0))."";
echo("</table>");








echo("<table border=0 cellspacing=1 cellpadding=0  bgcolor=#949BA2 bordercolor=gray width=80% align=center>");


echo ("<tr><td width=50%><font size=4 color=white > ");




$conexion=mysql_connect("172.16.1.249:3306","root","");
mysql_select_db("desarrollo");
$consulta="select count(int_num),solicitante from desarrollos  group by  solicitante order by count(int_num) desc ";
$r=mysql_query($consulta);
$r2=mysql_query($consulta);
$cont=0;
echo("<table border=0 cellspacing=1 cellpadding=0  bgcolor=#949BA2  width=100%>");
echo ("<tr><td colspan=2><font size=4 color=white  > Top 5 Usuarios </font>");
$contador=0;
$tabla = new pData();
$datos = array(); 
$etiquetas=array();
while($registro=mysql_fetch_row($r)) 
{
$datos[$contador]=$registro[0];
$etiquetas[$contador]=$registro[1];
$contador=$contador+1;
}
$tabla->addPoints(array($datos[0],$datos[1],$datos[2] ,$datos[3],$datos[4]),"serie");  
$tabla->setSerieDescription("serie","");


$eti1 = explode("/",$etiquetas[0]);
$eti2 = explode("/",$etiquetas[1]);
$eti3 = explode("/",$etiquetas[2]);
$eti4 = explode("/",$etiquetas[3]);
$eti5 = explode("/",$etiquetas[4]);

$tabla->addPoints(array($eti1[0],$eti2[0],$eti3[0],$eti4[0],$eti5[0]),"etiquetas");
$tabla->setAbscissa("etiquetas");
$imagen = new pImage(600,300,$tabla,TRUE);
$Pastel = new pPie($imagen,$tabla);
$Pastel->draw3DPie(320,200,array("Radius"=>100,"DrawLabels"=>TRUE,"LabelStacked"=>TRUE,"Border"=>TRUE));
$imagen->Render("graficapastel.png");
echo ("<tr bgcolor=white><td  colspan=2><font size=2  color=white><img src=\"graficapastel.png\"  width=90%></tr>");
while($row=mysql_fetch_row($r2)) 
{
if($cont <=4)
{
echo("<tr bgcolor=white>");

$rlim = explode("/",$row[1]);

echo("<td>$rlim[0]</td>");
echo("<td>$row[0]</td>");


echo("</tr>");
}
$cont=$cont+1;
}
echo("</table>");
mysql_close();















echo ("<td width=50%><font size=4 color=white  > ");






$conexion2=mysql_connect("172.16.1.249:3306","root","");
mysql_select_db("desarrollo");
$consulta2="select count(int_num),solicitante from desarrollos where  estatus=3  group by  solicitante order by count(int_num) desc ";
$res=mysql_query($consulta2);
$res2=mysql_query($consulta2);


$cont2=0;

echo("<table border=0 cellspacing=1 cellpadding=0  bgcolor=#949BA2  width=100% >");
echo ("<tr><td colspan=2><font size=4 color=white  > Pendientes  de Usuario  </font>");
$contador2=0;
$tabla2 = new pData();
$datos2 = array(); 
$etiquetas2 =array();
while($registro2=mysql_fetch_row($res)) 
{
$datos2[$contador2]=$registro2[0];

$etiquetas2[$contador2]=$registro2[1];

$et[$contador2]= explode("/",$etiquetas2[$contador2]);

$contador2=$contador2+1;



}

//$et1 = explode("/",$etiquetas2[0]);
//$et2 = explode("/",$etiquetas2[1]);



//$et1 = $etiquetas2[0];
//$et2 = $etiquetas2[1];


$tabla2->addPoints($datos2,"serie2");  

$tabla2->setSerieDescription("serie2","");


$tabla2->addPoints(array($et[0][0],$et[1][0]),"etiquetas2");

$tabla2->setAbscissa("etiquetas2");
$imagen2 = new pImage(600,300,$tabla2,TRUE);
$Pastel2 = new pPie($imagen2,$tabla2);
$Pastel2->draw3DPie(320,200,array("Radius"=>100,"DrawLabels"=>TRUE,"LabelStacked"=>TRUE,"Border"=>TRUE));
$imagen2->Render("graficapastel2.png");
echo ("<tr bgcolor=white><td  colspan=2><font size=2  color=white><img src=\"graficapastel2.png\" width=100% ></tr>");


while($row2=mysql_fetch_row($res2)) 
{
if($cont2 <=2)
{
echo("<tr bgcolor=white>");

$r2lin = explode("/",$row2[1]);

echo("<td>$r2lin[0]</td>");
echo("<td>$row2[0]</td>");
echo("</tr>");
}
$cont2=$cont2+1;
}

echo("</table>");
mysql_close();


echo ("</table>");









echo("</tr>");


echo("<table border=0 cellspacing=1 cellpadding=0  bgcolor=#949BA2  width=80% align=center>");
echo ("<tr><td colspan=2><font size=4 color=white  > Curva  de  demanda  Ultimo trimestre (Mes: ".month_to_word(date("m")).") </font>");


$ano_cur=date("Y");
 

$conexion3=mysql_connect("172.16.1.249:3306","root","");
mysql_select_db("desarrollo");
$consulta3="SELECT COUNT( * ) AS contador, MONTH( `fecha_solicitud` ) AS mes FROM desarrollos WHERE YEAR( `fecha_solicitud` ) = '".$ano_cur."' GROUP BY MONTH(`fecha_solicitud` )
ORDER BY MONTH( `fecha_solicitud` ) ASC ";
$res33=mysql_query($consulta3);
$res333=mysql_query($consulta3);
$cont3=0;
$contador3=0;
$mes=date("m");
$inicio = $mes - 2;
$datos3 = array(); 
$etiquetas3 =array();
while($registro3=mysql_fetch_row($res333)) 
{

	 if  (($registro3[1] <= $mes) &&  ($registro3[1] >= $inicio))
 	{
		$datos3[$contador3]=$registro3[0];
		//$etiquetas3[$contador3]=$registro3[1];
	
		$contador3=$contador3+1;
	}
}

if (!isset($datos3[2]))
{
	$datos3[2]="0";
}



mysql_close();





$conexion30=mysql_connect("172.16.1.249:3306","root","");
mysql_select_db("desarrollo");
$consulta30="SELECT COUNT( * ) AS contador, MONTH( `fecha_cierre` ) AS mes FROM desarrollos WHERE YEAR( `fecha_cierre` ) = '".$ano_cur."' GROUP BY MONTH(`fecha_cierre` )
ORDER BY MONTH( `fecha_cierre` ) ASC ";
$res330=mysql_query($consulta30);
$res3330=mysql_query($consulta30);
$cont30=0;
$contador30=0;
$mes2=date("m");
$inicio2 = $mes2 - 2;
$datos30 = array(); 
$etiquetas30 =array();
while($registro30=mysql_fetch_row($res3330)) 
{

	 if  (($registro30[1] <= $mes2) &&  ($registro30[1] >= $inicio2))
 	{
		$datos30[$contador30]=$registro30[0];
		$etiquetas30[$contador30]=$registro30[1];
	
		$contador30=$contador30+1;
	}
}



 $MyData = new pData(); 


 $MyData->addPoints(array($datos3[0],$datos3[1],$datos3[2]),"Registrados");
 $MyData->addPoints(array($datos30[0],$datos30[1],$datos30[2]),"Cerrados");
 $MyData->addPoints(array(month_to_word($etiquetas30[0]),month_to_word($etiquetas30[1]),month_to_word($etiquetas30[2])),"Labels");

 $MyData->setAbscissa("Labels");
 $myPicture = new pImage(700,230,$MyData);
 $Settings = array("R"=>255, "G"=>255, "B"=>255, "Dash"=>1, "DashR"=>199, "DashG"=>237, "DashB"=>111);
 $myPicture->drawFilledRectangle(0,0,700,230,$Settings);
// $Settings = array("StartR"=>194, "StartG"=>231, "StartB"=>44, "EndR"=>43, "EndG"=>107, "EndB"=>58, "Alpha"=>50);
// $myPicture->drawGradientArea(0,0,700,230,DIRECTION_VERTICAL,$Settings);
 //$myPicture->drawGradientArea(0,0,700,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));
 $myPicture->drawRectangle(0,0,699,229,array("R"=>0,"G"=>0,"B"=>0));
 $myPicture->setFontProperties(array("FontName"=>"../fonts/Silkscreen.ttf","FontSize"=>6));
 //$myPicture->drawText(10,13,"",array("R"=>255,"G"=>255,"B"=>255));
 $myPicture->setFontProperties(array("FontName"=>"../fonts/pf_arma_five.ttf","FontSize"=>6));
 $myPicture->setGraphArea(50,60,670,190);
 $myPicture->drawFilledRectangle(50,60,670,190,array("R"=>255,"G"=>255,"B"=>255,"Surrounding"=>-200,"Alpha"=>10));
 $myPicture->drawScale(array("CycleBackground"=>FALSE));
 $myPicture->setFontProperties(array("FontName"=>"../fonts/Forgotte.ttf","FontSize"=>11));
 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));
 $myPicture->drawText(50,52,"",array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMLEFT));
 $myPicture->setFontProperties(array("FontName"=>"../fonts/pf_arma_five.ttf","FontSize"=>6));
 $MyData->setSerieDrawable("Last year",FALSE);
 $myPicture->drawBarChart();
 $MyData->setSerieDrawable("Last year",TRUE);
 $MyData->setSerieDrawable("This year",FALSE);
// $myPicture->drawSplineChart();
 //$myPicture->drawPlotChart();
 $MyData->drawAll();
 $myPicture->drawLegend(580,35,array("Style"=>LEGEND_ROUND,"Alpha"=>20,"Mode"=>LEGEND_HORIZONTAL));
$myPicture->Render("grafica.png");
echo ("<tr bgcolor=white><td align=center><font size=2  color=white><img src=\"grafica.png\" >");
echo ("</table>");
mysql_close();



?>
	
	

