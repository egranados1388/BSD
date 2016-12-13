<?php

include('../../Modelos/procedures.php');

$partnum = $_GET['parte'];
$sql="select PartNum  from Part where  PartNum like '%$partnum%'";
$conn = abrir_conexion_EpicorDB();
$params = array();
$result =sqlsrv_query($conn, $sql, $params); 
while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC))
{   
    
		$partes[] = $row['PartNum'];		
		 
}  
  echo json_encode($partes);
cerrar_conexion($conn);




?>