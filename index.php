<html>
<head>
<title>Inicio de sesión BDC</title>
<meta http-equiv=”Content-Type” content=”text/html; charset=iso-8859-1?>
<link href="css/table_styles.css" rel="stylesheet" type="text/css" />
			<link href="css/icon_styles.css" rel="stylesheet" type="text/css" />
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
<img src="images/cartomicro_logo.png" width="5%" height="5%" align=center>
Bitacora de  Desarrollo De  Software 1.0<br>
<form action=control.php method=post id=form><br>
<table class="matetable">
<tr><td class="labelCell">
Usuario: <td class="inputCell"> <input type=text name=usuario id="usuario"/><tr>
<td class="labelCell">Clave: <td class="inputCell"> <input type=password name=clave id="clave" />
</table>

<input type=submit value=Entrar class="ajaxButton">
<a href=user.php>Modo Usuario</a>
</form>
<p class=alerta>
<?php 

if (empty($_GET['msg'])) { $msg="";} else { $msg=$_GET['msg'];}
//$va=$_GET['msg'];




 

 echo htmlspecialchars($msg);  
 
 ?></p>
</body>
</html>