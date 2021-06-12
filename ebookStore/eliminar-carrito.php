<?php
    session_start();
    for($i=0; $i<count($_SESSION["carrito"]); $i++)
    {
      if($_SESSION["carrito"][$i][0]<>$_GET["idproducto"])
      {
        //creo un arreglo temporal
        $temporal[] = $_SESSION["carrito"][$i];
      }
    }
    $_SESSION["carrito"] = $temporal;
    header("location:index.php?show=carrito.php");
    exit();
?>