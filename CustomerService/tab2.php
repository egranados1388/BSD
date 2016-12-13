<html> 
<body>  
<p>TABLA DE LOS PEDIDOS</p>
<?php 
$conexion = mysql_connect("localhost", "root", "root"); 
mysql_select_db("epicorTest905", $conexion); 
$result = mysql_query("SELECT * FROM orderdtl", $conexion); 
if ($row = mysql_fetch_array($result)){ 
   echo "<table border = '1'> \n"; 
echo "<tr><td>OrderNum</td><td>OrderLine</td><td>PartNum</td><td>PartDesc</td><td>UnitPrice</td><td>OurQty</td></tr> \n"; 
   do { 
      echo "<tr><td>".$row["OrderNum"]."</td><td>".$row["OrderLine"]."</td><td>".$row["PartNum"]."</td><td>".$row["PartDesc"]."</td><td>".$row["UnitPrice"]."</td><td>".$row["OurQty"]."</td></tr> \n"; 
   } while ($row = mysql_fetch_array($result)); 
   echo "</table> \n"; 
} else { 
echo "¡ No se ha encontrado ningún registro !"; 
} 
?>  
  
</body> 
</html>
