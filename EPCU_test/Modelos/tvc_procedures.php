<?php



function get_compras_online($customernum)
{

$sql="select  TV_heads.OCNumber ,  TV_heads.OrderDate , TV_heads.requestdate , TV_dtl.orderline , 
  TV_dtl.partnum , TV_dtl.qty , TV_dtl.unitprice , TV_heads.estatus
  from TV_dtl,TV_heads where  TV_dtl.OCNum = TV_heads.OCNumber and  CusNum='".$customernum."' order  by requestdate asc";
$conn = abrir_conexion_sistemasDB();
$params = array();
$result =sqlsrv_query($conn, $sql, $params); 
while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC))
{   
    
	
	
	$originalDate = $row[1];
	$newDate = date("d-m-Y", strtotime($originalDate));
	
	$originalDate2 = $row[2];
	$newDate2 = date("d-m-Y", strtotime($originalDate2));
	
	
	
	$estatus_icon='Enviado';
	
	if ($row[7] == 'Enviado')
	$estatus_icon="<img src=../../Vistas/images/Led_Circle_blue_clip_art_small.png alt=Enviado title=Enviado width=20 height=20 style='margin:auto';>";
	
	if ($row[7] == 'Revisado')
	$estatus_icon="<img src='../Led_Circle_orange_clip_art_small.png' alt='Revisado' title='Revisado'>";
	
	
	if ($row[7] == 'Recibido')
	$estatus_icon="<img src=../../Vistas/images/Led_Circle_green_clip_art_small.png alt=Recibido title=Recibido>";
	
	
	
	echo "<tr class='body'>";  
    
	
	echo "<td class='body'>$row[0]</td>"; 
	echo "<td class='body'>$newDate</td>"; 
	echo "<td class='body'>$newDate2</td>"; 
	echo "<td class='body'>$row[3]</td>"; 
	echo "<td class='body'>$row[4]</td>"; 
	echo "<td class='body'>$row[5]</td>"; 
	echo "<td class='body' >$row[6]</td>"; 
	echo ""; ?> 
    
    <td class='body' valign="middle" align="center"><?php echo "".$estatus_icon ; ?></td> 
	
	<?php
    echo "</tr>";  
}  
  
cerrar_conexion($conn);

}



?>


<?php








function get_topHistorico($customernum)
{

$sql="select  top(10)partnum, count (OrderLine) as ventas  from  OrderDtl where  CustNum =  '".$customernum."' and Company ='01' group by PartNum
  order by count(orderline) desc 
  ";
$conn = abrir_conexion_EpicorDB();
$params = array();
$result =sqlsrv_query($conn, $sql, $params); 
while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC))
{   
    echo "<tr class='body'>";  
    echo "<td class='body'>$row[0]</td>"; 
	 ?><?php
    echo "<td class='body'>$row[1]</td>"; 
	echo "<td class='body'><input type='checkbox' name='partes[]' value='$row[0]'></td>"; 
	 echo "<td class='body'>";?><a href="detalle_parte.php?partnum=<?php echo "".$row[0]; ?>" target="detalle_parte_frame" onClick="window.open(this.href, this.target, 'width=750, height=350,top=320,left=750'); return false;">Detalle parte</a> 
	 
	
	 
	 
	 <?php echo "</td>"; 
    echo "</td></tr>";  
}  
  
cerrar_conexion($conn);

}







function get_toplast($customernum,$de,$al)
{

$sql="select  top(10)partnum, 
count (OrderLine) as ventas 
 from  OrderDtl where  
 CustNum =  '".$customernum."' and Company ='01'
 
and   OrderDtl.NeedByDate between '".$de."' 
and '".$al."'
 
  group by PartNum
  order by count(orderline) desc 
  
  
    ";
$conn = abrir_conexion_EpicorDB();
$params = array();
$result =sqlsrv_query($conn, $sql, $params); 
while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC))
{   
    echo "<tr class='body'>";  
    echo "<td class='body'>$row[0]</td>"; 
	 ?><?php
    echo "<td class='body'>$row[1]</td>"; 
	echo "<td class='body'><input type='checkbox' name='partes[]' value='$row[0]'></td>"; 
	 echo "<td class='body'>";?><a href="detalle_parte.php?partnum=<?php echo "".$row[0]; ?>" target="detalle_parte_frame" onClick="window.open(this.href, this.target, 'width=750, height=350,top=320,left=750'); return false;">Detalle parte</a> 
	 
	
	 
	 
	 <?php echo "</td>"; 
    echo "</td></tr>";  
}  
  
cerrar_conexion($conn);

}










function get_catalogo()
{

$sql="select PartNum , PartDescription , ClassID from part where  ClassID='BOX' or  ClassID='LAM' ";
$conn = abrir_conexion_EpicorDB();
$params = array();
$result =sqlsrv_query($conn, $sql, $params); 
while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC))
{   
    echo "<tr class='body'>";  
    echo "<td class='body'>$row[0]</td>"; 
	 ?><?php
    echo "<td class='body'>$row[1]</td>"; 
	echo "<td class='body'><input type='checkbox' name='partes[]' value='$row[0]'></td>"; 
	 echo "<td class='body'>";?><a href="detalle_parte.php?partnum=<?php echo "".$row[0]; ?>" target="detalle_parte_frame" onClick="window.open(this.href, this.target, 'width=750, height=350,top=320,left=750'); return false;">Detalle parte</a> 
	 
	
	 
	 
	 <?php echo "</td>"; 
    echo "</td></tr>";  
}  
  
cerrar_conexion($conn);

}




function get_partes($c_parte)
{

$sql="select PartNum  from part where  PartNum like '%$c_parte%' ";
$conn = abrir_conexion_EpicorDB();
$params = array();
$result =sqlsrv_query($conn, $sql, $params); 
while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC))
{   
   // echo "<tr class='body'>";  
   // echo "<td class='body'>$row[0]</td>"; 
	// ?><?php
    //echo "<td class='body'>$row[1]</td>"; 
	//echo "<td class='body'><input type='checkbox' name='partes[]' value='$row[0]'></td>"; 
	 //echo "<td class='body'>";?><!--<a href="detalle_parte.php?partnum=<?php echo "".$row[0]; ?>" target="detalle_parte_frame" onClick="window.open(this.href, this.target, 'width=750, height=350,top=320,left=750'); return false;">Detalle parte</a> -->
	 
	<?php
	 $partes[]=$row[0];
	 
	 ?>
	 
	 <?php //echo "</td>"; 
    //echo "</td></tr>";  
}  
 return $partes; 
cerrar_conexion($conn);

}










function getdetalle_parte($parte)
{

$sql=" select PartNum,ClassID as clase,Number01 AS area_lamina,ShortChar01 as combinacion,PartDescription as descripcion,ShortChar02 as flauta , Number02 as ancho_cobro,
Number03 as ancho_bobina,
Number04 as cortes_corr,
Number05 as descuento,
Number07 as precio_unit_lam,
Number08 as ancho_lam,
Number09 as largo_lam,
NetWeight as  peso,
NetVolume as volumen,
CheckBox04 as resina,
CheckBox05 as antiestatico,
CheckBox06 as recubrimiento,
NetWeightUOM ,
NetVolumeUOM , 
ShortChar05 as score,
CheckBox03 as refilado,
ShortChar10 as medidas_caja,
ShortChar03 as tipo_caja,
ShortChar04 as tipo_union,
ShortChar06 as Tinta1 ,
ShortChar07 as Tinta2 ,
ShortChar08 as Tinta3 ,
ShortChar09 as Tinta4 ,
CheckBox07 as Refuerzo,
Character10 as suaje,
Number15 as piezas_atado,
Number14 as grapas  





from Part where  PartNum ='$parte' ";
$conn = abrir_conexion_EpicorDB();
$params = array();
$result =sqlsrv_query($conn, $sql, $params); 
$numFields = sqlsrv_num_fields($result);
while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
{   

    echo "<tr class='fila'>";
	echo "<td class='titulo'>Parte </td><td class='valor'>".$row['PartNum']."</td>";
	echo "<tr class='fila'>";
	echo "<td class='titulo'>Descripcion </td><td class='valor'>".$row['descripcion']."</td>";
	
	echo "<tr class='fila'>";
	echo "<td class='titulo'>Clase </td><td class='valor'>".$row['clase']."</td>";
	 echo "<tr class='fila'>";
	echo "<td class='titulo'>Combinacion </td><td class='valor'>".$row['combinacion']."</td>";
     echo "<tr class='fila'>";
	echo "<td class='titulo'>Flauta </td><td class='valor'>".$row['flauta']."</td>";
	
	
	echo "<tr class='fila' ><td class='titulo'>Ancho lamina </td><td class='valor'>".round($row['ancho_lam'],2)."</td> ";
	echo "<tr class='fila'><td class='titulo'>Largo lamina </td><td class='valor'>".round($row['largo_lam'],2)."</td> ";
	echo "<tr class='fila'><td class='titulo'>Ancho a  cobro </td><td class='valor'>".round($row['ancho_cobro'],2)."</td> ";

	echo "<tr class='fila'>";
	
	
	if ($row['resina']=='1')
	$res="Si";
	else
	$res="No";
	
	if ($row['antiestatico']=='1')
	$anti="Si";
	else
	$anti="No";
	
	
	if ($row['recubrimiento']=='1')
	$rec="Si";
	else
	$rec="No";
	
	
	
	echo "<td class='titulo'>Resina </td><td class='valor'>".$res."</td>";
	echo "<tr class='fila'>";
	echo "<td class='titulo'>Antiestatico </td><td class='valor'>".$anti."</td>";
	echo "<tr class='fila'>";
	echo "<td class='titulo'>Recubrimiento </td><td class='valor'>".$rec."</td>";



echo "<tr class='fila'><td class='titulo'>Scores</td><td class='valor'>".$row['score']."</td> ";
 echo "<tr class='fila'>";
 
if ($row['refilado']=='1')
	$ref="Si";
	else
	$ref="No";
echo "<td class='titulo' >Refilado</td><td class='valor'>".$ref."</td> ";


 if($row['clase']=='BOX')
 {
		 echo "<tr class='fila'>";
		echo "<td class='titulo'>Medidas  caja</td><td class='valor'>".$row['medidas_caja']."</td> ";
		echo "<tr class='fila'><td class='titulo'>Tipo:</td><td class='valor'>".$row['tipo_caja']."</td> ";
		 echo "<tr class='fila'>";
		echo "<td class='titulo'>Union</td><td class='valor'>".$row['tipo_union']."</td> ";
		 echo "<tr class='fila'>";
		echo "<td class='titulo'>Refuerzo</td><td class='valor'>".$row['Refuerzo']."</td> ";
		
		echo "<tr class='fila'><td class='titulo'>Suaje</td><td class='valor'>".$row['suaje']."</td> ";
	     echo "<tr class='fila'>";
		echo "<td class='titulo'>Piezas x Atado</td><td class='valor'>".$row['piezas_atado']."</td> ";
	     echo "<tr class='fila'>";
		echo "<td class='titulo'>No grapas</td><td class='valor'>".$row['grapas']."</td> ";
 }


echo "<tr class='fila'><td class='titulo'>Descuento</td><td class='valor'>".round($row['descuento'],2)."</td> ";
echo "<tr class='fila'>";
echo "<td class='titulo'>Precio Unitario:</td><td class='valor'>".round($row['precio_unit_lam'],2)."</td> ";




}  
  
cerrar_conexion($conn);

}



function get_detalle_parte_small($parte)
{

$sql=" select PartNum,
PartDescription as descripcion,


ShortChar01 as combinacion,
Number08 as ancho_lam,
Number09 as largo_lam,
 Number02 as ancho_cobro,
Number05 as descuento,
Number07 as precio_unit_lam


from Part where  PartNum ='$parte' ";
$conn = abrir_conexion_EpicorDB();
$params = array();
$result =sqlsrv_query($conn, $sql, $params); 
$numFields = sqlsrv_num_fields($result);

while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC))
{   

  
     echo "<tr class='body'>";
	
	for($i = 0; $i < $numFields; $i++)
	 { 
	 
	 		if (($i==3) or ($i==4) or($i==5)or ($i==6) or  ($i==7))
			 echo "<td class='body'>".round($row[$i],2)."</td>";
			else
     echo "<td class='body'>".$row[$i]."</td>";
	 }
	 
	 
	 echo " <input type='hidden' name='articulos[]'  id='art' value='$row[0]'>"  ;  
	 echo " <input type='hidden' name='precios[]'  id='precios' value='$row[7]'>"  ;  
	 echo "<td class='body'> <input type='text' name='cantidades[]' size='2' id='cantidad' autofocus='autofocus'></td>"    ; 
	
	
;?>
    


	 <?php
	 
	 
	 
	
	 echo "</tr>";  
	  
}  
  
cerrar_conexion($conn);

}


function head_insert($oc, $cust, $orderdate,$estatus, $lineas, $request,$via,$ship)
{
	
	include('procedures.php');
	$conn=abrir_conexion_sistemasDB();
if( $conn === false) {
    die( print_r( sqlsrv_errors(), true));
}

$tsql = "insert into  TV_heads values(?,?,?,?,?,?,?,?)";
$var = array($oc, $cust, $orderdate,$estatus, $lineas, $request,$via,$ship);

if (!sqlsrv_query($conn, $tsql, $var))
                 {
            die('Error: ' . sqlsrv_errors());
                 }
            echo ""; 



cerrar_conexion($conn);

}

	function abrir_conexion_sistemasDB2()
{
include ('vars.inc');
$servidor=$servidorDB;
$informacionDB=$connectionInfo;
$conexion = sqlsrv_connect($servidor , $informacionDB);
return $conexion;
}



function cerrar_conexion2($conector)
{
sqlsrv_close($conector);

}


function dtl_insert($OCNum, $line, $part,$qty,$unitprice)
{
	

	//include('procedures.php');
	$conn=abrir_conexion_sistemasDB2();
if( $conn === false) {
    die( print_r( sqlsrv_errors(), true));
}

$tsql = "insert into  TV_dtl values(?,?,?,?,?)";
$var = array($OCNum, $line, $part,$qty,$unitprice);

if (!sqlsrv_query($conn, $tsql, $var))
                 {
            die('Error: ' . sqlsrv_errors());
                 }
            echo "<br>"; 



cerrar_conexion2($conn);
	
	
}




function  get_shipviaDescription($shipviacode)
	{
			
	   
		$conn = abrir_conexion_EpicorDB();
		$valor= "";
			//Si la conexion fue  exitosa
			if( $conn ) 
			{
    		 //echo "Conexión establecida. funct<br />";
			 
			 // Ejecutar consulta de  busqueda  de  usuario y clave
			 
			 $sql = "select  Description  from  ShipVia where   ShipViaCode ='$shipviacode'";
			 $params = array();

			 $stmt = sqlsrv_query( $conn, $sql, $params);
					
				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) 
					{	
					
						$valor=$row[0];
					
					}
 					
						
						cerrar_conexion($conn);
						
										 
			}// fin coonn

			
		
		return $valor;
	
	}// Fin function





function  get_shiptoName($shiptoNum)
	{
			
	   
		$conn = abrir_conexion_EpicorDB();
		$valor= "";
			//Si la conexion fue  exitosa
			if( $conn ) 
			{
    		 //echo "Conexión establecida. funct<br />";
			 
			 // Ejecutar consulta de  busqueda  de  usuario y clave
			 
			 $sql = "select  Name from ShipTo where  CustNum = '$shiptoNum'";
			 $params = array();

			 $stmt = sqlsrv_query( $conn, $sql, $params);
					
				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) 
					{	
					
						$valor=$row[0];
					
					}
 					
						
						cerrar_conexion($conn);
						
										 
			}// fin coonn

			
		
		return $valor;
	
	}// Fin function







?>
