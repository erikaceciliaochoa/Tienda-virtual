<?php
    @unlink($_GET["archivo"]);
    header("location: main.php?show=form-upload.php&id={$_GET["idproducto"]}");
   //http://localhost/12_05_2010/ebookStore/admin/main.php?show=form-productos.php&id=1
?>