<?php
define("ANCHO", 250);

for($i=1; $i<=5; $i++)
  {
      $path="../fotos/".$_POST["id"]."-".$i.".jpg";
      //  move_uploaded_file($_FILES["archivo_1"]["tmp_name"], $_FILES["archivo_1"]["name"]);
      move_uploaded_file($_FILES["archivo_{$i}"]['tmp_name'], $path);

      $archivo="../fotos/".$_POST["id"]."-".$i.".jpg";
      $destino="../fotos/".$_POST["id"]."-".$i.".jpg";

      $propiedades = pathinfo($archivo);

      switch($propiedades["extension"])
      {
        case "gif":
          $imagen = imagecreatefromgif($archivo);
        break;

        case "png":
          $imagen= imagecreatefrompng($archivo);
        break;

        case "jpg":
        case "jpeg":
          $imagen= imagecreatefromjpeg($archivo);
      }
      //esta creada en memoria
      if($imagen)
      {
          $ancho_original = imagesx($imagen);
          $alto_original = imagesy($imagen);
           //LIENZO EN FUNCION DE $ANCHO Y $ALTO
          $alto = $alto_original;
          $ancho = $ancho_original;

          if($ancho_original > ANCHO)
          {
                $ancho = ANCHO;
                $alto = $alto_original * ANCHO / $ancho_original;
          }
          //me crea el ienzo
          $redimensionada = imagecreatetruecolor($ancho, $alto);
          imagecopyresized($redimensionada,$imagen,0,0,0,0,$ancho,$alto,$ancho_original,$alto_original);

          //@-->no ejecuta si encuentra un error. Borro el path del archivo
          @unlink($destino);
          imagejpeg($redimensionada,$destino);
          //cree 2 imagenes pesadas, las borro

          imagedestroy($imagen);
          imagedestroy($redimensionada);
      }
  }

/*header("Location:main.php?show=form-productos.php&id={$_POST["id"]}");
exit();*/
?>

<?php
    //  move_uploaded_file($_FILES["archivo_1"]["tmp_name"], $_FILES["archivo_1"]["name"]);
    /*$pat="../fotos/".$_POST["id"]."-".1.".jpg";*/
    /*$path="../fotos/$_POST["id"]-1.jpg";*/
    /*<img src=\"../fotos/{$r["idproducto"]}-1.jpg\"*/
?>
<html>
<head>
</head>
<body onload="
        alert('Cargado formulario');
        <?php $imagenes=glob("../fotos/{$_POST["id"]}-1.jpg"); ?>
        alert('<?php echo $imagenes[0]; ?>');
        alert('<?php echo $_FILES["archivo_1"] [$imagenes[0]]; ?>');

        var img = parent.document.getElementById('imagen_1');
        img.src = '<?php echo $_FILES["archivo_1"] ["../fotos/2-1.jpg"]; ?>';
">
</body>
</html>

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
?>

<?php
/*header("Location:main.php?show=form-productos.php&id={$_POST["id"]}");
exit();*/
?>