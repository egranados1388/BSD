<html> 
<body>  
<p>TABLA DE LAS EMBARQUE</p>
<?php 
$conexion = mysql_connect("localhost", "root", "root"); 
mysql_select_db("epicorTest905", $conexion); 
$result = mysql_query("SELECT * FROM shipto", $conexion); 
if ($row = mysql_fetch_array($result)){ 
   echo "<table border = '1'> \n"; 
echo "<tr><td>shiptoNum</td><td>CustNum</td><td>Address1</td><td>Address2</td><td>Address3</td></tr> \n"; 
   do { 
      echo "<tr><td>".$row["shiptoNum"]."</td><td>".$row["CustNum"]."</td><td>".$row["Address1"]."</td><td>".$row["Address2"]."</td><td>".$row["Address3"]."</td></tr> \n"; 
   } while ($row = mysql_fetch_array($result)); 
   echo "</table> \n"; 
} else { 
echo "¡ No se ha encontrado ningún registro !"; 
} 
?>  
  
</body> 
</html>
