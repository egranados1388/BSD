<?php
include('login_val.php'); // Includes Login Script
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {font-family: Georgia, "Times New Roman", Times, serif}
-->
</style></head>

<body>
<div align="center"><img src="Images/cabecera.jpg" width="967" height="70" >
</div>
<div align="center">
  <h1><br>
    
    <span class="style1">Iniciar  Sesi&oacute;n  </span>E10</h1>
</div>
<table width="435" height="138" border="0" align="center" cellspacing="0">

<form action="" method="post" enctype="multipart/form-data" name="login">
  <tr>
    <td width="184" rowspan="2"><img src="Images/cartomicro_logo.jpg" width="184" height="132" /></td>
      
    <span class="style1"> <td width="90" height="44" valign="bottom"> <div align="right">Usuario: 
    </div>
    <td width="155" valign="bottom"> <label>
    <input type="text" name="usuario" />
</label></td> 
    </span>  </tr>
  <tr>
   
    <span class="style1"><td valign="middle"><div align="right">Contrase&ntilde;a: </div>
    <td valign="middle"><label>
      <input type="password" name="clave" />
      </label></td></span>  </tr>
	  <tr>
	  
	  <td colspan=3> <div align="center">
	    <p>
	      <input name="submit" type="submit" value="Entrar" /> 
		  <span><?php echo "".$error; ?></span>	      </p>
	    </div></td>
	  
	  </tr>
  </form>
</table>
<p>&nbsp;</p>
</body>
</html>
