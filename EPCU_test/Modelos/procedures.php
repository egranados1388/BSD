<?php

function abrir_conexion_sistemasDB()
{
include ('vars.inc');
$servidor=$servidorDB;
$informacionDB=$connectionInfo;
$conexion = sqlsrv_connect($servidor , $informacionDB);
return $conexion;
}

function abrir_conexion_EpicorDB()
{
include ('vars.inc');
$servidor=$servidorDBEpicor;
$informacionDB=$connectionInfoEpicor;
$conexion = sqlsrv_connect($servidor , $informacionDB);
return $conexion;
}



function cerrar_conexion($conector)
{
sqlsrv_close($conector);

}

//----------------------------------------------------------------------------------------------------


function  valida_user($username ,$password)
		{
			
			include ("Controladores/BOCartomicro.php");
			$e=''; // Varible  para  guardar   mensaje  de  error
			$conn=abrir_conexion_sistemasDB();
			//Si la conexion fue  exitosa
			if( $conn ) 
			{
    		 // Ejecutar consulta de  busqueda  de  usuario y clave
			 $sql = "select * from login where password='$password' AND username='$username'";
			 $params = array();
			 $stmt = sqlsrv_query( $conn, $sql, $params);
									
					if( $stmt === false ) // Si no se  ejecuto correctamente
					 {
						 
     					die( print_r( sqlsrv_errors(), true));
					 }
					 
					 else // Si laconsulta  se  ejecuto correctamente
					 
					 {
					 
					    $rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC);
						//$rows = mysql_num_rows($query);
						if ($rows > 0) 
						{
						$e="0";	
						
						session_start(); // Abrimos  un  proceso de  sesion	
						
						$_SESSION['login_user']=$username; // Initializing Session
						$_SESSION['custname'] =get_nombrecliente($_SESSION['login_user']);
						$_SESSION['custnum'] = get_numerocliente($_SESSION['login_user']);
						
						
						if($username == 'general')
						header("location: vistas/filters.php"); // Redirecting To Other Page
						else
						header("location: vistas/menu_cust.php"); // Redirecting To Other Page
																		
						
						
						} 
	    				else 
						{
	 					 $e = "Usuario o Contraseña  invalidos.";
						}
						
						 cerrar_conexion($conn);
				
						
					 
					 }
					 
			 		
			 
			}

			else
			{
				
     			 $e = "No se  pudo conectar";
     			die( print_r( sqlsrv_errors(), true));
			}
		
		return $e;
		}// Fin funcion


?>