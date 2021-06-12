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
<table><tr><td>
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
</td></tr>
<tr><td>

<form enctype="multipart/form-data" method="post" action="upload.php" name="formulario" id="formulario" target="ajax">
<input type = "hidden" name="id" id="id" value="<?php echo $_GET["id"]; ?>"/>
<B>Upload de imagenes</B><br/>

<input type="file" name="archivo_1" id="archivo_1" size="35" onchange="document.getElementById('formulario').submit();" /><br />
<input type="file" name="archivo_2" id="archivo_2" size="35" onchange="document.getElementById('formulario').submit();" /><br />
<input type="file" name="archivo_3" id="archivo_3" size="35" onchange="document.getElementById('formulario').submit();" /><br />
<input type="file" name="archivo_4" id="archivo_4" size="35" onchange="document.getElementById('formulario').submit();" /><br />
<input type="file" name="archivo_5" id="archivo_5" size="35" onchange="document.getElementById('formulario').submit();" />
</form>

<iframe name="ajax" id="ajax" width="1" height="1" style="display: none;"> </iframe>
<img id="imagen_1" width="100" height="150" />
<img id="imagen_2" width="100" height="150" />
<img id="imagen_3" width="100" height="150" />
<img id="imagen_4" width="100" height="150" />
<img id="imagen_5" width="100" height="150" />

<?php
    $imagenes=glob("../fotos/{$r["idproducto"]}-*.jpg");
    if(is_array($imagenes))
    {
      for($i=0; $i<count($imagenes); $i++)
      {
        echo "<a href='eliminar-foto.php?archivo={$imagenes[$i]}&idproducto={$r["idproducto"]}' onclick='return confirm (\"¿Desea eliminar esta imagen?\")' >
        <img src='{$imagenes[$i]}' width='100' height='150' />
        </a> ";
      }
    }
    //echo "<br /><a href='main.php?show=form-upload.php&id={$r["idproducto"]}'>Agregar foto</a>";
?>
</td></tr></table>


<!--<form  name="formulario" id="formulario" method="post" enctype="multipart/form-data" action="upload.php" target="ajax">
    <input type="file" name="archivo" id="archivo" onchange="document.getElementById('formulario').submit();" />
</form>
<iframe name="ajax" id="ajax" width="1" height="1" style="display: none;"> </iframe>
<img id="imagen" width="100" height="150" />-->