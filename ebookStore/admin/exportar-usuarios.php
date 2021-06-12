<?php

  // session_start();
require("class.bd.php");
require("funciones.php");

// switch($propiedades["extension"])

switch ($_GET["a"]) {

      case usuarios:
        //echo "0";
        $sql = "SELECT * FROM usuarios Order By idusuario";
        mostrar_lista($sql, "usuarios.xls");
        break;

      case categorias:
        // echo "1";
        $sql = "SELECT * FROM categorias Order By idcategoria";
        mostrar_lista($sql, "categorias.xls");
        break;

      case productos:
       //  echo "2";
        $sql = "SELECT * FROM productos Order By idproducto";
        mostrar_lista($sql, "productos.xls");
        break;

    default:
        echo "No anda!!";
        break;
}

/*    //para generar un excel
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename:usuarios.xls");

    //seguridad para evitar el cacheo
    header("Pragma: no-cache");
    header("Expires: 0");



echo "<table border ='1'>
	<tr>
	   <td><b>ID</b></td>
	   <td><b>Nombre</b></td>
	</tr>";

echo "<tr>
	   <td>{$r["idusuario"]}</td>
	   <td>{$r["nombre"]}</td>
	</tr>";

	echo "</table>";*/
?>


