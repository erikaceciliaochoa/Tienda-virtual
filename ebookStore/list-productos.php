<?php

    $sql = "select * from productos";
    if(isset($_GET["idcategoria"]))
    {
      $sql.=" WHERE idcategoria= %d";
      $sql = sprintf($sql, $_GET["idcategoria"]);
    }


    else if(isset($_GET["busqueda"]))
    {
       $sql.=" WHERE nombre LIKE '%%%s%%' OR
                     descripcion LIKE '%%%s%%'";

       $sql = sprintf($sql, $_GET["busqueda"], $_GET["busqueda"]);
    }

    else
    {
      $sql.=" ORDER BY RAND() LIMIT 10";
    }

    $bd = new BD();
    $registros = $bd->ejecutar($sql);
    while($registro = $bd->retornar($registros))
    {
      echo retornar_producto($registro);
    }
?>