<?php
require("class.bd.php");
$bd = new BD();
//$sql = "Delete FROM categorias WHERE idcategoria = {$_GET["id"]}";
$sql = "Delete FROM  categorias WHERE idcategoria = %d";
$sql = sprintf($sql, $_GET["id"]);

$bd->ejecutar($sql);

header("Location:main.php?show=list-categorias.php");
exit();
?>
