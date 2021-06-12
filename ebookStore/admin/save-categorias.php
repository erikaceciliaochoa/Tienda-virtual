<?php

require("class.bd.php");
$bd=new BD();
if(is_numeric($_POST["id"]))
{
/*$sql = "UPDATE categorias Set descripcion='{$_POST["descripcion"]}'
            WHERE idcategoria = {$_POST["id"]}";*/

$sql = "UPDATE categorias Set descripcion='{$_POST["descripcion"]}'
            WHERE idcategoria = %d";
$sql = sprintf($sql, $_POST["id"]);
}
else
{
$sql="INSERT INTO Categorias(descripcion)VALUES('{$_POST["descripcion"]}')";
}

$bd->ejecutar($sql);
header("Location:main.php?show=list-categorias.php");
exit();
?>