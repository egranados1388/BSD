<html> 
<body>  
<p>TABLA DE LOS PEDIDOS y ENTREGAS</p>
<?php 
$conexion = mysql_connect("localhost", "root", ""); 
mysql_select_db("epicorTest905", $conexion); 
$result = mysql_query("SELECT * FROM jobhead", $conexion); 
if ($row = mysql_fetch_array($result)){ 
   echo "<table border = '1'> \n"; 
echo "<tr><td>JobNum</td><td>OrderNum</td><td>OrderLine</td><td>PromisseDate</td><td>OrderComplete</td><td>Startdate</td><td>CloseDate</td><td>ResourseID</td></tr> \n"; 
   do { 
      echo "<tr><td>".$row["JobNum"]."</td><td>".$row["OrderNum"]."</td><td>".$row["OrderLine"]."</td><td>".$row["PromisseDate"]."</td><td>".$row["OrderComplete"]."</td><td>".$row["Startdate"]."</td><td>".$row["CloseDate"]."</td><td>".$row["ResourseID"]."</td></tr> \n"; 
   } while ($row = mysql_fetch_array($result)); 
   echo "</table> \n"; 
} else { 
echo "¡ No se ha encontrado ningún registro !"; 
} 
?>  
  
</body> 
</html>
