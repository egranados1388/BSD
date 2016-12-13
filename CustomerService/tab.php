<html> 
<body>  
<p>TABLA DE LOS CLIENTES</p>
<?php 
$conexion = mysql_connect("localhost", "root", ""); 
mysql_select_db("epicorTest905", $conexion); 
$result = mysql_query("SELECT * FROM Customer", $conexion); 
if ($row = mysql_fetch_array($result)){ 
   echo "<table border = '1'> \n"; 
echo "<tr><td>CustNum</td><td>CustID</td><td>Addres1</td><td>Address2</td><td>Address3</td><td>Phone</td><td>Email</td><td>Fax</td><td>Fiscal Num</td></tr> \n"; 
   do { 
      echo "<tr><td>".$row["CustNum"]."</td><td>".$row["CustID"]."</td><td>".$row["Address1"]."</td><td>".$row["Address2"]."</td><td>".$row["Address3"]."</td><td>".$row["Phone"]."</td><td>".$row["Email"]."</td><td>".$row["Fax"]."</td><td>".$row["fiscalNum"]."</td></tr> \n"; 
   } while ($row = mysql_fetch_array($result)); 
   echo "</table> \n"; 
} else { 
echo "¡ No se ha encontrado ningún registro !"; 
} 
?>  
  
</body> 
</html>
