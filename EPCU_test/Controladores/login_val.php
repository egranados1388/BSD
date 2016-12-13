<?php
// PAGINA DE  VALIDACION DE USUARIO
$error="";

if (isset($_POST['submit'])) // Si se ha  presionado el boton entrar
{
	
	if (empty($_POST['usuario']) || empty($_POST['clave'])) // Si alguno de  los  dos  campos  esta vacio
	 {
	   $error = "Usuario o contraseña Invalidos";
	 
	 }
	  
	else // Si los  dos campos  son validos
	  {
	  	include('/../Modelos/procedures.php');
		//declaracion y asignacion  de  variables
		$username=$_POST['usuario'];
		$password=$_POST['clave'];
		
		$error=valida_user($username ,$password);
		
	
	  }
}
?>