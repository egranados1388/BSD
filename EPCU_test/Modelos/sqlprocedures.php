<?php


function get_estados_sqlStr_($Abi,$cerr,$cancel)
{
$tipo_str="";
if (  ($Abi == "False") && ($cerr == "False")  && ($cancel == "False" )) 
			{
			echo "<br> Al menos  un tipo de  pedido debe ser seleccionado <br>";
			}
			else
			{
			
				// Enlazando filtros
				if (  ($Abi == "True") && ($cerr == "False")  && ($cancel == "False" )) 
				{
				$tipo_str = $tipo_str." and  OrderDtl.OpenLine = 1";
				}

				if (  ($Abi == "True") && ($cerr == "True")  && ($cancel == "False" )) 
				{
				$tipo_str = $tipo_str." and OrderDtl.CheckBox12 = 0";
				}

				if (  ($Abi == "True") && ($cerr == "False")  && ($cancel == "True" )) 
				{
				$tipo_str = $tipo_str . "and (OrderDtl.OpenLine = 1 or  OrderDtl.CheckBox12 = 1)";
				}
				
				if (  ($Abi == "False") && ($cerr == "True")  && ($cancel == "False" )) 
				{
				$tipo_str = $tipo_str . "and (OrderDtl.OpenLine = 0 and OrderDtl.CheckBox12 = 0)";
				}
		
				if (  ($Abi == "False") && ($cerr == "True")  && ($cancel == "True" )) 
				{
				$tipo_str = $tipo_str . "and  (OrderDtl.OpenLine = 0 or  OrderDtl.CheckBox12 = 1)";
				}

				if (  ($Abi == "False") && ($cerr == "False")  && ($cancel == "True" )) 
				{
				$tipo_str = $tipo_str . "and OrderDtl.CheckBox12 = 1";
				}

				if (  ($Abi == "False") && ($cerr == "False")  && ($cancel == "True" )) 
				{
				$tipo_str = $tipo_str . "";
				}


			}// fin else

  return $tipo_str;
}



function get_tipoproducto_sqlstr($lam,$caj)
{
	$tipo_prod=" ";
if (  ($lam == "False") && ($caj == "False") ) 
	{
	 echo "Debe  Seleccionar  al menos  un tipo de  producto";
	}
	else //(3)
	{
		if ( ($lam == "True") && ($caj == "True") ) 
		{
		$tipo_prod=" ";
		}
		if ( ($lam == "True") && ($caj == "False") ) 
		{
		$tipo_prod=" and Part.ClassID ='LAM'";
		}
		if ( ($lam == "False") && ($caj == "True") ) 
		{
		$tipo_prod=" and Part.ClassID ='BOX'";
		}
	} //(3)
	return $tipo_prod;
}




function get_fecha_sqlstr($fecha_nec,$fecha_rec)
{

$fecha_uso="";
$fecha_uso_sqlins="";

if (strlen($fecha_nec) > 1)
{
$fecha_uso=$fecha_nec;
$fecha_uso_sqlins="and OrderDtl.NeedByDate >='";
}
else
{
	if (strlen($fecha_rec) > 1)
	{
	$fecha_uso=$fecha_rec;	
	$fecha_uso_sqlins="and OrderHed.OrderDate >='";
	}
	else
	{
	  echo "<br>No hay fecha  seleccionada";
	}
	
}

$fecha_sqlstr="";
$fecha_format ="";
$fecha_format = new DateTime($fecha_uso);
$fecha_sqlstr=$fecha_uso_sqlins.$fecha_format->format('Y-m-d')."' ";


return $fecha_sqlstr;				
}


function get_ot_sqlstr($ot)
{
	$ot_sqlstr="";
if (strlen($ot) > 2) 
	{
			
			$ot_sqlstr=" and JobProd.Jobnum='".$ot."'";
			
	
	}
return $ot_sqlstr;
}

function get_oc_sqlstr($oc)
{
	$oc_sqlstr="";
if (strlen($oc) > 2) 
	{
	
		$oc_sqlstr=" and  OrderHed.PONum='".$oc."'";
			
	}
return $oc_sqlstr;
}


function get_conexistencia_sqlstr($cexistencia)
{
if ($cexistencia==1)
	{
		
		$con_existencia_sqlstr="  ";
		
	}
	else
	{
		$con_existencia_sqlstr=" and PartBin.OnhandQty > 0 ";
	}
	
	return $con_existencia_sqlstr;
}

?>