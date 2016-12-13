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
class Common
{		
	// Mysql Variables
	var $mysqlUser = 'root';
	var $mysqlDb = 'desarrollo';
	var $mysqlHost = '172.16.1.249:3306';
	var $mysqlDbPass = '';
	
	var $langVars;
	var $dbc;
	
	function mysqlConnect()
	{
		if($this->dbc = mysql_connect($this->mysqlHost, $this->mysqlUser, $this->mysqlDbPass)) 
		{	
			if(!mysql_select_db ($this->mysqlDb))
			{
				$this->logError(sprintf($this->langVars->errNoSelect,$this->mysqlDb),__FILE__, __LINE__);
			}
		}
		else
		{
			$this->logError($this->langVars->errNoConnect,__FILE__, __LINE__);
		}
	}
	
	function logError($message, $file, $line)
	{
		$message = sprintf($this->langVars->errInScript,$file,$line,$message);
		var_dump($message);
		die;
	}


	function displayHeaderHtml()
	{
		?>
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
		"http://www.w3.org/TR/html4/loose.dtd">
		<html>
		<head>
		<title>Bitacora DC</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<link href="css/table_styles.css" rel="stylesheet" type="text/css" />
			<link href="css/icon_styles.css" rel="stylesheet" type="text/css" />
			<link rel="shortcut icon" href="/favicon.ico" />
			<script type="text/javascript" src="js/prototype.js"></script>
			<script type="text/javascript" src="js/scriptaculous-js/scriptaculous.js"></script>
			<script type="text/javascript" src="js/lang/lang_vars-es.js"></script>
			<script type="text/javascript" src="js/ajax_table_editor.js"></script>
			
			<!-- calendar files -->
			<link rel="stylesheet" type="text/css" media="all" href="js/jscalendar/skins/aqua/theme.css" title="win2k-cold-1" /> 
			<script type="text/javascript" src="js/jscalendar/calendar.js"></script>
			<script type="text/javascript" src="js/jscalendar/lang/calendar-es.js"></script>
			<script type="text/javascript" src="js/jscalendar/calendar-setup.js"></script>

		</head>	
		<body>
		<?php
	}	
	
	function displayFooterHtml()
	{
		?>
		</body>
        
        <p align="center">
        ** Este  sitio esta diseñado para  su optimo desempeño  en pantallas con resolucion a  partir de  1366 X 768 **
        </p>
		</html>
		<?php
	}	
	
	function getAjaxUrl()
	{
		$ajaxUrl = $_SERVER['PHP_SELF'];
		if(count($_GET) > 0)
		{
			$queryStrArr = array();
			foreach($_GET as $var => $val)
			{
				$queryStrArr[] = $var.'='.urlencode($val);
			}
			$ajaxUrl .= '?'.implode('&',$queryStrArr);
		}
		return $ajaxUrl;
	}
	
}
?>
