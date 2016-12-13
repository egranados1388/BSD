<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>

<?php 
session_start();
$articulos=$_POST['articulos'];
$cantidades=$_POST['cantidades'];
$precios=$_POST['precios'];	
$array = $articulos;
$count = count($array);





for ($i = 0; $i < $count; $i++) {
    
  
	
	if(empty($_SESSION['carro'][$array[$i]]))
{
	$_SESSION['carro'][$array[$i]] = array('cantidad' => $cantidades[$i],'precio' => round($precios[$i],2));
	echo "Se agrego producto al carrito!";
}else{
	echo "El producto ya esta en el carrito!";
}
 
 
	
	
	
	
	
}
	
	
	
	
	
	
header("location: detalle_pedido.php?cat=cuantificar"); // Redirecting To Other Page	
	
?>
<a href="detalle_pedido.php?cat=cuantificar">Seguir  agregando</a>
</body>
</html>