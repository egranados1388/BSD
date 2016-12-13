<html> 
<body>  
<p>TABLA DE LAS ENTREGAS</p>
<?php 
$conexion = mysql_connect("localhost", "root", "root"); 
mysql_select_db("epicorTest905", $conexion); 
$result = mysql_query("SELECT * FROM orderhed", $conexion); 
if ($row = mysql_fetch_array($result)){ 
   echo "<table border = '1'> \n"; 
echo "<tr><td>OrderNum</td><td>CustNum</td><td>OrderDate</td><td>NeedByDate</td><td>ShiptoNum</td><td>SalesPerson</td></tr> \n"; 
   do { 
      echo "<tr><td>".$row["OrderNum"]."</td><td>".$row["CustNum"]."</td><td>".$row["OrderDate"]."</td><td>".$row["NeedByDate"]."</td><td>".$row["ShiptoNum"]."</td><td>".$row["SalesPerson"]."</td></tr> \n"; 
   } while ($row = mysql_fetch_array($result)); 
   echo "</table> \n"; 
} else { 
echo "¡ No se ha encontrado ningún registro !"; 
} 
?>  
  
</body> 
</html>
