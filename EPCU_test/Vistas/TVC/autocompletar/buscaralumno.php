<?php

$conexion = new mysqli('servidor','usuario','password','basedatos',3306);
$matricula = $_GET['term'];
$consulta = "select matricula FROM tblalumno WHERE matricula LIKE '%$matricula%'";

$result = $conexion->query($consulta);

if($result->num_rows > 0){
	while($fila = $result->fetch_array()){
		$matriculas[] = $fila['matricula'];		
	}
	echo json_encode($matriculas);
}

?>