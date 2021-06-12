<?php
$bd = new BD();
if(isset($_GET["id"]))
{
$sql = "SELECT * FROM productos WHERE idproducto = %d";
$sql = sprintf($sql, $_GET["id"]);

$registros = $bd->ejecutar($sql);
$r = $bd->retornar($registros);
}
?>
<!--<table><tr><td>-->
<form onsubmit="return confirm ('¿Desea Continuar?')" method="post" action="save-productos.php"name="form" id="form1" >
<input type = "hidden" name="id" id="id" value="<?php echo $_GET["id"]; ?>"/>

<B>ID categoria</B><br/>
<!--<input type="text" name="idcategoria" id="idcategoria" value="<?php echo $r["idcategoria"]; ?>"/>  -->
<select name="idcategoria" id="idcategoria">
  <?php
    require ("generarcombo.php");
    $sql = "select * from categorias";
    generarcombo($sql,$r["idcategoria"]);
  ?>
</select>
<br/>

<B>nombre</B><br/>
<input type="text" name="nombre" id="nombre" value="<?php echo $r["nombre"]; ?>"/>
<br/>

<B>descripción</B><br/>
<textarea name="descripcion" rows="4" cols="37" tabindex="1">
<?php echo $r["descripcion"]; ?>
</textarea><br />

<B>valor</B><br/>
<input type="text" name="valor" id="valor" value="<?php echo $r["valor"]; ?>"/>
<br/><br />

<input type="submit" name ="guardar" value="Guardar"/>
</form>
<!--</td></tr>  -->
<!--<tr><td> -->

<!--</td></tr></table>-->
