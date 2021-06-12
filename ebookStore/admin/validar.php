<?php
session_start();
$link=mysql_connect("localhost","root","");
mysql_select_db("ochoa",$link);

// $sql = "SELECT * FROM usuarios WHERE nombre='{$_POST["usuario"]}' AND clave='{$_POST["clave"]}'";

$sql="SELECT * FROM usuarios
	where nombre=%d AND clave=%d";
$sql=sprintf($sql, $_POST["usuario"], $_POST["clave"]);

$registros = mysql_query($sql);
if(mysql_num_rows($registros)==1)
{
$registros=mysql_fetch_array($registros);
$_SESSION["login"]=array("nombre"=>$registros["nombre"],"idusuario"=>$registros["idusuario"]);
header("location:main.php");
exit();
}
else
{
unset($_session["login"]);
header("location:index.php?error=1");
exit();
}
?>
