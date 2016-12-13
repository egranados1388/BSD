<?php
session_start(); // Abrimos  un  proceso de  sesion
$error=''; // Varias  para  guardar   mensaje  de  error


if (isset($_POST['submit'])) // Si se ha  presionado el boton entrar
{
	
	if (empty($_POST['usuario']) || empty($_POST['clave'])) // Si alguno de  los  dos  campos  esta vacio
	 {
	   $error = "Usuario o contraseña Invalidos";
	 
	  }
	  
	else // Si los  dos campos  son validos
	  {
	  
		//declaracion y asignacion  de  variables
		$username=$_POST['usuario'];
		$password=$_POST['clave'];
		
		// Conexion al servidor
		
		
		//$connection = mysql_connect("localhost", "root", "");
		
		
		

		$serverName = "SER-SQL"; //serverName\instanceName
		$connectionInfo = array( "Database"=>"SISTEMAS", "UID"=>"Epicon", "PWD"=>"cart0-7364*");
		$conn = sqlsrv_connect( $serverName, $connectionInfo);


			//Si la conexion fue  exitosa
			if( $conn ) 
			{
    		 echo "Conexión establecida.<br />";
			 
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
						$_SESSION['login_user']=$username; // Initializing Session
						header("location: filters.php"); // Redirecting To Other Page
						} 
	    				else 
						{
       					 $error = "Username or Password is invalid 2";
						}
						
						sqlsrv_close( $conn );
						//mysql_close($connection); // Closing Connection
					 
					 }
					 
			 
			 
			}

			else
			{
     			echo "Conexión no se pudo establecer 3.<br />";
     			die( print_r( sqlsrv_errors(), true));
			}
		
		
		
		
		

}
}
?>