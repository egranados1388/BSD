<?php
/*Lo primero es a�adir al script la clase phpmailer desde la ubicaci�n en que est�*/

function send_mail_($tipo,$usuario,$fecha,$ticket,$descripcion)

{

require 'phpmailer/class.phpmailer.php';
 $body= 'Esto es solo un mensaje  de  prueba';
//Crear una instancia de PHPMailer
$mail = new PHPMailer();
//Definir que vamos a usar SMTP
$mail->IsSMTP();
//Esto es para activar el modo depuraci�n. En entorno de pruebas lo mejor es 2, en producci�n siempre 0
// 0 = off (producci�n)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug  = 0;
//Ahora definimos gmail como servidor que aloja nuestro SMTP
$mail->Host       = 'smtp.gmail.com';
//El puerto ser� el 587 ya que usamos encriptaci�n TLS
$mail->Port       = 587;
//Definmos la seguridad como TLS
$mail->SMTPSecure = 'tls';
//Tenemos que usar gmail autenticados, as� que esto a TRUE
$mail->SMTPAuth   = true;
//Definimos la cuenta que vamos a usar. Direcci�n completa de la misma
$mail->Username   = "alertas@cartomicro.com.mx";
//Introducimos nuestra contrase�a de gmail
$mail->Password   = "prueba25";
//Definimos el remitente (direcci�n y, opcionalmente, nombre)
//Esta l�nea es por si quer�is enviar copia a alguien (direcci�n y, opcionalmente, nombre)
//$mail->AddReplyTo('luis_egp13@hotmail.com','Enrique');

$mail->SetFrom('alertas@cartomicro.com.mx', 'Cartomicro');
//Y, ahora s�, definimos el destinatario (direcci�n y, opcionalmente, nombre)
$mail->AddAddress('egranados@cartomicro.com.mx', 'Destinatario');
$mail->AddAddress('luis_egp13@hotmail.com', 'Reply');
//Definimos el tema del email
$mail->Subject = 'Esto es un correo de prueba';
//Para enviar un correo formateado en HTML lo cargamos con la siguiente funci�n. Si no, puedes meterle directamente una cadena de texto.
$mail->MsgHTML($body);
//Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versi�n alternativa en texto plano (tambi�n ser� v�lida para lectores de pantalla)
$mail->AltBody = 'This is a plain-text message body';
//Enviamos el correo
if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} else {
  echo "Enviado!";
}

}
?>