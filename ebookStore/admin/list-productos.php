<?php
$bd = new BD();
$sql = "SELECT * FROM productos Order By idproducto";

if(isset($_GET["idcategoria"]))
{
  $sql = "SELECT * FROM productos WHERE idcategoria = %d";
  $sql = sprintf($sql, $_GET["idcategoria"]);
}

$registros = $bd->ejecutar($sql);

echo "<table border ='1' align='center'>
	<tr>
	   <td><b>Editar</b></td>
	   <td><b>Eliminar</b></td>
	   <td><b>Producto</b></td>
       <td><b>Categoria</b></td>
       <td><b>nombre</b></td>
	   <td><b>Descripcion</b></td>
       <td><b>valor</b></td>
       <td><b>Imagen</b></td>
	</tr>";

while($r = $bd->retornar($registros))
echo "<tr>
	   <td><a href='main.php?show=form-productos.php&id={$r["idproducto"]}'>Editar</a></td>
	   <td><a href='delete-productos.php?id={$r["idproducto"]}'>Eliminar</a></td>
	   <td>{$r["idproducto"]}</td>
       <td>{$r["idcategoria"]}</td>
       <td>{$r["nombre"]}</td>
       <td>{$r["descripcion"]}</td>
       <td>{$r["valor"]}</td>
       <td>
            <img src=\"../fotos/{$r["idproducto"]}-1.jpg\" width='100' height='150' align='middle' alt=\"{$r["idproducto"]}-1.jpg\" /><br />
            <a href='main.php?show=form-upload.php&id={$r["idproducto"]}'>Agregar fotos</a>
      </td>
	</tr>";

	echo "</table>";
?>
<a href="main.php?show=form-productos.php">AGREGAR</a>
<a href="exportar-usuarios.php?a=productos">Exportar</a>