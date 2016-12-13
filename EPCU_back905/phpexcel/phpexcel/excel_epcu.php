<?php
$qry = $_GET['qry'];
$sqlstring = $qry;
$modo =$_GET['modo'];
$nombre_cliente=$_GET['cliente'];
	

//ajuntar la libreria excel
include "./lib/PHPExcel.php";

$objPHPExcel = new PHPExcel(); //nueva instancia

$objPHPExcel->getProperties()->setCreator("Cartomicro"); //autor
$objPHPExcel->getProperties()->setTitle("Estado de pedidos"); //titulo


//inicio estilos
$titulo = new PHPExcel_Style(); //nuevo estilo
$titulo->applyFromArray(
  array('alignment' => array( //alineacion
      'wrap' => false,
      'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
    ),
    'font' => array( //fuente
      'bold' => true,
      'size' => 20
    )
));

$subtitulo = new PHPExcel_Style(); //nuevo estilo

$subtitulo->applyFromArray(
  array('fill' => array( //relleno de color
      'type' => PHPExcel_Style_Fill::FILL_SOLID,
      'color' => array('argb' => 'FFCCFFCC')
    ),
    'borders' => array( //bordes
      'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
    )
));

$bordes = new PHPExcel_Style(); //nuevo estilo

$bordes->applyFromArray(
  array('borders' => array(
      'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
    )
));
//fin estilos

$objPHPExcel->createSheet(0); //crear hoja
$objPHPExcel->setActiveSheetIndex(0); //seleccionar hora
$objPHPExcel->getActiveSheet()->setTitle("Listado"); //establecer titulo de hoja

//orientacion hoja
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

//tipo papel
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LETTER);

//establecer impresion a pagina completa
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
//fin: establecer impresion a pagina completa

//establecer margenes
$margin = 0.5 / 2.54; // 0.5 centimetros
$marginBottom = 1.2 / 2.54; //1.2 centimetros
$objPHPExcel->getActiveSheet()->getPageMargins()->setTop($margin);
$objPHPExcel->getActiveSheet()->getPageMargins()->setBottom($marginBottom);
$objPHPExcel->getActiveSheet()->getPageMargins()->setLeft($margin);
$objPHPExcel->getActiveSheet()->getPageMargins()->setRight($margin);
//fin: establecer margenes

//incluir una imagen
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath('cartomicro_logo.jpg'); //ruta
$objDrawing->setHeight(75); //altura
$objDrawing->setCoordinates('A1');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet()); //incluir la imagen
//fin: incluir una imagen

//establecer titulos de impresion en cada hoja
$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 6);


$fila=6;
$objPHPExcel->getActiveSheet()->SetCellValue("A$fila", "ESTADO DE  PEDIDOS ".$nombre_cliente." ID: ".$modo);
$objPHPExcel->getActiveSheet()->mergeCells("A$fila:P$fila"); //unir celdas
$objPHPExcel->getActiveSheet()->setSharedStyle($titulo, "A$fila:P$fila"); //establecer estilo



		$serverName = "SER-SQL"; //serverName\instanceName
		$connectionInfo = array( "Database"=>"Epicor905", "UID"=>"Epicon", "PWD"=>"cart0-7364*");
		$conn = sqlsrv_connect( $serverName, $connectionInfo);
		$valor= " ";
		if( $conn ) 
			{
    		 $sql = $sqlstring ;
			 $params = array();
			 $stmt = sqlsrv_query( $conn, $sql, $params);




	



				if ($modo == "general")
				{
				
				
					//titulos de columnas
$fila+=1;
//$objPHPExcel->getActiveSheet()->SetCellValue("A$fila", 'NOMBRE');
//$objPHPExcel->getActiveSheet()->SetCellValue("B$fila", 'APELLIDO');


$objPHPExcel->getActiveSheet()->SetCellValue("A$fila", 'Cliente');
					$objPHPExcel->getActiveSheet()->SetCellValue("B$fila", 'ID');
					$objPHPExcel->getActiveSheet()->SetCellValue("C$fila", 'OV');
					$objPHPExcel->getActiveSheet()->SetCellValue("D$fila", 'LIN');
					$objPHPExcel->getActiveSheet()->SetCellValue("E$fila", 'OT');
					$objPHPExcel->getActiveSheet()->SetCellValue("F$fila", 'PARTE');
					$objPHPExcel->getActiveSheet()->SetCellValue("G$fila", 'DESCR');
					$objPHPExcel->getActiveSheet()->SetCellValue("H$fila", 'ANCH. COBRO');
					$objPHPExcel->getActiveSheet()->SetCellValue("I$fila", 'OC');
					$objPHPExcel->getActiveSheet()->SetCellValue("J$fila", 'FECHA REQ');
					$objPHPExcel->getActiveSheet()->SetCellValue("K$fila", 'FECHA NEC');
					$objPHPExcel->getActiveSheet()->SetCellValue("L$fila", 'CANT OV');
					$objPHPExcel->getActiveSheet()->SetCellValue("M$fila", 'CANT EMB');
					$objPHPExcel->getActiveSheet()->SetCellValue("N$fila", 'CANT EXIST');
					$objPHPExcel->getActiveSheet()->SetCellValue("O$fila", 'ML');
					$objPHPExcel->getActiveSheet()->SetCellValue("P$fila", 'M2');
					$objPHPExcel->getActiveSheet()->SetCellValue("Q$fila", 'M3');
					$objPHPExcel->getActiveSheet()->SetCellValue("R$fila", 'COMPLEMENTO');
					$objPHPExcel->getActiveSheet()->SetCellValue("S$fila", 'M3  EXIST');
					$objPHPExcel->getActiveSheet()->SetCellValue("T$fila", 'EST OV');
					$objPHPExcel->getActiveSheet()->SetCellValue("U$fila", 'EST LIN');
					$objPHPExcel->getActiveSheet()->SetCellValue("V$fila", 'CANCELACION');
					$objPHPExcel->getActiveSheet()->SetCellValue("W$fila", 'CLASE');
					$objPHPExcel->getActiveSheet()->SetCellValue("X$fila", 'C. UNIT');
					$objPHPExcel->getActiveSheet()->SetCellValue("Y$fila", 'Combinacion');
$objPHPExcel->getActiveSheet()->setSharedStyle($subtitulo, "A$fila:Y$fila"); //establecer estilo
$objPHPExcel->getActiveSheet()->getStyle("A$fila:Y$fila")->getFont()->setBold(true); //negrita

						while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) 
						{
						
						//rellenar con contenido
						//for ($i = 0; $i < 10; $i++) 
						//{
 						 $fila+=1;
  						//$objPHPExcel->getActiveSheet()->SetCellValue("A$fila", 'Garabatos');
 						 //$objPHPExcel->getActiveSheet()->SetCellValue("B$fila", 'Linux');
						 
					$objPHPExcel->getActiveSheet()->SetCellValue("A$fila", $row[0]);
					$objPHPExcel->getActiveSheet()->SetCellValue("B$fila", $row[1]);
					$objPHPExcel->getActiveSheet()->SetCellValue("C$fila", $row[2]);
					$objPHPExcel->getActiveSheet()->SetCellValue("D$fila", $row[3]);
					$objPHPExcel->getActiveSheet()->SetCellValue("E$fila", $row[4]);
					$objPHPExcel->getActiveSheet()->SetCellValue("F$fila", $row[5]);
					$objPHPExcel->getActiveSheet()->SetCellValue("G$fila", $row[6]);
					$objPHPExcel->getActiveSheet()->SetCellValue("H$fila", $row[7]);
					$objPHPExcel->getActiveSheet()->SetCellValue("I$fila", $row[8]);
					$objPHPExcel->getActiveSheet()->SetCellValue("J$fila", $row[9]);
					$objPHPExcel->getActiveSheet()->SetCellValue("K$fila", $row[10]);
					$objPHPExcel->getActiveSheet()->SetCellValue("L$fila", $row[11]);
					$objPHPExcel->getActiveSheet()->SetCellValue("M$fila", $row[12]);
					$objPHPExcel->getActiveSheet()->SetCellValue("N$fila", $row[13]);
					$objPHPExcel->getActiveSheet()->SetCellValue("O$fila", $row[14]);
					$objPHPExcel->getActiveSheet()->SetCellValue("P$fila", $row[15]);
					$objPHPExcel->getActiveSheet()->SetCellValue("Q$fila", $row[16]);
					$objPHPExcel->getActiveSheet()->SetCellValue("R$fila", $row[17]);
					$objPHPExcel->getActiveSheet()->SetCellValue("S$fila", $row[18]);
					$objPHPExcel->getActiveSheet()->SetCellValue("T$fila", $row[19]);
					$objPHPExcel->getActiveSheet()->SetCellValue("U$fila", $row[20]);
					$objPHPExcel->getActiveSheet()->SetCellValue("V$fila", $row[21]);
					$objPHPExcel->getActiveSheet()->SetCellValue("W$fila", $row[22]);
					$objPHPExcel->getActiveSheet()->SetCellValue("X$fila", $row[23]);
					$objPHPExcel->getActiveSheet()->SetCellValue("Y$fila", $row[24]);
 						 //Establecer estilo
 						 $objPHPExcel->getActiveSheet()->setSharedStyle($bordes, "A$fila:X$fila");
  
						//}//fin for
						
						
						
						
						}

				}
				
				
				else
				{
				
				
				
					//titulos de columnas
$fila+=1;
//$objPHPExcel->getActiveSheet()->SetCellValue("A$fila", 'NOMBRE1');
//$objPHPExcel->getActiveSheet()->SetCellValue("B$fila", 'APELLIDO1');

					//$objPHPExcel->getActiveSheet()->SetCellValue("A$fila", 'Cliente');
					//$objPHPExcel->getActiveSheet()->SetCellValue("B$fila", 'ID');
					$objPHPExcel->getActiveSheet()->SetCellValue("C$fila", 'OV');
					$objPHPExcel->getActiveSheet()->SetCellValue("D$fila", 'LIN');
					$objPHPExcel->getActiveSheet()->SetCellValue("E$fila", 'OT');
					$objPHPExcel->getActiveSheet()->SetCellValue("F$fila", 'PARTE');
					$objPHPExcel->getActiveSheet()->SetCellValue("G$fila", 'DESCR');
					$objPHPExcel->getActiveSheet()->SetCellValue("H$fila", 'ANCH. COBRO');
					$objPHPExcel->getActiveSheet()->SetCellValue("I$fila", 'OC');
					$objPHPExcel->getActiveSheet()->SetCellValue("J$fila", 'FECHA REQ');
					$objPHPExcel->getActiveSheet()->SetCellValue("K$fila", 'FECHA NEC');
					$objPHPExcel->getActiveSheet()->SetCellValue("L$fila", 'CANT OV');
					$objPHPExcel->getActiveSheet()->SetCellValue("M$fila", 'CANT EMB');
					$objPHPExcel->getActiveSheet()->SetCellValue("N$fila", 'CANT EXIST');
					$objPHPExcel->getActiveSheet()->SetCellValue("O$fila", 'ML');
					$objPHPExcel->getActiveSheet()->SetCellValue("P$fila", 'M2');
					$objPHPExcel->getActiveSheet()->SetCellValue("Q$fila", 'M3');
					$objPHPExcel->getActiveSheet()->SetCellValue("R$fila", 'COMPLEMENTO');
					$objPHPExcel->getActiveSheet()->SetCellValue("S$fila", 'M3  EXIST');
					$objPHPExcel->getActiveSheet()->SetCellValue("T$fila", 'EST OV');
					$objPHPExcel->getActiveSheet()->SetCellValue("U$fila", 'EST LIN');
					$objPHPExcel->getActiveSheet()->SetCellValue("V$fila", 'CANCELACION');
					$objPHPExcel->getActiveSheet()->SetCellValue("W$fila", 'CLASE');
					$objPHPExcel->getActiveSheet()->SetCellValue("X$fila", 'C. UNIT');
					$objPHPExcel->getActiveSheet()->SetCellValue("Y$fila", 'Combinacion');

$objPHPExcel->getActiveSheet()->setSharedStyle($subtitulo, "A$fila:Y$fila"); //establecer estilo
$objPHPExcel->getActiveSheet()->getStyle("A$fila:Y$fila")->getFont()->setBold(true); //negrita



						while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) 
						{
						
						
						//rellenar con contenido
						//for ($i = 0; $i < 10; $i++) 
						//{
 						 $fila+=1;
  						//$objPHPExcel->getActiveSheet()->SetCellValue("A$fila", 'Garabatos1');
 						// $objPHPExcel->getActiveSheet()->SetCellValue("B$fila", 'Linux1');



					$objPHPExcel->getActiveSheet()->SetCellValue("A$fila", "");
					$objPHPExcel->getActiveSheet()->SetCellValue("B$fila", "");
					$objPHPExcel->getActiveSheet()->SetCellValue("C$fila", $row[0]);
					$objPHPExcel->getActiveSheet()->SetCellValue("D$fila", $row[1]);
					$objPHPExcel->getActiveSheet()->SetCellValue("E$fila", $row[2]);
					$objPHPExcel->getActiveSheet()->SetCellValue("F$fila", $row[3]);
					$objPHPExcel->getActiveSheet()->SetCellValue("G$fila", $row[4]);
					$objPHPExcel->getActiveSheet()->SetCellValue("H$fila", $row[5]);
					$objPHPExcel->getActiveSheet()->SetCellValue("I$fila", $row[6]);
					$objPHPExcel->getActiveSheet()->SetCellValue("J$fila", $row[7]);
					$objPHPExcel->getActiveSheet()->SetCellValue("K$fila", $row[8]);
					$objPHPExcel->getActiveSheet()->SetCellValue("L$fila", $row[9]);
					$objPHPExcel->getActiveSheet()->SetCellValue("M$fila", $row[10]);
					$objPHPExcel->getActiveSheet()->SetCellValue("N$fila", $row[11]);
					$objPHPExcel->getActiveSheet()->SetCellValue("O$fila", $row[12]);
					$objPHPExcel->getActiveSheet()->SetCellValue("P$fila", $row[13]);
					$objPHPExcel->getActiveSheet()->SetCellValue("Q$fila", $row[14]);
					$objPHPExcel->getActiveSheet()->SetCellValue("R$fila", $row[15]);
					$objPHPExcel->getActiveSheet()->SetCellValue("S$fila", $row[16]);
					$objPHPExcel->getActiveSheet()->SetCellValue("T$fila", $row[17]);
					$objPHPExcel->getActiveSheet()->SetCellValue("U$fila", $row[18]);
					$objPHPExcel->getActiveSheet()->SetCellValue("V$fila", $row[19]);
					$objPHPExcel->getActiveSheet()->SetCellValue("W$fila", $row[20]);
					$objPHPExcel->getActiveSheet()->SetCellValue("X$fila", $row[21]);
$objPHPExcel->getActiveSheet()->SetCellValue("Y$fila", $row[22]);
 						 //Establecer estilo
 						 $objPHPExcel->getActiveSheet()->setSharedStyle($bordes, "A$fila:Y$fila");
  
						//}//fin for
						
						
						
						} // fin while
				
				}// fin else
				
				
				
				
				
						
				
				sqlsrv_free_stmt( $stmt);
				sqlsrv_close( $conn );
				
				

				
				
			}// Fin if  con
				

				




//insertar formula
$fila+=2;
//$objPHPExcel->getActiveSheet()->SetCellValue("A$fila", 'SUMA');
//$objPHPExcel->getActiveSheet()->SetCellValue("B$fila", '=1+2');

//recorrer las columnas
foreach (range('A', 'X') as $columnID) {
  //autodimensionar las columnas
  $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);  
}

//establecer pie de impresion en cada hoja
$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&R&F página &P / &N');


// Guardar como excel 2007
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); //Escribir archivo

// Establecer formado de Excel 2007
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

// nombre del archivo
header('Content-Disposition: attachment; filename="epcu.xlsx"');

//forzar a descarga por el navegador
$objWriter->save('php://output');


?>