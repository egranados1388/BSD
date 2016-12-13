<?php
/*
 * Mysql Ajax Table Editor
 *
 * Copyright (c) 2008 Chris Kitchen <info@mysqlajaxtableeditor.com>
 * All rights reserved.
 *
 * See COPYING file for license information.
 *
 * Download the latest version from
 * http://www.mysqlajaxtableeditor.com
 */
require_once('Common.php');
require_once('php/lang/LangVars-es.php');
require_once('php/AjaxTableEditorUser_file.php');
class Example2 extends Common
{

	function displayHtml()
	{
		?>
			<div align="left" style="position: relative;"><div id="ajaxLoader1"><img src="images/ajax_loader.gif" alt="Loading..." /></div></div>
			
			<br />
			
			
		
			<table border=0 width=100%><tr><td width=7%>	<img src="images/cartomicro_logo.png" width="100" height="80"> </td><td colspan=2>
			<p class="labelCell">Bienvenido </p ></td></tr><tr><td> <a href=index.php>Administrar</a></td><td width="100"><a href=ayuda.docx>Ayuda</a></td><td><a href="Docs/GSTFM04.docx">Formato</a></td></tr></p>
			<tr><td colspan=3 align=center><img src=images/Estados/cero_nvo.png width=20 height=20>(0)Nuevo <img src=images/Estados/uno_nvodoc.png width=20 height=20>(1)En Seguimiento<img src=images/Estados/dos_desa.png width=20 height=20>(2)En Desarrollo<img src=images/Estados/tres_prueba.png width=20 height=20>(3)Fase de prueba<img src=images/Estados/cuatro_pendiente.png width=20 height=20>(4)Pendiente<img src=images/Estados/cinco_cancelado.png width=20 height=20>(5)Cancelado<img src=images/Estados/seis_concluido.png width=20 height=20>(6)Concluido </td></tr></table>
			
			
			</div>
		
			<div id="historyContainer">
				<div id="information">
				</div>
		
				<div id="titleLayer" style="padding: 2px; font-weight: bold; font-size: 18px; text-align: center;">
				</div>
		
				<div id="tableLayer" align="center">
				</div>
				
				<div id="recordLayer" align="center">
				</div>		
				
				<div id="searchButtonsLayer" align="center">
				</div>
			</div>
			<script type="text/javascript">
				trackHistory = true;
				var ajaxUrl = '<?php echo $this->getAjaxUrl(); ?>';
				toAjaxTableEditor('update_html','');
			</script>
		<?php
	}

	function initiateEditor()
	{
		$tableColumns['int_num'] = array('display_text' => 'ID', 'perms' => 'TQSXO','col_header_info' => 'width="30"');
		$tableColumns['folio'] = array('display_text' => 'Folio', 'perms' => 'VCTAXQSHO', 'req' => true, 'default' => date("Y"),'col_header_info' => 'width="70"' );
		$tableColumns['nombre_solicitud'] = array('display_text' => 'Nombre Solicitud', 'perms' => 'EVCTAXQSHO','col_header_info' => 'width="250"');
		$tableColumns['estatus'] = array('display_text' => 'Estatus', 'perms' => 'EVCTAXQSHO','default' => '0');
		$tableColumns['solicitante'] = array('display_text' => 'Solicitante', 'perms' => 'EVCTAXQSHO','col_header_info' => 'width="300"'); 
		
									
  $tableColumns['asignado'] = array('display_text' => 'Atiende', 'perms' => 'EVCTAXQSHO','col_header_info' => 'width="200"' );

		
		
		$tableColumns['fecha_solicitud'] = array('display_text' => 'Fecha Solicitud', 'perms' => 'EVCTAXQSHO','display_mask' => 'date_format(fecha_solicitud,"%d - %m- %Y")', 'order_mask' => 'desarrollos.fecha_solicitud', 'calendar' => '%d %B %Y','col_header_info' => 'width="100"'); 
		
			
$tableColumns['fecha_inicio'] = array('display_text' => 'Fecha Inicial', 'perms' => 'EVCTAXQSHO','display_mask' => 'date_format(fecha_inicio,"%d - %m - %Y")', 'order_mask' => 'desarrollos.fecha_inicio', 'calendar' => '%d %B %Y','col_header_info' => 'width="100"'); 
		
		$tableColumns['fecha_entrega'] = array('display_text' => 'Fecha Entrega', 'perms' => 'EVCTAXQSHO','display_mask' => 'date_format(fecha_entrega,"%d - %m - %Y")', 'order_mask' => 'desarrollos.fecha_entrega', 'calendar' => '%d %B %Y','col_header_info' => 'width="100"'); 
		
		
			$tableColumns['fecha_cierre'] = array('display_text' => 'Fecha Cierre', 'perms' => 'EVCTAXQSHO','display_mask' => 'date_format(fecha_cierre,"%d - %m - %Y")', 'order_mask' => 'desarrollos.fecha_cierre', 'calendar' => '%d %B %Y','col_header_info' => 'width="100"'); 
		
		$tableColumns['prioridad'] = array('display_text' => 'Prioridad', 'perms' => 'VTAXQSHO','default' => '0','col_header_info' => 'width="50"' );
		$tableColumns['Observaciones'] = array('display_text' => 'Detalles', 'perms' => 'VA');
		$tableColumns['archivo'] = array('display_text' => 'Anexar Solicitud','perms' => 'A','file_upload' => array('upload_fun' => array($this,'handleUpload'))); 			


			// %A, %e de %B de %Y
		$tableName = 'desarrollos';
		$primaryCol = 'int_num';
		
		
		
		
		$errorFun = array(&$this,'logError');
		//$permissions = 'EAVIDQCSXHOM';
		 // $permissions = 'AVXQSOIUTF';
		 $permissions = 'AXQSIUOTFV';
		
		require_once('php/AjaxTableEditorUser_file.php');
		$this->Editor = new AjaxTableEditorUser($tableName,$primaryCol,$errorFun,$permissions,$tableColumns);
		$this->Editor->setConfig('tableInfo','cellpadding="1" width="90%" class="mateTable"');
		$this->Editor->setConfig('orderByColumn','int_num');
		$this->Editor->setConfig('ascOrDesc','Desc'); 
		$this->Editor->setConfig('addRowTitle','Nueva Solicitud');
		$this->Editor->setConfig('editRowTitle','Editar  Solicitud');
		//$this->Editor->setConfig('iconTitle','Edit Employee');
		$this->Editor->setConfig('viewQuery',false);
	}
	

function handleUpload($id,$col,$filesArr,$valErrors)
{
     if(count($valErrors) == 0)
     {
          // Delete image file if it already existed
          $query = "select archivo,int_num  from desarrollos  where int_num = '".$this->Editor->escapeData($id)."'";
          $result = $this->Editor->doQuery($query);
          if($row = mysql_fetch_assoc($result))
          {
               if(file_exists('uploads/'.$row['archivo']))
               {
                    unlink('uploads/'.$row['archivo']);
               }
          }
          // Copy file to data directory and update database with the file name.
          if(move_uploaded_file($filesArr['tmp_name'],'uploads/'.$filesArr['name']))
          {
               $query = "update desarrollos set archivo = '".$this->Editor->escapeData($filesArr['name'])."' where int_num = '".$this->Editor->escapeData($id)."'";
               $result = $this->Editor->doQuery($query);
               if(!$result)
               {
                    $valErrors[] = 'There was an error updating the database.';
                    unlink('uploads/'.$filesArr['name']);
               }
          }
          else
          {
               $valErrros[] = 'The file could not be moved';
          }
     }
     return $valErrors;
}
	
	
	
	
	
	
	
	
	
	function Example2()
	{
		if(isset($_POST['json']))
		{
			session_start();
			$this->mysqlConnect(); // Comes from extended Common class
			if(ini_get('magic_quotes_gpc'))
			{
				$_POST['json'] = stripslashes($_POST['json']);
			}
			if(function_exists('json_decode'))
			{
				$data = json_decode($_POST['json']);
			}
			else
			{
				require_once('php/JSON.php');
				$js = new Services_JSON();
				$data = $js->decode($_POST['json']);
			}
			if(empty($data->info) && strlen(trim($data->info)) == 0)
			{
				$data->info = '';
			}
			$this->initiateEditor();
			$this->Editor->main($data->action,$data->info);
			if(function_exists('json_encode'))
			{
				echo json_encode($this->Editor->retArr);
			}
			else
			{
				echo $js->encode($this->Editor->retArr);
			}
		}
		else if(isset($_GET['mate_export']))
		{
			session_start();
			ob_start();
			$this->mysqlConnect(); // Comes from extended Common class
			$this->initiateEditor();
			echo $this->Editor->exportInfo();
			header("Cache-Control: no-cache, must-revalidate");
			header("Pragma: no-cache");
			header("Content-type: application/x-msexcel");			
			header('Content-Type: text/csv');
			header('Content-Disposition: attachment; filename="'.$this->Editor->tableName.'.csv"');
			exit();
		}
		else
		{
			$this->displayHeaderHtml(); // Comes from extended Common class
			$this->displayHtml();
			$this->displayFooterHtml(); // Comes from extended Common class
		}
	}
}
$lte = new Example2();
?>