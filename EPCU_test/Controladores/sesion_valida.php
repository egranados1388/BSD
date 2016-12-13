<?php
//Inicio la sesión
//session_start();
//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
if ($_SESSION["login_user"]) 
{
//si no existe, va a la página de autenticacion
echo " exist:".$_SESSION["login_user"];
//header("Location: ../index.php");
//salimos de este script
//exit();
}

else
{
	echo " no:".$_SESSION["login_user"];
//header("Location: ../Vistas/menu_cust/index.php");	
}
?>
