<?php
define("ANCHO", 250);

for($i=1; $i<=5; $i++)
  {
      $path="../fotos/".$_POST["id"]."-".$i.".jpg";
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
header("Location:main.php?show=form-upload.php&id={$_POST["id"]}");
exit();
?>

<?php
/*header("Location:main.php?show=form-productos.php&id={$_POST["id"]}");
exit();*/
?>