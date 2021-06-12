<!--<script src="funciones.js"></script>  -->
<?php
//require("class.bd.php");
//require("funciones.php");

$bd = new BD();
$sql = "SELECT * FROM usuarios Order By nombre";
$registros = $bd->ejecutar($sql);

echo "<table border ='1'>
	<tr>
	   <td><b>Editar</b></td>
	   <td><b>Eliminar</b></td>
	   <td><b>ID</b></td>
	   <td><b>Nombre</b></td>
	</tr>";

while($r = $bd->retornar($registros))
echo "<tr>
	   <td><a href='main.php?show=form-usuarios.php&id={$r["idusuario"]}'>Editar</a></td>
	   <td><a href='delete-usuarios.php?id={$r["idusuario"]}'>Eliminar</a></td>
	   <td>{$r["idusuario"]}</td>
	   <td>{$r["nombre"]}</td>
	</tr>";

	echo "</table>";

//mostrar_lista($sql, "listado.xls");

echo "<a href='main.php?show=form-usuarios.php'>Agregar</a>
<a href='exportar-usuarios.php?a=usuarios'>Exportar</a>
";
?>

<!--<a href='#' onclick='retornar_producto($sql, \"listado.xls\");'>Ver</a> -->