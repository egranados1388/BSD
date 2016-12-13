<html >
<head>
<link rel="stylesheet" href="../css/table_horizontal.css" type="text/css"/>

</head>
<body  leftmargin="0" topmargin="0">


	
<div style="width:238px; height:360px; padding-top:0px">


 

<?php 
include ('../../Modelos/tvc_procedures.php');
include ('../../Modelos/procedures.php');


if (isset($_GET['partnum']))
{
$parte= $_GET['partnum'];
?>
<table  class="horizontal_parte" width="238px">

<?php
getdetalle_parte($parte);
?>


</table>
<?php
}


else
{
?>  <br><br><br><br><br><p  style="margin:auto;color: #8f8f8f;font-size: 18px;font-weight: 300;" align="center"> No hay parte  seleccionada</p> 

<?php
}

?>
</div>
</body>
</html>
