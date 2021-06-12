<?php
require("class.bd.php");
$bd = new BD();
if(is_numeric($_POST["id"]))
{
/*$sql = "UPDATE productos Set idcategoria='{$_POST["idcategoria"]}',nombre='{$_POST["nombre"]}',descripcion='{$_POST["descripcion"]}',valor='{$_POST["valor"]}'
        WHERE idproducto = {$_POST["id"]}";*/


$sql =  "UPDATE productos Set idcategoria='{$_POST["idcategoria"]}',nombre='{$_POST["nombre"]}',descripcion='{$_POST["descripcion"]}',valor='{$_POST["valor"]}'
        WHERE idproducto = %d";

$sql = sprintf($sql, $_POST["id"]);


}
else
{
$sql="INSERT INTO productos(idcategoria,nombre,descripcion,valor)VALUES('{$_POST["idcategoria"]}','{$_POST["nombre"]}','{$_POST["descripcion"]}','{$_POST["valor"]}')";
}
$bd->ejecutar($sql);
 header("Location:main.php?show=list-productos.php");
// main.php?show=form-productos.php&id={$_POST["id"]}
//header("Location:main.php?show=form-productos.php&id={$_POST["id"]}");
//header("Location:main.php?show=form-productos.php&id={$_POST["id"]}");
exit();
?>
