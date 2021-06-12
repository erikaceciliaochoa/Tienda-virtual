<?php
require("class.bd.php");
$bd = new BD();
if(is_numeric($_POST["id"]))
{
   /* $sql = "UPDATE usuarios Set nombre='{$_POST["nombre"]}',clave='{$_POST["clave"]}'
        WHERE idusuario = {$_POST["id"]}";*/

$sql = "UPDATE usuarios Set nombre='{$_POST["nombre"]}',clave='{$_POST["clave"]}'
        WHERE idusuario = %d";

$sql = sprintf($sql, $_POST["id"]);
}
else
{
    $sql="INSERT INTO usuarios(nombre,clave)VALUES('{$_POST["nombre"]}','{$_POST["clave"]}')";
}

$bd->ejecutar($sql);
header("Location:main.php?show=list-usuarios.php");
exit();
?>
