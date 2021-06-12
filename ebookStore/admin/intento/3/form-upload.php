<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Hello!</title>
</head>

<body onload="">
<form enctype="multipart/form-data" method="post" action="upload.php" name="formulario" id="formulario" target="ajax">
<input type = "hidden" name="id" id="id" value="<?php echo $_GET["id"]; ?>"/>
<B>Upload de imagenes</B><br/>

<input type="file" name="archivo_1" id="archivo_1" size="35" onchange="document.getElementById('formulario').submit();" /><br />
<input type="file" name="archivo_2" id="archivo_2" size="35" onchange="document.getElementById('formulario').submit();" /><br />
<input type="file" name="archivo_3" id="archivo_3" size="35" onchange="document.getElementById('formulario').submit();" /><br />
<input type="file" name="archivo_4" id="archivo_4" size="35" onchange="document.getElementById('formulario').submit();" /><br />
<input type="file" name="archivo_5" id="archivo_5" size="35" onchange="document.getElementById('formulario').submit();" />
<!-- Si hay algo en esa posicion debo tener pegado el link la debe borrar antes de seguir -->
<!--<input type="submit" name ="enviar" id="enviar" value="Enviar"/>-->
</form>

<iframe name="ajax" id="ajax" width="1" height="1" style="display: none;"> </iframe>
<!--<div style="display: none;"> -->
<img id="imagen_1" width="100" height="150"/>
<img id="imagen_2" width="100" height="150"/>
<img id="imagen_3" width="100" height="150"/>
<img id="imagen_4" width="100" height="150"/>
<img id="imagen_5" width="100" height="150"/>
<!--</div> -->
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
?>