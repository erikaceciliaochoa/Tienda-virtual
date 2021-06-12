<?php
require("class.bd.php");
$bd = new BD();
//$sql = "Delete FROM usuarios WHERE idusuario = {$_GET["id"]}";
$sql = "Delete FROM usuarios WHERE idusuario = %d";
$sql = sprintf($sql, $_GET["id"]);

/*$sql="select * from productos
	where idcategoria=%d AND precio>%d";
$sql=sprintf($sql, $_GET["idcategoria"], $_GET["precio"]);*/

$bd->ejecutar($sql);
header("Location:main.php?show=list-usuarios.php");
exit();
?>