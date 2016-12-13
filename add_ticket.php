<?php
//include('mails.php');
//tomo el valor de un elemento de tipo texto del formulario
//send_mail_($tipo,$usuario,$fecha,$ticket,$descripcion)
//send_mail_("","","","","");

//************************************************** ALTA  DE  TICKETS NIVEL USUARIO******************** 





$folio = $_POST["folio"];
$solicitud = $_POST["nombre_solicitud"];
$estatus = $_POST["estatus"];
$solicitante = $_POST["solicitante"];
$fecha_solicitud = $_POST["fecha_solicitud"];
$fecha_entrega = $_POST["fecha_entrega"];
$prioridad = $_POST["prioridad"];
$observaciones = $_POST["Observaciones"];
$fecha_cierre = $_POST["fecha_cierre"];
$asignado = $_POST["asignado"];
$nombre_archivo = $_FILES['archivo']['name'];
$tipo_archivo = $_FILES['archivo']['type'];
$tamano_archivo = $_FILES['archivo']['size'];
	$path = $_FILES['archivo']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);		
function get_correo($iduser)
{
	
	$cone=mysql_connect("172.16.1.1:3306","root","su235874");
	mysql_select_db("bd_carto_micro",$cone);
	$sql="select * from con_tbl_usuario where id_usuario=".$iduser;
	$datos=mysql_query($sql,$cone); //enviar código MySQL
	
	while ($row=mysql_fetch_array($datos))
	{ //Bucle para ver todos los registros
	 
														//$row['nombre']; //datos del campo nombre
																					//$row['id_usuario'];
		$correo =$row['correo'];
					       	  
	}
								return $correo;
	mysql_close($con);//cerrar conexion

}
						
								
															

function send_mail_($tipo,$usuario,$fecha,$ticket,$descripcion,$destinatario_mail)

{

require 'phpmailer/class.phpmailer.php';
 $body= $fecha." - "." El usuario ".$usuario." realizo un nuevo movimiento de ".$tipo." <br> Solicitud:".$ticket." : ".$descripcion."";
//Crear una instancia de PHPMailer
$mail = new PHPMailer();
//Definir que vamos a usar SMTP
$mail->IsSMTP();
//Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
// 0 = off (producción)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug  = 0;
//Ahora definimos gmail como servidor que aloja nuestro SMTP
$mail->Host       = 'smtp.gmail.com';
//El puerto será el 587 ya que usamos encriptación TLS
$mail->Port       = 587;
//Definmos la seguridad como TLS
$mail->SMTPSecure = 'tls';
//Tenemos que usar gmail autenticados, así que esto a TRUE
$mail->SMTPAuth   = true;
//Definimos la cuenta que vamos a usar. Dirección completa de la misma
$mail->Username   = "alertas@cartomicro.com.mx";
//Introducimos nuestra contraseña de gmail
$mail->Password   = "prueba25";
//Definimos el remitente (dirección y, opcionalmente, nombre)
//Esta línea es por si queréis enviar copia a alguien (dirección y, opcionalmente, nombre)
//$mail->AddReplyTo('luis_egp13@hotmail.com','Enrique');

$mail->SetFrom('alertas@cartomicro.com.mx', 'Cartomicro');
//Y, ahora sí, definimos el destinatario (dirección y, opcionalmente, nombre)
$mail->AddAddress($destinatario_mail,'Destinatario');
$mail->AddAddress('egranados@cartomicro.com.mx', 'Staff');
//$mail->AddAddress('amartinez@cartomicro.com.mx', 'Admin');
//Definimos el tema del email
$mail->Subject = $tipo." Dentro de  BDS cartomicro: Sol. ".$ticket;
//Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
$mail->MsgHTML($body);
//Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
$mail->AltBody = 'Asegurese  de  Tener  la direccion dentro de  la lista de remitentes  seguros';
//Enviamos el correo
if(!$mail->Send()) {
  //echo "Error: " . $mail->ErrorInfo;
die ("ERROR AL Enviar  mail");

} else {
 // echo "Enviado!";
}

}

function conectar_mysql($host,$usuario,$pass,$db){
        $con = mysql_connect($host,$usuario,$pass);
        if(! $con){die ("ERROR AL CONECTAR MYSQL:".mysql_error());}
        $bd = mysql_select_db($db, $con);
         if (! $bd ){die ("ERROR AL CONECTAR CON LA BASE DE DATOS: ".mysql_error() );}
}


function get_correo2($iduser)
																		{
	
																			$cone=mysql_connect("172.16.1.1:3306","bideso","");
																			mysql_select_db("bd_carto_micro",$cone);
																			$sql="select * from con_tbl_usuario where  id_usuario=".$iduser;
																			$datos=mysql_query($sql,$cone); //enviar código MySQL
																			$cadena_h="";
																			while ($row=mysql_fetch_array($datos))
																				{ //Bucle para ver todos los registros
	 
																					//$row['nombre']; //datos del campo nombre
																					//$row['id_usuario'];
														//$cadena_actual = '<option value="'.$row['id_usuario'].'">'.$row['nombre'].'</option>';
	$cadena_actual =htmlspecialchars($row[4])	;													
														$cadena_h=$cadena_h.$cadena_actual;
	 				       	  
																				}
																			return $cadena_h;
																			mysql_close($con);//cerrar conexion

																		}




function ejecutar_sql($sql,$sol,$fec,$fol,$solic){

                $resultado = mysql_query($sql);

                if (! $resultado ) 
				{
				die("ERROR AL EJECUTAR LA CONSULTA-: ".mysql_error()." ---".$sql );
				}
				else
				{
				
				$cadena_de_texto = $sol;
				$cadena_buscada   = '/';
				$posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);
				$str_resul=substr($sol,$posicion_coincidencia+1,strlen($sol));
				$destino=get_correo2($str_resul);
				
				send_mail_(" Alta ",$sol,$fec,$fol,$solic,$destino);	
				
				
				
				}
				
				
				

                return $resultado;

}


  conectar_mysql("172.16.1.249:3306","root","","desarrollo");

   $sql = "INSERT INTO desarrollos VALUES ('".$folio."','".$solicitud."',".$estatus.",'".$solicitante."','".$fecha_solicitud."','".$fecha_entrega."',null,".$prioridad.",'".$observaciones."','".$nombre_archivo."','".$fecha_cierre."','".$asignado."','')";
 
  
  
 // $alert="INSERT INTO alertas VALUES (null,'Alta','".$folio."-".$solicitud."','".$solicitante."','".$fecha_solicitud."',0)";
  
   ejecutar_sql($sql,$solicitante,$fecha_solicitud,$folio,$solicitud);
   
  // ejecutar_sql($alert);
   
   //send_mail_("","","","","");

   // echo "<center>DATOS INSERTADOS CORRECTAMENTE<br />";


//datos del arhivo





if (strlen($nombre_archivo) > 2)
{

//echo "si hay archivo...";

//compruebo si las características del archivo son las que deseo

    if (move_uploaded_file($_FILES['archivo']['tmp_name'],'Uploads/'.$folio."_".$solicitud.".".$ext))
	{
       echo "El archivo ha sido cargado correctamente.";
	   header("Location: user.php");
    }
	
	else{
       echo "Ocurrió algún error al subir el fichero. No pudo guardarse. <a href=../user.php>";
    }


}

else

{


header("Location: user.php");
}



?> 