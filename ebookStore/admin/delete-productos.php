<?php
require("class.bd.php");
$bd = new BD();
// $sql = "Delete FROM productos WHERE idproducto = {$_GET["id"]}";

$sql = "Delete FROM productos WHERE idproducto = %d";
$sql = sprintf($sql, $_GET["id"]);


$bd->ejecutar($sql);
header("Location:main.php?show=list-productos.php");
exit();
?>
