<?php 

//include ('../../Modelos/tvc_procedures.php');
include ('/../../Modelos/procedures.php');





$q=$_GET['parte'];
$hint = "";
if (strlen($q) > 4)
{
$a[] = "";


// lookup all hints from array if $q is different from "" 
if (($q !== "")) {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}












?>




<?php
$sql="select PartNum , PartDescription , ClassID  from part where  PartNum like '%$q%' ";
$conn = abrir_conexion_EpicorDB();
$params = array();
$result =sqlsrv_query($conn, $sql, $params); 

echo "<table class=body_80>";
	echo "<tr class=body>";
		echo "<th class=body>Parte</th><th class=body>Desc.</th><th class=body>Seleccion</th><th  class=body>
           </tr>";
              
while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC))
{   
   		echo "<tr class='body'>";  
    echo "<td class='body'>$row[0]</td>"; 
	 ?><?php
    echo "<td class='body'>$row[1]</td>"; 
	echo "<td class='body'><input type='checkbox' name='partes[]' value='$row[0]'></td>"; 
	 echo "<td class='body'>";?><a href="detalle_parte.php?partnum=<?php echo "".$row[0]; ?>" target="detalle_parte_frame" onClick="window.open(this.href, this.target, 'width=750, height=350,top=320,left=750'); return false;">Detalle parte</a> 
	 
	
	<?php echo "</td>"; 
    echo "</td></tr>"; 
	    
	 
}
  echo " </table>";  
// return $partes; 
cerrar_conexion($conn);






}
// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;













?>