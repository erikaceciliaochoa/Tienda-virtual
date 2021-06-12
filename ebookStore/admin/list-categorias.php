<?php

$link=mysql_connect("localhost","root","");
mysql_select_db("ochoa",$link);
$sql = "SELECT * FROM categorias Order By descripcion";
$registros = mysql_query($sql);
echo "<table border ='1'>
	<tr>
	   <td><b>Editar</b></td>
	   <td><b>Eliminar</b></td>
	   <td><b>ID</b></td>
	   <td><b>Descripcion</b></td>
	</tr>";
while($r=mysql_fetch_array($registros))
echo "<tr>
	   <td><a href='main.php?show=form-categorias.php&id={$r["idcategoria"]}'>Editar</a></td>
	   <td><a href='delete-categorias.php?id={$r["idcategoria"]}'>Eliminar</a></td>
	   <td>{$r["idcategoria"]}</td>
	   <td>{$r["descripcion"]}</td>
	</tr>";

	echo "</table>";
?>
<a href="main.php?show=form-categorias.php">AGREGAR</a>
<a href="exportar-usuarios.php?a=categorias">Exportar</a>
