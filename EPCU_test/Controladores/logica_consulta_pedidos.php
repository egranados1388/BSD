<?php 
// Script  de  manejador  de  resultados----------------------------------------------------------------------------------
// Obtencion de  variables  metodo GET***************************************************

session_start();
include ('../Modelos/sqlprocedures.php');
include ('BOCartomicro.php');
// si el metodo de  obtencion es get  
if ($_SERVER["REQUEST_METHOD"] == "GET")
 { 
$estados=$_GET["estados"]; // Abierto , cerrado , cancelaciones
$tipo=$_GET["tipo"]; // Caja  lamina
$fecha_rec=$_GET["fecha_rec2"]; // Fecha  recepcion orden 
$fecha_nec=$_GET["fecha_nec2"];// Fecha necesidad
$ot=$_GET["ot"]; // OT trabajo
$oc=$_GET["oc"]; // OC  trabajo
$customerID= $_SESSION['login_user'];



if (isset($_GET["siexis"]))
{
		$cexistencia=$_GET["siexis"]; // con existencia
		
		echo "exite ".$cexistencia;
}

else
{
		$cexistencia=0;
		
		echo "no se  deetecto ".$cexistencia;
}


// transformacion de  valores  GET a  instrucciones  SQL *****************************************


//-----------Estado del pedido----------------------------------------------------------------

$Abierto="False";
$cerrado="False";
$cancelado="False";
$estados_str_qry="";
//   Transforma   array de get  en valores  locales.   Solo se  toman en cuenta seleccionado
if (isset($estados[0]))
		{
		$Abierto="True" ;
		}
if (isset($estados[1]))
		{
		$cerrado="True" ;
		}
if (isset($estados[2]))
		{
		$cancelado="True" ;
		}
//	Transofrmacion de valores  locales de estado  a  instrucciones  sql
$estados_str_qry=get_estados_sqlStr_($Abierto,$cerrado,$cancelado);
//echo " sql estados:".$estados_str_qry;

//-------------------------------------------------------------------------------------------------------------

// --- tipo de  pedido ----------------------------------------------------------------------------------------

    $lamina ="False";
	$caja="False";
	$tipo_producto_sqlstr ="";	
	
	if (isset($tipo[0]))
	{
	$lamina="True" ;
	
	}
	if (isset($tipo[1]))
	{
	$caja="True";
	}
	

$tipo_producto_sqlstr=get_tipoproducto_sqlstr($lamina,$caja);

//echo "<br> Tipo producto sqlstr:".$tipo_producto_sqlstr;

//-------------------------------------------------------------------------------------------------------------

//-------Fechas necesidad  u orden-----------------------------------------------------------------------------
$fecha_sqlstr=get_fecha_sqlstr($fecha_nec,$fecha_rec);				
//echo " <br>fecha sqlstr: $fecha_sqlstr";			
	
//---------------------------------------------------------------------

//-----------OT--------------------------------------------------------
	$ot_sqlstr=" ";
	$ot_sqlstr=get_ot_sqlstr($ot);
	//echo "<br> ot  sql:".$ot_sqlstr;
//--------------------------------------------------

//------OC-------------------------------------------

$oc_sqlstr=" ";
$oc_sqlstr=get_oc_sqlstr($oc);
//echo " <br>oc sql: ".$oc_sqlstr;
//----------------------------------------------------

//------- exitencia  con----------------------------

$con_existencia_sqlstr=" ";

$con_existencia_sqlstr=get_conexistencia_sqlstr($cexistencia)	;
echo " <br> se enviaran con exitencia sql:".$con_existencia_sqlstr;

//---------------------------------------------------------------
// -----Cliente---------

$cliente_str="";
$start_strsql="";
if ($customerID == "general") 
	{
	$cliente_str=" ";
	$start_strsql="Select  MAX(Customer.Name) as Cliente,MAX(Customer.CustID) as ID ,";
	}
	else
	{
	$cliente_str = "and  Customer.CustID='".$customerID."'";
	$start_strsql="Select  ";
	}//(5)
//--------------------------------------------------------------







//********************************** logica  de filtros*****************************************


$filtros_sqlstr="";

// Busqueda  especifica
if  (strlen($ot) > 2 or  strlen($oc) > 2) 
	{
		
		if  (strlen($ot) > 2) 
		{
		$filtros_sqlstr= " ".$ot_sqlstr;
		}
		else
		{
		$filtros_sqlstr= " ".$oc_sqlstr;
		}
	}

// Busqueda  general

else 
	
	{
	
	   $filtros_sqlstr= " ".$estados_str_qry." ".$tipo_producto_sqlstr." ".$fecha_sqlstr." ".$con_existencia_sqlstr."".$cliente_str;
		
	}



// Composicion query final--------------------------------

$start_strsql=$start_strsql;// Select ....
$fields_strsql=  get_camposQry($customerID);  // cust, name , etc...
$tables_strsql=  get_tables_sqlstr();// From 1,2,3...
$joins_strsql=get_joins_sqlstr();// Where  cust=cust  join left....
$comodines_strsql= get_comodines_sqlstr();// Group by --- order desc


// Query final
$sqlstr_qry=$start_strsql.$fields_strsql.$tables_strsql.$joins_strsql.$filtros_sqlstr.$comodines_strsql;
echo "".$sqlstr_qry;
header("location: ../Vistas/grid_layer.php?sqlqrystr=$sqlstr_qry"); // Redirecting To Other Page
echo "<br>";?><a href="../Vistas/grid_layer.php?sqlqrystr=<?php echo "".$sqlstr_qry; ?>">ir</a><?php






 }// Fin get
 
 
 

?>