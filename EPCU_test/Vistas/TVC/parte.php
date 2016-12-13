<?php
include('../../Modelos/procedures.php');
$partnum = $_POST['parte'];
$sql="select PartNum , PartDescription , ClassID   from Part where  PartNum like '%$partnum%'";
$conn = abrir_conexion_EpicorDB();
$params = array();
$result =sqlsrv_query($conn, $sql, $params); 
$respuesta = new stdClass();
while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC))
{   
    
		$respuesta->parte = $row['PartNum'];
		$respuesta->descripcion = $row['PartDescription'];
		$respuesta->clase = $row['ClassID'];	 
}  
  echo json_encode($respuesta);
cerrar_conexion($conn);




?>