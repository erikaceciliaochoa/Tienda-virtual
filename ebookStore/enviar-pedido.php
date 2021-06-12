<?php
    session_start();
    $cuerpo="";
    $cuerpo.="<table border=1>";
    $cuerpo.="<tr>";
    $cuerpo.="<th>Nombre</th>";
    $cuerpo.="<th>Cantidad</th>";
    $cuerpo.="<th>Precio</th>";
    $cuerpo.="<th>SubTotal</th>";
    $cuerpo.="</tr>";
    $total=0;
    $subtotal=0;

  for($i=0; $i<count($_SESSION["carrito"]); $i++)
  {
      $cuerpo.="<tr>";
      $cuerpo.="<td>{$_SESSION["carrito"][$i][2]}</td>";
      $cuerpo.="<td>{$_SESSION["carrito"][$i][1]}</td>";
      $cuerpo.="<td>{$_SESSION["carrito"][$i][3]}</td>";
      $cuerpo.="<td>{$subtotal}</td>";
      $cuerpo.="</tr>";

      $subtotal=$_SESSION["carrito"][$i][3] * $_SESSION["carrito"][$i][1];
      $total+=$subtotal;
  }
  $cuerpo.="</table>";

  $cuerpo.="<b>TOTAL: {$total}</b>";
  $cuerpo.="<br />";
  $cuerpo.="Nombre: {$_POST['nombre']} <br />
             Apellido: {$_POST['apellido']} <br />
             Email: {$_POST['email']} <br />
             Mensaje: {$_POST['mensaje']}";
  echo $cuerpo;

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
$email->MsgHTML($cuerpo);
$email->AddAddress("erika8a@gmail.com");
$intentos = 1;
while(!$envio && $intentos < 5)
{
	$envio = $email->Send();
	sleep(5);
	$intentos++;
}

 unset($_SESSION["carrito"]);

 header("location:index.php?envio=1");
 exit();
?>