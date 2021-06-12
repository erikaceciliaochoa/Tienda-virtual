<?php
if(isset($_GET["id"]))
{
$link=mysql_connect("localhost","root","");
mysql_select_db("ochoa",$link);

// $sql = "SELECT * FROM categorias where idcategoria={$_GET["id"]}";

$sql = "SELECT * FROM categorias WHERE idcategoria = %d";
$sql = sprintf($sql, $_GET["id"]);

$registros =mysql_query($sql);
$r=mysql_fetch_array($registros);
}
?>
<form onsubmit="return confirm ('¿Desea Continuar?')" method="post" action="save-categorias.php"name="form" id="form1" >
<input type = "hidden" name="id" id="id" value="<?php echo $_GET["id"]; ?>"/>
<B>Descripcion</B><br/>
<input type "text" name="descripcion" id="descripcion" value="<?php echo $r["descripcion"]; ?>"/>
<br/>
<input type="submit" name ="guardar" value="Guardar"/>

</form>



