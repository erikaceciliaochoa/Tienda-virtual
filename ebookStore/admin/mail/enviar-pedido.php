<?php
require("phpmailer/class.phpmailer.php");

$email = new PHPMailer();
$email->PluginDir = "phpmailer/";

$email->Mailer = "smtp";
$email->Host = "mail.mdtec.com.ar";
$email->SMTPAuth = true;
$email->Username = "external@mdtec.com.ar";
$email->Password = "MDTec123456";
$email->Timeout = 30;

$email->From = "info@capacitacionit.com";
$email->FromName = "Un comprador";
$email->Subject = "Pedido de Productos";
$email->AltBody = "Para visualizar el mansaje utilice un visor compatible con HTML";
$email->MsgHTML("Prueba");
$email->AddAddress("claudio.delgado@capacitacionit.com");
$intentos = 1;
while(!$envio && $intentos < 5)
{
	$envio = $email->Send();
	sleep(5);
	$intentos++;
}
?>