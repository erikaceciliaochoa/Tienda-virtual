<?php
    function mostrar_lista($sql, $archivo)
    {
      //para generar un excel
      header("Content-Type: application/vnd.ms-excel");
      header("Content-Disposition: attachment; filename:$archivo");

      //seguridad para evitar el cacheo
      header("Pragma: no-cache");
      header("Expires: 0");

      //conexion base de datos
      $bd = new BD();
      $registros = $bd->ejecutar($sql);

      while($r = $bd->retornar($registros))
      {
        $filas.="<tr>";
         foreach ($r as $clave => $valor)
         {
            $filas.="<td> {$valor}</td>";
            if(!$campos) $encabezado[]=$clave;
         }
         $campos=true;
         $filas.="</tr>";
      }
      foreach ($encabezado as $valor)
      {
            $temp.="<th>{$valor}</th>";
      }
      $html="<table border='1'><tr>{$temp}</tr>{$filas}</table>";
      echo $html;
    }
?>