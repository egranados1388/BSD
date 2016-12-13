<!doctype html>
<html>
<head>
<meta http-equiv="Page-Enter" content="revealTrans(Duration=0.5,Transition=3)">
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" href="../css/popup.css" type="text/css">
<link rel="stylesheet" href="../css/table.css" type="text/css"/>
</head>
<body>
<div><h3>Su pedido</h3></div>
<DIV style="width:650px; margin:auto">
<table class="horizontal" style="margin:auto" align="center">
<form action="xml_generate.php" method="post"> 
<?php 
session_start();
$OC=$_SESSION['order_head'][0] ;
$shipto=$_SESSION['order_head'][1] ;
$custnum=$_SESSION['order_head'][2];
 $viacode=$_SESSION['order_head'][3];
 $orderdate=$_SESSION['order_head'][4];
$requestdate=$_SESSION['order_head'][5];
$custID=$_SESSION['login_user'];
$custname=$_SESSION['custname'];



?>

<tr><td class="titulo">Cliente:</td><td class="valor" colspan="3"><?php  echo "".$custname;?></td><tr><td class="titulo">OC</td><td class="valor" colspan="3"><?php  echo "".$OC;?></td>
<tr><td class="titulo">Enviar  a</td><td class="valor"><?php  echo "".$shipto;?></td><td class="titulo">Via</td><TD class="valor"><?php  echo "".$viacode;?> </TD></tr>
<tr><td class="titulo">Fecha captura</td><td class="valor"><?php  echo "".$orderdate;?></td><td class="titulo">Fecha  necesidad</td><td class="valor"><?php  echo "".$requestdate;?></td>
</tr></tr>

<input type="hidden"  name="custnum" value="<?php  echo "".$custnum;?>">
<input type="hidden"  name="oc" value="<?php  echo "".$OC;?>">
<input type="hidden"  name="shipto" value="<?php  echo "".$shipto;?>">
<input type="hidden"  name="viacode" value="<?php  echo "".$viacode;?>"> 
<input type="hidden"  name="orderdate" value="<?php  echo "".$orderdate;?>">
<input type="hidden"  name="requestdate" value="<?php  echo "".$requestdate;?>">

<?php 


if (isset($_SESSION['carro']))
{
$lineas=$_SESSION['carro']; 
}

   ?>

<input type="hidden"  name="lineas" value="<?php  echo "".$lineas;?>">

</table>

<?php

 if (isset($_SESSION['carro']))
 {
echo "<br><br><table class='body_80' bgcolor='#FCFCFC'><tr class='body'><th class='body'>Linea<th class='body'>Parte<th class='body'> Cantidad<th class='body'>Precio Unitario<th class='body'> Importe";
$linea=0;
$neto=0;
foreach ($_SESSION['carro'] as $k => $v)
{
	$linea=$linea+1;
	$importe=0;
	echo "<tr class='body'><td class='body'>$linea";			
    echo "<td class='body'>".$k."</td>";
	foreach($v as $j => $z)
	{
		if ($j == 'cantidad')
		{
		echo "<td class='body'>".$z."</td>";
		$cantidad=$z;
		}
		
		if ($j == 'precio')
		{		
		echo "<td class='body'>$ ".round($z,2)."</td>";
		$precio=round($z,2);
		}
		
		
	}
	$importe = $cantidad * $precio;			
    echo "<td class='body'>$ $importe</tr>";
	$neto=$neto + $importe;
}

echo "<tr><td colspan=4 align='left' class='titulo'> Total : <td class='body'>$ $neto </tr>";
echo "<tr> </form></table>";
 }
 
 else
 
 {
	 
  echo "</p> <font  color='#FFFFFF'>Aun no tiene productos  en su compra</font></p>";
	 
 }
 
?>
</DIV>
</body>
</html>