<?php
if(isset($_GET["id"]))
{
$bd = new BD();
// $sql = "SELECT * FROM usuarios where idusuario={$_GET["id"]}";

$sql = "SELECT * FROM usuarios WHERE idusuario = %d";
$sql = sprintf($sql, $_GET["id"]);

$registros = $bd->ejecutar($sql);

$r = $bd->retornar($registros);
}
?>
<form onsubmit="return confirm ('¿Desea Continuar?')" method="post" action="save-usuarios.php"name="form" id="form1" >
<input type = "hidden" name="id" id="id" value="<?php echo $_GET["id"]; ?>"/>
<B>Nombre</B><br/>
<input type "text" name="nombre" id="nombre" value="<?php echo $r["nombre"]; ?>"/>
<br/>
<B>Clave</B><br/>
<input type="password" name="clave" id="clave" value="<?php echo $r["clave"]; ?>"/>
<br/>
<input type="submit" name ="guardar" value="Guardar"/>
</form>