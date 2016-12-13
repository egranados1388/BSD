<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php 

class modelo_epc 

{

 var $complemento_str;


function get_complemento()
{

$this->complemento_str=  " from  OrderHed, Customer, OrderDtl, part, ((OrderRel      LEFT OUTER JOIN  Jobprod  on  (OrderRel.OrderNum = Jobprod .OrderNum and OrderRel.OrderLine = Jobprod .OrderLine and OrderRel.OrderRelNum = Jobprod .OrderRelNum))  left  outer join  JobHead  on   (Jobprod .JobNum = JobHead.JobNum   ))  left  outer join  PartBin  on   (JobHead.PartNum = PartBin.PartNum and  JobHead.JobNum = PartBin.LotNum)   ";   











return $this->complemento_str;

}


}

?>


</body>
</html>
