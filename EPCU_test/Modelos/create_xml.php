<?php 

$xml="<libraray>\n\t\t";
$x=0;
while($x < 10)
{
$x++;
    $xml .="<mail_address>\n\t\t";
    $xml .= "<id>fdgfdgfd</id>\n\t\t";
    $xml .= "<email>fdgfdgf</email>\n\t\t";
    $xml .= "<verify_code>fdgfd</verify_code>\n\t\t";
    $xml .= "<status>fdgfd</status>\n\t\t";
    $xml.="</mail_address>\n\t";
}
$xml.="</libraray>\n\r";
$xmlobj=new SimpleXMLElement($xml);
$xmlobj->asXML("text.xml");



?>