<?php
include('login_val.php'); // Includes Login Script
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>EPC Cartomicro Bienvenido...</title>

<link rel="stylesheet" type="text/css" media="all" href="Plugins/jsdatepick-calendar/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="Plugins/jsdatepick-calendar/jsDatePick.min.1.3.js"></script>
<!-- 
	After you copied those 2 lines of code , make sure you take also the files into the same folder :-)
    Next step will be to set the appropriate statement to "start-up" the calendar on the needed HTML element.
    
    The first example of Javascript snippet is for the most basic use , as a popup calendar
    for a text field input.
-->
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"fecha_rec",
			dateFormat:"%d-%m-%Y"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});		
		
		new JsDatePick({
			useMode:2,
			target:"fecha_nec",
			dateFormat:"%d-%m-%Y"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});
		
	};
</script>

<script type="text/javascript">
function showDiv(toggle){
document.getElementById(toggle).style.display = 'inline';
document.getElementById('fecha_nec').style.display = 'none';   
}

function showDiv2(toggle){
document.getElementById(toggle).style.display = 'inline';
document.getElementById('fecha_rec').style.display = 'none';
}
</script>

<script language="javascript">
function fAgrega()
{
document.getElementById("fecha_nec2").value = document.getElementById("fecha_nec").value;
document.getElementById("fecha_rec2").value = document.getElementById("fecha_rec").value;
}
</script>

<style type="text/css">
<!--
.style1 {font-family: Georgia, "Times New Roman", Times, serif}
.style2 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style3 {font-family: Geneva, Arial, Helvetica, sans-serif}
-->
</style></head>

<body>
<div align="center"><img src="Images/cabecera.jpg" width="967" height="70" >
</div>
<div align="center">
 <?php
 
 function  get_nombrecliente($cliente)
	{
	    $serverName = "SER-E10"; //serverName\instanceName
		$connectionInfo = array( "Database"=>"E10Cartomicro", "UID"=>"sa", "PWD"=>"Epicor123");
		$conn = sqlsrv_connect( $serverName, $connectionInfo);

		$valor= "";
			//Si la conexion fue  exitosa
			if( $conn ) 
			{
    		 //echo "Conexión establecida. funct<br />";
			 
			 // Ejecutar consulta de  busqueda  de  usuario y clave
			 
			 $sql = "select Name from Customer where  Customer.CustID='$cliente'";
			 $params = array();

			 $stmt = sqlsrv_query( $conn, $sql, $params);		
					
					
					if( $stmt === false ) // Si no se  ejecuto correctamente
					 {
     					die( print_r( sqlsrv_errors(), true));
					 }					 
					 
					 // Make the first (and in this case, only) row of the result set available for reading.
if( sqlsrv_fetch( $stmt ) === false) {
     die( print_r( sqlsrv_errors(), true));
}
 $valor = sqlsrv_get_field( $stmt,0);
// Get the row fields. Field indeces start at 0 and must be retrieved in order.
// Retrieving row fields by name is not supported by sqlsrv_get_field.      					
						
						sqlsrv_close( $conn );
						//mysql_close($connection); // Closing Connection		 
			}// fin coonn
		
		return $valor;
	
	}// Fin function
 ?>  
  
  Bienvenido  
  <?php echo " ".get_nombrecliente($_SESSION['login_user']);  echo " ID:".$_SESSION["login_user"]; ?>
  
</div>
<div align="center">
  <h2><span class="style1">EPC  </span>(Estado de Pedido) </h2>
</div>


<table width="622" height="305" border="0" align="center" cellspacing="0" bgcolor="#F2F2F2">
<form id="form1" name="form1" method="GET" action="grid_layer.php">
  
  <tr>
    <td><span class="style2">Incluir Pedidos:</span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    
    <td><input name="estados[]" type="checkbox" value="abiertos" checked="checked">
    Abiertos
<input type="checkbox" name="estados[]" value="cerrados">Cerrados

<input type="checkbox" name="estados[]" value="cancelaciones">Cancelaciones </td>
  </tr>
  
  <tr><td class="style2">
  
  Del tipo:
  
  
  
  
  
  </td>
  </tr>
  
   <tr><td>
  
  <input name="tipo[]" type="checkbox" value="LAMINA" checked />Lamina
 <input name="tipo[]" type="checkbox" value="CAJA" />  Caja
  
  
  
  
  </td></tr>
  
  
  <tr>
    <td><span class="style2">Con:</span></td>
    <td><span class="style2">&oacute; </span>:</td>
    <td>&nbsp;</td>
  </tr>
  
   <tr>
    <td height="24">
	
	<?php
	//<input name="fecha" type="radio" value="fr"  id="fr" onclick="showDiv('fecha_rec')" />
      //Fecha Recep. OC &gt;=
      //<input name="fecha_rec" type="text" id="fecha_rec" size="12"   style="display: none"  /></td>
    //<td><input name="fecha" type="radio" value="fn" checked="checked"  id="fn" onclick="showDiv2('fecha_nec')"/>
    //  Fecha Necesidad &gt;=
      //<input name="fecha_nec" type="text" id="fecha_nec" size="12"   />
      //<label>ok
     // <input type="text" name="textfield" style="display: none" />
      //</label>" ?>
	  
	  
	  
	  
	  <input name="fecha" type="radio" value="fr"  id="fr" onclick="showDiv('fecha_rec')" />
     Fecha Recep. OC &gt;=
      <input  type="text"  size="12"   id="fecha_rec"  style="display:none"  /></td>
    <td><input name="fecha" type="radio" value="fn" checked="checked"  id="fn" onclick="showDiv2('fecha_nec')"/>
      Fecha Necesidad &gt;=
      <input  type="text"  size="12"  id="fecha_nec"     />
      
     
	  
	  
	  
	  
	  
	  </td>
    <td>&nbsp;</td>
  </tr>
  <tr><td class="style2">Opcional: 
    <label>
    <input   type="hidden"   name="fecha_nec2"  id="fecha_nec2"/>
	 <input   type="hidden"  name="fecha_rec2"  id="fecha_rec2"/>
    </label></td>
  </tr>
<tr>
 
    <td height="30" colspan="2"><label>OT:
        <input type="text" name="ot" />
		
		
		
		
    </label></td>
  <td height="30">
</tr>

<tr><td>
		
    OC:
        <input type="text" name="oc"/></td></tr>

  
  
 <tr><td>
		
    Incluir Sin existencia:
        <label>
        <input type="checkbox" name="siexis" value="checkbox" />
        </label></td>
 </tr>

  
  
  <tr>
    <td colspan="2">
      <div align="center">
        <input type="submit" name="Submit" value="OK"  onmouseover="fAgrega()" />
        </div></td><td><label>
      
       
    </label></td>
    <td width="6">&nbsp;</td>
  </tr>
  </form>
</table>
<p>&nbsp;</p>
</body>
</html>
