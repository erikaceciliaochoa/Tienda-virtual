<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Hello!</title>
</head>

<body>
<form enctype="multipart/form-data" method="post" action="upload.php" name="form1" id="form1" >
<input type = "hidden" name="id" id="id" value="<?php echo $_GET["id"]; ?>"/>

<B>Upload de imagenes</B><br/>
<input type="file" name="archivo_1" id="archivo_1" size="35" class="casilla"/><br />
<input type="file" name="archivo_2" id="archivo_2" size="35" class="casilla"/><br />
<input type="file" name="archivo_3" id="archivo_3" size="35" class="casilla"/><br />
<input type="file" name="archivo_4" id="archivo_4" size="35" class="casilla"/><br />
<input type="file" name="archivo_5" id="archivo_5" size="35" class="casilla"/>
<br/>

<!-- Si hay algo en esa posicion debo tener pegado el link la debe borrar antes de seguir -->

<input type="submit" name ="enviar" id="enviar" value="Enviar"/>

</form>
 </body>
</html>

<?php
    $imagenes=glob("../fotos/{$_GET["id"]}-*.jpg");
    if(is_array($imagenes))
    {
      for($i=0; $i<count($imagenes); $i++)
      {
        echo "<a href='eliminar-foto.php?archivo={$imagenes[$i]}&idproducto={$_GET["id"]}' onclick='return confirm (\"¿Desea eliminar esta imagen?\")' >
        <img src='{$imagenes[$i]}' width='100' height='150' />
        </a> ";
      }
    }
    //echo "<br /><a href='main.php?show=form-upload.php&id={$r["idproducto"]}'>Agregar foto</a>";

?>