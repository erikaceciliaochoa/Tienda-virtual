<?php
function generarcombo($sql,$id)
{
  $bd=new BD();
  $registros = $bd->ejecutar($sql);
  while($registro = $bd->retornar($registros, MYSQL_NUM))
  {
      echo "<option value='{$registro[0]}'";
      if($registro[0]==$id)
        echo "selected='selected'";

      echo ">{$registro[1]}</option>";
  }
}
?>